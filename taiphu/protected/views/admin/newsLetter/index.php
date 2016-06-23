<?php
$this->breadcrumbs = array(
    'Bài viết',
);
?>
<a class="btn btn-success" href="<?= $this->createUrl('add'); ?>" title="Thêm mới"><i class="fa fa-plus"></i></a>
<a class="btn btn-danger pull-right" id="delete-batch" href="javascript:;" title="Xóa Tất Cả"><i class="fa fa-trash-o"></i> Xóa tất cả</a>
<hr />
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 1%"><input type="checkbox" id="select_all" /></th>
                <th>STT</th>
                <th>Tên bài viết</th>
                <th>Tình trạng</th>
                <th>Thứ tự</th>
                <th>Thao tác</th>
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
                        <td><?= CHtml::encode($valueM['name_vi']); ?></td>
                        <td>
                            <?= intval($valueM['status']) == 1 ? 'Hiển thị' : 'Đình chỉ'; ?>
                        </td>
                        <td><input class="setOrder" data-link="<?= $this->createUrl('setOrder', array('id' => $valueM['id'])); ?>" type="number" value="<?= $valueM['order']; ?>" ></td>
                        <td>
                            <a class="btn btn-primary" href="<?= $this->createUrl('update', array('id' => $valueM['id'])); ?>"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger" href="javascript:;" onclick="confirmdelete('<?php echo $valueM['id']; ?>');
                                            return false;"><i class="fa fa-trash-o"></i></a>
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
    jQuery(function($) {
        $('.setHomePage').bind('change', function() {
            $.ajax({
                url: $(this).attr('data-link'),
                data: 'data=' + parseInt($(this).val()),
            });
        });
        $('.setOrder').bind('change keyup', function() {
            $.ajax({
                url: $(this).attr('data-link'),
                data: 'data=' + parseInt($(this).val()),
            });
        });
    });
</script>

<script>
    function confirmdelete(id) {
        bootbox.confirm("Bạn Có Chắc Chắn Muốn Xóa? ", function(result) {
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
            success: function(result) {
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