<?php

/**
 * This is the model class for table "{{slideshow}}".
 *
 * The followings are the available columns in table '{{slideshow}}':
 * @property integer $id
 * @property integer $parent
 * @property string $name_vi
 * @property string $slug
 * @property string $name_en
 * @property string $content_vi
 * @property string $content_en
 * @property string $image
 * @property string $thumbnail
 * @property integer $homepage
 * @property integer $order
 * @property string $created_date
 * @property string $update_date
 * @property string $link
 */
class MSlideshow extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{slideshow}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name_vi,slug', 'required'),
            array('homepage, order,parent', 'numerical', 'integerOnly' => true),
            array('name_vi, name_en,slug', 'length', 'max' => 255),
            array('image,thumbnail, created_date, update_date,content_vi,content_en,link', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id,parent,link, name_vi,slug, name_en,content_vi,content_en,image,thumbnail, homepage, order, created_date, update_date', 'safe', 'on' => 'search'),
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
            'parent' => 'Danh Mục Cha',
            'name_vi' => 'Tên Vi',
            'name_en' => 'Tên En',
            'image' => 'Image',
            'thumbnail' => 'Thumbnail',
            'homepage' => 'Homepage',
            'order' => 'Order',
            'created_date' => 'Created Date',
            'update_date' => 'Update Date',
            'link' => 'Đường Dẫn',
            'slug' => 'Dạng liên kết',
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
        $criteria->compare('parent', $this->parent);
        $criteria->compare('name_vi', $this->name_vi, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('thumbnail', $this->thumbnail, true);
        $criteria->compare('homepage', $this->homepage);
        $criteria->compare('order', $this->order);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('update_date', $this->update_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MSlideshow the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
