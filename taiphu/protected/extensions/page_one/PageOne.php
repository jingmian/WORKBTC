<?php

class PageOne extends CWidget {

    private $models = array();

    public function init() {
        $this->models = Yii::app()->db->createCommand('select * from `' . MPages::model()->tableName() . '` where `status` = 1 and `homepage`=1 order by `id` ')->queryRow();
    }

    public function run() {
        if ($this->models) {
            $link = Yii::app()->createUrl('/bai-viet/' . $this->models['slug']);
            $name = $this->models['name_' . Yii::app()->language];
            $des = $this->models['des_' . Yii::app()->language];
            $content = $this->models['content_' . Yii::app()->language];
            ?>
            <h4 style="color: #fff;"><?php echo $name; ?></h4>
            <div class="clr" style="margin-bottom: 10px;"></div>
            <p style="text-align: justify;color: #fff;"><?php echo $des; ?></p>
            <?php
        }
    }

}
?>