<?php

class ENewsFeature extends CWidget {

    private $newsFeature = array();

    public function init() {
        $this->newsFeature = Yii::app()->db->createCommand('select * from `' . MNews::model()->tableName() . '` where `status` = 1 and `feature`=1 and `parent` = 9 order by `id` desc limit 0,4')->queryAll();
    }

    public function run() {
        if ($this->newsFeature) {
            $stt = 0;
            ?>
            <div class="row margin-bottom-10">
                <?php
                foreach ($this->newsFeature as $items) :
                    $stt++;
                    $name = $items['name_' . Yii::app()->language];
                    $des = $items['des_' . Yii::app()->language];
                    $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $items['slug']);
                    ?>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="<?= $items['image']; ?>" class="pull-left" alt="<?php echo $name; ?>" style="width: 170px;margin-right: 10px;height: 94px"/>
                        <h4><a href="<?php echo $link; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></h4>
                        <p style="text-align: justify"><?php echo $des; ?></p>
                    </div>

                    <?php
                    if ($stt % 2 == 0):
                        ?>
                    </div><div class="row margin-bottom-10">
                        <?php
                    endif;

                endforeach;
            }
        }

    }
    ?>