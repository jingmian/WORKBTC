<div class="main">
    <div class="container">

      <div class="row metro-title margin-top-10 margin-bottom-10 center-block text-center">
            
            <div class="col-md-offset-1 col-md-3 col-xs-12 col-sm-6 margin-bottom-10 margin-top-10">
                <!-- BEGIN SLIDER -->
                <h4 class="metro-title text-left">
                    <img class="img-reponsive pull-left " style="margin-top: -6px;margin-right: 10px;width: 52px;height: 46px;" src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/gaubong.png" alt="<?= $this->config['sloganheader']; ?>">
                    <span style="color: #acacac;line-height: 14px;display: block">GẤU BÔNG </span>100% bông tinh khiết
                </h4>
                <!-- END SLIDER -->
            </div>
            <div class="col-md-3 col-xs-12 col-sm-6 margin-bottom-10 margin-top-10">
                <!-- BEGIN SLIDER -->
                <h4 class="metro-title text-left">
                    <img class="img-reponsive pull-left" style="margin-top: -6px;margin-right: 10px;" src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/dathang.png" alt="<?= $this->config['sloganheader']; ?>">
                    <span style="color: #acacac;line-height: 14px;display: block">ĐẶT HÀNG ONLINE </span>giao hàng tận nơi
                </h4>
                <!-- END SLIDER -->
            </div>
            <div class="col-md-2 col-xs-12 col-sm-6 margin-bottom-10 margin-top-10">
                <!-- BEGIN SLIDER -->
                <h4 class="metro-title text-left">
                    <img class="img-reponsive pull-left" style="margin-top: -6px;margin-right: 10px;" src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/baohanh.png" alt="<?= $this->config['sloganheader']; ?>">
                    <span style="color: #acacac;line-height: 14px;display: block">BẢO HÀNH </span>
                    trọn đời
                </h4>
                <!-- END SLIDER -->
            </div>
            <div class="col-md-2 col-xs-12 col-sm-6 margin-bottom-10 margin-top-10">
                <!-- BEGIN SLIDER -->
                <h4 class="metro-title text-left">
                    <img class="img-reponsive pull-left" style="margin-top: -6px;margin-right: 10px;" src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/giaohang.png" alt="<?= $this->config['sloganheader']; ?>">
                    <span style="color: #acacac;line-height: 14px;display: block">GIAO HÀNG </span>
                    toàn quốc
                </h4>
                <!-- END SLIDER -->
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-6 margin-bottom-10 margin-top-10">
                <!-- BEGIN SLIDER -->
                <div class="page-slider">
                    <div id="layerslider" style="width: 100%; height: 366px;">
                        <?php $this->widget('ext.slideshow.ESlideshow'); ?>
                    </div>
                </div>
                <!-- END SLIDER -->
            </div>
        </div>

        <div class="row service-box" style="padding-bottom: 30px;padding-top: 30px;">
            <div class="col-md-12 col-sm-12">
                <div id="sp-pathway" class="clearfix">
                    <div class="sp-inner clearfix">
                        <span class="breadcrumbs">
                            <a href="<?= Yii::app()->getBaseUrl(true); ?>">Trang Chủ</a>
                            <a href="<?= Yii::app()->getBaseUrl(true); ?>">Sản Phẩm</a>
                        </span>
                        <span class="breadcrumbs-outer"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row margin-bottom-20">
            <?php
            if ($models):
                $stt = 0;
                foreach ($models as $keyV => $valueV) :
                    $stt++;
                    $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.status = 1 and c.id = o.children_id and o.product_id = "' . $valueV['id'] . '" order by c.id asc')->queryAll();
                    $a = array();
                    foreach ($optionModels as $options) :
                        if (!in_array($options['name_vi'], $a)) {
                            $a[$options['id']] = $options['name_vi'];
                        }
                    endforeach;
                    $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
                    ?>

                    <div class="col-md-2 col-xs-6 col-sm-6 margin-bottom-10" style="">
                        <div class="products">
                            <a href="<?php echo Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $valueV['slug']); ?>" title="<?php echo $name; ?>">
                                <img src="<?= trim($valueV['image']); ?>" class="img-reponsive" alt="<?php echo $name; ?>" />
                                <h3 class="name-product text-center center-block"><?php echo $name; ?></h3>
                                <span class="description text-center center-block"><?php echo $name; ?></span>
                                <span class="price pull-left">
                                    <?php echo number_format($valueV['price'], 0, ".", "."); ?>₫
                                </span>
                                <span class="price-promotion pull-right">
                                    <?php echo number_format($valueV['price_promotion'], 0, ".", "."); ?>₫
                                </span>
                            </a>
                        </div>   
                    </div>   
                    <?php
                    if ($stt % 6 == 0):
                        ?>
                    </div><div class="row margin-bottom-20">
                        <?php
                    endif;
                endforeach;
            endif;
            ?>
        </div><!--End col-md-9 col-xs-12 col-sm-12-->

        <div class="clearfix margin-bottom-10"></div>

        <!-- BEGIN PAGINATOR -->
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <?php
                $this->widget('CLinkPager', array(
                    'currentPage' => $pages->getCurrentPage(),
                    'itemCount' => $pages->getItemCount(),
                    'pageSize' => $pages->getPageSize(),
                    'maxButtonCount' => 5,
                    'header' => '',
                    'htmlOptions' => array('class' => 'pagination pull-right'),
                ));
                ?>
            </div>
        </div>
        <!-- END PAGINATOR -->


    </div><!--End container-->
</div><!--End main-->




