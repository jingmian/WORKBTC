<div id="content" class="snap-content">
    <div class="content">
        <div class="header-clear"></div>
        <div class="slider-container full-bottom">
            <div class="homepage-slider" data-snap-ignore="true">                
                <?php $this->widget('ext.slideshow_mobile.ESlideshowMobile'); ?>
            </div>
        </div>

        <div class="decoration"></div>

        <div class="page-news-article">
            <?php if ($model['image']): ?>
                <img src="<?= trim($model['image']); ?>" class="responsive-image" alt=" <?= CHtml::encode($model['name_vi']); ?>" width="100%"/>
                <?php
            endif;
            ?>
            <h3 class="page-news-article-title"><?= CHtml::encode($model['name_' . Yii::app()->language]); ?></h3>
            <div class="page-news-article-content">
                <?= $model['des_vi']; ?>
                <?= $model['content_vi']; ?>

                <div class="decoration"></div>
            </div>
        </div>

        <div class="container">
            <h3>Tin Liên quan</h3>
            <?php
            if ($modelRelated):
                foreach ($modelRelated as $related) :
                    $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $related['slug']);
                    ?>
                    <div class="news-column">
                        <a href="<?php echo $link; ?>" title="<?php echo $related['name_' . Yii::app()->language]; ?>">
                            <img class="responsive-image" alt="<?php echo $related['name_' . Yii::app()->language]; ?>" src="<?php echo $related['image']; ?>" >
                        </a>
                        <h4>
                            <a href="<?php echo $link; ?>" title="<?php echo $related['name_' . Yii::app()->language]; ?>">
                                <?php echo $related['name_' . Yii::app()->language]; ?>
                            </a>
                        </h4>
                        <p><?php echo $related['des_' . Yii::app()->language]; ?></p>
                    </div>  

                    <?php
                endforeach;
            endif;
            ?>
            <div class="clear"></div>
        </div>

        <div class="decoration"></div>                

        <div class="footer-clear disabled"></div>

    </div>
</div>