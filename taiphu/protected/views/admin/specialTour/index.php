<?php
/* @var $this SpecialTourController */

$this->breadcrumbs=array(
	'Quản lý tour đặc biệt',
);
?>
<a class="btn btn-success" href="<?=$this->createUrl('add'); ?>" title="Thêm mới"><i class="fa fa-plus"></i> Thêm mới tour</a>
<hr/>
<div class="table-responsive">
    <table class="table table-bordered table-tripped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên bài viết(vi)</th>
                <th>Giá tiền</th>
                <th>Thứ tự</th>
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
                    <td><b><?=number_format($valueM['price']); ?> vnđ</b></td>
                    <td><input class="updateOrder" data-link="<?=$this->createUrl('updateOrder',array('id'=>$valueM['id'])); ?>" type="number" value="<?=$valueM['order']; ?>"></td>
                    <td>
                        <a href="<?=$this->createUrl('products/update',array('id'=>$valueM['targetid'])); ?>"><i class="fa fa-pencil"></i></a>
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
<script>
	jQuery(document).ready(function($){
		$('.updateOrder').bind('change keyup',function(){
			$.ajax({
				url:$(this).attr('data-link'),
				data:'data='+$(this).val(),
			})
		});
	})
</script>