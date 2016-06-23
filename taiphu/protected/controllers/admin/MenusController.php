<?php

class MenusController extends AdminController {

    public function actionIndex($group = null) {
        $this->pageHeader = 'Quản lý danh sách menu';
        $models = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `group` = "' . CHtml::encode($group) . '" and `parent` = 0 order by `sort` asc')->queryAll();
        $list = array();
        foreach ($models as $keyM => $valueM) {
            $list[] = $valueM;
            $childs = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `group` = "' . CHtml::encode($group) . '" and `parent` = ' . $valueM['id'] . ' order by `sort` asc')->queryAll();
            foreach ($childs as $keyC => $valueC) {
                $childs[$keyC]['sep'] = '---';
                $list[] = $childs[$keyC];
                $subChilds = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `group` = "' . CHtml::encode($group) . '" and `parent` = ' . $valueC['id'] . ' order by `sort` asc')->queryAll();
                foreach ($subChilds as $keyS => $valueS) {
                    $subChilds[$keyS]['sep'] = '   |-----';
                    $list[] = $subChilds[$keyS];
                }
            }
        }
        $this->render('index', array('models' => $list));
    }

    public function actionAdd($group) {
        $this->pageHeader = 'Thêm mới menu';
        $model = new MMenus();
        $model->group = CHtml::encode($group);
        if (isset($_POST['MMenus'])) {
            $model->attributes = $_POST['MMenus'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect($this->createUrl('index', array('group' => $group)));
                }
            }
        }
        $this->render('form', array('model' => $model, 'group' => $group));
    }

    public function actionChangeType($type) {
        if (Yii::app()->request->isAjaxRequest) {
            $models = $this->getTypeList($type);
            if ($models == "MProductsTop"):
                echo '<option value=' . "9999" . '>' . 'THỰC ĐƠN' . '</option>';
//            if ($models == "MProducts"):
//                echo '<option value=' . "9999" . '>' . 'THỰC ĐƠN' . '</option>';
//                echo '<option value=' . "9999" . '>' . 'SẢN PHẨM' . '</option>';
            elseif ($models == 'contact') :
                echo '<option value=' . "99999" . '>' . 'LIÊN HỆ' . '</option>';
            elseif ($models == 'videos') :
                echo '<option value=' . "9999999" . '>' . 'VIDEOS' . '</option>';
            elseif ($models == 'gallery') :
                echo '<option value=' . "99999999" . '>' . 'GALLERY' . '</option>';
            elseif ($models == 'map') :
                echo '<option value=' . "1111" . '>' . 'BẢN ĐỒ' . '</option>';
            elseif ($models == 'recruitment') :
                echo '<option value=' . "2222" . '>' . 'TUYỂN DỤNG' . '</option>';
            elseif ($models == 'price') :
                echo '<option value=' . "1234" . '>' . 'BẢNG GIÁ' . '</option>';
            elseif ($models == 'home') :
                echo '<option value=' . "999999" . '>' . 'TRANG CHỦ' . '</option>';
            else:
                foreach ((array) $models as $keyModel => $valueModel) {
                    echo '<option value=' . $valueModel['id'] . '>' . CHtml::encode($valueModel['name_vi']) . '</option>';
                }
            endif;
        }
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $listModels = $this->getTypeList($model->type);
        if (isset($_POST['MMenus'])) {
            $model->attributes = $_POST['MMenus'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect($this->createUrl('index', array('group' => $model->group)));
                }
            }
        }
        $this->render('form', array('model' => $model, 'group' => $model['group'], 'listModels' => $listModels));
    }

    public function actionUpdateSort($id) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $model->sort = (intval($_GET['data']) < 0) ? 0 : intval($_GET['data']);
            $model->save(false);
        }
    }

    public function actionDelete($id, $g) {
        $this->loadModel($id)->delete();
        $this->redirect($this->createUrl('index', array('group' => $g)));
    }

    public function loadModel($id) {
        $model = MMenus::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

    public function getTypeList($type) {
        switch ($type) {
            case 'MPages':
                $models = Yii::app()->db->createCommand('select `id`, `name_vi` from `' . MPages::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
                break;
            case 'MNewsCats':
                $models = Yii::app()->db->createCommand('select `id`, `name_vi` from `' . MNewsCats::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
                break;
            case 'MModels':
                $models = Yii::app()->db->createCommand('select `id`, `name_vi` from `' . MModels::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
                break;
            case 'MNews':
                $models = Yii::app()->db->createCommand('select `id`, `name_vi` from `' . MNews::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
                break;
            case 'MProductsTop':
                $models = "MProductsTop";
//                $models = Yii::app()->db->createCommand('select `id`, `name_vi` from `' . MProducts::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
                break;
            case 'MProducts':
//                $models = "MProducts";
                $models = Yii::app()->db->createCommand('select `id`, `name_vi` from `' . MProducts::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
                break;
            case 'contact':
                $models = "contact";
//                $models = Yii::app()->db->createCommand('select `id`, `name_vi` from `' . MProducts::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
                break;
            case 'videos':
                $models = "videos";
                break;
            case 'recruitment':
                $models = "recruitment";
//                $models = Yii::app()->db->createCommand('select `id`, `name_vi` from `' . MProducts::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
                break;
            case 'price':
                $models = "price";
//                $models = Yii::app()->db->createCommand('select `id`, `name_vi` from `' . MProducts::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
                break;
            case 'map':
                $models = "map";
                break;
            case 'gallery':
                $models = "gallery";
                break;
            case 'home':
                $models = "home";
//                $models = Yii::app()->db->createCommand('select `id`, `name_vi` from `' . MProducts::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
                break;
            default:
                $models = NULL;
                break;
        }
        return $models;
    }

}
