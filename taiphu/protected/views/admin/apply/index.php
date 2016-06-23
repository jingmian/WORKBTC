<?php
/* @var $this PagesController */

$this->breadcrumbs = array(
    'Apply',
);
?>
<a class="btn btn-danger pull-right" id="delete-batch" href="javascript:;" title="Xóa Tất Cả"><i class="fa fa-trash-o"></i> Xóa tất cả</a>
<hr />
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 1%"><input type="checkbox" id="select_all" /></th>
                <th>STT</th>
                <th>Tên Khách Hàng</th>
                <th>Mã Món Ăn</th>
                <th>Tiêu Đề</th>
                <th>Nội Dung</th>
                <th>Email</th>
                <th>Tình trạng</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($models):
                $step = 1;
                foreach ($models as $keyM => $valueM):
                    ?>
                    <tr>
                        <td><input type="checkbox" name="select[]" class="select" value="<?php echo $valueM['id']; ?>"/></td>
                        <td><?= $step++; ?></td>
                        <td><?= CHtml::encode($valueM['name']); ?></td>
                        <td><?= CHtml::encode($valueM['country']); ?></td>
                        <td><?= CHtml::encode($valueM['subject']); ?></td>
                        <td><?= CHtml::encode($valueM['note']); ?></td>
                        <td><?= CHtml::encode($valueM['email']); ?></td>
                        <td>
                            <?= intval($valueM['status']) == 1 ? 'Đã Duyệt' : 'Chưa Duyệt'; ?>
                        </td>
                        <td>
                            <a href="<?= $this->createUrl('update', array('id' => $valueM['id'])); ?>"><i class="fa fa-pencil"></i></a>
                            <a href="<?= $this->createUrl('delete', array('id' => $valueM['id'])); ?>"><i class="fa fa-trash-o"></i></a>
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
    $(document).ready(function () {
        jQuery('#select_all').on('change', function () {
            if (jQuery(this).is(':checked')) {
                jQuery('input.select').each(function () {
                    this.checked = true;
                });
            } else {
                jQuery('input.select').each(function () {
                    this.checked = false;
                });
            }
        });

        $('#delete-batch').click(function () {
            var arrCheck = [];
            jQuery('input.select').each(function () {
                if ($(this).is(':checked')) {
                    arrCheck.push($(this).val());
                }
            });

            if (arrCheck == "") {
                bootbox.confirm("Chọn mục cần xóa ", function (result) {
                    if (result == true) {

                    }
                });

            } else {
                bootbox.confirm("Bạn Có Chắc Chắn Muốn Xóa? ", function (result) {
                    if (result == true) {
                        DeleteBatch(arrCheck);
                    }
                });
            }
        });

    });

    function DeleteBatch(arrCheck) {
        $.ajax({
            type: 'POST',
            url: '<?php echo $this->createUrl("deleteBatch"); ?>',
            data: {
                ID: arrCheck
            },
            success: function (result) {
                location.reload();
            }
        });
    }
</script>