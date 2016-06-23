<?php

class SiteController extends Controller {

    public $limit = 16;
    public $limitPost = 16;

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
//        $myfile = Yii::app()->file->set('F:/xampp/htdocs/dogohuythinh/files/test2.txt', true);
//        var_dump($myfile);  // You may dump object to see all its properties,
//        echo $myfile->size;  // or get property,
//        $myfile->permissions = 755;  // or set property,
//        print_r($myfile->contents);
//        print_r($myfile->getContents(false, 'php'));
//        var_dump($mynewfile);
//        $mynewfile = $myfile->copy('test2.txt');  // or manipulate file somehow, e.g. copy.
//        $models = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `status` = 1 and `new` = 1 order by number ASC ')->queryAll();
//        $promotion = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `status` = 1 and `bestseller` = 1 order by number ASC ')->queryAll();
//        $gaushop = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `status` = 1 and `feature` = 1 order by number ASC ')->queryAll();

        $criteria = new CDbCriteria;
        $criteria->condition = 'status =1 and feature = 1';
        $criteria->order = "number ASC";
        $count = MProducts::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = $this->limitPost;
        $pages->applyLimit($criteria);
        $models = MProducts::model()->findAll($criteria);


//        if (!$this->is_mobile) {
       $this->render('index', array('models' => $models, 'pages' => $pages));
//        } else {
//            $this->render('index_mobile', array('models' => $models, 'promotion' => $promotion, 'gaushop' => $gaushop));
//        }
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionEmailLetter() {
        if (isset($_POST['newsLetter'])):
            $email = $_POST['newsLetter'];
            $emails = Yii::app()->db->createCommand('select * from `' . MRegister::model()->tableName() . '` where email = "' . $email . '" order by `id` desc ')->queryRow();
            if ($emails):
                echo 0;
            else :
                $model = new MRegister();
                $model->email = $email;
                $model->hinhthuc = 1;
                $model->save();
                echo 1;
            endif;
        endif;
    }

}
