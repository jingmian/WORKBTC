<div id="content" class="snap-content">
    <div class="content">

        <div class="header-clear"></div>
        
        <div class="slider-container full-bottom">
            <div class="homepage-slider" data-snap-ignore="true">                
                <?php $this->widget('ext.slideshow_mobile.ESlideshowMobile'); ?>
            </div>
        </div>

        <div class="adaptive-style">
            <h4>Sản Phẩm Nỗi Bật</h4>
            <a class="adaptive-three-activate" href="#"><i class="fa fa-th"></i></a>
            <a class="adaptive-two-activate"   href="#"><i class="fa fa-th-large"></i></a>
            <a class="adaptive-one-activate active-adaptive-style" href="#"><i class="fa fa-navicon"></i></a>
        </div>

        <div class="clear"></div>

        <div class="decoration"></div>

        <div class="portfolio-adaptive adaptive-one">

            <?php
            if ($gaushop):
                $stt = 0;
                foreach ($gaushop as $keyV => $valueV) :
                    $stt++;
                    $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.status = 1 and c.id = o.children_id and o.product_id = "' . $valueV['id'] . '" order by c.id asc')->queryAll();
                    $a = array();
                    foreach ($optionModels as $options) :
                        if (!in_array($options['name_vi'], $a)) {
                            $a[$options['id']] = $options['name_vi'];
                        }
                    endforeach;
                    $name = CHtml::encode($this->myTruncate($valueV['name_' . Yii::app()->language], 20, " "));
                    $des = CHtml::encode($valueV['des_' . Yii::app()->language]);
                    ?>

                    <div class="adaptive-item">
                        <a class="swipebox" href="<?php echo Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $valueV['slug']); ?>" title="<?php echo $name; ?>">
                            <img src="<?= trim($valueV['image']); ?>" class="responsive-image" alt="<?php echo $name; ?>" />
                        </a>
                        <h4 style="font-size: 13px;">
                            <a href="<?php echo Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $valueV['slug']); ?>" title="<?php echo $name; ?>">
                                <?php echo $name; ?>
                            </a>
                        </h4>
                        <p class="pull-left price-index">
                            <?php echo @number_format(str_replace(',', '', $valueV['price']), 0, ".", "."); ?>₫
                        </p>
                        <p class="pull-right price-promo">
                            <?php echo @number_format(str_replace(',', '', $valueV['price_promotion']), 0, ".", "."); ?>₫
                        </p>
                    </div>

                    <?php
                endforeach;
            endif;
            ?>

        </div>
        <div class="decoration"></div>
    </div>

    <!-- Page Footer-->
    <div class="footer">
        <div class="footer-socials half-bottom">
            <a href="#" class="footer-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="footer-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="footer-google"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="footer-share show-share-bottom"><i class="fa fa-share-alt"></i></a>
            <a href="#" class="footer-up"><i class="fa fa-angle-up"></i></a>
        </div>
        <p class="center-text">Copyright 2015. All rights reserved.</p>
    </div>    

</div>