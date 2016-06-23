<!-- BEGIN PAGE LEVEL STYLES -->
<div class="main">
    <div class="container" style="background: #fff;" id="gallery">


        <div class="row service-box margin-bottom-10">
            <div class="col-md-12 col-sm-12 padding-top-30">
                <div id="sp-pathway" class="clearfix">
                    <div class="sp-inner clearfix">
                        <span class="breadcrumbs">
                            <a href="<?= Yii::app()->getBaseUrl(true); ?>">Trang chủ</a>
                            <span class="current">Videos ...</span>
                        </span>
                        <span class="breadcrumbs-outer"></span>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if ($models):
            ?>
            <div class="row product-list margin-bottom-20 even">
                <?php
                foreach ($models as $model) :
                    $name = $model['name_' . Yii::app()->language];
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="product-item" style="border: 1px solid #ccc;padding: 5px">
                            <?php if ($model['image']): ?>
                                <iframe id="<?php echo $model['videoId']; ?>" frameborder="0" allowfullscreen="1" title="YouTube video player" width="100%" height="220" src="https://www.youtube.com/embed/<?php echo $model['videoId']; ?>?controls=1&amp;autoplay=0&amp;showinfo=0&amp;start=0&amp;loop=0&amp;modestbranding=1&amp;hl=vi&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fdemo.ngonhaidang.com.vn"></iframe>
                                <?php
                            endif;
                            ?>
                        </div>
                        <h3 class="padding-top-10">
                            <a style="font-weight: bold;font-size: 14px;" href="" class="text-center center-block" >
                                <?= CHtml::encode($model['name_vi']); ?>
                            </a>
                        </h3>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        window.onload = function() {
            // short timeout
            setTimeout(function() {
                $('html, body').animate({scrollTop: "680px"}, "slow");
            }, 7);
        };
    });
</script>