<?php
/* @var $this MUsersController */
/* @var $model ChangePasswordForm */
/* @var $form CActiveForm */
?>

<div class="col-md-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'changepasswordform-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form','autocomplete'=>'off'),
)); ?>

	<p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>
	<?php if ($model->hasErrors()): ?>
		<div class="alert alert-danger">
			<?php echo $form->errorSummary($model); ?>
		</div>
	<?php endif ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'oldPassword'); ?>
		<?php echo $form->passwordField($model,'oldPassword',array('class'=>'form-control', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'oldPassword'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'newPassword'); ?>
		<?php echo $form->passwordField($model,'newPassword',array('class'=>'form-control', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'newPassword'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'repeatPassword'); ?>
		<?php echo $form->passwordField($model,'repeatPassword',array('class'=>'form-control', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'repeatPassword'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton('Đổi mật khẩu',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->