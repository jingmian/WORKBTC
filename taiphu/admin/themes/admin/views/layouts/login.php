<!DOCTYPE html>
<html lang="<?=$this->language; ?>">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl; ?>/js/datatable/media/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl; ?>/style.css"/>
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl; ?>/js/fancybox/jquery.fancybox.css"/>
	<script type="text/javascript" src="<?=Yii::app()->theme->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?=Yii::app()->theme->baseUrl; ?>/js/datatable/media/js/jquery.dataTables.min.js"></script>
</head>
<body>
	<div class="page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Đăng nhập
						</div>
						<div class="panel-body">
							<?=$content; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<style>
		
	</style>
	<script type="text/javascript" src="<?=Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
</body>
</html>