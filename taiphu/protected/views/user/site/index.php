<div class="pagewrap">
    <div class="colCent">
        <div class="titBox">
            <span class="tit text-center center-block">HÀNG MỚI NHẬP</span>
        </div>
        <div class="overHide">
            <div class="listPro">
                <div class="section group">
                    <?php $this->widget('ext.products_new.EProductsNew'); ?>  
                </div>
            </div><!--end listPro-->
            <div class="clr"></div>
        </div><!--end overHide-->
        <div class="clr"></div>
    </div><!--end colCent-->
</div><!--end colCent-->


<style>
    .parallax{
        color: #fff;
        width: 100%;
        height: 173px;
        background: url('<?= $this->config['parallax']; ?>');
    }
</style>


<div class="parallax">
    <div class="pagewrap">
        <div class="colCent">
            <div class="section group">
                <div class="col span_1_of_2 border-bottom" style="background: none">

                </div>
                <div class="col span_1_of_2 border-bottom" style="background: none">
                    <?php $this->widget('ext.page_one.PageOne'); ?>  
                </div>
            </div>
        </div>
    </div>

</div>



<div class="pagewrap">
    <div class="colCent">
        <div class="titBox"><span class="tit text-center center-block">NỖI BẬT NHẤT</span></div>
        <div class="overHide">
            <div class="listPro">
                <div class="section group">
                    <?php $this->widget('ext.products_feature.EProductsFeature'); ?>  
                </div>
            </div><!--end listPro-->
            <div class="clr"></div>
        </div><!--end overHide-->
        <div class="clr"></div>
    </div><!--end colCent-->
</div><!--end colCent-->


<div class="pagewrap">

    <div class="colCent">

        <div class="section group title-pre-footer">
            <div class="col span_1_of_4 border-bottom" style="background: none">
                <h4>SẢN PHẨM ĐỘC ĐÁO</h4>
            </div>
            <div class="col span_1_of_4 border-bottom" style="background: none">
                <h4>TOP ĐÁNH GIÁ</h4>
            </div>
            <div class="col span_1_of_4 border-bottom" style="background: none">
                <h4>TOP XEM NHIỀU</h4>
            </div>
            <div class="col span_1_of_4 border-bottom" style="background: none">
                <h4>BÁN CHẠY NHẤT</h4>
            </div>
        </div>

        <div class="clr"></div>

        <div class="section group">
            <div class="col span_1_of_4" style="background: none">
                <ul>
                    <?php $this->widget('ext.products_special.EProductsSpecial'); ?>  
                </ul>
            </div>
            <div class="col span_1_of_4" style="background: none">
                <ul>
                    <?php $this->widget('ext.products_rating.EProductsRating'); ?>  
                </ul>
            </div>
            <div class="col span_1_of_4" style="background: none">
                <ul>
                    <?php $this->widget('ext.products_viewed.EProductsViewed'); ?>  
                </ul>
            </div>
            <div class="col span_1_of_4" style="background: none">
                <ul>
                    <?php $this->widget('ext.products_bestseller.EProductsBestSeller'); ?>  
                </ul>
            </div>
        </div>

    </div>
</div>

