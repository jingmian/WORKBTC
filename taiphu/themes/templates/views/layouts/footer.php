<div class="footer">

    <div class="pagewrap">

        <ul class="fooTabs">
            <li><a href="#hcm">TP. HCM</a></li>
            <li><a href="#hn_1">Hà nội 1</a></li>
            <li><a href="#hn_2">Hà nội 2</a></li>
            <li><a href="#hn_3">Hà nội 3</a></li>
            <li><a href="#hn_4">Hà nội 4</a></li>
            <li><a href="#hn_5">Hà nội 5</a></li>
        </ul>

        <div class="clr fooLine"></div>

        <div class="section group">
            <div class="col span_1_of_3">
                <h2>THÔNG TIN LIÊN HỆ</h2>
            </div>
            <div class="col span_1_of_3">
                <h2 class="text-center center-block">SHARE</h2>
            </div>
            <div class="col span_1_of_3">
                <h2 class="text-left">THÔNG TIN THÊM</h2>
            </div>
        </div>

    </div>

    <div class="border-bottom-full"></div>

    <div class="pagewrap">

        <div class="section group">
            <div class="col span_1_of_3">
                <?php echo $this->website['address_' . Yii::app()->language]; ?>
            </div>
            <div class="col span_1_of_3">
                <?php $this->widget('ext.social.ESocial'); ?>
            </div>
            <div class="col span_1_of_3">
                <ul class="list-unstyled menu-footer">
                    <?php $this->widget('ext.menu_footer.EMenuFooter'); ?>
                </ul>
            </div>
        </div>

    </div>

</div><!--end footer-->

<script src='<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/scripts/script.js' type='text/javascript'></script>