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
        <li role="presentation" class="active"><a href="#vi" role="tab" data-toggle="tab">Tiếng Việt</a></li>
        <?php
        if ($this->website['lang'] == 2):
            ?>
            <li role="presentation" ><a href="#en" role="tab" data-toggle="tab">Tiếng Anh</a></li>
            <?php
        endif;
        ?>
        <li role="presentation"><a href="#thumbnail" role="tab" data-toggle="tab" >Thumbnail</a></li>
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

        <div role="tabpanel" class="tab-pane" id="thumbnail">

            <div class="profile-userbuttons">
                <span class="btn btn-success fileinput-button" style="margin-bottom: 20px;">
                    <i class="fa fa-plus"></i>
                    <span id="files" onclick="openKCFinder();
                            return false;">Select files...</span>
                    <button type="button" class="btn btn-danger btn-sm profile-edit delete" style="display: none;">Delete</button>
                </span>
            </div>

            <?php echo $form->hiddenField($model, 'thumbnail'); ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr role="row" class="heading">
                        <th width="8%">
                            <?php echo Yii::t('main', 'images'); ?>
                        </th>
                        <th width="25%">
                            <?php echo Yii::t('main', 'label'); ?>
                        </th>
                        <th width="10%">
                            Delete
                        </th>
                    </tr>
                </thead>
                <tbody id="append_files">
                    <?php
                    $arr = explode(',', $model->thumbnail);
                    foreach ($arr as $items) {
                        if ($items) {
                            ?>
                            <tr class="upload-multi-images" id="<?php echo $items; ?>">
                                <td>
                                    <img class="img-responsive" src="<?php echo $items; ?>" width="120" height="120">
                                </td>
                                <td>
                                    <input type="text" disabled class="form-control name-images" name="models-images" value="<?php echo $items; ?>">
                                </td>
                                <td>
                                    <a href="javascript:;" onclick="removeValue('<?php echo $items; ?>');
                                            return false;" class="btn default"><i class="fa fa-times"></i> Remove </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
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
        <img class="img-select img-responsive img-thumbnail" src="<?= $img; ?>" alt="Chọn hình" onclick="selectImage('#MModels_image');" />
        <?php echo $form->hiddenField($model, 'image', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'image'); ?>
    </div>



</div>

<?php $this->endWidget(); ?>

<script>
    jQuery(function () {
        $('#MModels_image').bind('change', function () {
            $('.img-select').attr('src', $(this).val());
        });
        $('#MModels_logo').bind('change', function () {
            $('.img-select-logo').attr('src', $(this).val());
        });
    });
</script>

<script type="text/javascript">

    function openKCFinder(valueImg) {
        window.KCFinder = {
            callBackMultiple: function (files) {
                window.KCFinder = null;
                var valueImg = "";
                for (var i = 0; i < files.length; i++) {
                    valueImg += files[i] + ",";
                    $('#append_files').append('<tr class="upload-multi-images" id="' + files[i] + '"><td><img width="120" height="120" class="img-responsive" src="' + files[i] + '"></td><td><input type="text" disabled class="form-control name-images" name="product-images" value="' + files[i] + '"></td><td><a href="javascript:;" title="' + files[i] + '" class="btn default btn-sm" onclick="removeValue(' + "'" + files[i] + "'" + ');return false;"><i class="fa fa-times"></i> Remove </a></td></tr>');
                }
                var valueOld = $('#MModels_thumbnail').val();
                $('#MModels_thumbnail').val(valueOld + valueImg);
            }
        };
        window.open('/kcfinder/browse.php?type=images&dir=kcfinder/uploader',
                'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                );
    }

    function removeValue(value) {
        var list = $('#MModels_thumbnail').val();
        var separator = separator || ",";
        var values = list.split(separator);
        for (var i = 0; i < values.length; i++) {
            if (values[i] == value) {
                $('.upload-multi-images').each(function () {
                    if ($(this).attr("id") == values[i]) {
                        $(this).remove();
                    }
                });
                values.splice(i, 1);
            }
        }

        $('#MModels_thumbnail').val(values);
    }


    function selectFileWithCKFinder(startupPath, functionData)
    {
        var finder = new CKFinder();
        finder.basePath = '/ckfinder/';
        finder.startupPath = startupPath;
        finder.selectActionFunction = SetFileField;
        finder.selectActionData = functionData;
        finder.popup();
    }

    function SetFileField(fileUrl, data)
    {
        document.getElementById(data["selectActionData"]).value = fileUrl;
        var valueOld = $('#MModels_thumbnail').val();
        alert(valueOld);
        $('#MModels_thumbnail').val(valueOld + fileUrl);
        $('#append_files').append('<tr class="upload-multi-images" id="' + fileUrl + '"><td><img width="120" height="120" class="img-responsive" src="' + fileUrl + '"></td><td><input type="text" disabled class="form-control name-images" name="product-images" value="' + fileUrl + '"></td><td><a href="javascript:;" title="' + fileUrl + '" class="btn default btn-sm" onclick="removeValue(' + "'" + fileUrl + "'" + ');return false;"><i class="fa fa-times"></i> Remove </a></td></tr>');
    }



</script>