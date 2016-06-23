<?php

class EDoitac extends CWidget {

    private $doitac = array();

    public function init() {
        $this->doitac = Yii::app()->db->createCommand('select * from `' . MDoitac::model()->tableName() . '` where `homepage` = 1 order by `order` ASC')->queryAll();
    }

    public function run() {
        if ($this->doitac) {
            $stt = 0;
            foreach ($this->doitac as $keyV => $valueV) {
                $stt++;
                $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
                ?>
                <!-- BEGIN BRANDS -->
                <a href="" title="<?= $name; ?>">
                    <img src="<?= $valueV['image']; ?>" alt="<?= $name; ?>" title="<?= $name; ?>" class="img-reponsive" style="max-width: 100%;margin-bottom: 5px"/>
                </a>
                <!-- END BRANDS -->
                <?php
            }
        }
    }

}
?>