<?php

class PostsOne extends CWidget {

    private $models = array();

    public function init() {
        $this->models = Yii::app()->db->createCommand('select * from `' . MNews::model()->tableName() . '` where `status` = 1 and `feature`=1 and `parent`=10 order by `id` ')->queryRow();
    }

    public function run() {
        if ($this->models) {
            $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $this->models['slug']);
            $name = $this->models['name_' . Yii::app()->language];
            $des = $this->models['des_' . Yii::app()->language];
            ?>

            <div class="fade in active">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="<?php echo $link; ?>" class="fancybox-button" title="<?php echo $name; ?>">
                        <img class="img-responsive pull-left" src="<?= $this->models['image']; ?>" alt="<?php echo $name; ?>" style="width: 487px;height: 186px;padding-right: 10px;">
                    </a>
                    <a href="<?php echo $link; ?>" class="fancybox-button" title="<?php echo $name; ?>" style="font-size: 14px;color: #d68a0f;font-weight: 400">
                        <h3 style="font-weight: bold;">
                            <?php echo $name; ?>
                        </h3>
                    </a>
                    <p style="font-size: 14px;color: #fff;font-weight: 400">
                        <?php echo $des; ?>
                    </p>
                    <div class="clearfix"></div>
                    <a href="<?php echo $link; ?>" class="pull-right" style="font-size: 14px;color: #d68a0f;font-weight: 400"> >>Xem thêm</a>
                </div>
            </div>

            <?php
        }
    }

}
?>