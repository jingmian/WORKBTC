<?php

class SpecialTourController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Danh sách tour đặc biệt';
        $models = Yii::app()->db->createCommand('select a.`name_vi`,a.`price` as `price`,b.`id`,b.`order` as `order`,b.`targetid` from `' . MProducts::model()->tableName() . '` a, `' . MSpecialTour::model()->tableName() . '` b where a.id = b.targetId ')->queryAll();
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $model = new MSpecialTour();
        if (isset($_POST['MSpecialTour'])) {
            $model->attributes = $_POST['MSpecialTour'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect('index');
                }
            }
        }
        $this->render('form', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $models = $this->loadSearch($model['name_vi']);
        if (isset($_POST['MSpecialTour'])) {
            $model->attributes = $_POST['MSpecialTour'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect('index');
                }
            }
        }
        $this->render('form', array('model' => $model, 'models' => $models));
    }

    public function actionUpdateOrder($id, $data) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $model->order = intval($data);
            $model->save(false);
        }
    }

    public function loadModel($id) {
        $model = MSpecialTour::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

    public function loadSearch($search) {
        $models = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `name_vi` like "%' . CHtml::encode($search) . '%"')->queryAll();
        return $models;
    }

    public function actionSearch($search) {
        if (Yii::app()->request->isAjaxRequest) {
            $models = $this->loadSearch($search);
            $this->renderPartial('qsearch', array('models' => $models));
        }
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
