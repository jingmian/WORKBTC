<?php
$item = new MenuItem();
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<div class="main">
    <div class="container">


        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 margin-bottom-10 margin-top-10">
                <!-- BEGIN SLIDER -->
                <div class="page-slider">
                    <div id="layerslider" style="width: 100%; height: 355px;">
                        <?php $this->widget('ext.slideshow.ESlideshow'); ?>
                    </div>
                </div>
                <!-- END SLIDER -->
                <img class="pull-right img-reponsive logoright" style="margin-right: 0px !important" src="<?= $this->config['logoright']; ?>"  alt="Ẩm Thực Vành Đai Xanh"/>
            </div>
        </div>


        <div class="row service-box margin-bottom-10">
            <div class="col-md-12 col-sm-12 padding-top-30">
                <ul class="breadcrumb">
                    <li><a href="#"><?php echo Yii::t('main', 'Home'); ?></a></li>
                    <li><a href="#"><?php echo Yii::t('main', 'News'); ?></a></li>
                </ul>
            </div>
        </div>



        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-5">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <?php
                    $mainMenu = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = 0 and `group` = "cat" and `type` = "MModels" order by `sort` asc, `id` desc')->queryAll();
                    if ($mainMenu):
                        foreach ($mainMenu as $keyM => $valM):
                            $subMenu = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valM['id'] . '" and `group` = "cat" order by `sort` asc, `id` desc')->queryAll();
                            $menuItem = $item->getItem($valM['targetId'], $valM['type']);
                            $slug = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `id` = "' . $valM['targetId'] . '" order by `id` desc')->queryRow();
                            $link = $item->getLink($menuItem);
                            $name = 'name_' . Yii::app()->language;
                            if ($subMenu) {
                                ?>
                                <li class="list-group-item clearfix dropdown active">
                                    <a href="<?= $link; ?>" title="<?= CHtml::encode($menuItem->$name); ?>" class="collapsed">
                                        <i class="fa fa-angle-right"></i>
                                        <?= CHtml::encode($menuItem->$name); ?>
                                    </a>
                                    <ul>
                                        <?php
                                        foreach ($subMenu as $keyM => $valM):
                                            $subItem = $item->getItem($valM['targetId'], $valM['type']);
                                            $subSlug = Yii::app()->db->createCommand('select * from `' . MPages::model()->tableName() . '` where `id` = "' . $valM['targetId'] . '" order by `id` desc')->queryRow();
                                            $subLink = $item->getLink($subItem);
                                            $subName = 'name_' . Yii::app()->language;
                                            ?>
                                            <li class="list-group-item padding-left-0">
                                                <a style="text-transform: none !important;" href="<?= $subLink; ?>" title="<?= CHtml::encode($subItem->$subName); ?>">
                                                    <i class="fa fa-angle-right"></i>
                                                    <?= CHtml::encode($subItem->$subName); ?>
                                                </a>
                                            </li>
                                            <?php
                                        endforeach;
                                        ?>
                                    </ul>
                                </li>

                            <?php } else {
                                ?>
                                <li class="list-group-item clearfix">
                                    <a href="<?= $link; ?>" title="<?= CHtml::encode($menuItem->$name); ?>">
                                        <i class="fa fa-angle-right"></i> 
                                        <?= CHtml::encode($menuItem->$name); ?>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>

                            <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>



            <div class="col-md-9 col-sm-7 col-xs-12">
                <div class="content-page">
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
                                            <h4 style="font-size: 14px;">
                                                <a style="color: #333;text-transform: none !important;" title="<?php echo $post['name_vi']; ?>" href="<?php echo $link; ?>">
                                                    <?php echo $post['name_vi']; ?>
                                                </a>
                                            </h4>
                                            <ul class="blog-info">
                                                <li><i class="fa fa-calendar"></i> <?php echo $post['created_date']; ?></li>
                                            </ul>
                                            <p><?php echo $post['des_vi']; ?></p>
                                            <a href="<?php echo $link; ?>" class="more">
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