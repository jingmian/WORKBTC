<?php
/* @var $this MConfigsController */
/* @var $model MConfigs */
/* @var $form CActiveForm */
?>

<div class="col-md-12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mconfigs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form'),
)); ?>

	<p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>
    <?php if($model->hasErrors()): ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php endif; ?>
	
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
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
        		<?php echo $form->labelEx($model,'type'); ?>
        		<?php echo $form->dropDownList($model,'type',array('text'=>'Text','area'=>'Area','img'=>'Image','mimg'=>'Multi Image','file'=>'File','editor'=>'Editor','page'=>'Page'),array('class'=>'form-control')); ?>
        		<?php echo $form->error($model,'type'); ?>
        	</div>
        </div>
        <div class="col-md-4">
        	<div class="form-group">
        		<?php echo $form->labelEx($model,'hidden'); ?>
        		<?php echo $form->dropDownList($model,'hidden', array('0'=>'Kích hoạt','1'=>'Đình chỉ'),array('class'=>'form-control')); ?>
        		<?php echo $form->error($model,'hidden'); ?>
        	</div>
        </div>
        <div class="col-md-4">
        	<div class="form-group">
        		<?php echo $form->labelEx($model,'language'); ?>
        		<?php echo $form->dropDownList($model,'language',array('all'=>'All','vi'=>'Tiếng việt','en'=>'Tiếng Anh'),array('class'=>'form-control')); ?>
        		<?php echo $form->error($model,'language'); ?>
        	</div>
        </div>
    </div>
	
	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord?'Thêm mới':'Cập nhật',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->