<?php

class NewPostsList extends CWidget {

    private $models = array();

    public function init() {
        $models = Yii::app()->db->createCommand('select * from `' . MNewsCats::model()->tableName() . '` where `status` = 1 and `slug`="cam-nhan-khach-hang" order by `id` ')->queryRow();
        $this->models = Yii::app()->db->createCommand('select * from `' . MNews::model()->tableName() . '` where `status` = 1 and `feature` = 1 and `parent`="' . $models['id'] . '" order by `id` ')->queryAll();
    }

    public function run() {
        if ($this->models) {
            foreach ($this->models as $key => $val) {
                $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $val['slug']);
                $name = $val['name_' . Yii::app()->language];
                $des = $val['des_' . Yii::app()->language];
                $content = $val['content_' . Yii::app()->language];
                ?>
                <li>
                    <div class="avatarcn">
                        <img src="<?php echo $val['image']; ?>"/>
                    </div>
                    <h3 class="cn-name"><?php echo $name; ?></h3>
                    <div class="cn-mota"><?php echo $des; ?></div> 
                    <div class="cn-noidung"><?php echo $content; ?></div>
                </li>

                <?php
            }
        }
    }

}
?>