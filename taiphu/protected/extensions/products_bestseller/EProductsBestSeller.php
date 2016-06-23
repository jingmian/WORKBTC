<?php

class EProductsBestSeller extends CWidget {

    private $productNew = array();

    public function init() {
        $criteria = new CDbCriteria;
        $criteria->condition = 'status =1 and bestseller = 1 ';
        $criteria->order = "number ASC";
        $count = MProducts::model()->count($criteria);
        $this->productNew = MProducts::model()->findAll($criteria);
    }

    public function run() {
        if ($this->productNew) {
            foreach ($this->productNew as $itemsNew) :
                $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.status = 1 and c.id = o.children_id and o.product_id = "' . $itemsNew['id'] . '" order by c.id asc')->queryAll();
                $a = array();
                foreach ($optionModels as $options) :
                    if (!in_array($options['name_vi'], $a)) {
                        $a[$options['id']] = $options['name_vi'];
                    }
                endforeach;
                $link = Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $itemsNew['slug']);
                $name = $itemsNew['name_' . Yii::app()->language];
                $des = $itemsNew['des_' . Yii::app()->language];
                ?>

                <li class="oneNews">
                    <a href="<?php echo $link; ?>" title="<?php echo $name; ?>" class="thumb" >
                        <img src="<?php echo $itemsNew->image; ?>" alt="<?php echo $name; ?>" style="width: 75px;height: 75px">
                    </a>
                    <ul class="title-des">
                        <a href="<?php echo $link; ?>" title="<?php echo $name; ?>">
                            <?php echo $name; ?>
                        </a>
                        <span> <?php echo number_format(str_replace(',', '', $itemsNew->price_promotion), 0, ".", "."); ?> đ </span>
                    </ul>
                </li>


<!--                <li class='onePro'>
                    <ul>
                        <a href="<?php echo $link; ?>" title="<?php echo $name; ?>" class="img" >
                            <img src="<?php echo $itemsNew->image; ?>" alt="<?php echo $name; ?>" width='215' height='215' />
                        </a>
                        <span>
                            <a href='javascript:;' onclick="AddToCart('<?php echo $itemsNew['id']; ?>');return false;">Đặt hàng</a>
                            <b>Giá: <?php echo number_format(str_replace(',', '', $itemsNew->price_promotion), 0, ".", "."); ?> VNĐ</b>
                            <sub><?php echo number_format(str_replace(',', '', $itemsNew->price), 0, ".", "."); ?> VNĐ</sub>
                        </span>
                        <i class='sale sale45'></i> <i class='new'></i> <i class='topseller'></i>
                    </ul>
                    <a  href="<?php echo $link; ?>" title="<?php echo $name; ?>">
                        <?php echo $name; ?>
                    </a>
                </li>-->




                <?php
            endforeach;
        }
    }

}
?>