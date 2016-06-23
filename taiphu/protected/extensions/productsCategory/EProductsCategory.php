<?php

class EProductsCategory extends CWidget {

    private $category = array();
    private $product = array();

    public function init() {
        $this->category = Yii::app()->db->createCommand('select * from `' . MModels::model()->tableName() . '` where `status` = 1 and `homepage`=1 order by `number` asc, `id` desc')->queryAll();
    }

    public function run() {
        if ($this->category) {
            foreach ($this->category as $cate) :
                $this->product = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `status` = 1 and `parent` = "' . $cate['id'] . '" and `new` = 1 order by `number` asc, `id` desc limit 0,4')->queryAll();
                $name = CHtml::encode($cate['name_' . Yii::app()->language]);
                $des = CHtml::encode($cate['des_' . Yii::app()->language]);
                $link = Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $cate['slug']);
                ?>
                <div class="product-list clearfix">

                    <h2 class="page_heading_title"><?php echo $name; ?></h2>

                    <div class="product_listing_main homepage_carousel row">
                        <?php
                        if ($this->product):
                            $stt = 0;
                            foreach ($this->product as $keyV => $valueV) :
                                $stt++;
                                $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.status = 1 and c.id = o.children_id and o.product_id = "' . $valueV['id'] . '" order by c.id asc')->queryAll();
                                $a = array();
                                foreach ($optionModels as $options) :
                                    if (!in_array($options['name_vi'], $a)) {
                                        $a[$options['id']] = $options['name_vi'];
                                    }
                                endforeach;
                                $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
                                $des = CHtml::encode($valueV['des_' . Yii::app()->language]);
                                ?>

                                <div class="wow product col-sm-4 product_homepage item_1">
                                    <div>

                                        <div class="product_img">
                                            <a class="img_change" href="<?php echo Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $valueV['slug']); ?>" title="<?php echo $name; ?>">
                                                <img src="<?= trim($valueV['image']); ?>" alt="" />	
                                            </a>
                                        </div>

                                        <div class="product_info">
                                            <div class="product_name">
                                                <a href="<?php echo Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $valueV['slug']); ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a>
                                            </div>
                                            <div class="product_price">
                                                <span class="money "> <?php echo number_format(str_replace(',', '', $valueV['price']), 0, ".", "."); ?>₫</span>
                                                <div class="clearfix"></div>
                                                <?php
                                                if ($valueV['price_promotion'] != 0):
                                                    ?>
                                                    <span class="money money_sale "><?php echo number_format(str_replace(',', '', $valueV['price_promotion']), 0, ".", "."); ?> ₫</span>
                                                    <?php
                                                endif;
                                                ?>
                                            </div>

                                            <div class="product_desc">
                                                <?php echo $des; ?>...
                                            </div>

                                            <a href="<?php echo Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $valueV['slug']); ?>" class="btn btn-primary" style="background: #ce0702 !important;border-radius: 5px !important;" title="<?php echo $name; ?>">chi tiết</a>

                                            <div class="product_links"></div>

                                        </div>
                                    </div>
                                </div>

                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>

                    <!--                    <div class="product_listing_main__btn">
                                            <a href="<?php // echo Yii::app()->createUrl('/san-pham/' . $cate['slug']);        ?>" class="btn">Xem tất cả sản phẩm</a>
                                        </div>-->

                </div>
                <?php
            endforeach;
        }
    }

}
?>