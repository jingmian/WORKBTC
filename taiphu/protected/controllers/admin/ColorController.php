<?php

class ColorController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Quản lý Color';
        $models = Yii::app()->db->createCommand('select * from `' . MColor::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $model = new MColor();
        if (isset($_POST['MColor'])) {
            $model->attributes = $_POST['MColor'];
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
        if (isset($_POST['MColor'])) {
            $model->attributes = $_POST['MColor'];
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

    public function actionDelete() {
        if (isset($_POST['ID'])):
            $id = $_POST['ID'];
            $this->loadModel($id)->delete();
            $this->redirect(array('index'));
        else:
            throw new CHttpException(404, 'Không tìm thấy bài viết này');
        endif;
    }

    public function loadModel($id) {
        $model = MColor::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy');
        }
        return $model;
    }

}
