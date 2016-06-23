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
                <div class="client-item">
                    <a href="#">
                        <img src="<?= $valueV['image']; ?>" alt="<?= $name; ?>" title="<?= $name; ?>" class="img-reponsive" />
                        <img src="<?= $valueV['image']; ?>" alt="<?= $name; ?>" title="<?= $name; ?>" class="color-img img-responsive" />
                    </a>
                </div>
                <!-- END BRANDS -->
                <?php
            }
        }
    }

}
?>