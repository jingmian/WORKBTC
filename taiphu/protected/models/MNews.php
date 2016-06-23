<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $slug
 * @property string $des
 * @property string $content
 * @property integer $status
 * @property string $image
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $created_date
 * @property string $updated_date
 * @property integer $feature
 */
class MNews extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{news}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parent, name_vi, slug', 'required'),
            array('parent, status,feature', 'numerical', 'integerOnly' => true),
            array('name_vi, slug', 'length', 'min' => 6, 'max' => 255),
            array('title', 'length', 'max' => 70),
            array('slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'),
            array('slug', 'unique'),
            array('description', 'length', 'max' => 170),
            array('des_vi, des_en, name_en, content_vi, content_en, image, keyword, created_date, updated_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent, name,feature, slug, des, content, status, image, title, description, keyword, created_date, updated_date', 'safe', 'on' => 'search'),
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
            'parent' => 'Thuộc về danh mục',
            'name_vi' => 'Tên bài viết',
            'name_en' => 'Tên bài viết',
            'slug' => 'Dạng liên kết',
            'des_vi' => 'Mô tả ngắn',
            'des_en' => 'Mô tả ngắn',
            'content_vi' => 'Nội dung',
            'content_en' => 'Nội dung',
            'status' => 'Tình trạng',
            'image' => 'Hình ảnh',
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
            'created_date' => 'Ngày tạo',
            'updated_date' => 'Ngày cập nhật',
            'feature' => 'feature',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('des', $this->des, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('keyword', $this->keyword, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('updated_date', $this->updated_date, true);
        $criteria->compare('feature', $this->feature, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MPosts the static model class
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
