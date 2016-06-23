<?php
/* @var $this MVideosController */
/* @var $model MVideos */
/* @var $form CActiveForm */
?>



<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'mvideos-form-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // See class documentation of CActiveForm for details on this,
    // you need to use the performAjaxValidation()-method described there.
    'enableAjaxValidation' => false,
        ));
?>
<div class="col-md-8">
    <p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>

    <?php if ($model->hasErrors()): ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php endif ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name_vi'); ?>
        <?php echo $form->textField($model, 'name_vi', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'name_vi'); ?>
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
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->textField($model, 'type', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'type'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'image'); ?>
        <br />
        <?php
        $img = $model->image ? trim($model->image) : Yii::app()->theme->baseUrl . '/img/400x200.jpg';
        ?>
        <img class="img-select img-responsive img-thumbnail" src="<?= $img; ?>" alt="Chọn hình" onclick="selectImage('#MDoitac_image');" />
        <?php echo $form->hiddenField($model, 'image', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'image'); ?>
    </div>


    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới cập' : 'Cập nhật', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->




<script>
    jQuery(function () {
        $('#MDoitac_image').bind('change', function () {
            $('.img-select').attr('src', $(this).val());
        });
    });
</script>