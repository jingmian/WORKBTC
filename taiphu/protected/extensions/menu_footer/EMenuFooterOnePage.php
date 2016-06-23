<?php

class EMenuFooterOnePage extends CWidget {

    private $menuFooter = array();

    public function init() {
        $this->menuFooter = Yii::app()->db->createCommand('select * from `' . MPages::model()->tableName() . '` where `homepage` = 1 and `status`=1 order by `order` ASC')->queryAll();
    }

    public function run() {
        if ($this->menuFooter) {
            ?>
            <?php
            foreach ($this->menuFooter as $items) :
                ?>
                <a href="<?php echo Yii::app()->createUrl('/bai-viet/' . $items['slug']); ?>" title=" <?php echo $items['name_' . Yii::app()->language]; ?>">
                    <?php echo $items['name_' . Yii::app()->language]; ?>
                </a>
                <?php
            endforeach;
            ?>
            <?php
        }
    }

}
?>