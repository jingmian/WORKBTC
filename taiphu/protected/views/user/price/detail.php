<?php
$item = new MenuItem();
Yii::app()->clientScript->registerCoreScript('jquery');
?>


<div class="main">
    <div class="container" >

        <div class="row service-box margin-bottom-10">
            <div class="col-md-12 col-sm-12 padding-top-30">
                <div id="sp-pathway" class="clearfix">
                    <div class="sp-inner clearfix">
                        <span class="breadcrumbs">
                            <a href="<?= Yii::app()->getBaseUrl(true); ?>">Trang chủ</a>
                            <a href=""><?php echo $modelCats['name_vi']; ?></a>
                            <span class="current"><?= CHtml::encode($model['name_vi']); ?> ...</span>
                        </span>
                        <span class="breadcrumbs-outer"></span>
                    </div>
                </div>

            </div>
        </div>

        <div class="row margin-bottom-40">

            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-5">
                <a href="" title="" class="btn btn-primary text-center center-block" style="color: #fff;text-transform: uppercase !important;background: #007be3;padding-bottom: 10px">
                    DANH MỤC SẢN PHẨM
                </a>
                <div class="clearfix margin-bottom-10"></div>
                <div class="body">
                    <aside>
                        <!-- mega menu -->
                        <ul style="" class="sky-mega-menu-left sky-mega-menu-left-pos-left sky-mega-menu-left-response-to-icons sky-mega-menu-left-anim-scale">
                            <?php
                            $mainMenu = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = 0 and `group` = "cat" order by `sort` asc, `id` desc')->queryAll();
                            if ($mainMenu):
                                foreach ($mainMenu as $keyM => $valM):
                                    $menuItem = $item->getItem($valM['targetId'], $valM['type']);
                                    $menuLink = $item->getLink($menuItem);
                                    $menuName = 'name_' . Yii::app()->language;
                                    $subMenuProduct = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valM['id'] . '" and `group` = "cat" order by `sort` asc, `id` desc')->queryAll();
                                    if ($subMenuProduct):
                                        ?>
                                        <li aria-haspopup="true">
                                            <a href="<?= $menuLink; ?>" title="<?= CHtml::encode($menuItem->$menuName); ?> ">
                                                <i class="fa fa-angle-right"></i> <?= CHtml::encode($menuItem->$menuName); ?> 
                                            </a>
                                            <div class="grid-container3">
                                                <ul>
                                                    <?php
                                                    foreach ($subMenuProduct as $keyM => $valS):
                                                        $subItem = $item->getItem($valS['targetId'], $valS['type']);
                                                        $subLink = $item->getLink($subItem);
                                                        $subName = 'name_' . Yii::app()->language;
                                                        $subMenuProductChild = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valS['id'] . '" and `group` = "cat" order by `sort` asc, `id` desc')->queryAll();
                                                        ?>
                                                        <li aria-haspopup="true">
                                                            <a href="<?= $subLink; ?>" title="<?= CHtml::encode($subItem->$subName); ?>">
                                                                <?= CHtml::encode($subItem->$subName); ?> <i class="fa fa-angle-right"></i>
                                                            </a>
                                                            <?php
                                                            if ($subMenuProductChild):
                                                                ?>
                                                                <div class="grid-container3">
                                                                    <ul>
                                                                        <?php
                                                                        foreach ($subMenuProductChild as $keyM => $valCS):
                                                                            $subItemChild = $item->getItem($valCS['targetId'], $valCS['type']);
                                                                            $subLinkChild = $item->getLink($subItemChild);
                                                                            $subNameChild = 'name_' . Yii::app()->language;
                                                                            ?>
                                                                            <li>
                                                                                <a href="<?= $subLinkChild; ?>" title="<?= CHtml::encode($subItemChild->$subNameChild); ?>">
                                                                                    <?= CHtml::encode($subItemChild->$subNameChild); ?> <i class="fa fa-angle-right"></i>
                                                                                </a>
                                                                            </li>
                                                                            <?php
                                                                        endforeach;
                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                                <?php
                                                            endif;
                                                            ?>
                                                        </li>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </ul>
                                            </div>
                                        </li>

                                        <?php
                                    else :
                                        ?>
                                        <li>
                                            <a href="<?= $menuLink; ?>" title="<?= CHtml::encode($menuItem->$menuName); ?> ">
                                                <?= CHtml::encode($menuItem->$menuName); ?> 
                                            </a>
                                        </li>
                                    <?php
                                    endif;
                                endforeach;
                            endif;
                            ?>
                        </ul>
                        <!--/ mega menu -->
                    </aside>
                </div>
            </div>
            <!-- END SIDEBAR -->

            <div class="col-md-9 col-sm-12">
                <div class="row product-list">
                    <div class="product-page">
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_sharing_toolbox"></div>
                        <h1 style="color: #9e4322;text-transform: uppercase;padding: 10px 0px;font-size: 20px"> <?= CHtml::encode($model['name_' . Yii::app()->language]); ?></h1>
                        <ul class="blog-info">
                            <li><i class="fa fa-calendar"></i> <?php echo $model['created_date']; ?></li>
                        </ul>

                        <div class="row margin-bottom-20">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <strong>Mô Tả :</strong> <?= $model['des_' . Yii::app()->language]; ?>
                            </div>
                        </div>

                        <iframe src="http://docs.google.com/gview?url=<?php echo Yii::app()->getBaseUrl(true).$model['image']; ?>&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>

                    </div>
                </div>


            </div>
        </div>


        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row title-product margin-bottom-10">
            <span class="sp-title-product">
                <span class="before-sp-tit"></span> VIDEO CÁC DÒNG XE <span class="after-sp-tit"></span>
            </span>
        </div>

        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <div class="owl-carousel owl-carousel4">
                    <?php $this->widget('ext.videos.EVideos'); ?>   
                </div>
            </div>
            <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <div class="row margin-bottom-20">
            <div class="row">
                <div class="col-md-6 title-product" style="margin-bottom: 15px;">
                    <span class="sp-title-product">
                        <span class="before-sp-tit"></span> ĐÁNH GIÁ XE CHUYÊN DÙNG <span class="after-sp-tit"></span>
                    </span>
                </div>
                <div class="col-md-6 title-product" style="margin-bottom: 15px;padding-left: 0px !important">
                    <span class="sp-title-product">
                        <span class="before-sp-tit"></span> TIN TỨC THỊ TRƯỜNG <span class="after-sp-tit"></span>
                    </span>
                </div>
            </div>

            <div class="col-md-6 col-xs-12 col-sm-6">
                <?php
                $newsCate = Yii::app()->db->createCommand('select * from `' . MNewsCats::model()->tableName() . '` where `status` = 1 and `id` = 11')->queryRow();
                $nameCate = $newsCate['name_' . Yii::app()->language];
                $linkCate = Yii::app()->createUrl('/news/' . $newsCate['slug']);
                $newsRelated = Yii::app()->db->createCommand('select * from `' . MNews::model()->tableName() . '` where `status` = 1 and `parent` = 11 and `feature` =1 order by `id` desc limit 0,2')->queryAll();
                $stt = 0;
                foreach ($newsRelated as $related) :
                    $stt++;
                    $name = $related['name_' . Yii::app()->language];
                    $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $related['slug']);
                    ?>
                    <div class="row margin-bottom-10 margin-bottom-20">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <img src="<?= trim($related['image']); ?>" class="img-reponsive pull-left" style="width: 30%;margin-right: 10px;" />
                            <h2 style="color: #F5080D;font-size: 15px;margin-top: 10px;">
                                <a style="text-transform: nomal !important;color: #F5080D;font-size: 18px" href="<?php echo $link; ?>" title="<?php echo $name; ?>">
                                    <?php echo $name; ?>
                                </a>
                            </h2>
                            <p style="text-align: justify;color: #000;font-size: 15px">
                                <?php echo $this->myTruncate($related['des_vi'], 200, " "); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>

                <a href="<?php echo $linkCate; ?>" title="<?= $nameCate; ?>" class="pull-right" style="color: #ff0000;font-weight: bold;font-size:13px;"> >> Xem thêm</a>
            </div>

            <div class="col-md-6 col-xs-12 col-sm-6">

                <?php
                $newsCate = Yii::app()->db->createCommand('select * from `' . MNewsCats::model()->tableName() . '` where `status` = 1 and `id` = 9')->queryRow();
                $nameCate = $newsCate['name_' . Yii::app()->language];
                $linkCate = Yii::app()->createUrl('/news/' . $newsCate['slug']);
                $newsRelated = Yii::app()->db->createCommand('select * from `' . MNews::model()->tableName() . '` where `status` = 1 and `parent` = 9 and `feature` =1 order by `id` desc limit 0,2')->queryAll();
                $stt = 0;
                foreach ($newsRelated as $related) :
                    $stt++;
                    $name = $related['name_' . Yii::app()->language];
                    $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $related['slug']);
                    ?>
                    <div class="row margin-bottom-10 margin-bottom-20">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <img src="<?= trim($related['image']); ?>" class="img-reponsive pull-left" style="width: 30%;margin-right: 10px;" />
                            <h2 style="color: #F5080D;font-size: 15px;margin-top: 10px;">
                                <a style="text-transform: nomal !important;color: #F5080D;font-size: 18px" href="<?php echo $link; ?>" title="<?php echo $name; ?>">
                                    <?php echo $name; ?>
                                </a>
                            </h2>
                            <p style="text-align: justify;color: #000;font-size: 15px">
                                <?php echo $this->myTruncate($related['des_vi'], 200, " "); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>

                <a href="<?php echo $linkCate; ?>" title="<?= $nameCate; ?>" class="pull-right" style="color: #ff0000;font-weight: bold;font-size:13px"> >> Xem thêm</a>
            </div>


        </div>


    </div>
</div>

<script>
    $(document).ready(function() {
        window.onload = function() {
            // short timeout
            setTimeout(function() {
                $('html, body').animate({scrollTop: "680px"}, "slow");
            }, 7);
        };
    });
</script>