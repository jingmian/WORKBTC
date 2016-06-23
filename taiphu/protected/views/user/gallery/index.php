<link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/gallery/slideshow.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/gallery/demo.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/gallery/lightbox.css" media="screen" />
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/gallery/lightbox.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/gallery/mootools-1.3.2-core.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/gallery/mootools-1.3.2.1-more.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/gallery/slideshow.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/css/gallery/slideshow.kenburns.js"></script>

<script type="text/javascript">

    window.addEvent('domready', function () {
        var data = {'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_20.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 20', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_20.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_20.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_19.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 19', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_19.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_19.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_18.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 18', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_18.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_18.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_17.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 17', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_17.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_17.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_16.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 16', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_16.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_16.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_15.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 15', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_15.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_15.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_14.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 14', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_14.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_14.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_13.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 13', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_13.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_13.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_12.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 12', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_12.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_12.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_9.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 9', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_9.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_9.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_8.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 8', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_8.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_8.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_7.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 7', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_7.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_7.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_6.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 6', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_6.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_6.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_5.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 5', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_5.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_5.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_4.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 4', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_4.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_4.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_3.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 3', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_3.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_3.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_2.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 2', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_2.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_2.jpg'}, 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_1.jpg': {caption: 'Nutrilite trien lam tan Binh 2014 1', href: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_1.jpg', thumbnail: 'http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(177x103)_crop_Nutrilite_trien_lam_tan_Binh_2014_1.jpg'}};
        var kenburns_slideshow = new Slideshow.KenBurns('kenburns', data, {delay: 6000, duration: 1500, height: 425, hu: '', width: 775, zoom: 0});
        $('.slideshow-images a').lightBox();
    });


</script>

<script>

    $(function () {
        $("#kenburns .btn-prev").click(function () {
            var thumb_left = parseInt($("#kenburns .slideshow-thumbnails ul").css("left").replace("px", "")) * -1;
            var new_left = thumb_left - $("#kenburns .slideshow-thumbnails ul li").width();
            if (new_left < 0)
                new_left = 0
            new_left *= -1;
            $("#kenburns .slideshow-thumbnails ul").stop(true, true).animate({left: new_left + "px"}, 800);
            return false;
        });

        $("#kenburns .btn-next").click(function () {
            var max_left = $("#kenburns .slideshow-thumbnails ul").width() - 757;
            var thumb_left = parseInt($("#kenburns .slideshow-thumbnails ul").css("left").replace("px", "")) * -1;
            var new_left = thumb_left + $("#kenburns .slideshow-thumbnails ul li").width();
            if (max_left < new_left)
                new_left = max_left;
            new_left *= -1;
            $("#kenburns .slideshow-thumbnails ul").stop(true, true).animate({left: new_left + "px"}, 800);
            return false;
        });

    });
</script>





<!-- BEGIN PAGE LEVEL STYLES -->
<div class="main">
    <div class="container" style="background: #fff;" id="gallery">


        <div class="row service-box margin-bottom-10">
            <div class="col-md-12 col-sm-12 padding-top-30">
                <ul class="breadcrumb">
                    <li><a href="<?= Yii::app()->getBaseUrl(true); ?>">Trang Chủ</a></li>
                    <li class="active"><a href="#">Thư Viện Ảnh</a></li>
                </ul>
            </div>
        </div>

        <div class="boxDetail">
            <div id="kenburns" class="slideshow">
                <a rel="lightbox" href="http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(1000x800)_fmax_Nutrilite_trien_lam_tan_Binh_2014_1.jpg">
                    <img src="http://www.pqevent.com/vnt_upload/gallery/09_2014/thumbs/(775x425)_fm_Nutrilite_trien_lam_tan_Binh_2014_1.jpg" alt="">
                </a>
                <a class="btn-prev" href="#"></a>
                <a class="btn-next" href="#"></a>
            </div>
            <div class="clear"></div>
            <div class="desc"></div>
        </div>

    </div>

