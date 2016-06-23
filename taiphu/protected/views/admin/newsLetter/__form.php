
<?php
$listParent = Yii::app()->db->createCommand('select * from `' . MRegister::model()->tableName() . '` where `hinhthuc` = 1 order by `id` asc')->queryAll();
?>
<div class="col-md-12">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'multiselectForm',
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
            <li role="presentation" class="active"><a href="#vi" role="tab" data-toggle="tab">Nội Dung</a></li>
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
                    <select id="MNewsLetter_email" name="MNewsLetter[email][]" multiple="multiple">
                        <?php
                        if ($listParent):
                            foreach ($listParent as $list) :
                                ?>  
                                <option value="<?php echo $list['email']; ?>"><?php echo $list['fullname']; ?></option>

                                <?php
                            endforeach;

                        endif;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'content_vi'); ?>
                    <?php echo $form->textArea($model, 'content_vi', array('class' => 'form-control ckeditor')); ?>
                    <?php echo $form->error($model, 'content_vi'); ?>
                </div>
            </div>


        </div>

    </div>

    <div class="col-md-4">


        <div class="form-group">
            <?php echo $form->labelEx($model, 'image'); ?>
            <br />
            <?php
            $img = $model->image ? trim($model->image) : Yii::app()->theme->baseUrl . '/img/400x200.jpg';
            ?>
            <input type="text" class="img-select" value="<?= $img; ?>" disabled="disabled"></br></br>
            <button type="button" onclick="selectFile('#MNewsLetter_image');" class="btn btn-danger btn-sm profile-edit">Select File</button></br></br>
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
        $('#MNewsLetter_image').bind('change', function () {
            $('.img-select').val($(this).val());
            $('.delete').show();
        });
        $('.delete').click(function () {
            var valuesImg = $('#MNewsLetter_image').val();
            $('.img-select').val('');
            $('#MNewsLetter_image').val('');
            $('.delete').hide();
        });

    });


</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#MNewsLetter_email').multiselect();
    });
</script>

