<?php

class RegisterController extends Controller {

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
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            $this->title = $this->config['sitename_' . Yii::app()->language];
            $this->description = $this->config['sitedes_' . Yii::app()->language];
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

    public function actionRegister() {
        $this->render('register');
    }

    public function actionSave() {
        if (isset($_POST['birthday'])) {
            $birthday = $_POST['birthday'];
        }
        if (isset($_POST['car_category'])) {
            $car_category = $_POST['car_category'];
        }
        if (isset($_POST['city_id'])) {
            $city_id = $_POST['city_id'];
        }
        if (isset($_POST['consultant'])) {
            $consultant = $_POST['consultant'];
        }
        if (isset($_POST['dealer_id'])) {
            $dealer_id = $_POST['dealer_id'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (isset($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        }
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        }
        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
        }
        if ($birthday && $car_category && $city_id && $consultant && $dealer_id && $email && $fullname && $gender && $phone):
            $register = new MRegister();
            $register->category_id = $car_category;
            $register->fullname = $fullname;
            $register->phone = $phone;
            $register->email = $email;
            $register->birthday = $birthday;
            $register->gender = $gender;
            $register->city = $city_id;
            $register->deal = $dealer_id;
            $register->hinhthuc = $consultant;
            if ($register->validate()):
                $register->save();
            endif;
        endif;
    }

}
