<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'mpost-cats-form-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'form')
        ));
?>

<div class="col-md-8">
    <p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>

    <?php if ($model->hasErrors()): ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php endif ?>

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#vi" role="tab" data-toggle="tab">Tiếng Việt</a></li>
        <?php
            if ($this->website['lang'] == 2):
                ?>
                <li role="presentation" ><a href="#en" role="tab" data-toggle="tab">Tiếng Anh</a></li>
                <?php
            endif;
            ?>
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
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?php
                        $parentLists = CHtml::listData($model->getAllParent(), 'id', 'name_vi');
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
        </div>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- form -->

<?php $this->endWidget(); ?>