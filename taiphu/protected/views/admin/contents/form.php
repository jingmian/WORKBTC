<?php
/* @var $this MContentsController */
/* @var $model MContents */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mcontents-form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form')
)); ?>
<div class="col-md-8">
	<p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>

	<?php if ($model->hasErrors()): ?>
		<div class="alert alert-danger">
			<?php echo $form->errorSummary($model); ?>
		</div>
	<?php endif ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'key'); ?>
		<?php echo $form->textField($model,'key',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'key'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->