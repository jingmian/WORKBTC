<div class="pagewrap">
    <div class="colCent" style="background: #fff">

        <div class="titBox" style="padding-bottom: 20px;margin-left: 20px;margin-top: 20px;margin-right: 20px">
            <div class="title-detail"><h1><?php echo $model['name_' . Yii::app()->language]; ?></h1></div>
        </div>

        <div class="showText" style="padding: 10px">


            <div class="addthis_sharing_toolbox"></div>
            <div class="clearfix margin-bottom-10"></div>

            <?php if ($model['image']): ?>
                <img src="<?= trim($model['image']); ?>" class="img-reponsive " alt=" <?= CHtml::encode($model['name_vi']); ?>"/>
                <?php
            endif;
            ?>

            <div class="clr margin-bottom-10"></div>

            <p style="text-align: justify">
                <?= $model['des_vi']; ?>
            </p>
            <p style="text-align: justify">
                <?= $model['content_vi']; ?>
            </p>

        </div><!--end showText-->


        <div class="clr"></div>


        <div class="owlMain" style="padding-left: 10px">
            <span class="otherTit ">Bài viết khác</span>
            <div class="owlCont otherNews masonry" style="position: relative; height: 176px;">
                <?php
                if ($modelRelated):
                    foreach ($modelRelated as $related) :
                        $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $related['slug']);
                        ?>
                        <a class="masonry-brick" style="position: absolute; top: 0px; left: 0px;" href="<?php echo $link; ?>">
                            <?php echo $related['name_vi']; ?>
                        </a>
                        <?php
                    endforeach;
                endif;
                ?>

                <div class="clr"></div>
            </div><!--end otherCont-->

            <script type="text/javascript">
                $(function () {
                    $('.otherNews').masonry({itemSelector: '.otherNews a', columnWidth: 0, });
                    $(window).resize(function () {
                        $('.otherNews').masonry({itemSelector: '.otherNews a', columnWidth: 0, });
                    });
                });
            </script>

            <div class="clr" style="height:20px;"></div>

        </div><!--end otherMain-->
    </div>

</div>