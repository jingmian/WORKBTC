<?php

/**
 * This is the model class for table "{{register}}".
 *
 * The followings are the available columns in table '{{register}}':
 * @property integer $id
 * @property string $category_id
 * @property string $fullname
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property integer $gender
 * @property integer $city
 * @property string $deal
 * @property integer $hinhthuc
 */
class MRegister extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{register}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('gender, city, hinhthuc', 'numerical', 'integerOnly' => true),
            array('fullname,address, phone, email,deal,category_id', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, category_id, fullname, phone, email, address, gender, city, deal, hinhthuc', 'safe', 'on' => 'search'),
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
            'id' => 'ID',
            'category_id' => 'Category',
            'fullname' => 'Fullname',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'address',
            'gender' => 'Gender',
            'city' => 'City',
            'deal' => 'Deal',
            'hinhthuc' => 'Hinhthuc',
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
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('fullname', $this->fullname, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('address', $this->address);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('city', $this->city);
        $criteria->compare('deal', $this->deal);
        $criteria->compare('hinhthuc', $this->hinhthuc);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MRegister the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
