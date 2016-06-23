<?php

class FeatureController extends AdminController {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionUpdate() {
        $id = 1;
        $model = $this->loadModel($id);
        $this->pageHeader = 'Cập nhật nội dung cấu hình website "';
        if (isset($_POST['MConfig'])) {
            $model->attributes = $_POST['MConfig'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('update'));
                }
            }
        }
        $this->render('__form', array('model' => $model));
    }

    public function actionSetHomePage($id, $data) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $model->status = intval($data) == 1 ? 1 : 0;
            $model->save(false);
        } else {
            $this->redirect(array('index'));
        }
    }

    protected function loadModel($id) {
        $model = MFeature::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy');
        }
        return $model;
    }

}
