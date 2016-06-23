<?php

/**
 * This is the model class for table "{{configs}}".
 *
 * The followings are the available columns in table '{{configs}}':
 * @property integer $id
 * @property string $name
 * @property string $key
 * @property string $value
 * @property string $type
 * @property string $language
 * @property integer $hidden
 */
class MConfigs extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{configs}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, key, type', 'required'),
            array('hidden', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            array('key, type', 'length', 'max' => 32),
            array('key', 'unique'),
            array('language', 'length', 'max' => 5),
            array('value', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, key, value, type, language, hidden', 'safe', 'on' => 'search'),
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
            'name' => 'Tên',
            'key' => 'Từ khóa',
            'value' => 'Giá trị',
            'type' => 'Loại',
            'language' => 'Ngôn ngữ',
            'hidden' => 'Tình trạng',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('key', $this->key, true);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('language', $this->language, true);
        $criteria->compare('hidden', $this->hidden);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MConfigs the static model class
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
