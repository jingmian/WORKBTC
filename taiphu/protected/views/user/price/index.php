<?php
$item = new MenuItem();
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<div class="main">
    <div class="container">

        <div class="row service-box margin-bottom-10">
            <div class="col-md-12 col-sm-12 padding-top-30">
                <div id="sp-pathway" class="clearfix">
                    <div class="sp-inner clearfix">
                        <span class="breadcrumbs">
                            <a href="<?= Yii::app()->getBaseUrl(true); ?>">Trang chủ</a>
                            <span class="current">Bảng Giá ...</span>
                        </span>
                        <span class="breadcrumbs-outer"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row margin-bottom-40">
             <!-- BEGIN SIDEBAR -->
            <div class="col-md-3 col-sm-5 sidebar-left" style="position: relative;">
                <div class="sidebar margin-bottom-30" style="position: relative">
                    <div class="title-bar text-center center-block">
                       DANH MỤC SẢN PHẨM
                    </div>

                    <div class="body" style="padding-top: 30px">
                        <aside>
                            <!-- mega menu -->
                            <ul class="sky-mega-menu-left sky-mega-menu-left-pos-left sky-mega-menu-left-response-to-icons sky-mega-menu-left-anim-scale">
                                <?php $this->widget('ext.categories.ECategories'); ?>
                            </ul>
                            <!--/ mega menu --> 
                        </aside>
                    </div>

                </div>

                <div class="sidebar margin-bottom-30" style="position: relative">
                    <div class="title-bar text-center center-block">
                        <?= $this->config['video']; ?>
                    </div>
                    <iframe style="padding-top: 30px;padding-left: 5px;padding-right: 5px" id="<?= $this->config['videoID']; ?>" frameborder="0" allowfullscreen="1" title="YouTube video player" width="100%" height="220" src="https://www.youtube.com/embed/<?= $this->config['videoID']; ?>?controls=1&amp;autoplay=0&amp;showinfo=0&amp;start=0&amp;loop=0&amp;modestbranding=1&amp;hl=vi&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fdemo.ngonhaidang.com.vn"></iframe>
                </div>

                <div class="sidebar margin-bottom-30" style="position: relative">
                    <div class="title-bar text-center center-block">
                        <?= $this->config['fanpage']; ?>
                    </div>

                    <div class="fb-page" style="padding-top: 30px" data-href="https://www.facebook.com/<?= $this->config['fanpageID']; ?>" data-tabs="timeline" data-width="260" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/<?= $this->config['fanpageID']; ?>">
                                <a href="https://www.facebook.com/<?= $this->config['fanpageID']; ?>"><?= $this->config['fanpageID']; ?></a>
                            </blockquote>
                        </div>
                    </div>



                </div>

                <div class="sidebar margin-bottom-30" style="position: relative">
                    <div class="title-bar text-center center-block">
                        HỖ TRỢ TRỰC TUYẾN
                    </div>

                    <div class="item" style="position: relative;padding-top: 30px">
                        <h4 style="padding-left: 10px;font-weight: bold;"><?= $this->config['namehotline']; ?></h4>
                        <a href="<?= $this->config['nickyahoo1']; ?>">
                            <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/icon_yahoo.png" style="position: absolute;top: 20px;right: 126px;">
                        </a>
                        <a href="<?= $this->config['nickskype1']; ?>">
                            <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/icon_skype.png" style="position: absolute;top: 20px;right: 10px;">
                        </a>
                        <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/phone.png" class="pull-left" />
                        <div class="price" style="font-size: 23px;float: left;padding-top: 10px;color:#ff0000"><?= $this->config['hotline1']; ?></div>
                    </div>

                    <div class="clearfix margin-bottom-10"></div>

                    <div class="item" style="position: relative;padding-bottom: 60px;">
                        <h4 style="padding-left: 10px;font-weight: bold;"><?= $this->config['namehotline1']; ?></h4>
                        <a href="<?= $this->config['nickyahoo2']; ?>">
                            <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/icon_yahoo.png" style="position: absolute;top: -10px;right: 126px;">
                        </a>
                        <a href="<?= $this->config['nickskype2']; ?>">
                            <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/icon_skype.png" style="position: absolute;top: -10px;right: 10px;">
                        </a>
                        <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/phone.png" class="pull-left" />
                        <div class="price" style="font-size: 23px;float: left;padding-top: 10px;color:#ff0000"><?= $this->config['hotline2']; ?></div>
                    </div>
                </div>

            </div>
            <!-- END SIDEBAR -->


            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="content-page">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 blog-posts">

                            <div class="table-container">

                                <?php
                                if ($models):
                                    foreach ($models as $items) :
                                        $price = Yii::app()->db->createCommand('select * from `' . MPosts::model()->tableName() . '` where `status` = 1 and `parent` = "' . $items['id'] . '"  order by `id` desc ')->queryAll();
                                        ?>
                                        <h3><?php echo $items['name_vi']; ?></h3>
                                        <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <th width="5%">
                                                        STT
                                                    </th>
                                                    <th width="20%">
                                                        Bảng Giá
                                                    </th>
                                                    <th width="18%">
                                                        View
                                                    </th>
                                                    <th width="20%">
                                                        Ngày Đăng 
                                                    </th>
                                                    <th width="20%">
                                                        Download 
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                if ($price):
                                                    $stt = 0;
                                                    foreach ($price as $post) :
                                                        $stt++;
                                                        $link = Yii::app()->createUrl('/bang-gia/' . $post['slug']);
                                                        ?>
                                                        <tr role="row" class="filter">
                                                            <td>
                                                                <?php echo $stt; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $post['name_vi']; ?>
                                                            </td>
                                                            <td>
                                                                <a href="https://docs.google.com/gview?url=<?php echo Yii::app()->getBaseUrl(true).$post['image']; ?>" target="_blank"> 
                                                                    <i class="fa fa-search"></i> View
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php echo $post['hannop']; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo $post['image']; ?>" title="<?php echo $post['name_vi']; ?>">
                                                                    <i class="fa fa-download"></i> download
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                        </table>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>

                            <ul class="pagination">
                                <div id="custom-pagination">
                                    <?php
                                    $this->widget('CLinkPager', array(
                                        'currentPage' => $pages->getCurrentPage(),
                                        'itemCount' => $pages->getItemCount(),
                                        'pageSize' => $pages->getPageSize(),
                                        'maxButtonCount' => 5,
                                        'header' => '<span>Trang: </span>',
                                        'htmlOptions' => array('class' => 'pages'),
                                    ));
                                    ?>
                                </div>
                            </ul>       

                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>

<script>
    $(document).ready(function () {
        window.onload = function () {
            // short timeout
            setTimeout(function () {
                $('html, body').animate({scrollTop: "680px"}, "slow");
            }, 7);
        };
    });
</script>