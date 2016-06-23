<?php

class PriceController extends Controller {

    public $limit = 12;
    public $limitPost = 12;

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
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
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $this->limitPost . ',' . $this->limitPost;
        $models = Yii::app()->db->createCommand('select * from `' . MPostCats::model()->tableName() . '` where `status` = 1  order by `id` desc limit ' . $offset)->queryAll();
//        $models = Yii::app()->db->createCommand('select * from `' . MPosts::model()->tableName() . '` where `status` = 1  order by `id` desc limit ' . $offset)->queryAll();
        $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MPostCats::model()->tableName() . '` where `status` =  1 order by `id` desc')->queryScalar();
//        $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MPosts::model()->tableName() . '` where `status` =  1 order by `id` desc')->queryScalar();
        $pages = new CPagination($count);
        $pages->setPageSize($this->limitPost);
        $this->render('index', array('models' => $models, 'pages' => $pages));
    }

    public function actionPostCat($slug) {
        $model = $this->loadPostCat($slug);
        $this->setMeta($model);
        $this->setCanonical($this->createUrl('postcat', array('lg' => Yii::app()->language, 'slug' => $slug)));
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        $offset = ($page - 1) * $this->limitPost . ',' . $this->limitPost;
        $inCondition = $model['id'];
        if (isset($model['child']) && $model['child']) {
            $inCondition .= ',' . implode(',', $model['child']);
        }
        $models = Yii::app()->db->createCommand('select * from `' . MPosts::model()->tableName() . '` where `status` = 1 and `parent` in (' . $inCondition . ') order by `id` limit ' . $offset)->queryAll();
        $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MPosts::model()->tableName() . '` where `status` = 1 and `parent` in (' . $inCondition . ')')->queryScalar();
        $pages = new CPagination($count);
        $pages->setPageSize($this->limitPost);
        $this->render('postcat', array('model' => $model, 'models' => $models, 'pages' => $pages));
    }

    public function actionPost($slug) {
        $model = $this->loadPost($slug);
        $this->metaTitle = $model['name_vi'];
        $this->metaDescription = $model['des_vi'];
        $this->metaKeywords = $model['keyword'];
        $this->metaImages = $model['image'];
        $modelRelated = Yii::app()->db->createCommand('select * from `' . MPosts::model()->tableName() . '` where `status` = 1 and `parent` ="' . $model['parent'] . '"')->queryAll();
        $modelCats = Yii::app()->db->createCommand('select * from `' . MNewsCats::model()->tableName() . '` where `status` = 1 and `id` ="' . $model['parent'] . '"')->queryRow();
        $this->render('detail', array('model' => $model, 'modelCats' => $modelCats, 'modelRelated' => $modelRelated));
    }

    public function loadPostCat($slug) {
        $model = Yii::app()->db->createCommand('select * from `' . MNewsCats::model()->tableName() . '` where `status` = 1 and `slug` ="' . $slug . '"')->queryRow();
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        if ($model['parent'] == 0) {
            $child = Yii::app()->db->createCommand('select `id` from `' . MNewsCats::model()->tableName() . '` where `status` = 1 and `parent` = ' . intval($model['id']))->queryColumn();
            $model['child'] = $child;
        }
        return $model;
    }

    public function loadPost($slug) {
        $model = Yii::app()->db->createCommand('select * from `' . MPosts::model()->tableName() . '` where `status` = 1 and `slug` ="' . $slug . '"')->queryRow();
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}

?>