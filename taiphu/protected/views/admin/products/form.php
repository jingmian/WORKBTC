<?php
$listParent = Yii::app()->db->createCommand('select * from `' . MCategories::model()->tableName() . '` where `status` = 1 and `parent` = 0 order by `id` asc')->queryAll();
?>
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
    <?php endif; ?>


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
        <?php
        if (isset($modelOptions) && $modelOptions != FALSE):
            $a = array();
            foreach ($modelOptions as $key => $parent) :
                $modelGetCategory = Yii::app()->db->createCommand('select * from `' . MCategories::model()->tableName() . '` where `status` = 1 and `id` = "' . $parent['children_id'] . '" order by `id` asc')->queryRow();
                $modelGetParentCategory = Yii::app()->db->createCommand('select * from `' . MCategories::model()->tableName() . '` where `status` = 1 and `id` = "' . $modelGetCategory['parent'] . '" order by `id` asc')->queryRow();
                if (!in_array($modelGetParentCategory['name_vi'], $a)) {
                    $a[$modelGetParentCategory['slug']] = $modelGetParentCategory['name_vi'];
                }
            endforeach;
            foreach ($a as $key => $items) :
                ?>
                <li role="presentation">
                    <a href="#<?php echo $key; ?>" role="tab" data-toggle="tab">
                        <?php echo $items; ?>
                    </a>
                </li>
                <?php
            endforeach;
            ?>
            <?php
        else :
            foreach ($listParent as $key => $parent) :
                ?>
                <li role="presentation"><a style="text-transform: nomal !important;" href="#<?php echo $parent['slug']; ?>" role="tab" data-toggle="tab"><?php echo $parent['name_vi']; ?></a></li>
                <?php
            endforeach;
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

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        $tagLists = CHtml::listData(MTag::model()->findAll(), 'id', 'name_vi');
                        ?>
                        <?php echo $form->labelEx($model, 'tag'); ?>
                        <?php echo $form->dropDownList($model, 'tag', $tagLists, array('class' => 'form-control', 'prompt' => 'Chọn Tag')); ?>
                        <?php echo $form->error($model, 'tag'); ?>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        $parentLists = CHtml::listData(MModels::model()->findAll(), 'id', 'name_vi');
                        ?>
                        <?php echo $form->labelEx($model, 'parent'); ?>
                        <?php echo $form->dropDownList($model, 'parent', $parentLists, array('class' => 'form-control', 'prompt' => 'Là danh mục chính')); ?>
                        <?php echo $form->error($model, 'parent'); ?>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'status'); ?>
                        <?php echo $form->dropDownList($model, 'status', array('0' => 'Đình Chỉ', '1' => 'Kích hoạt'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'price'); ?>
                        <?php echo $form->textField($model, 'price', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'price'); ?>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'price_promotion'); ?>
                        <?php echo $form->textField($model, 'price_promotion', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'price_promotion'); ?>
                    </div>
                </div>

            </div>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'des_vi'); ?>
                <?php echo $form->textArea($model, 'des_vi', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'des_vi'); ?>
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
                <?php echo $form->textField($model, 'name_en', array('class' => 'form-control')); ?>
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

        <!--==========================================================================================================-->
        <?php
        if (isset($modelOptions) && $modelOptions != FALSE):
            foreach ($a as $key => $parent) :
                ?>
                <div role="tabpanel" class="tab-pane" id="<?php echo $key; ?>">
                    <?php
                    $arrStrim = '';
                    $modelParent = Yii::app()->db->createCommand('select * from `' . MCategories::model()->tableName() . '` where `status` = 1 and `slug` = "' . $key . '" order by `id` asc')->queryRow();
                    $models = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.status = 1 and c.id = o.children_id and c.parent = "' . $modelParent['id'] . '" and o.product_id = "' . $id . '" order by c.id asc')->queryAll();
                    foreach ($models as $children) :
                        $arrStrim = $arrStrim . "," . $children['id'];
                        ?>
                        <div class="form-group">
                            <label class="required">
                                <?php echo $children['name_vi']; ?> 
                            </label>                
                            <input type="text" value="<?php echo $children['val']; ?>" maxlength="255" id="<?php echo $children['id']; ?>" name="Moptions[<?php echo $children['id']; ?>]" class="form-control">  
                        </div>
                        <?php
                    endforeach;

                    $strNew = substr($arrStrim, 1);
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'status =1 and `parent` !=0';
                    $criteria->addNotInCondition('id', explode(",", $strNew));
                    $criteria->order = "id ASC";
                    $listChildren = MCategories::model()->findAll($criteria);

//                    $strNew = substr($arrStrim, 1);
//                    $listChildren = Yii::app()->db->createCommand("select * from `" . MCategories::model()->tableName() . "` where `status` = 1 and `parent` !=0 and `id` NOT IN ($strNew) order by `id` asc")->queryAll();
                    if ($listChildren):
                        foreach ($listChildren as $key => $children) :
                            ?>
                            <div class="form-group">
                                <label class="required">
                                    <?php echo $children['name_vi']; ?> 
                                </label>                
                                <input type="text" value="" maxlength="255" id="<?php echo $children['id']; ?>" name="Moptions[<?php echo $children['id']; ?>]" class="form-control">  
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <?php
            endforeach;
        else :
            foreach ($listParent as $key => $parent) :
                $listChildren = Yii::app()->db->createCommand('select * from `' . MCategories::model()->tableName() . '` where `status` = 1 and `parent` = "' . $parent['id'] . '" order by `id` asc')->queryAll();
                ?>
                <div role="tabpanel" class="tab-pane " id="<?php echo $parent['slug']; ?>">
                    <?php
                    if ($listChildren):
                        foreach ($listChildren as $key => $children) :
                            ?>
                            <div class="form-group">
                                <label class="required">
                                    <?php echo $children['name_vi']; ?> 
                                </label>                
                                <input type="text" value="" maxlength="255" id="<?php echo $children['id']; ?>" name="Moptions[<?php echo $children['id']; ?>]" class="form-control">  
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <?php
            endforeach;
        endif;
        ?>
        <!--==========================================================================================================-->
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
        <img class="img-select img-responsive img-thumbnail" src="<?= $img; ?>" style="width: 250px;height: 300px" alt="Chọn hình" onclick="selectImage('#MProducts_image');" />
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


<?php $this->endWidget(); ?>

<script>
    jQuery(function () {
        $('#MProducts_image').bind('change', function () {
            $('.img-select').attr('src', $(this).val());
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
                var valueOld = $('#MProducts_thumbnail').val();
                $('#MProducts_thumbnail').val(valueOld + valueImg);
            }
        };
        window.open('/kcfinder/browse.php?type=images&dir=kcfinder/uploader',
                'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                );
    }

    function removeValue(value) {
        var list = $('#MProducts_thumbnail').val();
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

        $('#MProducts_thumbnail').val(values);
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
        var valueOld = $('#MProducts_thumbnail').val();
        alert(valueOld);
        $('#MProducts_thumbnail').val(valueOld + fileUrl);
        $('#append_files').append('<tr class="upload-multi-images" id="' + fileUrl + '"><td><img width="120" height="120" class="img-responsive" src="' + fileUrl + '"></td><td><input type="text" disabled class="form-control name-images" name="product-images" value="' + fileUrl + '"></td><td><a href="javascript:;" title="' + fileUrl + '" class="btn default btn-sm" onclick="removeValue(' + "'" + fileUrl + "'" + ');return false;"><i class="fa fa-times"></i> Remove </a></td></tr>');
    }

    $('.delete-icon').click(function () {
        var valuesImg = $('#MProducts_icon').val();
        $('.img-select-icon').attr('src', '/admin/themes/admin/img/400x200.jpg');
        $('#MProducts_icon').val('');
        $('.delete-icon').hide();
    });

    $('.delete').click(function () {
        var valuesImg = $('#MProducts_image').val();
        $('.img-select').attr('src', '/admin/themes/admin/img/400x200.jpg');
        $('#MProducts_image').val('');
        $('.delete').hide();
    });



</script>
