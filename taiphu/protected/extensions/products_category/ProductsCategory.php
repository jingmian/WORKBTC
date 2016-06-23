<?php

class ProductsCategory extends CWidget {

    private $models = array();

    public function init() {
        $this->models = Yii::app()->db->createCommand('select * from `' . MModels::model()->tableName() . '` where `status` = 1 and `homepage`=1 order by `id` ')->queryAll();
    }

    public function run() {
        if ($this->models) {
            foreach ($this->models as $key => $val) {
                $link = Yii::app()->createUrl('/san-pham/' . $val['slug']);
                $name = $val['name_' . Yii::app()->language];
                $des = $val['des_' . Yii::app()->language];
                ?>
                <div class="featured_collection__item item_1 wow">
                    <a class="featured_collection__img" href="<?php echo $link; ?>" title="<?php echo $name; ?>">
                        <img src="<?= $val['image']; ?>" alt="<?php echo $name; ?>" />
                        <span><?php echo $name; ?></span>
                    </a>
                </div>
                <?php
            }
        }
    }

}
?>