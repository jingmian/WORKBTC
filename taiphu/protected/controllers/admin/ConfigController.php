<?php

class ConfigController extends AdminController {

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

    protected function loadModel($id) {
        $model = MConfig::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy');
        }
        return $model;
    }

}
