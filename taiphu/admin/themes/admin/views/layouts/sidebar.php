<?php
$checkRoot = Yii::app()->user->checkAccess('root');
?>
<ul id="task-link" class="nav" role="tablists">

    <?php
    if ($this->feature['1'] == 1):
        ?>
        <li>
            <a href="<?php echo Yii::app()->createUrl('order/index'); ?>"><i class="fa fa-book"></i> Đơn hàng</a>
        </li>
        <?php
    endif;
    ?>

    <li>
        <?php
        if ($this->feature['2'] == 1):
            ?>
            <a href="<?= Yii::app()->createUrl('postCats/index'); ?>"><i class="fa fa-book"></i> Danh Mục Bảng Giá</a>
            <?php
        endif;
        ?>
        <ul class="nav">
            <?php
            if ($this->feature['3'] == 1):
                ?>
                <li>
                    <a href="<?= Yii::app()->createUrl('posts/index'); ?>"><i class="fa fa-list"></i> Bảng Giá</a>
                </li>
                <?php
            endif;
            ?>

        </ul>
    </li>

    <li>
        <?php
        if ($this->feature['4'] == 1):
            ?>
            <a href="<?= Yii::app()->createUrl('newsLetter/index'); ?>"><i class="fa fa-book"></i> Đăng Ký Nhận Tin</a>
            <?php
        endif;
        ?>
        <ul class="nav">
            <?php
            if ($this->feature['5'] == 1):
                ?>
                <li>
                    <a href="<?= Yii::app()->createUrl('register/index'); ?>"><i class="fa fa-list"></i> Danh Sách đăng ký</a>
                </li>
                <?php
            endif;
            ?>
        </ul>
    </li>

    <?php
    if ($this->feature['6'] == 1):
        ?>
        <li>
            <a href="<?= Yii::app()->createUrl('apply/index'); ?>"><i class="fa fa-book"></i> Feedback</a>
        </li>
        <?php
    endif;
    ?>

    <?php
    if ($this->feature['7'] == 1):
        ?>
        <li>
            <a href="<?= Yii::app()->createUrl('pages/index'); ?>"><i class="fa fa-book"></i> Bài viết</a>
        </li>
        <?php
    endif;
    ?>

    <li>
        <?php
        if ($this->feature['8'] == 1):
            ?>
            <a href="<?= Yii::app()->createUrl('NewsCats/index'); ?>"><i class="fa fa-list"></i> Danh mục tin tức</a>
            <?php
        endif;
        ?>
        <ul class="nav">
            <?php
            if ($this->feature['9'] == 1):
                ?>
                <li>
                    <a href="<?= Yii::app()->createUrl('news/index'); ?>"><i class="fa fa-list"></i> Tin tức</a>
                </li>
                <?php
            endif;
            ?>
        </ul>
    </li>

    <li>
        <?php
        if ($this->feature['10'] == 1):
            ?>
            <a href="<?= Yii::app()->createUrl('models/index'); ?>"><i class="fa fa-list"></i> Danh Mục Sản Phẩm </a>
            <?php
        endif;
        ?>
        <ul class="nav">
            <?php
            if ($this->feature['11'] == 1):
                ?>
                <li><a href="<?= Yii::app()->createUrl('products/index'); ?>"><i class="fa fa-list"></i> Sản Phẩm</a></li>
                <?php
            endif;
            ?>
            <?php
            if ($this->feature['12'] == 1):
                ?>
                <li><a href="<?= Yii::app()->createUrl('categories/index'); ?>"><i class="fa fa-list"></i> Option </a></li>
                <?php
            endif;
            ?>
        </ul>
    </li>

    <li><a href="#"><i class="fa fa-user"></i> Thành viên</a>
        <ul class="nav" role="tablists">
            <?php
            if ($this->feature['13'] == 1):
                ?>
                <li><a href="<?= Yii::app()->createUrl('users/changePass'); ?>"><i class="fa fa-lock"></i> Đổi mật khẩu</a></li>
                <?php
            endif;
            ?>
            <?php if ($checkRoot): ?>
                <li><a href="<?= Yii::app()->createUrl('users/add'); ?>"><i class="fa fa-plus"></i> Thêm mới</a></li>
                <li><a href="<?= Yii::app()->createUrl('users/index'); ?>"><i class="fa fa-list"></i> Danh sách</a></li>
            <?php endif; ?>
        </ul>
    </li>

    <?php
    if ($this->feature['14'] == 1):
        ?>
        <li><a href="<?= Yii::app()->createUrl('doitac/index'); ?>"><i class="fa fa-youtube-play"></i> Đối Tác</a></li>
        <?php
    endif;
    ?>
    <?php
    if ($this->feature['15'] == 1):
        ?>
        <li><a href="<?php echo Yii::app()->createUrl('videos/index'); ?>"><i class="fa fa-youtube-play"></i> Videos</a></li>
        <?php
    endif;
    ?>

    <li><a href="#"><i class="fa fa-list"></i> Slide</a>
        <ul class="nav" role="tablists">
            <?php
            if ($this->feature['16'] == 1):
                ?>
                <li><a href="<?= Yii::app()->createUrl('slideshowCats/index'); ?>"><i class="fa fa-list"></i> Danh Mục Slider</a></li>
                <?php
            endif;
            ?>
            <?php
            if ($this->feature['17'] == 1):
                ?>
                <li><a href="<?= Yii::app()->createUrl('slideshow/index'); ?>"><i class="fa fa-list"></i> Slide</a></li>
                <?php
            endif;
            ?>
        </ul>
    </li>

    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a>
        <ul class="nav" role="tablists">
            <?php
            if ($this->feature['18'] == 1):
                ?>
                <li><a href="<?php echo $this->createUrl('configs/index'); ?>">Tùy chỉnh website</a></li>
                <?php
            endif;
            ?>
            <li><a href="<?php echo $this->createUrl('config/update'); ?>">Cấu hình website</a></li>
            <?php
            if ($this->feature['19'] == 1):
                ?>
                <li><a href="<?php echo $this->createUrl('feature/index'); ?>">Danh sách chức năng</a></li>
                <?php
            endif;
            ?>
            <?php
            if ($this->feature['20'] == 1):
                ?>
                <li><a href="<?php echo $this->createUrl('menus/index', array('group' => 'main')); ?>">Menu chính</a></li>
                <?php
            endif;
            ?>

            <?php
            if ($this->feature['21'] == 1):
                ?>
                <li><a href="<?php echo $this->createUrl('menus/index', array('group' => 'cat')); ?>">Menu danh mục</a></li>
                <?php
            endif;
            ?>
        </ul>
    </li>

    <?php
    if ($this->feature['22'] == 1):
        ?>
<!--        <li>
            <a href="<?php echo Yii::app()->createUrl('tag/index'); ?>"><i class="fa fa-book"></i> Tags</a>
        </li>-->
        <?php
    endif;
    ?>
</ul>