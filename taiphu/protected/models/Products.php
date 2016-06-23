<?php

/**
 * This is the model class for table "{{products}}".
 *
 * The followings are the available columns in table '{{products}}':
 * @property integer $id
 * @property integer $parent
 * @property string $name_vi
 * @property string $name_en
 * @property string $slug
 * @property string $des_vi
 * @property string $des_en
 * @property string $content_vi
 * @property string $content_en
 * @property integer $status
 * @property string $image
 * @property string $title
 * @property integer $price
 * @property string $description
 * @property string $keyword
 * @property string $created_date
 * @property string $updated_date
 * @property integer $feature
 */
class Products extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{products}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent, name_vi, slug', 'required'),
			array('parent, status, price, feature', 'numerical', 'integerOnly'=>true),
			array('name_vi, name_en, slug', 'length', 'max'=>255),
			array('title', 'length', 'max'=>70),
			array('description', 'length', 'max'=>170),
			array('des_vi, des_en, content_vi, content_en, image, keyword, created_date, updated_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent, name_vi, name_en, slug, des_vi, des_en, content_vi, content_en, status, image, title, price, description, keyword, created_date, updated_date, feature', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent' => 'Parent',
			'name_vi' => 'Name Vi',
			'name_en' => 'Name En',
			'slug' => 'Slug',
			'des_vi' => 'Des Vi',
			'des_en' => 'Des En',
			'content_vi' => 'Content Vi',
			'content_en' => 'Content En',
			'status' => 'Status',
			'image' => 'Image',
			'title' => 'Title',
			'price' => 'Price',
			'description' => 'Description',
			'keyword' => 'Keyword',
			'created_date' => 'Created Date',
			'updated_date' => 'Updated Date',
			'feature' => 'Feature',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('name_vi',$this->name_vi,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('des_vi',$this->des_vi,true);
		$criteria->compare('des_en',$this->des_en,true);
		$criteria->compare('content_vi',$this->content_vi,true);
		$criteria->compare('content_en',$this->content_en,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('updated_date',$this->updated_date,true);
		$criteria->compare('feature',$this->feature);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
