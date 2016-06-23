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
<?php 
	switch ($model->type) {
		case 'videos':
			include('options/videos.php');
			break;
		default:
			# code...
			break;
	}
 ?>

 <?php $this->endWidget(); ?>