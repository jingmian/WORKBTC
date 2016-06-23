<?php

class SiteController extends AdminController {
    /**
     * Declares class-based actions.
     */

    /**
     * @var string the header content for the controller view
     */
//    public $defaultAction = 'login';

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

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
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

    public function actionLogin() {
        $this->layout = '//layouts/login';
        $model = new UserLogin;
        if (isset($_POST['UserLogin'])) {
            $model->attributes = $_POST['UserLogin'];
            if ($model->validate()) {
                $this->lastViset();
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('login', array('model' => $model));
    }

    private function lastViset() {
        $lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
        $lastVisit->lastvisit = time();
        $lastVisit->save();
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionClearCache() {
        if (Yii::app()->cache->flush()) {
            $this->redirect(Yii::app()->homeUrl);
        }
    }

    public function actionMess() {
        $this->pageHeader = 'Thông báo';
        $this->title .= '- Thông báo';
        $this->render('mess');
    }

}
