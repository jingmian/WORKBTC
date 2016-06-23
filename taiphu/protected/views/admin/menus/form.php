<div class="col-md-8">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'mpost-cats-form-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form')
    ));
    ?>

    <p class="note">Nội dung có dấu <span class="required">*</span> là phải nhập.</p>
    <?php if ($model->hasErrors()): ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php endif ?>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Kiểu menu</label>
                <?php
                $listMenu = array('MPages' => 'Bài viết đơn', 'MNewsCats' => 'Danh mục bài viết', 'MModels' => 'Danh mục sản phẩm', 'MProductsTop' => 'Menu Sản Phẩm', 'MProducts' => 'Sản Phẩm','MNews' => 'Bài Viết', 'contact' => 'Liên Hệ', 'videos' => 'Videos', 'gallery' => 'Gallery', 'home' => 'Trang Chủ', 'map' => 'Bản Đồ', 'price' => 'Bảng Giá');
//                $listMenu = array('MPages' => 'Bài viết đơn', 'MNewsCats' => 'Danh mục bài viết', 'MModels' => 'Danh mục sản phẩm', 'MProducts' => 'Sản phẩm','contact' => 'Liên Hệ','home' => 'Trang Chủ');
                echo $form->dropDownList($model, 'type', $listMenu, array('class' => 'form-control', 'prompt' => 'Chọn kiểu menu', 'data-target' => $this->createUrl('changeType')));
                ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Vị trí</label>
                <?php
                $list = MMenus::model()->getGroupHierachial($group, new MenuItem());

                echo $form->dropDownList($model, 'parent', (array) $list, array('prompt' => 'Cấp 0', 'class' => 'form-control'));
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Nội dung</label>
                <?php
                $listArray = array();
                if (isset($listModels)) {
                    $listArray = CHtml::listData($listModels, 'id', 'name_vi');
                }
                echo $form->dropDownList($model, 'targetId', $listArray, array('class' => 'form-control', 'prompt' => 'Chọn kiểu menu trước'));
                ?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Thứ tự</label>
                <?php
                echo $form->numberField($model, 'sort', array('class' => 'form-control'));
                ?>
            </div>
        </div>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- form -->

<?php $this->endWidget(); ?>

<script>
    jQuery(function ($) {
        $('#MMenus_type').bind('change', function () {
            var data = 'type=' + $(this).val();
            var url = $(this).attr('data-target');
            $.ajax({
                url: url,
                data: data,
                success: function (data)
                {
                    $('#MMenus_targetId').html(data);
                }
            })
        });
    });
</script>