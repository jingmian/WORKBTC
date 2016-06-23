<?php

class EVideos extends CWidget {

    private $videos = array();

    public function init() {
        $this->videos = Yii::app()->db->createCommand('select * from `' . MVideos::model()->tableName() . '` where `homepage` = 1 order by `id` desc')->queryAll();
    }

    public function run() {
        if ($this->videos) {
            echo '<div class="videos"><ul>';
            $colors = array('blue', 'green', 'organ');
            $countColor = count($colors) - 1;
            foreach ($this->videos as $keyV => $valueV) {
                $color = 'video-title-' . $colors[mt_rand(0, $countColor)];
                $link = Yii::app()->createUrl('site/video', array('id' => $valueV['videoId']));
                $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
                echo '<li>';
                echo '<div class="video">';
                ?>
                <div class="video-video-link">
                    <img alt="<?= $name; ?>" src="<?= trim($valueV['image']); ?>">
                    <a class="play-link" data-fancybox-type="ajax" href="<?= $link; ?>" title="<?= $name; ?>">
                        <img alt="<?= $name; ?>" src="<?= Yii::app()->theme->baseUrl; ?>/img/play.png">
                    </a>
                </div>
                <div class="video-title <?= $color; ?>">
                    <h3><a class="fancybox" data-fancybox-type="ajax" href="<?= $link; ?>" title="<?= $name; ?>"><?= $name; ?></span></h3>
                </div>
                <?php
                echo '</div>';
                echo '</li>';
            }
            echo '</ul></div>';
        }
    }

}
?>