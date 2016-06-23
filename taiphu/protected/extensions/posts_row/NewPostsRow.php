<?php

class NewPostsRow extends CWidget {

    private $models = array();

    public function init() {
        $this->models = Yii::app()->db->createCommand('select * from `' . MNews::model()->tableName() . '` where `status` = 1 and `feature`=1 and `parent`=10 and `feature`=1 order by `id` ')->queryAll();
    }

    public function run() {
        if ($this->models) {
            $stt = 0;
            foreach ($this->models as $key => $val) {
                $stt++;
                $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $val['slug']);
                $name = $val['name_' . Yii::app()->language];
                $des = $val['des_' . Yii::app()->language];
                ?>

                <li class='oneNews'>
                    <a href='<?php echo $link; ?>' title="<?php echo $name; ?>" class='thumb'>
                        <img src="<?= $val['image']; ?>" alt="<?php echo $name; ?>" />
                    </a>
                    <ul>
                        <a href='<?php echo $link; ?>' title="<?php echo $name; ?>"><?php echo $name; ?></a>
                        <p><?php echo $des; ?></p>
                    </ul>
                </li>

                <?php
                if ($stt % 2 == 0):
                    ?>
                    <!--<div class="clearfix margin-bottom-10"></div>-->
                    <?php
                endif;
            }
        }
    }

}
?>