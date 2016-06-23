<?php

class ConfigsController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Tùy chỉnh website';
        if (Yii::app()->user->checkAccess('root')) {
            $models = Yii::app()->db->createCommand('select * from `' . MConfigs::model()->tableName() . '` where 1 order by `id` asc')->queryAll();
        } else {
            $models = Yii::app()->db->createCommand('select * from `' . MConfigs::model()->tableName() . '` where `hidden` = 0 order by `id` asc')->queryAll();
        }
        $this->render('index', array('models' => $models));
    }

    /**
     * Action Add Add new record
     *
     */
    public function actionAdd() {
        $model = new MConfigs();
        if (isset($_POST['MConfigs'])) {
            $model->attributes = $_POST['MConfigs'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('__form', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if (isset($_POST['MConfigs'])) {
            $model->attributes = $_POST['MConfigs'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('__form', array('model' => $model));
    }

    /**
     * Action Edit Update value for record
     *
     */
    public function actionEdit($id) {
        $model = $this->loadModel($id);
        if (isset($_POST['MConfigs']['value'])) {
            $model->attributes = $_POST['MConfigs'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('edit', array('model' => $model));
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

    protected function loadModel($id) {
        $model = MConfigs::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không thấy tùy chọn này');
        }
        return $model;
    }

}
