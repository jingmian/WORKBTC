<?php

/**
 * 
 */
class ChangePasswordForm extends CFormModel {

    public $oldPassword;
    public $newPassword;
    public $repeatPassword;

    public function rules() {
        return array(
            array('oldPassword, newPassword, repeatPassword', 'required'),
            array('oldPassword, newPassword, repeatPassword', 'length', 'min' => 6, 'max' => 32),
            array('oldPassword', 'checkOldPassword'),
            array('repeatPassword', 'compare', 'compareAttribute' => 'newPassword'),
        );
    }

    public function attributeLabels() {
        return array(
            'oldPassword' => 'Mật khẩu hiện tại',
            'newPassword' => 'Mật khẩu mới',
            'repeatPassword' => 'Xác nhận mật khẩu',
        );
    }

    public function checkOldPassword($attributes, $param) {
        $user = User::model()->findByPk(Yii::app()->user->getId());
        if ($user) {
            if ($user->verifyPassword($this->$attributes)) {
                return true;
            } else {
                $this->addError($attributes, 'Mật khẩu hiện tại không chính xác.');
                return false;
            }
        } else {
            $this->addError($attributes, 'Không tồn tại user này.');
            return false;
        }
        return false;
    }

    public function save($validate = true) {
        $user = User::model()->findByPk(Yii::app()->user->getId());
        $user->password = md5($this->newPassword);
//        $user->password = $user->hashPassword($this->newPassword);
        return $user->save($validate);
    }

}

?>