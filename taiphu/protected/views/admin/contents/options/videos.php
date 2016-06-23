<?php
	$videos = Yii::app()->db->createCommand('select * from `'.MVideos::model()->tableName().'` where 1 order by `id` desc')->queryAll();
	$listVideos = CHtml::listData($videos,'videoId','name_vi');
?>
<div class="col-md-6">
	<div class="form-group">
		<label for="videos">Chọn video</label>
		<?php foreach ($videos as $keyV => $valueV): ?>
			<div class="inbox-group">
				<input class="videoAdd" type="checkBox" value="<?=$valueV['videoId']; ?>" />
				<span><?=$valueV['name_vi']; ?></span>
			</div>
		<?php endforeach ?>
		<?=$form->textField($model,'value',array('class'=>'form-control')); ?>
	</div>
</div>

<script>
	jQuery(function($){
		$('.videoAdd').bind('change',function(){
			if($(this).is(':checked')){
				var id = $('#MContents_value').val() + $(this).val() + ";";
				$('#MContents_value').val(id);
				$('#MContents_value').trigger('change');
			}
		});
	});
</script>