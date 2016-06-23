<?php

class PagesController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Danh sách bài viết';
        $models = Yii::app()->db->createCommand('select * from `' . MPages::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm mới bài viết';
        $model = new MPages();
        if (isset($_POST['MPages'])) {
            $model->attributes = $_POST['MPages'];
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
        $this->pageHeader = 'Cập nhật nội dung bài viết: "' . $model->name_vi . '"';
        if (isset($_POST['MPages'])) {
            $model->attributes = $_POST['MPages'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('__form', array('model' => $model));
    }

    public function actionDelete() {
        if (isset($_POST['ID'])):
            $id = $_POST['ID'];
            $modelMenu = MMenus::model()->find('type = "MPages" and targetId =  "' . $id . '"');
            if ($modelMenu):
                MMenus::model()->deleteByPk($modelMenu->id);
            endif;
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
                $modelMenu = MMenus::model()->find('type = "MPages" and targetId =  "' . $id . '"');
                if ($modelMenu):
                    MMenus::model()->deleteByPk($modelMenu->id);
                endif;
                $this->loadModel($id)->delete();
            }
            $this->redirect(array('index'));
        else:
            throw new CHttpException(404, 'Không tìm thấy bài viết này');
        endif;
    }

    protected function loadModel($id) {
        $model = MPages::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy bài viết này');
        }
        return $model;
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

    public function actionSetHomePage($id, $data) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $model->homepage = intval($data) == 1 ? 1 : 0;
            $model->save(false);
        } else {
            $this->redirect(array('index'));
        }
    }

}
