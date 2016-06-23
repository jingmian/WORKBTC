<?php

class EGallery extends CWidget {

    private $gallery = array();

    public function init() {
        $this->gallery = Yii::app()->db->createCommand('select * from `' . MSlideshow::model()->tableName() . '` where `homepage` = 1 and `parent`=9 order by `order` ASC')->queryAll();
    }

    public function run() {
        if ($this->gallery) {
            $stt = 0;
            ?>
            <div class="row margin-bottom-10">
                <?php
                foreach ($this->gallery as $keyV => $valueV) {
                    $stt++;
                    $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
                    $content = CHtml::encode($valueV['content_' . Yii::app()->language]);
                    $link = Yii::app()->createUrl('/gallery/' . $valueV['slug']);
                    ?>
                    <div class="col-md-3 col-xs-12 col-sm-6 ">
                        <a href="<?php echo $link;?>">
                            <div class="grid">
                                <figure class="effect-ming">
                                    <img src="<?= trim($valueV['image']); ?>" alt="<?= $name; ?>" class="img-responsive">
                                    <figcaption>
                                        <h4><?php echo $name; ?></h4>
                                        <p><?php echo $content; ?></p>
                                    </figcaption>
                                </figure>
                            </div>
                        </a>
                    </div>

                    <?php
                    if ($stt % 4 == 0):
                        ?>
                    </div><div class="row margin-bottom-10">
                        <?php
                    endif;
                }
            }
        }

    }
    ?>