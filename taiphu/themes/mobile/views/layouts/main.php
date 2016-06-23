<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<?php
$item = new MenuItem();
?>
<html lang="<?= Yii::app()->language; ?>">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?= CHtml::encode($this->getTitle()); ?></title>
        <?php
        Yii::app()->clientScript->registerMetaTag($this->getMetaTitle(), 'title');
        Yii::app()->clientScript->registerMetaTag($this->getMetaKeywords(), 'keywords');
        Yii::app()->clientScript->registerMetaTag($this->getMetaDescription(), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getMetaTitle(), null, null, array('property' => "og:title"));
        Yii::app()->clientScript->registerMetaTag($this->getMetaTitle(), null, null, array('property' => "og:site_name"));
        Yii::app()->clientScript->registerMetaTag($this->getMetaDescription(), null, null, array('property' => "og:description"));
        Yii::app()->clientScript->registerMetaTag($this->getMetaTitle(), null, null, array('property' => "og:type"));
        Yii::app()->clientScript->registerMetaTag(Yii::app()->getBaseUrl(true) . $this->getMetaImages(), null, null, array('property' => "og:image"));
        Yii::app()->clientScript->registerMetaTag(Yii::app()->getBaseUrl(true) . Yii::app()->getRequest()->getRequestUri(), null, null, array('property' => "og:url"));
        ?>
        <link rel="canonical" href="<?php echo Yii::app()->getBaseUrl(true) . Yii::app()->getRequest()->getRequestUri(); ?>">
        <link rel="apple-touch-icon" sizes="57x57" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/favicon-16x16.png">
        <link rel="manifest" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/manifest.json">
        <meta name="msapplication-TileImage" content="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/ms-icon-144x144.png">
        <link href="<?= Yii::app()->theme->baseUrl; ?>/assets/styles/style.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::app()->theme->baseUrl; ?>/assets/styles/framework.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::app()->theme->baseUrl; ?>/assets/styles/owl.theme.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::app()->theme->baseUrl; ?>/assets/styles/swipebox.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::app()->theme->baseUrl; ?>/assets/styles/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::app()->theme->baseUrl; ?>/assets/styles/animate.css"	 rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/scripts/jquery.js"></script>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/scripts/jqueryui.js"></script>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/scripts/framework.plugins.js"></script>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/scripts/custom.js"></script>        
    </head>

    <body>
        <div id="preloader">
            <div id="status">
                <p class="center-text">
                    Loading the content...
                    <em>Loading depends on your connection speed!</em>
                </p>
            </div>
        </div>
        <?php include_once('header.php'); ?>
        <div class="all-elements">
            <?php include_once('sidebar.php'); ?>
            <?= $content; ?>
            <?php include_once('footer.php'); ?>
        </div>
    </body>
</html>