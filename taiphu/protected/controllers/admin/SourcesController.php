<?php

class SourcesController extends AdminController
{
	public function actionIndex()
	{
		$this->pageHeader = 'Điểm khởi hành';
		$models = Yii::app()->db->createCommand('select * from `'.MSources::model()->tableName().'`')->queryAll();
		$this->render('index',array('models'=>$models));
	}

	public function actionAdd()
	{
		$this->pageHeader = 'Thêm mới điểm khởi hành';
		$model = new MSources();
		if(isset($_POST['MSources']))
		{
			$model->attributes = $_POST['MSources'];
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

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		$this->pageHeader = 'Cập nhật điểm khởi hành: "'.$model->name_vi.'"';
		if(isset($_POST['MSources']))
		{
			$model->attributes = $_POST['MSources'];
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

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		$this->redirect(array('index'));
	}

	public function loadModel($id)
	{
		$model = MSources::model()->findByPk($id);
		if(!$model)
		{
			throw new CHttpException(404,'Không thấy nội dung');
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