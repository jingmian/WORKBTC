<div class="pre-header"></div>

<div class="header">

    <div class="pagewrap">

        <a href="<?= Yii::app()->getBaseUrl(true); ?>" class="logo">
            <img src="<?php echo $this->website['banner']; ?>" alt="" />
        </a>

        <div class="search-mobile">
            <?php $this->widget('ext.search_mobile.ESearchMobile'); ?>
        </div>

        <div class="hotline pull-left">
            <span>Hotline : </span> 0909978096
        </div>

        <div class="search pull-right">
            <form action="" method="post">
                <input type="text" placeholder="nhập từ khóa tìm kiếm ..."/>
                <button type="submit" style="border: 0; background: transparent">
                    <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/fa-search.png" />
                </button>
            </form>
        </div>

        <div class="clr"></div>

        <div class="menuMain">

            <ul class="menu">
                <?php $this->widget('ext.menu_top.EMenuTop'); ?>
            </ul>

            <div class="menuHide">
                <?php $this->widget('ext.menu_top_mobile.EMenuMobile'); ?>
            </div><!--end menuHide-->


        </div><!--end menuMain-->

        <div class="clr"></div>

    </div><!--end pagewrap-->

</div><!--end header-->