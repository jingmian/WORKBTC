<?php
/* @var $this MMenusController */

$this->breadcrumbs = array(
    'Quản lý menu',
);
?>
<a class="btn btn-success" href="<?= $this->createUrl('add', array('group' => $_GET['group'])); ?>" title="Thêm mới"><i class="fa fa-plus"></i></a>
<hr />
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên menu</th>
                <th>Thứ tự</th>
                <th>Thao tác</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if ($models):
                $step = 1;
                $menuName = new MenuItem();
                foreach ($models as $keyM => $valueM):
                    ?>
                    <tr>
                        <td style="width:3%; text-align:center;"><?= $step++; ?></td>
                        <td style="width: 10%"><?= isset($valueM['sep']) ? $valueM['sep'] . $menuName->getItemName($valueM['targetId'], $valueM['type']) : $menuName->getItemName($valueM['targetId'], $valueM['type']); ?></td>
                        
                        <td style="width:3%;">
                            <input type="number" data-target="<?= $this->createUrl('updateSort', array('id' => intval($valueM['id']))); ?>" value="<?= intval($valueM['sort']); ?>" class="form-control input-sm updateSort" />
                        </td>
                        <td style="width:6%; text-align:center;">
                            <a class="btn btn-primary" href="<?= $this->createUrl('update', array('id' => $valueM['id'])); ?>"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger" href="<?= $this->createUrl('delete', array('id' => $valueM['id'], 'g' => CHtml::encode($_GET['group']))); ?>"><i class="fa fa-trash-o"></i></a>
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
        $('.updateSort').bind('change keyup', function () {
            $.ajax({
                url: $(this).attr('data-target'),
                method: 'get',
                data: 'data=' + $(this).val(),
            });
        });
    });
</script>