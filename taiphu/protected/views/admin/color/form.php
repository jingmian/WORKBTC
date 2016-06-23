<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'mvideos-form-form',
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

    <div class="form-group">
        <?php
        $parentLists = CHtml::listData(MModels::model()->findAll(), 'id', 'name_vi');
        ?>
        <?php echo $form->labelEx($model, 'product_id'); ?>
        <?php echo $form->dropDownList($model, 'product_id', $parentLists, array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'product_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'color'); ?>
        <br />
        <?php
        $img = $model->color ? trim($model->color) : Yii::app()->theme->baseUrl . '/img/400x200.jpg';
        ?>
        <img class="color-select img-responsive img-thumbnail" src="<?= $img; ?>" alt="Chọn hình"  onclick="selectImage('#MColor_color');" />
        <?php echo $form->hiddenField($model, 'color', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'color'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'image'); ?>
        <br />
        <?php
        $img = $model->image ? trim($model->image) : Yii::app()->theme->baseUrl . '/img/400x200.jpg';
        ?>
        <img class="img-select img-responsive img-thumbnail" src="<?= $img; ?>" alt="Chọn hình"  onclick="selectImage('#MColor_image');" />
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
        $('#MColor_image').bind('change', function () {
            $('.img-select').attr('src', $(this).val());
        });
        $('#MColor_color').bind('change', function () {
            $('.color-select').attr('src', $(this).val());
        });
    });
</script>