<?php

/**
 * This is the model class for table "{{pages}}".
 *
 * The followings are the available columns in table '{{pages}}':
 * @property integer $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $slug
 * @property string $des_vi
 * @property string $des_en
 * @property string $content_vi
 * @property string $content_en
 * @property integer $status
 * @property string $image
 * @property string $icon
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $created_date
 * @property string $updated_date
 */
class MPages extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{pages}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name_vi, slug', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('name_vi, slug', 'length', 'min' => 6, 'max' => 255),
            array('slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'),
            array('slug', 'unique'),
            array('title', 'length', 'max' => 70),
            array('description', 'length', 'max' => 170),
            array('des_vi, des_en, content_vi, content_en, name_en, image,icon, keyword, created_date, updated_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name_vi, slug, des, content, status, image,icon, title, description, keyword, created_date, updated_date', 'safe', 'on' => 'search'),
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
            'name_vi' => 'Tên bài viết',
            'name_en' => 'Tên bài viết',
            'slug' => 'Liên kết',
            'des' => 'Mô tả chung',
            'content_vi' => 'Nội dung bài viết',
            'content_en' => 'Nội dung bài viết',
            'status' => 'Tình trạng',
            'image' => 'Hình ảnh',
            'icon' => 'Icon',
            'title' => 'Meta Title',
            'description' => 'Meta Description',
            'keyword' => 'Meta Keyword',
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
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('des', $this->des, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('icon', $this->icon, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('keyword', $this->keyword, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('updated_date', $this->updated_date, true);

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

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->created_date = date('Y-m-d h:i:s', time());
            } else {
                $this->updated_date = date('Y-m-d h:i:s', time());
            }
        }
        return true;
    }

}
