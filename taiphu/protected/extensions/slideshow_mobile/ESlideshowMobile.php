<?php

class ESlideshowMobile extends CWidget {

    private $slideshow = array();

    public function init() {
        $this->slideshow = Yii::app()->db->createCommand('select * from `' . MSlideshow::model()->tableName() . '` where `homepage` = 1 and `parent`=10 order by `order` ASC')->queryAll();
    }

    public function run() {
        if ($this->slideshow) {
            $stt = 0;
            foreach ($this->slideshow as $keyV => $valueV) {
                $stt++;
                $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
                ?>
                <div>
                    <div class="overlay"></div>
                    <div class="homepage-slider-caption homepage-left-caption">
                        <h3><?= $name; ?></h3>
                        <p><?= $valueV['content_' . Yii::app()->language]; ?></p>
                    </div>
                    <img src="<?= trim($valueV['image']); ?>" class="img-reponsive" alt="<?= $name; ?>" style="width: 100%;max-height: 200px"/>
                </div>
                <!-- slide one end -->
                <?php
            }
        }
    }

}
?>