<?php

class ApplyController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Feedback';
        $models = Yii::app()->db->createCommand('select * from `' . MApply::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
        $this->render('index', array('models' => $models));
    }

    public function actionUpdate($id) {

        $model = $this->loadModel($id);
        $this->pageHeader = 'Cập nhật nội dung bài viết: "' . $model->name . '"';
        if (isset($_POST['MApply'])) {
            $model->attributes = $_POST['MApply'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('__form', array('model' => $model));
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();
        $this->redirect(array('index'));
    }

    protected function loadModel($id) {
        $model = MApply::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy ');
        }
        return $model;
    }

}
