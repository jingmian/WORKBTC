<?php

/**
 * AdminController is the custommed base Controller class
 * All controller for admin application should be extend from this base AdminController
 */
class AdminController extends Controller {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/main',
     */
    public $layout = '//layouts/main';

    /**
     * @var string the header content for the controller view
     */
    public $pageHeader = '';

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            $this->pageHeader = Yii::app()->name;
            $this->metaTitle = $this->pageHeader;
            $screen = array('site_login', 'site_error');
            if (Yii::app()->user->isGuest) {
                if (!in_array($this->screen, $screen)) {
                    if ($this->screen == 'site_error') {
                        
                    } else {
                        $this->redirect(Yii::app()->createUrl('site/login'));
                    }
                }
            } else {
                $user = User::model()->findByPk(Yii::app()->user->getId());
                if (!$user->lastvisit_at || ($user->lastvisit_at == Yii::app()->session->getSessionId())) {
                    $user->lastvisit_at = Yii::app()->session->getSessionId();
                    $user->save(false);
                    Yii::app()->cache->flush();
                } else {
//                    Yii::app()->user->logout();
//                    $this->redirect(array('site/login'));
                }
            }
        }
        return true;
    }

}

?>