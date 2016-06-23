<?php

/**
 * This is the model class for table "{{customer_wishlist}}".
 *
 * The followings are the available columns in table '{{customer_wishlist}}':
 * @property integer $customer_id
 * @property integer $product_id
 * @property string $date_added
 */
class MWishlist extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{customer_wishlist}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('customer_id,product_id', 'required'),
            array('product_id, customer_id', 'numerical', 'integerOnly' => true),
            array('date_added', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('date_added,customer_id,product_id', 'safe', 'on' => 'search'),
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
            'product_id' => 'Products ID',
            'customer_id' => 'Customer ID',
            'date_added' => 'Created Date',
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

        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('date_added', $this->date_added, true);
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

    public function addWishlist($product_id) {
        Yii::app()->db->createCommand("DELETE FROM `" . MWishlist::model()->tableName() . "` WHERE `customer_id` = '" . (int) $this->customer->getId() . "' AND `product_id` = '" . (int) $product_id . "'");
        Yii::app()->db->createCommand("INSERT INTO `" . MWishlist::model()->tableName() . "` SET `customer_id` = '" . (int) $this->customer->getId() . "', `product_id` = '" . (int) $product_id . "', date_added = NOW()");
    }

    public function deleteWishlist($product_id) {
        Yii::app()->db->createCommand("DELETE FROM `" . MWishlist::model()->tableName() . "` WHERE `customer_id` = '" . (int) $this->customer->getId() . "' AND `product_id` = '" . (int) $product_id . "'");
    }

    public function getWishlist() {
        $query = Yii::app()->db->createCommand("SELECT * FROM `" . MWishlist::model()->tableName() . "` WHERE `customer_id` = '" . (int) $this->customer->getId() . "'")->queryAll();
        return $query;
    }

    public function getTotalWishlist() {
        $query = Yii::app()->db->createCommand("SELECT COUNT(*) AS total FROM `" . MWishlist::model()->tableName() . "` WHERE `customer_id` = '" . (int) $this->customer->getId() . "'")->queryRow();
        return $query['total'];
    }

}
