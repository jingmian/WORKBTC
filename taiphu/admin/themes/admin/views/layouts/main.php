<!DOCTYPE html>
<html lang="<?= $this->language; ?>">
    <head>
        <meta charset="UTF-8"/>
        <title><?= CHtml::encode($this->metaTitle); ?></title>
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/style.css"/>
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/js/fancybox/jquery.fancybox.css"/>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <div class="page-wrapper">
            <header class="navbar-default navbar navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="navbar-brand kd-brand">
                            <img src="<?= Yii::app()->theme->baseUrl; ?>/img/logo_btc.png" alt="BTCCOP" title="OpenCart" style="width: 120px;height: 37px;margin-top: -8px;">
                        </a>
                    </div>
                    <div id="main-nav" class="navbar-collapse collapse" role="navigation">
                        <ul class="navbar-nav nav navbar-right">
                            <li><a href="<?= $this->createUrl('site/logout'); ?>"><i class="fa fa-power-off"></i> <?= Yii::app()->user->name ?></a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <aside id="sidebar" class="col-md-2 hidden-sm hidden-xs">
                            <?php include_once('sidebar.php'); ?>
                        </aside>
                        <section class="col-md-offset-2 col-md-10">
                            <?php if (isset($this->breadcrumbs)): ?>
                                <?php
                                $this->widget('zii.widgets.CBreadcrumbs', array(
                                    'links' => $this->breadcrumbs,
                                    'htmlOptions' => array('class' => 'breadcrumb'),
                                ));
                                ?><!-- breadcrumbs -->
                            <?php endif ?>
                            <h1 class="page-header" id="page-title"><span><?php echo CHtml::encode($this->pageHeader); ?></span></h1>
                            <?= $content; ?>
                            <!-- end row -->
                        </section>
                        <!-- end 1 -->
                    </div>

                    <div style="position: fixed;bottom: 0px;height: 30px;line-height: 30px;background: #454E59;width: 83%;right: 0px;">
                        <h4 style="font-size: 12px;color: #fff;text-align: center">Note : sau khi update thông tin click vào <a href="<?php echo Yii::app()->createUrl('site/clearcache'); ?>">đây</a> để xóa cache</h4>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="/kcfinder/handle.js"></script>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/fancybox/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/jquery.lazyload.min.js"></script>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/bootbox/bootbox.min.js"></script>
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/js/bootstrap-multiselect.css" />
        <script src="<?= Yii::app()->theme->baseUrl; ?>/js/bootstrap-multiselect.js"></script>
    </body>
</html>