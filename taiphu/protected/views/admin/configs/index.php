<?php
/* @var $this ConfigController */

$this->breadcrumbs = array(
    'Tùy chọn website',
);
$la = array('all' => 'Toàn bộ', 'vi' => 'Việt', 'en' => 'Anh');
?>
<a class="btn btn-success" href="<?= $this->createUrl('add'); ?>" title="Thêm mới"><i class="fa fa-plus"></i></a>
<a class="btn btn-danger pull-right" id="delete-batch" href="javascript:;" title="Xóa Tất Cả"><i class="fa fa-trash-o"></i> Xóa tất cả</a>
<hr />
<div class="table-responsive" >
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 1%"><input type="checkbox" id="select_all" /></th>
                <th>STT</th>
                <th>Ngôn ngữ</th>
                <th>Tên</th>
                <th>Từ Khóa</th>
                <!--<th>Nội Dung</th>-->
                <th>Tùy chỉnh</th>
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
                        <td><?= isset($la[$valueM['language']]) ? $la[$valueM['language']] : 'n/a'; ?></td>
                        <td><?= CHtml::encode($valueM['name']); ?></td>
                        <td><?= CHtml::encode($valueM['key']); ?></td>
                        <!--<td><?php // echo CHtml::encode($valueM['value']);  ?></td>-->
                        <td>
                            <a class="btn btn-primary" href="<?= $this->createUrl('edit', array('id' => $valueM['id'])); ?>"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-primary" href="<?= $this->createUrl('update', array('id' => $valueM['id'])); ?>"><i class="fa fa-wrench"></i></a>
                            <a class="btn btn-danger" href="javascript:;" onclick="confirmdelete('<?php echo $valueM['id']; ?>');return false;"><i class="fa fa-trash-o"></i></a>

                        </td>
                    </tr>
                    <?php
                endforeach;
            else:
                ?>
                <tr>
                    <td colspan=""></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

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