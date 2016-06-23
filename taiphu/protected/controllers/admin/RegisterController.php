<?php

class RegisterController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Quản lý Thành viên';
        $models = Yii::app()->db->createCommand('select * from `' . MRegister::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $model = new MRegister();
        if (isset($_POST['MRegister'])) {
            $model->attributes = $_POST['MRegister'];
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
        if (isset($_POST['MRegister'])) {
            $model->attributes = $_POST['MRegister'];
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
            $model->hinhthuc = intval($data) == 1 ? 1 : 0;
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
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        endif;
    }

    public function actionDeleteBatch() {
        if (isset($_POST['ID'])):
            $arr = $_POST['ID'];
            foreach ($arr as $id) {
                $this->loadModel($id)->delete();
            }
            $this->redirect(array('index'));
        else:
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        endif;
    }

    public function loadModel($id) {
        $model = MRegister::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy ');
        }
        return $model;
    }

}
