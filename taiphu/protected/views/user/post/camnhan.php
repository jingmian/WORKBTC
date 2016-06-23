<div class="main_content col-sm-12 ">
    <div id="layout-page">
        <h1 class="titleCamNhan">Cảm Nhận Khách Hàng</h1>

        <ul class="lstCamNhanKhachHang1">

            <?php
            if ($models):
                foreach ($models as $post) :
                    $link = Yii::app()->createUrl('post/post', array('slug' => $post['slug']));
                    ?>
                    <li class="col-md-3 col-sm-6 col-xs-12">
                        <div class="avatarcn"><img src="<?php echo $post['image']; ?>" alt="<?php echo $post['name_vi']; ?>"></div>
                        <h3 class="cn-name"><?php echo $post['name_vi']; ?></h3>
                        <div class="cn-mota"><?php echo $post['des_vi']; ?></div> 
                        <div class="cn-noidung"><?php echo $post['content_vi']; ?></div>
                    </li>

                    <?php
                endforeach;
            endif;
            ?>
        </ul>

        <div class="clearfix"></div>

    </div>
</div>