<?php

class ESlideshow extends CWidget {

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
                <a href="<?= $valueV['link']; ?>" title="<?= $name; ?>">
                    <div class="ls-slide ls-slide<?php echo $stt; ?>" data-ls="offsetxin: right; slidedelay: 7000; transition2d: 24,25,27,28;">
                        <img src="<?= trim($valueV['image']); ?>" class="ls-bg img-reponsive" alt="<?= $name; ?>"/>
                    </div>
                </a>
                <!-- slide one end -->
                <?php
            }
        }
    }

}
?>