<?php

class PostsSlider extends CWidget {

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
            }
        }
        ?>
        <div class="clr"></div>
        <script type="text/javascript">
            $(function () {
                $('.homeNews').children().each(function (i) {
                    if (i % 2 == 0) {
                        $div = $('<ul class="col" />');
                        $dad = $(this).parent('.homeNews');
                        $div.appendTo($dad);
                    }
                    $(this).appendTo($div);
                });
                $(".homeNews").owlCarousel({
                    items: 2,
                    itemsDesktop: [1024, 2],
                    itemsDesktopSmall: [999, 2],
                    itemsTablet: [767, 2],
                    itemsTabletSmall: [579, 1],
                    itemsMobile: [359, 1],
                    slideSpeed: 400,
                    autoPlay: false,
                    scrollPerPage: true,
                    stopOnHover: true,
                    addClassActive: true,
                    navigation: true,
                    pagination: false,
                    navigationText: ['<i class="navBox navL"></i>', '<i class="navBox navR"></i>']
                });
                $('.listNews').imagesLoaded(function () {
                    $('.oneNews p').ellipsis();
                });
                $(window).resize(function () {
                    $('.oneNews p').ellipsis();
                });
            });
        </script>
        <?php
    }

}
?>