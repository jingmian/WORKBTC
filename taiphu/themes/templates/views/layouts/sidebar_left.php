<div class="colLeft">
    <div class="leftBox menuLeft">
        <?php $this->widget('ext.categories.ECategories'); ?>
    </div><!--end leftBox-->
    <div class="leftBox saleLeftBox">
        <?php
        $slideshowTop = Yii::app()->db->createCommand('select * from `' . MSlideshow::model()->tableName() . '` where `homepage` = 1 and `parent`=11 order by `order` ASC')->queryAll();
        if ($slideshowTop) {
            $stt = 0;
            foreach ($slideshowTop as $keyV => $valueV) {
                $stt++;
                $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
                ?>
                <a href="<?= $valueV['link']; ?>" title="<?= $name; ?>" class="saleLeft">
                    <img src="<?= trim($valueV['image']); ?>"  alt="<?= $name; ?>" />
                    <h3><?php echo $name; ?></h3>
                </a>
                <!-- slide one end -->
                <?php
            }
        }
        ?>

    </div><!--end leftBox-->
    <div class="clr"></div>    
</div><!--end colLeft-->