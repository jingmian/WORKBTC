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
	<h3 class="sub-header"><span>Tùy chỉnh nội dung : '<?=CHtml::encode($model['name']); ?>'</span></h3>
	<div class="form-group">
		<?php echo $form->labelEx($model,'value'); ?>
        <br/>
        <?php
            switch($model->type){
                case 'text':
                    echo $form->textField($model,'value',array('class'=>'form-control'));
                break;
                case 'img':
                    echo $form->hiddenField($model,'value',array('class'=>'form-control'));
                    if($model->value)
                    {
                        $img = trim($model->value);
                    }else{
                        $img = Yii::app()->theme->baseUrl.'/img/800x200.jpg';
                    }
                    echo CHtml::image($img,'Ảnh minh họa',array('class'=>'img-responsive img-thumbnail','id'=>'preshowImage' ,'onclick'=>'selectImage("#MConfigs_value");'));
                    ?>
                    <script>
                    jQuery(function($){
                        $('#MConfigs_value').bind('change',function(){

                            $('#preshowImage').attr('src',$(this).val());
                        });
                    });
                    </script>
                    <?php
                    break;
                case 'page':
                    $list = CHtml::listData(MPages::model()->findAll(),'id','name_vi');
                    echo $form->dropDownList($model,'value',$list,array('class'=>'form-control','prompt'=>'Chọn bài viết'));
                    break;
                case 'area':
                    echo $form->textArea($model, 'value',array('class'=>'form-control'));
                    break;
                case 'editor':
                    echo $form->textArea($model, 'value',array('class'=>'form-control ckeditor'));
                    break;
                default:
                    break;
            }
        ?>
	</div>
   
	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord?'Thêm mới':'Cập nhật',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->