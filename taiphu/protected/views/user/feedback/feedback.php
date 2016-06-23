<?php
$item = new MenuItem();
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<!-- BEGIN PAGE LEVEL STYLES -->
<div class="main">
    <div class="container" style="background: #fff;">

        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-6 margin-bottom-10 margin-top-10">
                <!-- BEGIN SLIDER -->
                <div class="page-slider" style="float: left;width: 81%">
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
                    <li><a href="<?= Yii::app()->getBaseUrl(true); ?>"><?php echo Yii::t('main', 'Home'); ?></a></li>
                    <li><a href="#"> <?= $this->config['giaohangtannoi']; ?></a></li>
                </ul>
            </div>
        </div>

        <div class="row margin-top-20 margin-bottom-10">
            <div class="col-md-12 col-xs-12 col-sm-12 text-center center-block">
                <?php if (Yii::app()->user->hasFlash('feedback')): ?>
                    <div class="alert-success" style="height: 40px;line-height: 40px;padding-left: 10px;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                        <i class="fa fa-check-circle"></i>
                        <?php echo Yii::app()->user->getFlash('feedback'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        

        <div class="row margin-bottom-40">
            
             <div class="sidebar col-md-4 col-sm-4 col-xs-12">
                <!--<address>-->
                    <!--<h2 class="slogan text-center center-block"><?= $this->config['sloganheader']; ?></h2>-->
                    <div class="center-block" ><?= $this->config['addressTop']; ?></div>
                <!--</address>-->

                <address>
                    <strong>Email</strong><br>
                    <a href="mailto:<?= $this->config['email_top']; ?>"><?= $this->config['email_top']; ?></a><br>
                </address>

                <ul class="social-icons margin-bottom-10">
                    <li><a href="<?= $this->config['facebook']; ?>" data-original-title="facebook" class="facebook"></a></li>
                    <li><a href="<?= $this->config['skype']; ?>" data-original-title="skype" class="skype"></a></li>
                    <li><a href="<?= $this->config['google']; ?>" data-original-title="Goole Plus" class="googleplus"></a></li>
                </ul>

            </div>

            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="content-page" style="padding: 0px !important">
                    <h4 style="border-bottom: 1px solid #ccc;color: #920b0b;font-size: 16px;" class="title-comment">
                        <?= $this->config['giaohangtannoi']; ?>
                    </h4>
                    <div style="margin-bottom: 20px;"></div>
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'contact-form',
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    ));
                    ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'country'); ?>
                        <?php echo $form->textField($model, 'country', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'country'); ?>
                    </div>
                    
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'name'); ?>
                        <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'email'); ?>
                        <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>


                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'subject'); ?>
                        <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'subject'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'body'); ?>
                        <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'body'); ?>
                    </div>

                    <div class="form-group">
                        <?php if (CCaptcha::checkRequirements()): ?>
                            <?php echo $form->labelEx($model, 'verifyCode'); ?>
                            <div>
                                <?php $this->widget('CCaptcha'); ?>
                                <?php echo $form->textField($model, 'verifyCode', array('class' => 'form-control')); ?>
                            </div>
                            <?php echo $form->error($model, 'verifyCode'); ?>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background: #C92023;border: 1px solid #C92023"><i class="icon-ok"></i> Send &nbsp;&nbsp;</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .form-controls {
        font-size: 12px;
        font-weight: normal;
        color: #333333;
        /*border: 1px solid #000 !important;*/
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        margin: 0px !important;
    }

</style>


