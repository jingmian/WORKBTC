<?php

class EDoitac extends CWidget {

    private $doitac = array();

    public function init() {
        $this->doitac = Yii::app()->db->createCommand('select * from `' . MDoitac::model()->tableName() . '` where `homepage` = 1 order by `order` ASC')->queryAll();
    }

    public function run() {
        
    }

}
?>