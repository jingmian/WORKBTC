<?php

/**
 * This is the model class for table "{{menus}}".
 *
 * The followings are the available columns in table '{{menus}}':
 * @property integer $id
 * @property string $group
 * @property string $type
 * @property integer $targetId
 * @property integer $parent
 */
class MMenus extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{menus}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('group, type, targetId, sort', 'required'),
            array('targetId, parent, sort', 'numerical', 'integerOnly' => true),
            array('group, type', 'length', 'max' => 32),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, group, type, targetId, parent', 'safe', 'on' => 'search'),
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
            'group' => 'Nhóm',
            'type' => 'Phân loại',
            'targetId' => 'Đối tượng',
            'parent' => 'Thuộc về',
            'sort' => 'Thứ tự'
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
        $criteria->compare('group', $this->group, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('targetId', $this->targetId);
        $criteria->compare('parent', $this->parent);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MMenus the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getGroupHierachial($group, IMenuItem $menuItem) {
        $modelLevOne = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `group` = "' . $group . '" and `parent` = 0')->queryAll();
        if ($modelLevOne) {
            $list = array();
            foreach ($modelLevOne as $keyOne => $valueOne) {
                $list [$valueOne['id']] = $menuItem->getItemName($valueOne['targetId'], $valueOne['type']);
                $modelLevTwo = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `group` = "' . $group . '" and `parent` = ' . $valueOne['id'])->queryAll();
                foreach ((array) $modelLevTwo as $keyTwo => $valueTwo) {
                    $list[$valueTwo['id']] = '---' . $menuItem->getItemName($valueTwo['targetId'], $valueTwo['type']);
                }
            }
            return $list;
        }
    }

    protected function checkGroup($name) {
        return $this->count('group=:group', array(':group' => $name)) ? true : false;
    }

}
