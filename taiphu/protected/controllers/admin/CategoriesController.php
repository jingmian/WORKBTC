<?php

class CategoriesController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Quản Lý options';
        if (isset($_GET['s'])) {
            $models = Yii::app()->db->createCommand('select * from `' . MCategories::model()->tableName() . '` where `name_vi` like "%' . CHtml::encode($_GET['s']) . '%" order by `number` asc')->queryAll();
        } else {
            $models = Yii::app()->db->createCommand('select * from `' . MCategories::model()->tableName() . '` where 1 order by `number` asc')->queryAll();
        }
        $list = array();
        foreach ($models as $key => $value) {
            if (!$value['parent']) {
                $list[] = $models[$key];
                foreach ($models as $keyTwo => $valueTwo) {
                    if ($valueTwo['parent'] == $value['id']) {
                        $models[$keyTwo]['name_vi'] = ' --- ' . $models[$keyTwo]['name_vi'];
                        $list[] = $models[$keyTwo];
                        foreach ($models as $keyThree => $valueThree) {
                            if ($valueThree['parent'] == $valueTwo['id']) {
                                $models[$keyThree]['name_vi'] = '     ------ ' . $models[$keyThree]['name_vi'];
                                $list[] = $models[$keyThree];
                            }
                        }
                    }
                }
            }
        }

        $this->render('index', array('models' => $list));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm options';
        $model = new MCategories;
        if (isset($_POST['MCategories'])) {
            $model->attributes = $_POST['MCategories'];
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
        $this->pageHeader = 'Cập nhật options : "' . $model->name_vi . '"';
        if (isset($_POST['MCategories'])) {
            $model->attributes = $_POST['MCategories'];
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
            $model = $this->loadModel($id);
            if ($model->parent == 0) {
                $modelChildren = MCategories::model()->findAll('parent=:parent', array(':parent' => $id));
                foreach ($modelChildren as $child) :
                    if ($option = MOptions::model()->find('children_id=:children_id', array(':children_id' => $child->id))) {
                        MOptions::model()->deleteByPk($option->id);
                    }
                endforeach;
                $this->loadModel($id)->delete();
                $this->redirect(array('index'));
            } else {
                $option = MOptions::model()->find('children_id=:children_id', array(':children_id' => $id));
                if ($option) {
                    MOptions::model()->deleteByPk($option->id);
                    $this->loadModel($id)->delete();
                    $this->redirect(array('index'));
                } else {
                    $this->loadModel($id)->delete();
                    $this->redirect(array('index'));
                }
            }
        }
    }

    public function actionDeleteBatch() {
        if (isset($_POST['ID'])) {
            $arr = $_POST['ID'];
            foreach ($arr as $id) {
                $model = $this->loadModel($id);
                if ($model->parent == 0) {
                    $modelChildren = MCategories::model()->findAll('parent=:parent', array(':parent' => $id));
                    foreach ($modelChildren as $child) :
                        if ($option = MOptions::model()->find('children_id=:children_id', array(':children_id' => $child->id))) {
                            MOptions::model()->deleteByPk($option->id);
                        }
                    endforeach;
                    $this->loadModel($id)->delete();
                } else {
                    $option = MOptions::model()->find('children_id=:children_id', array(':children_id' => $id));
                    if ($option) {
                        MOptions::model()->deleteByPk($option->id);
                        $this->loadModel($id)->delete();
                    } else {
                        $this->loadModel($id)->delete();
                    }
                }
            }

            $this->redirect(array('index'));
        }
    }

    public function actionSetHomePage($id, $data) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $model->active = intval($data) == 0 ? 0 : 1;
            $model->save(false);
        } else {
            $this->redirect(array('index'));
        }
    }

    public function actionSetOrder($id, $data) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $model->number = intval($data);
            $model->save(false);
        } else {
            $this->redirect(array('index'));
        }
    }

    public function loadModel($id) {
        $model = MCategories::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

}
