<?php
$this->breadcrumbs=array(
	'Thành viên',
);
?>

<div class="col-md-12">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Id</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Ngày tạo</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($models): ?>
				<?php 
					$step = 1;
					foreach ($models as $keyM => $valueM): 
				?>
					<tr>
						<td><?=$step++; ?></td>
						<td><?=CHtml::encode($valueM['id']); ?></td>
						<td><?=CHtml::encode($valueM['username']); ?></td>
						<td><?=CHtml::encode($valueM['email']); ?></td>
						<td><?=CHtml::encode(date('d-m-Y h:i:s',strtotime($valueM['created_date']))); ?></td>
					</tr>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td colspan='5' class='text-center'><span>Chưa có dữ liệu</span></td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>