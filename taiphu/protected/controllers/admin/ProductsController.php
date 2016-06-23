<?php

class ProductsController extends AdminController {

    public $limit = 12;

    public function actionIndex() {
        $this->pageHeader = 'Danh sách Sản Phẩm';
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $this->limit . ',' . $this->limit;
        if (isset($_GET['s'])) {
            $models = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `name_vi` like "%' . CHtml::encode($_GET['s']) . '%" order by `number` ASC limit ' . $offset)->queryAll();
            $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MProducts::model()->tableName() . '` where `name_vi` like "%' . CHtml::encode($_GET['s']) . '%" ')->queryScalar();
        } else {
            $models = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where 1 order by `number` ASC limit ' . $offset)->queryAll();
            $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MProducts::model()->tableName() . '` where 1 ')->queryScalar();
        }
        $pages = new CPagination($count);
        $pages->setPageSize($this->limit);
        $this->render('index', array('models' => $models, 'pages' => $pages));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm mới';
        $model = new MProducts;
        if (isset($_POST['MProducts'])) {
            $model->attributes = $_POST['MProducts'];
            if ($model->validate()) {
                if ($model->save()) {
                    $lastID = $model->id;
                    if (isset($_POST['Moptions'])) {
                        foreach ($_POST['Moptions'] as $key => $items) :
                            $option = new MOptions();
                            $option->product_id = $lastID;
                            $option->children_id = $key;
                            $option->val = $items;
                            $option->save();
                        endforeach;
                        $this->redirect(array('index'));
                    }
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('form', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelOptions = $this->loadModelOption($id);
        $this->pageHeader = 'Cập nhật: "' . $model->name_vi . '"';
        if (isset($_POST['MProducts'])) {
            $model->attributes = $_POST['MProducts'];
            if ($model->validate()) {
                if ($model->save()) {
                    if (isset($_POST['Moptions'])) {
                        MOptions::model()->deleteAll("product_id = '" . $id . "'");
                        foreach ($_POST['Moptions'] as $key => $items) :
                            $option = new MOptions();
                            $option->product_id = $id;
                            $option->children_id = $key;
                            $option->val = $items;
                            $option->save();
                        endforeach;
                        $this->redirect(array('index'));
                    }
                }
            }
        }
        $this->render('form', array('model' => $model, 'modelOptions' => $modelOptions, 'id' => $id));
    }

    public function actionDelete() {
        if (isset($_POST['ID'])) {
            $id = $_POST['ID'];
            $model = $this->loadModel($id);
            $modelChildren = MOptions::model()->findAll('product_id=:product_id', array(':product_id' => $id));
            if ($modelChildren) {
                foreach ($modelChildren as $child) :
                    MOptions::model()->deleteByPk($child->id);
                endforeach;
                $modelMenu = MMenus::model()->find('type = "MProducts" and targetId =  "' . $id . '"');
                if ($modelMenu) {
                    MMenus::model()->deleteByPk($modelMenu->id);
                }
                $this->loadModel($id)->delete();
                $this->redirect(array('index'));
            } else {
                $modelMenu = MMenus::model()->find('type = "MProducts" and targetId =  "' . $id . '"');
                if ($modelMenu) {
                    MMenus::model()->deleteByPk($modelMenu->id);
                }
                $this->loadModel($id)->delete();
                $this->redirect(array('index'));
            }
        }
    }

    public function actionDeleteBatch() {
        if (isset($_POST['ID'])) {
            $arr = $_POST['ID'];
            foreach ($arr as $id) :
                $model = $this->loadModel($id);
                $modelChildren = MOptions::model()->findAll('product_id=:product_id', array(':product_id' => $id));
                if ($modelChildren) {
                    foreach ($modelChildren as $child) :
                        MOptions::model()->deleteByPk($child->id);
                    endforeach;
                    $modelMenu = MMenus::model()->find('type = "MProducts" and targetId =  "' . $id . '"');
                    if ($modelMenu) {
                        MMenus::model()->deleteByPk($modelMenu->id);
                    }
                    $this->loadModel($id)->delete();
                } else {
                    $modelMenu = MMenus::model()->find('type = "MProducts" and targetId =  "' . $id . '"');
                    if ($modelMenu) {
                        MMenus::model()->deleteByPk($modelMenu->id);
                    }
                    $this->loadModel($id)->delete();
                }
            endforeach;
            $this->redirect(array('index'));
        }
    }

    public function loadModel($id) {
        $model = MProducts::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

    public function loadModelOption($id) {
        $model = Yii::app()->db->createCommand('select * from `' . MOptions::model()->tableName() . '` where `product_id` = "' . $id . '"  order by `id` ASC ')->queryAll();
        if (!$model) {
            return FALSE;
        }
        return $model;
    }

    public function getAllListCategories() {
        $list = Yii::app()->db->createCommand('select a.*, b.`name_vi` as `group` from `' . MCategories::model()->tableName() . '` a, `' . MCategories::model()->tableName() . '` b where a.parent = b.id')->queryAll();
        return $list;
    }

    public function actionUpdateFeature() {
        $id = $_POST['id'];
        $model = MProducts::model()->findByPk($id);
        if ($model->feature == 0) {
            $model->feature = 1;
            $model->save(); // save the change to database
        } else if ($model->feature == 1) {
            $model->feature = 0;
            $model->save(); // save the change to database
        }
    }

    public function actionUpdateNew() {
        $id = $_POST['id'];
        $model = MProducts::model()->findByPk($id);
        if ($model->new == 0) {
            $model->new = 1;
            $model->save(); // save the change to database
        } else if ($model->new == 1) {
            $model->new = 0;
            $model->save(); // save the change to database
        }
    }

    public function actionUpdateBestSeller() {
        $id = $_POST['id'];
        $model = MProducts::model()->findByPk($id);
        if ($model->bestseller == 0) {
            $model->bestseller = 1;
            $model->save(); // save the change to database
        } else if ($model->bestseller == 1) {
            $model->bestseller = 0;
            $model->save(); // save the change to database
        }
    }

    public function actionUpdateSpecial() {
        $id = $_POST['id'];
        $model = MProducts::model()->findByPk($id);
        if ($model->special == 0) {
            $model->special = 1;
            $model->save(); // save the change to database
        } else if ($model->special == 1) {
            $model->special = 0;
            $model->save(); // save the change to database
        }
    }

    public function actionUpdateRating() {
        $id = $_POST['id'];
        $model = MProducts::model()->findByPk($id);
        if ($model->rating == 0) {
            $model->rating = 1;
            $model->save(); // save the change to database
        } else if ($model->rating == 1) {
            $model->rating = 0;
            $model->save(); // save the change to database
        }
    }

    public function actionUpdateViewed() {
        $id = $_POST['id'];
        $model = MProducts::model()->findByPk($id);
        if ($model->viewed == 0) {
            $model->viewed = 1;
            $model->save(); // save the change to database
        } else if ($model->viewed == 1) {
            $model->viewed = 0;
            $model->save(); // save the change to database
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

    public function actionLoadcities() {
        $data = MPosts::model()->findAll('parent=:parent', array(':parent' => (int) $_POST['country_id']));
        $data = CHtml::listData($data, 'id', 'name_vi');
        echo "<option value=''>Chọn Quận/Huyện</option>";
        foreach ($data as $value => $city_name)
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($city_name), true);
    }

}
