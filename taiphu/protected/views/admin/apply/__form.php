<div class="col-md-12">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'mpages-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form')
    ));
    ?>

    <p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>

    <?php if ($model->hasErrors()): ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php endif; ?>

    <div class="col-md-8">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#vi" role="tab" data-toggle="tab">Feedback</a></li>
        </ul>
        <br/>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="vi">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'country'); ?>
                    <?php echo $form->textField($model, 'country', array('class' => 'form-control', 'disabled' => 'true')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'name'); ?>
                    <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'disabled' => 'true')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'subject'); ?>
                    <?php echo $form->textField($model, 'subject', array('class' => 'form-control', 'disabled' => 'true')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'disabled' => 'true')); ?>
                </div>


                <div class="form-group">
                    <?php echo $form->labelEx($model, 'status'); ?>
                    <?php echo $form->dropDownList($model, 'status', array('0' => 'Chưa Duyệt', '1' => 'Đã Duyệt'), array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'status'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'note'); ?>
                    <?php echo $form->textArea($model, 'note', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'note'); ?>
                </div>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
