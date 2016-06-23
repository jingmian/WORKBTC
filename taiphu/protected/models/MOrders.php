<?php

/**
 * This is the model class for table "{{orders}}".
 *
 * The followings are the available columns in table '{{orders}}':
 * @property integer $id
 * @property integer $order_ID
 * @property integer $productId
 * @property string $productName
 * @property integer $number
 * @property integer $custommerId
 * @property integer $check
 * @property string $date_time
 * @property string $update_time
 */
class MOrders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{orders}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('productId, productName, number, custommerId', 'required'),
			array('order_ID, productId, number, custommerId, check', 'numerical', 'integerOnly'=>true),
			array('productName', 'length', 'max'=>255),
			array('date_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_ID, productId, productName, number, custommerId, check, date_time, update_time', 'safe', 'on'=>'search'),
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
			'order_ID' => 'Order',
			'productId' => 'Product',
			'productName' => 'Product Name',
			'number' => 'Number',
			'custommerId' => 'Custommer',
			'check' => 'Check',
			'date_time' => 'Date Time',
			'update_time' => 'Update Time',
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
		$criteria->compare('order_ID',$this->order_ID);
		$criteria->compare('productId',$this->productId);
		$criteria->compare('productName',$this->productName,true);
		$criteria->compare('number',$this->number);
		$criteria->compare('custommerId',$this->custommerId);
		$criteria->compare('check',$this->check);
		$criteria->compare('date_time',$this->date_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MOrders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
