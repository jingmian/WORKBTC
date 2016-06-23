<!-- BEGIN CONTENT -->
<div class="row margin-bottom-10">
    <?php
    if ($models):
        $stt = 0;
        foreach ($models as $keyV => $valueV) :
            $stt++;
            $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.status = 1 and c.id = o.children_id and o.product_id = "' . $valueV['id'] . '" order by c.id asc')->queryAll();
            $a = array();
            foreach ($optionModels as $options) :
                if (!in_array($options['name_vi'], $a)) {
                    $a[$options['id']] = $options['name_vi'];
                }
            endforeach;
            $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
            ?>

            <div class="col-md-3 col-xs-12 col-sm-6 first ">
                <div class="products" >
                    <a href="<?php echo Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $valueV['slug']); ?>" title="<?php echo $name; ?>">
                        <img src="<?= trim($valueV['image']); ?>" class="img-reponsive" alt="<?php echo $name; ?>" />
                        <h3><?php echo $name; ?></h3>
                        <span class="price">
                            <span class="amount">
                                <?php echo number_format($valueV['price'], 0, ".", "."); ?>₫
                            </span>
                            <span class="pre-1day">
                                <?= $this->config['dattruocmotngay']; ?>
                            </span>
                            <span class="mysave">
                                <?php
                                $promotion = (($valueV['price_promotion'] * 100) / $valueV['price']);
                                $percent = round(100 - $promotion);
                                echo "-" . $percent . "%";
                                ?>
                            </span>
                        </span>
                    </a>
                </div>
            </div>   
            <?php
            if ($stt % 4 == 0):
                ?>
            </div><div class="row margin-bottom-10">
                <?php
            endif;
        endforeach;
    endif;
    ?>
</div>
<!-- END CONTENT -->
<?php
if (count($models) == $limitPost) :
    ?>
    <div class="row margin-bottom-20">
        <div class="col-md-12 col-sm-12 col-xs-12 text-center center-block">
            <button class="loadmore btn btn-primary" data-page="<?php echo $page + 1; ?>">Xem Thêm</button>
        </div>
    </div>
    <?php
else:
//    echo "<li>No More Feeds</li>";
endif;
?>

<script type = "text/javascript" >
    jQuery(document).ready(function() {
        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };
        if (isMobile.any()) {
            $('.header').hide();
            $('.pre-header-menu').hide();
            $('.product-item img').css({"width": "100%", "height": "auto"});
            $('.recent-news img').css({"width": "100%", "height": "auto", "max-height": "100%"});
            $('h3').css({"padding-top": "20px"});
            $('.page-slider').css({"width": "100%"});
            $('.pre-footer img').css({"width": "100%"});
            $('.blog-posts img').css({"width": "100%"});
            $('.news_list .products img').css({"width": "100%"});
            $('.products').css({"width": "100%"});
            $('.products img').css({"width": "100%"});
            $('.footer').css({"text-align": "center"});
//            $('.first').css({"padding-left": "-15px"});
            $('.copyright').css({"float": "none", "text-align": "center"});
            $('.products span.price span.pre-1day').css({"left": "-274px", "top": "44px"});
            $('.logoright').hide();
            $('.pre-footer').hide();
            $('.gallery').hide();
            $.getScript('http://bootsnipp.com/dist/scripts.min.js');


        } else {
            $('.navbar-bootsnipp').hide();
        }
    });
</script>













