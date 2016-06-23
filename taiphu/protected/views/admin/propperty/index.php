<?php
/* @var $this PostCatsController */

$this->breadcrumbs = array(
    'Danh mục tin tức',
);
?>
<a class="btn btn-success" href="<?= $this->createUrl('add'); ?>" title="Thêm mới">
    <i class="fa fa-plus"></i> Thêm mới 
</a>
<form action="<?= $this->createUrl('index'); ?>" method="get" class="form pull-right">
    <div class="form-group">
        <div class="input-group">
            <label class="input-group-addon">Tên danh mục</label>
            <input type="text" name="s" class="form-control" />
        </div>
    </div>
</form>
<hr />
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Danh mục</th>
                <th>Tình trạng</th>
                <th>Thuộc về</th>
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
                        <td><?= $step++; ?></td>
                        <td><?= CHtml::encode($valueM['name_vi']); ?></td>
                        <td>
                            <?= intval($valueM['status']) == 1 ? 'Hiển thị' : 'Đình chỉ'; ?>
                        </td>
                        <td>
                            <?php
                            if (!$valueM['parent']) {
                                echo 'Danh mục chính';
                            } else {
                                echo MCategories::model()->getCategoryName($valueM['parent']);
                            }
                            ?>
                        </td>

                        <?php if ($valueM['id'] == 1 || $valueM['id'] == 2) { ?>
                            <td> <a href="<?= $this->createUrl('update', array('id' => $valueM['id'])); ?>"><i class="fa fa-pencil"></i></a></td>
                        <?php } else {
                            ?>
                            <td>
                                <a href="<?= $this->createUrl('update', array('id' => $valueM['id'])); ?>"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:;" onclick="confirmdelete('<?php echo $valueM['id']; ?>');
                                        return false;"><i class="fa fa-times"></i></a>

                            </td>
                            <?php
                        }
                        ?>


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