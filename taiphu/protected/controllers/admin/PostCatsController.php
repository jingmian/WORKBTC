<?php

class PostCatsController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Danh mục';
        if (isset($_GET['s'])) {
            $models = Yii::app()->db->createCommand('select * from `' . MPostCats::model()->tableName() . '` where `name` like "%' . CHtml::encode($_GET['s']) . '%" order by `id` asc')->queryAll();
        } else {
            $models = Yii::app()->db->createCommand('select * from `' . MPostCats::model()->tableName() . '` where 1 order by `id` asc')->queryAll();
        }
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm danh mục';
        $model = new MPostCats;
        if (isset($_POST['MPostCats'])) {
            $model->attributes = $_POST['MPostCats'];
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
        if (isset($_POST['MPostCats'])) {
            $model->attributes = $_POST['MPostCats'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('form', array('model' => $model));
    }

    public function actionDelete() {
        if (isset($_POST['ID'])) {
            $id = $_POST['ID'];
            $modelChildren = MPosts::model()->findAll('parent=:parent', array(':parent' => $id));
            if ($modelChildren) {
                foreach ($modelChildren as $child) :
                    MPosts::model()->deleteByPk($child->id);
                endforeach;
                $this->redirect(array('index'));
            } else {
                $modelMenu = MMenus::model()->find('type = "MPostCats" and targetId =  "' . $id . '"');
                if ($modelMenu) {
                    MMenus::model()->deleteByPk($modelMenu->id);
                }
                $this->loadModel($id)->delete();
                $this->redirect(array('index'));
            }
        }
    }

    public function actionDeleteBatch() {
        if (isset($_POST['ID'])) {
            $arr = $_POST['ID'];
            foreach ($arr as $id) {
                $modelChildren = MPosts::model()->findAll('parent=:parent', array(':parent' => $id));
                if ($modelChildren) {
                    foreach ($modelChildren as $child) :
                        MPosts::model()->deleteByPk($child->id);
                    endforeach;
                } else {
                    $modelMenu = MMenus::model()->find('type = "MPostCats" and targetId =  "' . $id . '"');
                    if ($modelMenu) {
                        MMenus::model()->deleteByPk($modelMenu->id);
                    }
                    $this->loadModel($id)->delete();
                }
            }
            $this->redirect(array('index'));
        }
    }

    public function loadModel($id) {
        $model = MPostCats::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
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
