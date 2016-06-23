<?php

/**
 * This is the model class for table "{{config}}".
 *
 * The followings are the available columns in table '{{config}}':
 * @property integer $ID
 * @property string $name_vi
 * @property string $name_en
 * @property string $phone
 * @property string $address_vi
 * @property string $address_en
 * @property string $email
 * @property string $fax
 * @property string $website
 * @property string $map
 * @property string $seo_title
 * @property string $seo_keyworld
 * @property string $deso_description
 * @property string $banner
 * @property integer $lang
 * @property integer $responsive
 * @property string $google
 */
class MConfig extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{config}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name_vi', 'required'),
            array('lang', 'numerical', 'integerOnly' => true),
            array('name_vi,name_en', 'length', 'min' => 6, 'max' => 255),
            array('ID, name_vi, name_en, address_vi, address_en,lang,responsive, banner,map, seo_title, seo_description, seo_keyworld, google, fax,email,website,phone', 'safe'),
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
            'name_vi' => 'Tên website',
            'name_en' => 'Tên website EN',
            'address_vi' => 'Địa Chỉ',
            'address_en' => 'Địa Chỉ EN',
            'phone' => 'Điện Thoại',
            'fax' => 'Fanpage',
            'email' => 'Email',
            'website' => 'Website',
            'banner' => 'Banner',
            'google' => 'Google Analytics',
            'map' => 'Tọa độ Bản Đồ',
            'seo_title' => 'Meta Title',
            'seo_keyword' => 'Meta Keyword',
            'seo_description' => 'Meta Description',
            'lang' => 'Ngôn Ngữ',
            'responsive' => 'Mobile',
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

        $criteria->compare('ID', $this->ID);
        $criteria->compare('name_vi', $this->name_vi, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('address_vi', $this->address_vi, true);
        $criteria->compare('address_en', $this->address_en, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('email', $this->email);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('banner', $this->banner, true);
        $criteria->compare('seo_title', $this->seo_title, true);
        $criteria->compare('sep_description', $this->sep_description, true);
        $criteria->compare('seo_keyword', $this->seo_keyword, true);
        $criteria->compare('google', $this->google, true);
        $criteria->compare('map', $this->map, true);
        $criteria->compare('lang', $this->lang, true);
        $criteria->compare('responsive', $this->responsive, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MPages the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getAllConfig() {
        if (!Yii::app()->cache->get('config')) {
            Yii::app()->cache->set('config', CHtml::listData($this->findAll(), 'key', 'value'));
        }
        return Yii::app()->cache->get('config');
    }

}
