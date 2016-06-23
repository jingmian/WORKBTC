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
                    <?php echo $form->labelEx($model, 'lang'); ?>
                    <?php echo $form->dropDownList($model, 'lang', array('1' => '1 ngôn ngữ', '2' => '2 ngôn ngữ'), array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'lang'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'responsive'); ?>
                    <?php echo $form->dropDownList($model, 'responsive', array('1' => 'Hiển Thị Mobile', '2' => 'Không Hiển Thị Mobile'), array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'responsive'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'name_vi'); ?>
                    <?php echo $form->textField($model, 'name_vi', array('class' => 'form-control sAlias')); ?>
                    <?php echo $form->error($model, 'name_vi'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'address_vi'); ?>
                    <?php echo $form->textArea($model, 'address_vi', array('class' => 'form-control ckeditor')); ?>
                    <?php echo $form->error($model, 'address_vi'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'phone'); ?>
                    <?php echo $form->textField($model, 'phone', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'phone'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'fax'); ?>
                    <?php echo $form->textField($model, 'fax', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'fax'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'map'); ?>
                    <?php echo $form->textField($model, 'map', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'map'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'website'); ?>
                    <?php echo $form->textField($model, 'website', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'website'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'google'); ?>
                    <?php echo $form->textArea($model, 'google', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'google'); ?>
                </div>

            </div>


            <div role="tabpanel" class="tab-pane" id="en">

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'name_en'); ?>
                    <?php echo $form->textField($model, 'name_en', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'name_en'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'address_en'); ?>
                    <?php echo $form->textArea($model, 'address_en', array('class' => 'form-control ckeditor')); ?>
                    <?php echo $form->error($model, 'address_en'); ?>
                </div>
            </div>


        </div>

    </div>

    <div class="col-md-4">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'seo_title'); ?>
            <?php echo $form->textField($model, 'seo_title', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'seo_title'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'seo_description'); ?>
            <?php echo $form->textArea($model, 'seo_description', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'seo_description'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'seo_keyworld'); ?>
            <?php echo $form->textArea($model, 'seo_keyworld', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'seo_keyworld'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'banner'); ?>
            <br />
            <?php
            $img = $model->banner ? trim($model->banner) : Yii::app()->theme->baseUrl . '/img/400x200.jpg';
            ?>
            <img class="img-select img-responsive img-thumbnail" src="<?= $img; ?>" alt="Chọn hình" onclick="selectImage('#MConfig_banner');" />
            <?php if ($model->banner) { ?>
                <button type="button" class="btn btn-danger btn-sm profile-edit delete">Delete</button>
            <?php } else {
                ?>
                <button type="button" class="btn btn-danger btn-sm profile-edit delete" style="display: none;">Delete</button>
                <?php
            }
            ?>
            <?php echo $form->hiddenField($model, 'banner', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'banner'); ?>
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
        $('#MConfig_banner').bind('change', function () {
            $('.img-select').attr('src', $(this).val());
            $('.delete').show();
        });
        $('.delete').click(function () {
            var valuesImg = $('#MConfig_banner').val();
            $('.img-select').attr('src', '/admin/themes/admin/img/400x200.jpg');
            $('#MConfig_banner').val('');
            $('.delete').hide();
        });
    });


</script>