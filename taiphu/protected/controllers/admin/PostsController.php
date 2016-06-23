<?php

class PostsController extends AdminController {

    public $limit = 12;

    public function actionIndex() {
        $this->pageHeader = 'Danh sách Nội Dung';
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $this->limit . ',' . $this->limit;
        if (isset($_GET['s'])) {
            $models = Yii::app()->db->createCommand('select * from `' . MPosts::model()->tableName() . '` where `name` like "%' . CHtml::encode($_GET['s']) . '%" order by `id` desc limit ' . $offset)->queryAll();
            $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MPosts::model()->tableName() . '` where `name` like "%' . CHtml::encode($_GET['s']) . '%" ')->queryScalar();
        } else {
            $models = Yii::app()->db->createCommand('select * from `' . MPosts::model()->tableName() . '` where 1 order by `id` desc limit ' . $offset)->queryAll();
            $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MPosts::model()->tableName() . '` where 1 ')->queryScalar();
        }
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm mới';
        $model = new MPosts;
        if (isset($_POST['MPosts'])) {
            $model->attributes = $_POST['MPosts'];
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
        $this->pageHeader = 'Cập nhật : "' . $model->name_vi . '"';
        if (isset($_POST['MPosts'])) {
            $model->attributes = $_POST['MPosts'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('form', array('model' => $model));
    }

    public function actionDelete() {
        if (isset($_POST['ID'])):
            $id = $_POST['ID'];
            $modelMenu = MMenus::model()->find('type = "MPosts" and targetId =  "' . $id . '"');
            if ($modelMenu) {
                MMenus::model()->deleteByPk($modelMenu->id);
            }
            $this->loadModel($id)->delete();
            $this->redirect(array('index'));
        else:
            throw new CHttpException(404, 'Không tìm thấy bài viết này');
        endif;
    }

    public function actionDeleteBatch() {
        if (isset($_POST['ID'])):
            $arr = $_POST['ID'];
            foreach ($arr as $id) {
                $modelMenu = MMenus::model()->find('type = "MPosts" and targetId =  "' . $id . '"');
                if ($modelMenu) {
                    MMenus::model()->deleteByPk($modelMenu->id);
                }
                $this->loadModel($id)->delete();
            }
            $this->redirect(array('index'));
        else:
            throw new CHttpException(404, 'Không tìm thấy bài viết này');
        endif;
    }

    public function loadModel($id) {
        $model = MPosts::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

}
