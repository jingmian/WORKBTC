<?php if ($models): ?>
	<option value="#">Chọn tour du lịch</option>
	<?php foreach ((array)$models as $key => $value): ?>
		<option value="<?=$value['id']; ?>"><?=$value['name_vi']; ?></option>
	<?php endforeach ?>
<?php endif; ?>
