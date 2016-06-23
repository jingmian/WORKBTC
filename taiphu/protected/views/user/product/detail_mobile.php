<div id="content" class="snap-content">
    <div class="header-clear-large"></div>            
    <div class="content">

        <div class="slider-container full-bottom">
            <div class="homepage-slider" data-snap-ignore="true">                
                <?php $this->widget('ext.slideshow_mobile.ESlideshowMobile'); ?>
            </div>
        </div>

        <div class="decoration"></div>

        <div class="page-news-article">
            <div class="one-half-responsive last-column">
                <div class="container">
                    <h3><?php echo $models['name_' . Yii::app()->language]; ?></h3>
                    <img src="<?php echo $models['image']; ?>" alt="<?php echo $models['name_' . Yii::app()->language]; ?>" style="margin-bottom: 20px;"/>
                    <?php
                    $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.active = 1 and c.id = o.children_id and o.product_id = "' . $models['id'] . '" order by c.id asc')->queryAll();
                    $a = array();
                    foreach ($optionModels as $options) :
                        if (!in_array($options['name_vi'], $a)) {
                            $a[$options['id']] = $options['name_vi'];
                        }
                    endforeach;
                    ?>
                    <div class="row" style="color: #333">
                        <b><div class="col-md-12 col-sm-12 col-xs-12"><strong style="font-size:18px"> Giá Gốc : <?php echo @number_format($models['price'], 0, ".", "."); ?>₫</strong></div> 
                        </b>
                    </div>
                    <div class="clearfix" style="border-top: 1px dotted #f2f2f2;margin-bottom: 5px;margin-top: 5px;"></div>
                    <div class="row" style="color: #333">
                        <b><div class="col-md-12 col-sm-12 col-xs-12"><strong style="font-size:18px"> Giá Khuyến Mãi : <?php echo @number_format($models['price_promotion'], 0, ".", "."); ?>₫ </strong></div> 
                        </b>
                    </div>
                    <div class="clearfix" style="border-top: 1px dotted #f2f2f2;margin-bottom: 5px;margin-top: 5px;"></div>
                    <?php
                    foreach ($a as $key => $items) :
                        $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.active = 1 and c.id = o.children_id and o.children_id = "' . $key . '"  and o.product_id = "' . $models['id'] . '" order by c.id asc')->queryRow();
                        ?>
                        <div class="row" style="color: #333">
                            <b>
                                <div class="col-md-12 col-sm-12 col-xs-12"><strong> <?php echo $items; ?>  : <?php echo $optionModels['val']; ?> </strong></div>
                            </b>
                        </div>
                        <div class="clearfix" style="border-top: 1px dotted #f2f2f2;margin-bottom: 5px;margin-top: 5px;"></div>
                        <?php
                    endforeach;
                    ?>

                    <p style="text-align: justify;font-size:18px;"><?php echo $models['des_' . Yii::app()->language]; ?></p>
                    <div class="tabs">
                        <a href="#" class="tab-but tab-but-1 tab-active">Mô Tả</a>
                        <a href="#" class="tab-but tab-but-2">Bình Luận</a>
                    </div>
                    <div class="tab-content tab-content-1">
                        <p><?php echo $models['des_' . Yii::app()->language]; ?></p>
                        <p><?php echo $models['content_' . Yii::app()->language]; ?></p>
                    </div><!--tab-content tab-content-1-->
                    <div class="tab-content tab-content-2">
                        <div class="fb-comments" data-href="<?= Yii::app()->getBaseUrl(true); ?>" data-width="500" data-numposts="5"></div>
                        <script src="https://apis.google.com/js/plusone.js"></script>
                        <div id="comments"></div>
                        <script> gapi.comments.render('comments', {href: window.location, width: '624', first_party_property: 'BLOGGER', view_type: 'FILTERED_POSTMOD'});</script>
                    </div><!--tab-content tab-content-2-->

                </div>      
            </div>

            <div class="container heading-style-5">

                <div class="adaptive-style">
                    <h4 class="heading-title">Sản Phẩm Cùng Loại</h4>
                    <a class="adaptive-three-activate" href="#"><i class="fa fa-th"></i></a>
                    <a class="adaptive-two-activate"   href="#"><i class="fa fa-th-large"></i></a>
                    <a class="adaptive-one-activate active-adaptive-style" href="#"><i class="fa fa-navicon"></i></a>
                </div>

                <div class="line bg-black"></div>

                <div class="portfolio-adaptive adaptive-one">
                    <?php
                    if ($productSame):
                        foreach ($productSame as $itemsProductSame):
                            $name = CHtml::encode($this->myTruncate($itemsProductSame['name_' . Yii::app()->language], 20, " "));
                            $des = CHtml::encode($itemsProductSame['des_' . Yii::app()->language]);
                            $link = Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $itemsProductSame['slug']);
                            ?>
                            <div class="adaptive-item">
                                <a class="swipebox" href="<?php echo $link; ?>" title="<?php echo $name; ?>">
                                    <img src="<?php echo $itemsProductSame['image']; ?>" class="responsive-image" alt="<?php echo $name; ?>" />
                                </a>
                                <h4 style="font-size: 13px;">
                                    <a href="<?php echo $link; ?>" title="<?php echo $name; ?>">
                                        <?php echo $name; ?>
                                    </a>
                                </h4>
                                <p class="pull-left">
                                    <?php echo @number_format(str_replace(',', '', $itemsProductSame['price']), 0, ".", "."); ?>₫
                                </p>
                                <p class="pull-right">
                                    <?php echo @number_format(str_replace(',', '', $itemsProductSame['price_promotion']), 0, ".", "."); ?>₫
                                </p>
                            </div>

                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>

            </div><!--End container heading-style-5-->

        </div><!--End page-news-article-->
    </div>
</div>