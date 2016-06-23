<?php

class ContactController extends Controller {

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

    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = $model->name;
                $subject = '=?UTF-8?B?' . base64_encode("Email Liên Hệ Từ " . $model->name) . '?=';
                include 'smtpmail/library.php';
                include "smtpmail/classes/class.phpmailer.php"; // include the class name
                $mail = new PHPMailer(); // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->Username = $this->config['email'];
                $mail->Password = $this->config['password'];
                $mail->SetFrom($model->email);
                $mail->Subject = $subject;
                $mail->Body = '<table><tr><td><b>Họ Tên : </b></td><td>' . $name . '</td></tr><tr><td><b>Địa Chỉ : </b></td><td>' . $model->subject . '</td></tr><tr><td><b>Email : </b></td><td>' . $model->email . '</td></tr><tr><td><b>Nội Dung : </b></td><td>' . $model->body . '</td></tr></table>';
                $mail->AddAddress($this->config['email']);
                $mail->Send();
                Yii::app()->user->setFlash('contact', $this->config['feedbacksuccess']);
                $this->refresh();
            }
        }
//        if (!$this->is_mobile) {
            $this->render('contact', array('model' => $model));
//        } else {
//            $this->render('contact_mobile', array('model' => $model));
//        }
    }

}
