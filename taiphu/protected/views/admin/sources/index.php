<?php
/* @var $this SourcesController */

$this->breadcrumbs=array(
	'Điểm khởi hành',
);
?>
<a class="btn btn-success" href="<?=$this->createUrl('add'); ?>" title="Thêm mới"><i class="fa fa-plus"></i> Thêm mới điểm khởi hành</a>
<hr/>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Danh mục(vi)</th>
                <th>Tên Danh mục(en)</th>
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
                    <td><?=CHtml::encode($valueM['name_vi']); ?></td>
                    <td><?=CHtml::encode($valueM['name_en']); ?></td>
                    <td>
                        <a href="<?=$this->createUrl('update',array('id'=>$valueM['id'])); ?>"><i class="fa fa-pencil"></i></a>
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