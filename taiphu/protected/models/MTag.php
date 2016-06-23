<?php

/**
 * This is the model class for table "{{tag}}".
 *
 * The followings are the available columns in table '{{tag}}':
 * @property integer $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $slug
 */
class MTag extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tag}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name_vi, slug', 'required'),
            array('name_vi, slug', 'length', 'min' => 6, 'max' => 255),
            array('slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'),
            array('slug', 'unique'),
            array('name_en,name_vi', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name_vi,name_en, slug', 'safe', 'on' => 'search'),
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
            'name_vi' => 'Tag',
            'name_en' => 'Tag EN',
            'slug' => 'Liên kết',
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
        $criteria->compare('name_vi', $this->name_vi, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('slug', $this->slug, true);

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

}
