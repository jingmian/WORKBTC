<?php

/**
 * This is the model class for table "{{models}}".
 *
 * The followings are the available columns in table '{{models}}':
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $slug
 * @property string $des
 * @property string $content
 * @property integer $status
 * @property string $image
 * @property string $logo
 * @property string $thumbnail
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $created_date
 * @property string $updated_date
 * @property integer $number
 * @property integer $homepage
 */
class MModels extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{models}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name_vi, slug', 'required'),
            array('parent, status,number', 'numerical', 'integerOnly' => true),
            array('name_vi, slug', 'length', 'max' => 255),
            array('title', 'length', 'max' => 70),
            array('slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'),
            array('slug', 'unique'),
            array('description', 'length', 'max' => 170),
            array('des_vi, des_en,homepage,content_vi, content_en, name_en, image,logo,thumbnail, keyword, created_date, updated_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent,homepage,name, slug, des,number, content, status, image,logo,thumbnail, title, description, keyword, created_date, updated_date', 'safe', 'on' => 'search'),
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
            'parent' => 'Thuộc về',
            'name_vi' => 'Tên',
            'name_en' => 'Tên',
            'slug' => 'Dạng liên kết',
            'des_vi' => 'Mô tả',
            'des_en' => 'Mô tả',
            'content' => 'Nội dung',
            'status' => 'Tình trạng',
            'image' => 'Hình ảnh',
            'logo' => 'Logo',
            'thumbnail' => 'Thumbnail',
            'title' => 'Seo Title',
            'description' => 'Seo Description',
            'keyword' => 'Keyworld',
            'created_date' => 'Ngày tạo',
            'updated_date' => 'Ngày cập nhật',
            'number' => 'Thứ Tự',
            'homepage' => 'Ngoài Trang Chủ',
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
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('thumbnail', $this->thumbnail, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('keyword', $this->keyword, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('updated_date', $this->updated_date, true);
        $criteria->compare('number', $this->number, true);
        $criteria->compare('homepage', $this->homepage, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MPostCats the static model class
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

    public function getAllParent() {
        return $this->findAll('status=:status', array(':status' => 1));
//        return $this->findAll('parent=:parent', array(':parent' => 0));
    }

    public function getCategoryName($id) {
        $model = $this->findByPk($id);
        return $model ? CHtml::encode($model->name_vi) : 'n/a';
    }

    public function get_category_products($cat_id) {
        $arrCate = array();
        if ($getParent = $this->findAll('parent=' . $cat_id)) {
            if ($getParent):
                foreach ($getParent as $cateParent) :
                    array_push($arrCate, $cateParent->id);
                    if ($getChildren = $this->findAll('parent=' . $cateParent->id)) {
                        if ($getChildren):
                            foreach ($getChildren as $cateChildren) :
                                array_push($arrCate, $cateChildren->id);
                            endforeach;
                        endif;
                    }
                endforeach;
            endif;
        }
        return $arrCate;
    }

}
