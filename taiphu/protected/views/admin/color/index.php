<?php
/* @var $this VideosController */

$this->breadcrumbs = array(
    'Color',
);
?>
<a class="btn btn-success" href="<?= $this->createUrl('add'); ?>" title="Thêm mới"><i class="fa fa-plus"></i> Thêm mới </a>
<hr/>
<div class="table-responsive">
    <table class="table table-bordered table-tripped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Màu Sắc</th>
                <th>Thuộc Danh Mục</th>
                <th>Màu Sắc</th>
                <th>Hình Ảnh</th>
                <th>Thứ tự</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($models):
                $step = 1;
                foreach ($models as $keyM => $valueM):
                    $modelsProducts = MModels::model()->findByPk($valueM['product_id']);
                    ?>
                    <tr>
                        <td><?= $step++; ?></td>
                        <td><?= CHtml::encode($valueM['name_vi']); ?></td>
                        <td><?php echo $modelsProducts['name_vi']; ?></td>
                        <td><img src="<?php echo $valueM['color']; ?>" ></td>
                        <td><img src="<?php echo $valueM['image']; ?>" width="120" height="60"></td>
                        <td><input class="setOrder" data-link="<?= $this->createUrl('setOrder', array('id' => $valueM['id'])); ?>" type="number" value="<?= $valueM['order']; ?>" ></td>
                        <td>
                            <a href="<?= $this->createUrl('update', array('id' => $valueM['id'])); ?>"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:;" onclick="confirmdelete('<?php echo $valueM['id']; ?>');return false;"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php
                endforeach;
            else:
                ?>
                <tr>
                    <td colspan="4" class="text-center"><span class="text-danger">Không có dữ liệu</span></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
    jQuery(function ($) {
        $('.setHomePage').bind('change', function () {
            $.ajax({
                url: $(this).attr('data-link'),
                data: 'data=' + parseInt($(this).val()),
            });
        });
        $('.setOrder').bind('change keyup', function () {
            $.ajax({
                url: $(this).attr('data-link'),
                data: 'data=' + parseInt($(this).val()),
            });
        });
    });
</script>

<script>
    function confirmdelete(id) {
        bootbox.confirm("Bạn Có Chắc Chắn Muốn Xóa? ", function (result) {
            if (result == true) {
                DeleteByID(id);
            }
        });
    }

    function DeleteByID(ID) {

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->createUrl("delete"); ?>',
            data: {
                ID: ID
            },
            success: function (result) {
                location.reload();
            }
        });
    }
</script>