<?php
$item = new MenuItem();
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<!-- BEGIN SLIDER -->
<div class="page-slider" style="margin-bottom: 60px;">
    <div id="layerslider" style="width: 100%; height: 677px;">
        <?php $this->widget('ext.slideshow.ESlideshow'); ?>
    </div>
</div>
<!-- END SLIDER -->

<div class="main">
    <div class="container">

        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-5">

                <a href="" title="" class="btn btn-primary text-center center-block" style="color: #fff;text-transform: uppercase !important;background: #007be3;padding-bottom: 10px">
                    <?= $this->config['danhmucsanpham_'.Yii::app()->language]; ?>
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


                <div class="sidebar-filter margin-bottom-25" style="position: relative;margin-top: 60px;">
                    <a href="" title="" class="btn btn-primary text-center center-block btn-tab-product" style="width: 100%;position: absolute;top: -34px;left: 0px;color: #fff;text-transform: uppercase !important;background: #007be3;margin-bottom: 10px">
                        <?= $this->config['tintuc_'.Yii::app()->language]; ?>
                    </a>

                    <?php
                    $newsRelated = Yii::app()->db->createCommand('select * from `' . MNews::model()->tableName() . '` where `status` = 1 order by `id` desc limit 0,2')->queryAll();
                    $stt = 0;
                    foreach ($newsRelated as $related) :
                        $stt++;
                        $name = $related['name_' . Yii::app()->language];
                        $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $related['slug']);
                        ?>
                        <div class="row margin-bottom-10 margin-bottom-30">
                            <div class="col-md-5 col-sm-3 col-xs-12">
                                <img src="<?= trim($related['image']); ?>" class="img-reponsive" style="width: 100%;border: 1px solid #333" />
                            </div>
                            <div class="col-md-7 col-sm-9 col-xs-12">
                                <h2 style="color: #ff0000;font-size: 13px;margin-top: 10px;">
                                    <a style="text-transform: nomal !important;color: #ff0000;" href="<?php echo $link; ?>" title="<?php echo $name; ?>">
                                        <?php echo $name; ?>
                                    </a>
                                </h2>
                                <?php echo $this->myTruncate($related['des_vi'], 50, " "); ?>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>

                </div>

                <div class="sidebar-products clearfix" style="position: relative;margin-top: 60px;">
                    <a href="" title="" class="btn btn-primary text-center center-block btn-tab-product" style="width: 100%;position: absolute;top: -34px;left: 0px;color: #fff;text-transform: uppercase !important;background: #007be3;margin-bottom: 10px">
                        <?= $this->config['thongketruycap_'.Yii::app()->language]; ?>
                    </a>
                    <div class="item">
                        <ul class="list-unstyled">
                            <?php include 'box_tructuyen.php'; ?>
                    </div>
                </div>
            </div>
            <!-- END SIDEBAR -->


            <div class="col-md-9 col-sm-7 col-xs-12">
                <div class="content-page">
                    <div class="row service-box margin-bottom-10">
                        <div class="col-md-12 col-sm-12">
                            <div id="sp-pathway" class="clearfix">
                                <div class="sp-inner clearfix">
                                    <span class="breadcrumbs">
                                        <a href="<?= Yii::app()->getBaseUrl(true); ?>">Trang chủ</a>
                                        <span class="current"><?php echo $model['name_' . Yii::app()->language]; ?> ...</span>
                                    </span>
                                    <span class="breadcrumbs-outer"></span>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-sm-12 blog-posts">
                            <?php
                            if ($models):
                                foreach ($models as $post) :
                                    $link = Yii::app()->createUrl('post/post', array('slug' => $post['slug']));
                                    ?>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <img class="img-responsive" alt="<?php echo $post['name_vi']; ?>" src="<?php echo $post['image']; ?>" style="width: 220px;height: 155px;">
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <h3>
                                                <a style="color: #333;text-transform: none !important;" title="<?php echo $post['name_vi']; ?>" href="<?php echo $link; ?>">
                                                    <?php echo $post['name_vi']; ?>
                                                </a>
                                            </h3>
                                            <ul class="blog-info">
                                                <li><i class="fa fa-calendar"></i> <?php echo $post['created_date']; ?></li>
                                            </ul>
                                            <p><?php echo $post['des_vi']; ?></p>
                                            <a href="<?php echo $link; ?>" class="btn btn-primary" style="color: #fff;text-transform: none;">
                                                <?= $this->config['readmore_' . Yii::app()->language]; ?>
                                                <i class="icon-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <hr class="blog-post-sep">

                                    <?php
                                endforeach;
                            endif;
                            ?>

                            <ul class="pagination">
                                <div id="custom-pagination">
                                    <?php
                                    $this->widget('CLinkPager', array(
                                        'currentPage' => $pages->getCurrentPage(),
                                        'itemCount' => $pages->getItemCount(),
                                        'pageSize' => $pages->getPageSize(),
                                        'maxButtonCount' => 5,
                                        'header' => '<span>Trang: </span>',
                                        'htmlOptions' => array('class' => 'pages'),
                                    ));
                                    ?>
                                </div>
                            </ul>       

                        </div>
                    </div>
                </div>
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