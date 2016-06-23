<?php
/* @var $this MSourcesController */
/* @var $model MSources */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'msources-form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form'),
)); ?>
<div class="form">
	<p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>

	<?php if ($model->hasErrors()): ?>
		<div class="alert alert-danger">
			<?php echo $form->errorSummary($model); ?>
		</div>
	<?php endif ?>
	<h4>Tiếng việt</h4>
	<div class="form-group">
		<?php echo $form->labelEx($model,'name_vi'); ?>
		<?php echo $form->textField($model,'name_vi',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'name_vi'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'des_vi'); ?>
		<?php echo $form->textArea($model,'des_vi',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'des_vi'); ?>
	</div>
	
	<h4>Tiếng anh</h4>
	<div class="form-group">
		<?php echo $form->labelEx($model,'name_en'); ?>
		<?php echo $form->textField($model,'name_en',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'name_en'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'des_en'); ?>
		<?php echo $form->textArea($model,'des_en',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'des_en'); ?>
	</div>
	
	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord?'Thêm mới':'Cập nhật',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->