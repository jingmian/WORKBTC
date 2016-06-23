<?php

class NewsCatsController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Danh mục';
        if (isset($_GET['s'])) {
            $models = Yii::app()->db->createCommand('select * from `' . MNewsCats::model()->tableName() . '` where `name` like "%' . CHtml::encode($_GET['s']) . '%" order by `id` asc')->queryAll();
        } else {
            $models = Yii::app()->db->createCommand('select * from `' . MNewsCats::model()->tableName() . '` where 1 order by `id` asc')->queryAll();
        }
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm danh mục';
        $model = new MNewsCats;
        if (isset($_POST['MNewsCats'])) {
            $model->attributes = $_POST['MNewsCats'];
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
        if (isset($_POST['MNewsCats'])) {
            $model->attributes = $_POST['MNewsCats'];
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
            $modelChildren = MNews::model()->findAll('parent=:parent', array(':parent' => $id));
            if ($modelChildren) {
                foreach ($modelChildren as $child) :
                    MNews::model()->deleteByPk($child->id);
                endforeach;
                $this->loadModel($id)->delete();
                $this->redirect(array('index'));
            } else {
                $modelMenu = MMenus::model()->find('type = "MNewsCats" and targetId =  "' . $id . '"');
                MMenus::model()->deleteByPk($modelMenu->id);
                $this->loadModel($id)->delete();
                $this->redirect(array('index'));
            }
        }
    }

    public function loadModel($id) {
        $model = MNewsCats::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

}
