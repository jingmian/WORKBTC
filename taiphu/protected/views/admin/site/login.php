<?php

/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<p>Nhập thông tin để đăng nhập</p>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array(
            'class' => 'form',
            'autocomplete' => 'off'
        )
    ));
    ?>

    <p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>	
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><i class='fa fa-user'></i> <span class="required">*</span></div>
            <?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
        </div>
        <?php // echo $form->error($model, 'username'); ?>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><i class='fa fa-lock'></i> <span class="required">*</span></div>
            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
        </div>
        <?php // echo $form->error($model, 'password'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton('Đăng nhập', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
