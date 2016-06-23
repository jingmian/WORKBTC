<?php

class ContentsController extends AdminController
{
	public function actionIndex()
	{
		$this->pageHeader = 'Danh sách nội dung cần quản lý';
		$models = Yii::app()->db->createCommand('select * from `'.MContents::model()->tableName().'` where 1 order by `id` desc')->queryAll();

		$this->render('index',array('models'=>$models));
	}

	public function actionAdd()
	{
		$model = new MContents();
		if(isset($_POST['MContents']))
		{
			$model->attributes = $_POST['MContents'];
			if($model->validate())
			{
				if($model->save())
				{
					$this->redirect(array('index'));
				}
			}
		}
		$this->render('form',array('model'=>$model));
	}

	public function actionEdit($id)
	{
		$this->pageHeader = 'Tùy chỉnh nội dung';
		$model = $this->loadModel($id);
		if(isset($_POST['MContents']))
		{
			$model->value = $_POST['MContents']['value'];
			if($model->validate())
			{
				if($model->save())
				{
					$this->redirect(array('index'));
				}
			}
		}
		$this->render('edit',array('model'=>$model));
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		if(isset($_POST['MContents']))
		{
			$model->attributes = $_POST['MContents'];
			if($model->validate())
			{
				if($model->save())
				{
					$this->redirect(array('index'));
				}
			}
		}
		$this->render('form',array('model'=>$model));
	}

	public function loadModel($id)
	{
		$model = MContents::model()->findByPk($id);
		if(!$model)
		{
			throw new CHttpException(404,'Không tìm thấy nội dung');
		}
		return $model;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}