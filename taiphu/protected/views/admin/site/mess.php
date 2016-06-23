<div class="col-md-12">
	<?php if (Yii::app()->user->hasFlash('info')): ?>
		<div class="alert alert-info">
			<p><?=Yii::app()->user->getFlash('info'); ?></p>
		</div>
	<?php endif ?>

	<?php if (Yii::app()->user->hasFlash('danger')): ?>
		<div class="alert alert-danger">
			<p><?=Yii::app()->user->getFlash('danger'); ?></p>
		</div>
	<?php endif ?>

</div>