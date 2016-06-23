<div id="content" class="snap-content">
    <div class="content">
        <div class="header-clear"></div>
        <div class="slider-container full-bottom">
            <div class="homepage-slider" data-snap-ignore="true">                
                <?php $this->widget('ext.slideshow_mobile.ESlideshowMobile'); ?>
            </div>
        </div>

        <div class="decoration"></div>

        <div class="container">

            <?php
            if ($models):
                foreach ($models as $post) :
                    $link = Yii::app()->createUrl('post/post', array('slug' => $post['slug']));
                    ?>
                    <div class="news-column">
                        <a href="<?php echo $link; ?>" title="<?php echo $post['name_' . Yii::app()->language]; ?>">
                            <img class="responsive-image" alt="<?php echo $post['name_' . Yii::app()->language]; ?>" src="<?php echo $post['image']; ?>" >
                        </a>
                        <h4>
                            <a href="<?php echo $link; ?>" title="<?php echo $post['name_' . Yii::app()->language]; ?>">
                                <?php echo $post['name_' . Yii::app()->language]; ?>
                            </a>
                        </h4>
                        <p><?php echo $post['des_' . Yii::app()->language]; ?></p>
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