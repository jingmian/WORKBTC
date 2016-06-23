<?php

class SlideshowCatsController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Danh mục';
        if (isset($_GET['s'])) {
            $models = Yii::app()->db->createCommand('select * from `' . MSlideshowCats::model()->tableName() . '` where `name` like "%' . CHtml::encode($_GET['s']) . '%" order by `id` asc')->queryAll();
        } else {
            $models = Yii::app()->db->createCommand('select * from `' . MSlideshowCats::model()->tableName() . '` where 1 order by `id` asc')->queryAll();
        }
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm danh mục';
        $model = new MSlideshowCats;
        if (isset($_POST['MSlideshowCats'])) {
            $model->attributes = $_POST['MSlideshowCats'];
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
        if (isset($_POST['MSlideshowCats'])) {
            $model->attributes = $_POST['MSlideshowCats'];
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
            $modelChildren = MSlideshow::model()->findAll('parent=:parent', array(':parent' => $id));
            if ($modelChildren) {
                foreach ($modelChildren as $child) :
                    MSlideshow::model()->deleteByPk($child->id);
                endforeach;
                $this->loadModel($id)->delete();
                $this->redirect(array('index'));
            } else {
                $this->loadModel($id)->delete();
                $this->redirect(array('index'));
            }
        }
    }

    public function actionDeleteBatch() {
        if (isset($_POST['ID'])) {
            $arr = $_POST['ID'];
            foreach ($arr as $id) {
                $modelChildren = MSlideshow::model()->findAll('parent=:parent', array(':parent' => $id));
                if ($modelChildren) {
                    foreach ($modelChildren as $child) :
                        MSlideshow::model()->deleteByPk($child->id);
                    endforeach;
                    $this->loadModel($id)->delete();
                } else {
                    $this->loadModel($id)->delete();
                }
            }
            $this->redirect(array('index'));
        }
    }

    public function loadModel($id) {
        $model = MSlideshowCats::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

}
