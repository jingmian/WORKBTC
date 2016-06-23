<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $last_session
 * @property string $created_date
 * @property string $updated_date
 */
class MUser extends CActiveRecord {

    public $repeatPassword;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, email, password', 'required'),
            array('username', 'length', 'max' => 32),
            array('email, last_session', 'length', 'max' => 128),
            array('username', 'match', 'pattern' => '/^[a-z0-9]+$/'),
            array('email', 'email'),
            array('username, email', 'filter', 'filter' => 'strtolower'),
            array('password', 'length', 'min' => 6, 'max' => 250),
            array('repeatPassword', 'compare', 'compareAttribute' => 'password'),
            array('username, email', 'unique'),
            array('created_date, updated_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, email, password, last_session, created_date, updated_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'username' => 'Tài khoản',
            'email' => 'Hộp thư',
            'password' => 'Mật khẩu',
            'repeatPassword' => 'Xác nhận mật khẩu',
            'last_session' => 'Chuổi mã đăng nhập',
            'created_date' => 'Ngày tạo',
            'updated_date' => 'Ngày sửa',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);

        $criteria->compare('username', $this->username, true);

        $criteria->compare('email', $this->email, true);

        $criteria->compare('password', $this->password, true);

        $criteria->compare('last_session', $this->last_session, true);

        $criteria->compare('created_date', $this->created_date, true);

        $criteria->compare('updated_date', $this->updated_date, true);

        return new CActiveDataProvider('MUser', array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * @return MUser the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
//		$this->password = md5($this->password);
                $this->password = $this->hashPassword($this->password);
                $this->created_date = date('Y-m-d h:i:s', time());
            } else {
                $this->updated_date = date('Y-m-d h:i:s', time());
            }
        }
        return true;
    }

    public function verifyPassword($password) {
        return CPasswordHelper::verifyPassword($password, $this->password);
//      return (md5($password) == $this->password) ? (true):FALSE;
    }

    public function hashPassword($password) {
        return CPasswordHelper::hashPassword($password);
    }

}
