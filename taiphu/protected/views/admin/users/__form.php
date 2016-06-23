<?php
/* @var $this MUsersController */
/* @var $model MUsers */
/* @var $form CActiveForm */
?>

<div class="col-md-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'musers-form',
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
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('class'=>'form-control', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('class'=>'form-control', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'repeatPassword'); ?>
		<?php echo $form->passwordField($model,'repeatPassword',array('class'=>'form-control', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'repeatPassword'); ?>
	</div>
    
	
    <div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ?'Thêm mới':'Cập nhật',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->