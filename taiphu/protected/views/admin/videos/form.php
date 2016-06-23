<?php
/* @var $this MVideosController */
/* @var $model MVideos */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mvideos-form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>
<div class="col-md-8">
	<p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>

	<?php if ($model->hasErrors()): ?>
		<div class="alert alert-danger">
			<?php echo $form->errorSummary($model); ?>
		</div>
	<?php endif ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'name_vi'); ?>
		<?php echo $form->textField($model,'name_vi',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'name_vi'); ?>
	</div>

	<?php
    if ($this->website['lang'] == 2):
        ?>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'name_en'); ?>
            <?php echo $form->textField($model, 'name_en', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name_en'); ?>
        </div>
        <?php
    endif;
    ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'videoId'); ?>
		<?php echo $form->textField($model,'videoId',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'videoId'); ?>
	</div>

	

	<div class="form-group">
		<?php echo $form->hiddenField($model,'image',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord?'Thêm mới cập':'Cập nhật',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="col-md-4">
	<?php
		$img = $model->image ? $model->image : 'http://img.youtube.com/vi/0.jpg';
	?>
	<img id='preshowImage' src="<?=$img; ?>" alt="@" class="img-responsive img-thumbnail">
</div>

<script type="text/javascript">
	jQuery(function(){
		$('#MVideos_videoId').bind('change keyup',function(){
			var id = $(this).val();
			var baseUrl = 'http://img.youtube.com/vi/' + id + '/0.jpg';
			$('#preshowImage').attr('src',baseUrl);
			$('#MVideos_image').attr('value',baseUrl);
		});
	});
</script>