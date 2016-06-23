<?php

class EVideosAjax extends CWidget {

    private $videos = array();
    private $video = array();

    public function init() {
        $this->video = Yii::app()->db->createCommand('select * from `' . MVideos::model()->tableName() . '` where `homepage` = 1 order by `id` desc limit 0,1')->queryRow();
        $this->videos = Yii::app()->db->createCommand('select * from `' . MVideos::model()->tableName() . '` where `homepage` = 1 order by `id` desc')->queryAll();
    }

    public function run() {
        if ($this->video) {
            ?>
            <div id="append-html">
                <iframe style="width: 100%" id="<?php echo $this->video['videoId']; ?>" frameborder="0" allowfullscreen="1" title="YouTube video player" width="100%" height="220" src="https://www.youtube.com/embed/<?php echo $this->video['videoId']; ?>?controls=1&amp;autoplay=0&amp;showinfo=0&amp;start=0&amp;loop=0&amp;modestbranding=1&amp;hl=vi&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fdemo.ngonhaidang.com.vn"></iframe>
            </div>
            <?php
            if ($this->videos):
                ?>
                <select class="form-control" id="load-videos" style="font-weight: 600;font-size: 14px;color: #333">
                    <option>Các video khác</option>
                    <?php
                    foreach ($this->videos as $keyV => $valueV) {
                        $link = Yii::app()->createUrl('site/video', array('id' => $valueV['videoId']));
                        $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
                        ?>
                        <option value="<?php echo $valueV['videoId']; ?>"><?php echo $name; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <?php
            endif;
        }
    }

}
?>