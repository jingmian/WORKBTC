<?php

class NewPostsCate extends CWidget {

    private $models = array();

    public function init() {
        $this->models = Yii::app()->db->createCommand('select * from `' . MNewsCats::model()->tableName() . '` where `status` = 1 and `homepage`=1 order by `id` ')->queryAll();
    }

    public function run() {
        if ($this->models) {
            foreach ($this->models as $key => $val) {
                $link = Yii::app()->createUrl('/news/' . $val['slug']);
                $name = $val['name_' . Yii::app()->language];
                $des = $val['des_' . Yii::app()->language];
                ?>
                <img class="img-responsive margin-bottom-10" src="<?= $val['image']; ?>" alt="<?php echo $name; ?>" style="width: 100%">

                <?php
            }
        }
    }

}
?>