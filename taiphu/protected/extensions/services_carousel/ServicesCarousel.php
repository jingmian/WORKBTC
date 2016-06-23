<?php

class ServicesCarousel extends CWidget {

    private $models = array();

    public function init() {
        $this->models = Yii::app()->db->createCommand('select * from `' . MNews::model()->tableName() . '` where `status` = 1 and `parent` = 13 order by `id` DESC ')->queryAll();
    }

    public function run() {
        ?>
        <aside>
            <script type='text/javascript' src='<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/jquery-migrate.min.js?ver=1.2.1'></script>
            <script type='text/javascript' src='<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/amazingcarousel.js?ver=1.2'></script>
            <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/initcarousel.css">
            <div class="demo-slider">
                <div id="amazingcarousel-container-10">
                    <div id="amazingcarousel-10" style="display: block; position: relative; width: 100%; margin: 0px auto; direction: ltr;">
                        <div class="amazingcarousel-list-container" style="overflow: visible; position: relative; margin: 0px auto; height: 380px;">
                            <div class="amazingcarousel-list-wrapper" style="overflow: hidden; height: 100%; width: 100%;">
                                <ul class="amazingcarousel-list" style="display: block; position: relative; list-style-type: none; list-style-image: none; padding: 0px; margin: -1372px 0px 0px; height: 2392px;">
                                    <?php
                                    if ($this->models) {
                                        foreach ($this->models as $valueV) :
                                            $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $valueV['slug']);
                                            $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
                                            ?>

                                            <li class="amazingcarousel-item products-carousell" style="display: block; position: relative; padding: 0px; width: 100%;margin-bottom: 13px !important;">
                                                <div class="amazingcarousel-item-container" style="position: relative; margin: 0px 0px 12px;">
                                                    <div class="amazingcarousel-image">
                                                        <a href="<?php echo Yii::app()->createUrl('/chi-tiet-ban-tin/' . $valueV['slug']); ?>" title="<?php echo $name; ?>">
                                                            <img src="<?= trim($valueV['image']); ?>" alt="<?= $name; ?>" class="img-reponsive pull-left" style="width: 137px;height: 93px;padding-right: 10px;">
                                                        </a>
                                                        <h4 style="font-size: 14px;color: #d68a0f;font-weight: 400;text-align: left">
                                                            <a style="font-size: 14px;color: #d68a0f;font-weight: 400;text-align: left" href="<?php echo Yii::app()->createUrl('/chi-tiet-ban-tin/' . $valueV['slug']); ?>" title="<?php echo $name; ?>">
                                                                <?php echo $name; ?>
                                                            </a>
                                                        </h4>
                                                        <p style="font-size: 14px;color: #fff;text-align: left">
                                                            <?php echo $valueV['des_vi']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                            <?php
                                        endforeach;
                                    }
                                    ?>
                                    <div style="clear:both;"></div>
                                </ul>
                            </div>
                        </div>
                        <div class="amazingcarousel-prev" style="overflow: hidden; position: absolute; cursor: pointer; width: 32px; height: 32px; display: block; background: url(&quot;https://amazingcarousel.com/wp-content/uploads/amazingcarousel/10/carouselengine/skins/arrows-32-32-4.png&quot;) 0% 0% no-repeat;"></div>
                        <div class="amazingcarousel-next" style="overflow: hidden; position: absolute; cursor: pointer; width: 32px; height: 32px; display: block; background: url(&quot;https://amazingcarousel.com/wp-content/uploads/amazingcarousel/10/carouselengine/skins/arrows-32-32-4.png&quot;) 100% 0% no-repeat;"></div>
                        <div class="amazingcarousel-nav"></div>
                    </div>
                </div>
                <script src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/initcarousel.js"></script>
            </div>
        </aside>

        <?php
    }

}
?>