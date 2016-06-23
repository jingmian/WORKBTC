<?php

/**
 * This is the model class for table "{{products}}".
 *
 * The followings are the available columns in table '{{products}}':
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $slug
 * @property string $des
 * @property string $content
 * @property integer $status
 * @property string $image
 * @property string $thumbnail
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $created_date
 * @property string $updated_date
 * @property integer $feature
 * @property integer $bestseller
 * @property integer $new
 * @property integer $viewed
 * @property integer $rating
 * @property integer $special
 * @property integer $price
 * @property integer $price_promotion
 * @property integer $number
 * @property integer $country_id
 * @property integer $province_id
 * @property string $dientich
 * @property string $tag
 */
class MProducts extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{products}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(' name_vi,parent,slug, price', 'required'),
//            array('parent, status', 'numerical', 'integerOnly' => true),
            array('parent, status,bestseller,new,feature,viewed,special,rating,number,province_id,country_id', 'numerical', 'integerOnly' => true),
            array('name_vi, slug', 'length', 'min' => 6, 'max' => 255),
            array('title', 'length', 'max' => 70),
            array('slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'),
            array('slug', 'unique'),
            array('description', 'length', 'max' => 170),
            array('des_vi,dientich,province_id,tag,country_id, des_en, name_en, content_vi, content_en, image,thumbnail, keyword, created_date, updated_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent,dientich,tag,name,province_id,country_id, slug, des,number ,content, status, image, title, description, keyword, created_date,feature,viewed,rating,special,bestseller,new, updated_date', 'safe', 'on' => 'search'),
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
            'tag' => 'Tag',
            'name_en' => 'Tên bài viết',
            'slug' => 'Dạng liên kết',
            'des_vi' => 'Mô tả ngắn',
            'des_en' => 'Mô tả ngắn',
            'content_vi' => 'Nội dung',
            'content_en' => 'Nội dung',
            'status' => 'Tình trạng',
            'image' => 'Hình ảnh',
            'thumbnail' => 'Thumbnail',
            'title' => 'Seo Title',
            'description' => 'Seo Description',
            'keyword' => 'Keyworld',
            'created_date' => 'Ngày tạo',
            'updated_date' => 'Ngày cập nhật',
            'feature' => 'Nổi Bật',
            'viewed' => 'Top xem nhiều',
            'rating' => 'Top đánh giá',
            'special' => 'Độc đáo',
            'new' => 'Mới',
            'bestseller' => 'Bán Chạy',
            'number' => 'Thứ Tự',
            'country_id' => 'Tĩnh/Thành Phố',
            'province_id' => 'Quận/Huyện',
            'dientich' => 'Diện Tích',
            'price' => 'Giá Gốc',
            'price_promotion' => 'Giá Khuyến Mãi',
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
        $criteria->compare('new', $this->new, true);
        $criteria->compare('bestseller', $this->bestseller, true);
        $criteria->compare('number', $this->number, true);
        $criteria->compare('country_id', $this->country_id, true);
        $criteria->compare('province_id', $this->province_id, true);
        $criteria->compare('dientich', $this->dientich, true);
        $criteria->compare('tag', $this->tag, true);

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
            $this->price = intval(preg_replace('/[.,\,]/', '', $this->price));
            $this->price_promotion = intval(preg_replace('/[.,\,]/', '', $this->price_promotion));
        }
        return true;
    }

    protected function afterFind() {
        parent::afterFind();
        $this->price = number_format($this->price);
        $this->price_promotion = number_format($this->price_promotion);
    }

    public function behaviors() {
        return array(
            'commentable' => array(
                'class' => 'ext.comment-module.behaviors.CommentableBehavior',
                // name of the table created in last step
                'mapTable' => 'posts_comments_nm',
                // name of column to related model id in mapTable
                'mapRelatedColumn' => 'postId'
            ),
        );
    }

    public static function getOrganizationsFromSubcategories($category) {
        $childCategoriesIds = MModels::getChildCategoriesIds($category);
        $criteria = new CDbCriteria();
        $criteria->addInCondition('parent', $childCategoriesIds);
        $result = self::model()->findAll($criteria);
        return $result;
    }

    public function getProduct($id) {
        $model = $this->findByPk($id);
        return $model;
    }

}
