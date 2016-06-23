<?php

class DoitacController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Quản lý Đối Tác';
        $models = Yii::app()->db->createCommand('select * from `' . MDoitac::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $model = new MDoitac();
        if (isset($_POST['MDoitac'])) {
            $model->attributes = $_POST['MDoitac'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('form', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if (isset($_POST['MDoitac'])) {
            $model->attributes = $_POST['MDoitac'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('form', array('model' => $model));
    }

    public function actionSetHomePage($id, $data) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $model->homepage = intval($data) == 1 ? 1 : 0;
            $model->save(false);
        } else {
            $this->redirect(array('index'));
        }
    }

    public function actionSetOrder($id, $data) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $model->order = intval($data);
            $model->save(false);
        } else {
            $this->redirect(array('index'));
        }
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();
        $this->redirect(array('index'));
    }

    public function actionDeleteBatch() {
        $arr = $_POST['ID'];
        foreach ($arr as $id) {
            $this->loadModel($id)->delete();
        }
        $this->redirect(array('index'));
    }

    public function loadModel($id) {
        $model = MDoitac::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy slideshow');
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
