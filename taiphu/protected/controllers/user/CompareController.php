<?php

class CompareController extends Controller {

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            
        }
        if (Yii::app()->session['lang']) {
            $this->changeLanguage(Yii::app()->session['lang']);
        } else {
            if (isset($_GET['lg'])) {
                $this->changeLanguage($_GET['lg']);
            }
        }
        return true;
    }

    public function actionChangeLanguage($lg) {
        $this->changeLanguage($lg);
        if (!Yii::app()->request->isAjaxRequest) {
            $this->redirect(Yii::app()->createUrl('site/index', array('lg' => $lg)));
        }
    }

    public function changeLanguage($lg) {
        if (in_array($lg, array('vi', 'en'))) {
            $this->language = $lg;
            Yii::app()->language = $lg;
            Yii::app()->session['lang'] = $lg;
        } else {
            $this->changeLanguage('vi');
        }
    }

    public function actionIndex() {
        $session = Yii::app()->session;
        if (isset($_GET['remove'])) {
            $myval = $session['compare'];
            $myval[] = Yii::app()->session['compare'];
            $session['compare'] = $myval;
            $key = array_search($_GET['remove'], $session['compare']);
            if ($key !== false) {
                unset($session['compare'][$key]);
            }
            $this->redirect('/compare/index/');
        }
        if (isset(Yii::app()->session['success'])) {
            $data['success'] = Yii::app()->session['success'];
            unset(Yii::app()->session['success']);
        } else {
            $data['success'] = '';
        }

        $this->render('index', array('data' => Yii::app()->session['compare']));
    }

    public function actionAdd() {
        $json = array();
        $session = Yii::app()->session;
        if (isset($_POST['product_id'])) {
            $product_id = $_POST['product_id'];
            $myval = $session['compare'];
            $myval[] = $product_id;
            $session['compare'] = $myval;
        } else {
            $product_id = 0;
            $myval = $session['compare'];
            $myval[] = $product_id;
            $session['compare'] = $myval;
        }
        $product_info = $this->findModel($product_id);
        if ($product_info) {
            if (!in_array($_POST['product_id'], $session['compare'])) {
                if (count($session['compare']) >= 4) {
                    array_shift($session['compare']);
                }
                $session['compare'] = $_POST['product_id'];
            }
            $linkProduct = Yii::app()->createUrl('/san-pham/' . $product_info['slug']);
            $linkCompare = Yii::app()->createUrl('/compare/index/');
            $json['success'] = array($this->config['text_success'], "<a href='" . $linkProduct . "'>" . $product_info['name_' . Yii::app()->language] . "</a>", "to your", "<a href='" . $linkCompare . "'>" . "Products Comparison" . "</a>");
            $json['total'] = array($this->config['text_compare'], (isset(Yii::app()->session['compare']) ? count(Yii::app()->session['compare']) : 0));
        }

        header('Content-type: application/json');
        echo CJSON::encode($json);
    }

    protected function findModel($id) {
        $criteria = new CDbCriteria;
        $criteria->condition = 'id = "' . $id . '"';
        $model = MProducts::model()->find($criteria);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

}
