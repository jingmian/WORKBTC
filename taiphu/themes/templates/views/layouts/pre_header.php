<?php
$slideshow = Yii::app()->db->createCommand('select * from `' . MSlideshow::model()->tableName() . '` where `homepage` = 1 and `parent`=9 order by `order` ASC')->queryAll();
if ($slideshow) {
    $stt = 0;
    foreach ($slideshow as $keyV => $valueV) {
        $stt++;
        $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
        ?>
        <a href="<?= $valueV['link']; ?>" title="<?= $name; ?>" class="homeBan">
            <img src="<?= trim($valueV['image']); ?>"  alt="<?= $name; ?>" width="1200"/>
        </a>
        <!-- slide one end -->
        <?php
    }
}
?>

