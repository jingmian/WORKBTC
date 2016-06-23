<?php

class ProppertyController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Quản Lý Thuộc Tính';
        if (isset($_GET['s'])) {
            $models = Yii::app()->db->createCommand('select * from `' . MPropperty::model()->tableName() . '` where `name_vi` like "%' . CHtml::encode($_GET['s']) . '%" order by `id` asc')->queryAll();
        } else {
            $models = Yii::app()->db->createCommand('select * from `' . MPropperty::model()->tableName() . '` where 1 order by `id` asc')->queryAll();
        }
        $list = array();
        foreach ($models as $key => $value) {
            if (!$value['parent']) {
                $list[] = $models[$key];
                foreach ($models as $keyTwo => $valueTwo) {
                    if ($valueTwo['parent'] == $value['id']) {
                        $models[$keyTwo]['name_vi'] = '---' . $models[$keyTwo]['name_vi'];
                        $models[$keyTwo]['name_en'] = '---' . $models[$keyTwo]['name_en'];
                        $list[] = $models[$keyTwo];
                    }
                }
            }
        }
        $this->render('index', array('models' => $list));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm Thuộc Tính';
        $model = new MPropperty;
        if (isset($_POST['MPropperty'])) {
            $model->attributes = $_POST['MPropperty'];
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
        $this->pageHeader = 'Cập nhật Thuộc Tính : "' . $model->name_vi . '"';
        if (isset($_POST['MPropperty'])) {
            $model->attributes = $_POST['MPropperty'];
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
            $this->loadModel($id)->delete();
            if (MOptions::model()->count('children_id=:children_id', array(':children_id' => $model->id))) {
                throw new CHttpException(200, 'Không thể xóa mục này vì có chứa mục con');
            } else {
                $model->delete();
                $this->redirect(array('index'));
            }
        else:
            throw new CHttpException(404, 'Không tìm thấy bài viết này');
        endif;
    }

    public function loadModel($id) {
        $model = MPropperty::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

}
