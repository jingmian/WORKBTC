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
            <li role="presentation" class="active"><a href="#vi" role="tab" data-toggle="tab">Tiếng việt</a></li>
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
                    <?php echo $form->error($model, 'name_vi'); ?>
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

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'status'); ?>
                    <?php echo $form->dropDownList($model, 'status', array('0' => 'Ẩn', '1' => 'Hiện'), array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'status'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'content_vi'); ?>
                    <?php echo $form->textArea($model, 'content_vi', array('class' => 'form-control ckeditor')); ?>
                    <?php echo $form->error($model, 'content_vi'); ?>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="en">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'name_en'); ?>
                    <?php echo $form->textField($model, 'name_en', array('class' => 'form-control sAlias')); ?>
                    <?php echo $form->error($model, 'name_en'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'des_en'); ?>
                    <?php echo $form->textArea($model, 'des_en', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'des_en'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'content_en'); ?>
                    <?php echo $form->textArea($model, 'content_en', array('class' => 'form-control ckeditor')); ?>
                    <?php echo $form->error($model, 'content_en'); ?>
                </div>
            </div>
        </div>

    </div>

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
            <img class="img-select img-responsive img-thumbnail"  style="width: 250px;height: 300px" src="<?= $img; ?>" alt="Chọn hình" onclick="selectImage('#MPages_image');" />
            <?php if ($model->image) { ?>
                <button type="button" class="btn btn-danger btn-sm profile-edit delete">Delete</button>
            <?php } else {
                ?>
                <button type="button" class="btn btn-danger btn-sm profile-edit delete" style="display: none;">Delete</button>
                <?php
            }
            ?>
            <?php echo $form->hiddenField($model, 'image', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'image'); ?>
        </div>

        

    </div>
    <div class="clearfix"></div>
    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>

    jQuery(function () {
        $('#MPages_image').bind('change', function () {
            $('.img-select').attr('src', $(this).val());
            $('.delete').show();
        });
        $('.delete').click(function () {
            var valuesImg = $('#MPages_image').val();
            $('.img-select').attr('src', '/admin/themes/admin/img/400x200.jpg');
            $('#MPages_image').val('');
            $('.delete').hide();
        });

        $('#MPages_icon').bind('change', function () {
            $('.img-select-icon').attr('src', $(this).val());
            $('.delete-icon').show();
        });
        $('.delete-icon').click(function () {
            var valuesImg = $('#MPages_icon').val();
            $('.img-select-icon').attr('src', '/admin/themes/admin/img/400x200.jpg');
            $('#MPages_icon').val('');
            $('.delete-icon').hide();
        });

    });


</script>