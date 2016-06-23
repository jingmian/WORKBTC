<?php

class UsersController extends AdminController {

    public function actionIndex() {
        $models = Yii::app()->db->createCommand('select * from `' . MUser::model()->tableName() . '` where 1 order by `id` asc')->queryAll();

        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $model = new MUser();
        $roles = Yii::app()->authManager->getRoles();
        if (isset($_POST['MUser'])) {
            $model->attributes = $_POST['MUser'];
            if ($model->validate()) {
                if ($model->save()) {
                    Yii::app()->user->setFlash('info', 'Thêm mới thành viên thành công.');
                    $this->redirect(array('site/mess'));
                }
            }
        }
        $this->render('__form', array('model' => $model, 'roles' => $roles));
    }

    public function actionChangePass() {
        $model = new ChangePasswordForm();
        if (isset($_POST['ChangePasswordForm'])) {
            $model->attributes = $_POST['ChangePasswordForm'];
            if ($model->validate()) {
                if ($model->save(false)) {
                    Yii::app()->user->logout();
                    $this->redirect(Yii::app()->homeUrl);
                }
            }
        }
        $this->render('__formChangePass', array('model' => $model));
    }

}
