<?php

class ProductController extends Controller {

    public $limit = 15;
    public $limitPost = 15;

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

    public function actionViewAllProducts() {
        $criteria = new CDbCriteria;
        $criteria->condition = 'status =1 OR status=2';
        $criteria->order = "number ASC";
        $count = MProducts::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = $this->limitPost;
        $pages->applyLimit($criteria);
        $models = MProducts::model()->findAll($criteria);
//        if (!$this->is_mobile) {
        $this->render('AllProducts', array('models' => $models, 'pages' => $pages));
//        } else {
//            $this->render('AllProducts_mobile', array('models' => $models, 'pages' => $pages));
//        }
    }

    /* start section load products by cats */

    public function actionProductCategory($slug) {
        $findCategoryId = $this->findModelCategory($slug);
        if ($findCategoryId):
            $dataProducts = array();
            /* set meta tags */
            $this->title = $findCategoryId['name_' . Yii::app()->language];
            $this->metaTitle = $findCategoryId['title'];
            $this->metaKeywords = $findCategoryId['keyword'];
            $this->metaDescription = $findCategoryId['description'];
            /* end set meta tags */
            $criteria = new CDbCriteria;
            $criteria->condition = 'status =1 and parent = "' . $findCategoryId->id . '"';
            $criteria->order = "number ASC";
            $count = MProducts::model()->count($criteria);
            $pages = new CPagination($count);
            $pages->pageSize = $this->limitPost;
            $pages->applyLimit($criteria);
            $models = MProducts::model()->findAll($criteria);
            if ($models) {
//                if (!$this->is_mobile) {
                $this->render('category', array('models' => $models, 'model' => $findCategoryId, 'pages' => $pages));
//                } else {
//                    $this->render('category_mobile', array('models' => $models, 'model' => $findCategoryId, 'pages' => $pages));
//                }
            } else {
                $modelCategory = MModels::model()->get_category_products($findCategoryId->id);
                if ($modelCategory):
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'status =1';
                    $criteria->addInCondition('parent', $modelCategory);
                    $criteria->order = "number ASC";
                    $count = MProducts::model()->count($criteria);
                    $pages = new CPagination($count);
                    $pages->pageSize = $this->limitPost;
                    $pages->applyLimit($criteria);
                    $models = MProducts::model()->findAll($criteria);
                endif;
//                if (!$this->is_mobile) {
                $this->render('category', array('models' => $models, 'model' => $findCategoryId, 'pages' => $pages));
//                } else {
//                    $this->render('category_mobile', array('models' => $models, 'model' => $findCategoryId, 'pages' => $pages));
//                }
            }
        else:
            throw new NotFoundHttpException('Content Not Found');
        endif;
    }

    public function actionTag($slug) {
        $model = $this->findModels($slug);
        /* set meta tags */
        $this->title = $model['name_' . Yii::app()->language];
        $this->metaTitle = $model['title'];
        $this->metaKeywords = $model['keyword'];
        $this->metaDescription = $model['description'];
        /* end set meta tags */
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $this->limitPost . ',' . $this->limitPost;
        $query = "SELECT * FROM `" . MProducts::model()->tableName() . "` WHERE status = 1 ";
        if (isset($slug) && !empty($slug)) {
            $keyworld = $model['id'];
            $query.= " AND tag = '" . $keyworld . "%'";
        }
        $query.= " order by id limit $offset";
        $query1 = "SELECT COUNT(`id`) as `count` FROM `" . MProducts::model()->tableName() . "` WHERE status = 1 ";
        if (isset($slug) && !empty($slug)) {
            $keyworld = $model['id'];
            $query1.= " AND tag = '" . $keyworld . "%'";
        }
        $query1.= " order by id ASC";
        $models = Yii::app()->db->createCommand($query)->queryAll();
        if ($models):
            $count = Yii::app()->db->createCommand($query1)->queryScalar();
            $pages = new CPagination($count);
            $pages->setPageSize($this->limitPost);
            $this->render('tag', array('models' => $models, 'pages' => $pages));
        else:
            throw new NotFoundHttpException('Content Not Found');
        endif;
    }

    public function actionSearch() {
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $this->limitPost . ',' . $this->limitPost;
        $query = "SELECT * FROM `" . MProducts::model()->tableName() . "` WHERE status = 1 ";
        if (isset($_GET['keyworld']) && !empty($_GET['keyworld'])) {
            $keyworld = $_GET['keyworld'];
            $query.= " AND name_vi like '%" . $keyworld . "%'";
        }
        if (isset($_GET['model-category']) && !empty($_GET['model-category'])) {
            $models = $_GET['model-category'];
            $query.= " AND parent = '" . $models . "'";
        }
        $query.= " order by id limit $offset";

        $query1 = "SELECT COUNT(`id`) as `count` FROM `" . MProducts::model()->tableName() . "` WHERE status = 1 ";
        if (isset($_GET['keyworld']) && !empty($_GET['keyworld'])) {
            $keyworld = $_GET['keyworld'];
            $query1.= " AND name_vi like '%" . $keyworld . "%'";
        }
        if (isset($_GET['model-category']) && !empty($_GET['model-category'])) {
            $models = $_GET['model-category'];
            $query1.= " AND parent = '" . $models . "'";
        }
        $query1.= " order by id ASC";

        $models = Yii::app()->db->createCommand($query)->queryAll();
        if ($models):
            $count = Yii::app()->db->createCommand($query1)->queryScalar();
            $pages = new CPagination($count);
            $pages->setPageSize($this->limitPost);
            $this->render('search', array('models' => $models, 'pages' => $pages, 'keyworld' => $_GET['keyworld']));
        else:
            throw new NotFoundHttpException('Content Not Found');
        endif;
    }

    public function actionViewProduct($slug) {
        $models = $this->findModel($slug);
        if ($models):
            /* set meta tags */
            $this->title = $models['name_' . Yii::app()->language];
            $this->metaTitle = $models['title'];
            $this->metaKeywords = $models['keyword'];
            $this->metaDescription = $models['description'];
            /* end set meta tags */
            $modelCategory = Yii::app()->db->createCommand('select * from `' . MModels::model()->tableName() . '` where `status` = 1 and `id` = "' . $models['parent'] . '"')->queryRow();
            $this->title = $models['name_' . Yii::app()->language];
            $this->metaTitle = $models['name_vi'];
            $this->metaDescription = $models['des_vi'];
            $this->metaKeywords = $models['keyword'];
            $this->metaImages = $models['image'];
            $productSame = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `status` = 1 and `parent` = "' . $models['parent'] . '"')->queryAll();
//            if (!$this->is_mobile) {
            $this->render('detail', array('models' => $models, 'productSame' => $productSame, 'modelCategory' => $modelCategory));
//            } else {
//                $this->render('detail_mobile', array('models' => $models, 'productSame' => $productSame, 'modelCategory' => $modelCategory));
//            }

        else:
            throw new NotFoundHttpException('Content Not Found');
        endif;
    }

    public function actionLoadMore() {
        $slug = $_POST['slug'];
        $limit = 4;
        $model = Yii::app()->db->createCommand('select * from `' . MModels::model()->tableName() . '` where `status` = 1 and `slug` = "' . CHtml::encode($slug) . '"')->queryRow();
        $inCondition = $model['id'];
        if (isset($model['child']) && $model['child']) {
            $inCondition .= ',' . implode(',', $model['child']);
        }
        if (isset($_POST['page'])):
            $page = $_POST['page'];
            $offset = ($page - 1) * $this->limitPost . ',' . $this->limitPost;
            $models = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `status` = 1 and `parent` in (' . $inCondition . ') order by `id` limit ' . $offset)->queryAll();
            $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MProducts::model()->tableName() . '` where `status` = 1 and `parent` in (' . $inCondition . ') ')->queryScalar();
        endif;
        $this->renderPartial('_loadmore', array('models' => $models, 'model' => $model, 'page' => $page, 'limitPost' => $limit, 'slug' => $slug, 'count' => $count));
    }

    public function actionLoadMoreAllProducts() {
        $limit = 4;
        if (isset($_POST['page'])):
            $page = $_POST['page'];
            $offset = ($page - 1) * $this->limitPost . ',' . $this->limitPost;
            $models = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `status` = 1  order by `number` ASC limit ' . $offset)->queryAll();
            $count = Yii::app()->db->createCommand('select COUNT(`id`) as `count` from `' . MProducts::model()->tableName() . '` where `status` = 1 ')->queryScalar();
        endif;
        $this->renderPartial('_loadmoreproducts', array('models' => $models, 'page' => $page, 'limitPost' => $limit, 'count' => $count));
    }

    public function actionAjax() {
        $RATING = 0;
        if (isset($_POST['star_rating'])) {
            $RATING = $_POST['star_rating'];
        }
        echo "Your rating is " . $RATING;
    }

    protected function findModel($slug) {
        $criteria = new CDbCriteria;
        $criteria->condition = 'slug = "' . $slug . '"';
        $model = MProducts::model()->find($criteria);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

    protected function findModelCategory($slug) {
        $criteria = new CDbCriteria;
        $criteria->condition = 'status =1 and slug = "' . $slug . '"';
        $model = MModels::model()->find($criteria);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

    protected function findModels($slug) {
        $criteria = new CDbCriteria;
        $criteria->condition = 'slug = "' . $slug . '"';
        $model = MTag::model()->find($criteria);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

}

?>