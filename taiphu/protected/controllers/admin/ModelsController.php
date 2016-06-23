<?php

class ModelsController extends AdminController {
    
 public $limit = 30;
    
    public function actionIndex() {
        $this->pageHeader = 'Quản Lý Danh Mục';
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $this->limit . ',' . $this->limit;
        if (isset($_GET['s'])) {
            $models = Yii::app()->db->createCommand('select * from `' . MModels::model()->tableName() . '` where `name_vi` like "%' . CHtml::encode($_GET['s']) . '%" order by `number` asc limit ' . $offset)->queryAll();
//            $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MModels::model()->tableName() . '` where `name_vi` like "%' . CHtml::encode($_GET['s']) . '%" ')->queryScalar();
        } else {
            $models = Yii::app()->db->createCommand('select * from `' . MModels::model()->tableName() . '` where 1 order by `number` asc limit ' . $offset)->queryAll();
//            $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MModels::model()->tableName() . '` where 1 ')->queryScalar();
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

//        $this->render('index', array('models' => $list));
        $count = count($list);
        $pages = new CPagination($count);
        $pages->setPageSize($this->limit);
        $this->render('index', array('models' => $list, 'pages' => $pages));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm Danh Mục';
        $model = new MModels;
        if (isset($_POST['MModels'])) {
            $model->attributes = $_POST['MModels'];
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
        $this->pageHeader = 'Cập nhật Danh Mục: "' . $model->name_vi . '"';
        if (isset($_POST['MModels'])) {
            $model->attributes = $_POST['MModels'];
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
            $modelChildren = MProducts::model()->findAll('parent=:parent', array(':parent' => $id));
            $modelColor = MColor::model()->findAll('product_id=:product_id', array(':product_id' => $id));
            if ($modelChildren) {
                foreach ($modelChildren as $child) {
                    $options = MOptions::model()->findAll('product_id=:product_id', array(':product_id' => $child->id));
                    if ($options) {
                        foreach ($options as $option) {
                            MOptions::model()->deleteByPk($option->id);
                        }
                    }
                    MProducts::model()->deleteByPk($child->id);
                }
                $this->loadModel($id)->delete();
                $modelMenu = MMenus::model()->find('type = "MModels" and targetId =  "' . $id . '"');
                MMenus::model()->deleteByPk($modelMenu->id);
                $this->redirect(array('index'));
            }
            if ($modelColor) {
                foreach ($modelColor as $color) {
                    $colors = MColor::model()->findAll('product_id=:product_id', array(':product_id' => $color->id));
                    if ($colors) {
                        foreach ($colors as $color) {
                            MColor::model()->deleteByPk($color->id);
                        }
                    }
                    MProducts::model()->deleteByPk($child->id);
                }

                $modelMenu = MMenus::model()->find('type = "MModels" and targetId =  "' . $id . '"');
                MMenus::model()->deleteByPk($modelMenu->id);
                $this->loadModel($id)->delete();
                $this->redirect(array('index'));
            } else {
                $this->loadModel($id)->delete();
                $modelMenu = MMenus::model()->find('type = "MModels" and targetId =  "' . $id . '"');
                MMenus::model()->deleteByPk($modelMenu->id);
                $this->redirect(array('index'));
            }
        }
    }

    public function loadModel($id) {
        $model = MModels::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
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
