<?php

class OrderController extends AdminController {

    public $limit = 12;

    public function actionIndex() {
        $this->pageHeader = 'Quản lý đơn hàng';
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $limit = ($page - 1) * $this->limit . ',' . $this->limit;
        $models = Yii::app()->db->createCommand('select a.* from `' . MCustomer::model()->tableName() . '` a where 1 order by a.`id` desc limit ' . $limit)->queryAll();
        $count = Yii::app()->db->createCommand('select COUNT(a.`id`) as `count` from `' . MCustomer::model()->tableName() . '` a where 1')->queryScalar();
        $pages = new CPagination($count);
        $pages->setPageSize($this->limit);
        $this->render('index', array('models' => $models, 'pages' => $pages));
    }

    public function actionShowOrder($id) {
        $model = $this->loadCustommer($id);
        $this->pageHeader = 'Đơn hàng của khách hàng: ' . $model->name;
        $models = Yii::app()->db->createCommand('select * from `' . MOrders::model()->tableName() . '` where `custommerId` = ' . intval($id) . ' order by `id` desc ')->queryAll();
        $this->render('order', array('models' => $models, 'model' => $model));
    }

    public function loadCustommer($id) {
        $model = MCustomer::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy khách hàng');
        }
        return $model;
    }

    public function actionChangeStatus($id, $data) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = MOrders::model()->findByPk($id);
            if ($model) {
                $model->check = intval($data) == 1 ? 1 : 0;
                $model->update('check');
            }
        }
    }

    public function actionSetHomePage($id, $data) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $model->check = intval($data) == 1 ? 1 : 0;
            $model->save(false);
        } else {
            $this->redirect(array('index'));
        }
    }

    public function actionDelete() {
        if (isset($_POST['ID'])):
            $id = $_POST['ID'];
            $models = Yii::app()->db->createCommand('select * from `' . MOrders::model()->tableName() . '` where `custommerId` = ' . $id . ' order by `id` desc ')->queryAll();
            foreach ($models as $model) {
                $this->loadModelOrders($model['id'])->delete();
            }
            $model = Yii::app()->db->createCommand('select * from `' . Order::model()->tableName() . '` where `customer_ID` = ' . $id . ' order by `ID` desc ')->queryRow();
            $this->loadModelOrder($model['ID'])->delete();
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
                $models = Yii::app()->db->createCommand('select * from `' . MOrders::model()->tableName() . '` where `custommerId` = ' . $id . ' order by `id` desc ')->queryAll();
                foreach ($models as $model) {
                    $this->loadModelOrders($model['id'])->delete();
                }
                $model = Yii::app()->db->createCommand('select * from `' . Order::model()->tableName() . '` where `customer_ID` = ' . $id . ' order by `ID` desc ')->queryRow();
                $this->loadModelOrder($model['ID'])->delete();
                $this->loadModel($id)->delete();
            }
            $this->redirect(array('index'));
        else:
            throw new CHttpException(404, 'Không tìm thấy bài viết này');
        endif;
    }

    public function loadModel($id) {
        $model = MCustomer::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy slideshow');
        }
        return $model;
    }

    public function loadModelOrder($id) {
        $model = Order::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy slideshow');
        }
        return $model;
    }

    public function loadModelOrders($id) {
        $model = MOrders::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy slideshow');
        }
        return $model;
    }

}
