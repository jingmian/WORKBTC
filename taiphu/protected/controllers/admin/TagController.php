<?php

class TagController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Tag';
        if (isset($_GET['s'])) {
            $models = Yii::app()->db->createCommand('select * from `' . MTag::model()->tableName() . '` where `name_vi` like "%' . CHtml::encode($_GET['s']) . '%" order by `id` asc')->queryAll();
        } else {
            $models = Yii::app()->db->createCommand('select * from `' . MTag::model()->tableName() . '` where 1 order by `id` asc')->queryAll();
        }
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm Tag';
        $model = new MTag();
        if (isset($_POST['MTag'])) {
            $model->attributes = $_POST['MTag'];
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
        if (isset($_POST['MTag'])) {
            $model->attributes = $_POST['MTag'];
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
            $modelChildren = MTag::model()->findAll('parent=:parent', array(':parent' => $id));
            $this->loadModel($id)->delete();
            $this->redirect(array('index'));
        }
    }

    public function actionDeleteBatch() {
        if (isset($_POST['ID'])) {
            $arr = $_POST['ID'];
            foreach ($arr as $id) {
                $modelChildren = MTag::model()->findAll('parent=:parent', array(':parent' => $id));
                $this->loadModel($id)->delete();
            }
            $this->redirect(array('index'));
        }
    }

    public function loadModel($id) {
        $model = MTag::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

}
