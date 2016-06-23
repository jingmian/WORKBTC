<?php
/* @var $this ContentsController */

$this->breadcrumbs=array(
	'Nội dung tùy chỉnh',
);
?>
<a class="btn btn-success" href="<?=$this->createUrl('add'); ?>" title="Thêm mới"><i class="fa fa-plus"></i> Thêm mới nội dung</a>
<hr/>
<div class="table-responsive">
    <table class="table table-bordered table-tripped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tùy chọn</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($models):
                    $step = 1;
                    foreach($models as $keyM => $valueM):
            ?>
                <tr>
                    <td><?=$step++; ?></td>
                    <td><?=CHtml::encode($valueM['name']); ?></td>
                    <td>
                        <a href="<?=$this->createUrl('update',array('id'=>$valueM['id'])); ?>"><i class="fa fa-pencil"></i></a>
                        <a href="<?=$this->createUrl('edit',array('id'=>$valueM['id'])); ?>"><i class="fa fa-wrench"></i></a>
                        <a href="<?=$this->createUrl('delete',array('id'=>$valueM['id'])); ?>"><i class="fa fa-times"></i></a>
                    
                    </td>
                </tr>
            <?php endforeach; else: ?>
                <tr>
                    <td colspan="4" class="text-center"><span class="text-danger">Không có dữ liệu</span></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
