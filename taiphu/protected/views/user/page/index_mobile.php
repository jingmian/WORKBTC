<div id="content" class="snap-content">
    <div class="header-clear-large"></div>            
    <div class="content">

        <div class="slider-container full-bottom">
            <div class="homepage-slider" data-snap-ignore="true">                
                <?php $this->widget('ext.slideshow_mobile.ESlideshowMobile'); ?>
            </div>
        </div>


        <div class="decoration"></div>

        <div class="page-news-article">
            <?php if ($model['image']): ?>
                <img src="<?= trim($model['image']); ?>" class="responsive-image" alt=" <?= CHtml::encode($model['name_vi']); ?>"/>
                <?php
            endif;
            ?>
            <h3 class="page-news-article-title"><?= CHtml::encode($model['name_vi']); ?></h3>
            <div class="page-news-article-content">
                <?= $model['des_vi']; ?>
                <?= $model['content_vi']; ?>
                <div class="decoration"></div>
            </div>
        </div>


        <div class="decoration"></div>                


        <div class="footer-clear disabled"></div>

    </div>
</div>