<div class="colRight">
    <div class="rightBox boxCart rightLink">
        <div class="rightTit">Mua hàng online</div>
        <a href="san-pham-da-xem">Sản phẩm đã xem</a>
        <a href="<?php echo Yii::app()->createUrl('gio-hang'); ?>">Xem đơn hàng</a>
        <a href="gui-don-hang">Gửi đơn hàng</a>
        <li class="btnCart"><a href="<?php echo Yii::app()->createUrl('gio-hang'); ?>">
                <span>
                    <?php
                    if (isset(Yii::app()->session['cart']) && Yii::app()->session['cart']) {
                        echo count(Yii::app()->session['cart']);
                    } else {
                        echo 0;
                    }
                    ?>
                </span> Giỏ hàng của bạn</a></li>
    </div>
    <div class="rightBox boxBC">
        <a href="#" class="rightTit fix">Đèn bán chạy</a>
        <div class="proRight">
            <?php $this->widget('ext.products_bestseller.EProductsBestSeller'); ?>    
        </div><!--end slideRight-->
        <div class="clr"></div>
    </div><!--end rightBox-->
    <div class="rightBox boxKM">
        <a href="#" class="rightTit fix">Đèn khuyến mãi</a>
        <div class="proRight">
            <?php $this->widget('ext.products_feature.EProductsFeature'); ?>
        </div><!--end slideRight-->
        <div class="clr"></div>
    </div><!--end rightBox-->



    <script type="text/javascript">
        $(function () {
            $('.boxCC .proRight').children().each(function (i) {
                if (i % 2 == 0) {
                    $div = $('<ul class="col" />');
                    $dad = $(this).parent('.boxCC .proRight');
                    $div.appendTo($dad);
                }
                $(this).appendTo($div);
            });
            $('.boxBC .proRight').children().each(function (i) {
                if (i % 2 == 0) {
                    $div = $('<ul class="col" />');
                    $dad = $(this).parent('.boxBC .proRight');
                    $div.appendTo($dad);
                }
                $(this).appendTo($div);
            });
            $('.boxKM .proRight').children().each(function (i) {
                if (i % 2 == 0) {
                    $div = $('<ul class="col" />');
                    $dad = $(this).parent('.boxKM .proRight');
                    $div.appendTo($dad);
                }
                $(this).appendTo($div);
            });
            $(".proRight").owlCarousel({
                autoHeight: true,
                slideSpeed: 300,
                singleItem: true,
                autoPlay: false,
                stopOnHover: false,
                addClassActive: true,
                navigation: false,
                pagination: true,
            });
        });
    </script>
</div><!--end colRight-->