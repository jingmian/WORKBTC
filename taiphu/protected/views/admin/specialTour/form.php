<?php
/* @var $this MSpecialTourController */
/* @var $model MSpecialTour */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mspecial-tour-form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form'),
)); ?>
<div class="col-md-6">
	<p class="note">Nội dung có dấu  <span class="required">*</span> là phài nhập.</p>
	<?php if ($model->hasErrors()): ?>
		<div class="alert alert-danger">
			<?php echo $form->errorSummary($model); ?>
		</div>
	<?php endif ?>
	<div class="form-group">
		<label>Nhập tour cần tìm</label>
		<input id="search" type="text" class="form-control"/>
		<br/>
		<button type="button" data-link="<?=$this->createUrl('search'); ?>" id="searchTour" class="btn btn-primary">Tìm kiếm</button>
	</div>

	<div class="form-group">
		<label>Chọn tour</label>
		
		<?php
			if(!$model->isNewRecord)
			{
				echo CHtml::dropDownList('specialTour',$model->targetId,CHtml::listData($models,'id','name_vi'));
			}else{
				?>
				<select id="specialTour" class="form-control">
					<option value="#">Tìm kiếm tour</option>
				</select>
				<?php
			}
		?>
	</div>
	
	<div class="form-group">
		<?php echo $form->hiddenField($model,'targetId',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model,'order',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'order'); ?>
	</div>


	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord? 'Thêm mới':'Cập nhật',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>

	jQuery(function(){
		$('#searchTour').bind('click',function(){
			$.ajax({
				url:$(this).attr('data-link'),
				data:'search='+ $('#search').val(),
				success:function(data){
					$('#specialTour').html(data);
				}
			})
		});
	});

	jQuery(document).ready(function($){
		$('#specialTour').bind('change',function(){
			$('#MSpecialTour_targetId').val($(this).val());
		});
	});
</script>
