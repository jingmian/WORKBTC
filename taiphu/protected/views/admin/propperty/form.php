<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'mpost-cats-form-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'form')
        ));
?>
<div class="col-md-8">
    <p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>
    <?php echo $form->errorSummary($model); ?>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#vi" role="tab" data-toggle="tab">Nội Dung</a></li>
    </ul>
    <br/>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="vi">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'name_vi'); ?>
                <?php echo $form->textField($model, 'name_vi', array('class' => 'form-control sAlias')); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'slug'); ?>
                <?php echo $form->textField($model, 'slug', array('class' => 'form-control tAlias')); ?>
                <?php echo $form->error($model, 'slug'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'des_vi'); ?>
                <?php echo $form->textArea($model, 'des_vi', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'des_vi'); ?>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <?php
                        $parentLists = CHtml::listData($model->getAllProducts(), 'id', 'name_vi');
                        ?>
                        <?php echo $form->labelEx($model, 'parent'); ?>
                        <?php echo $form->dropDownList($model, 'parent', $parentLists, array('class' => 'form-control', 'prompt' => 'Là danh mục chính')); ?>
                        <?php echo $form->error($model, 'parent'); ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'status'); ?>
                        <?php echo $form->dropDownList($model, 'status', array('0' => 'Đình Chỉ', '1' => 'Kích hoạt'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'content_vi'); ?>
                <?php echo $form->textArea($model, 'content_vi', array('class' => 'form-control ckeditor')); ?>
                <?php echo $form->error($model, 'content_vi'); ?>
            </div> 

        </div>

    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', array('class' => 'btn btn-primary')); ?>
    </div>

</div><!-- form -->


<div class="col-md-4">
    <div class="form-group">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>


    <div class="form-group">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'keyword'); ?>
        <?php echo $form->textArea($model, 'keyword', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'keyword'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'image'); ?>
        <br />
        <?php
        $img = $model->image ? trim($model->image) : Yii::app()->theme->baseUrl . '/img/400x200.jpg';
        ?>
        <img class="img-select img-responsive img-thumbnail" src="<?= $img; ?>" alt="Chọn hình" onclick="selectImage('#MCategories_image');" />
        <?php echo $form->hiddenField($model, 'image', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'image'); ?>
    </div>

</div>

<?php $this->endWidget(); ?>

<script>
    jQuery(function () {
        $('#MCategories_image').bind('change', function () {
            $('.img-select').attr('src', $(this).val());
        });
    });
</script>