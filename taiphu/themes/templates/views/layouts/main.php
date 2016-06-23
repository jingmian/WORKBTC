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
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?= CHtml::encode($this->getTitle()); ?></title>
        <link rel="canonical" href="<?php echo Yii::app()->getBaseUrl(true) . Yii::app()->getRequest()->getRequestUri(); ?>">
        <link rel="icon" type="image/png" href="<?= $this->website['banner']; ?>">
        <?php
        Yii::app()->getController()->registerDefaults();
        ?>
    </head>

    <body>
        <div id="fb-root"></div>
        <?php include_once('header.php'); ?>
        <?php include_once('slider.php'); ?>

        <div class="main">
            <?= $content; ?>
        </div>

        <div class="clr"></div>

        <?php include_once('footer.php'); ?>
        <span class="backTop"></span>
    </body>
</html>