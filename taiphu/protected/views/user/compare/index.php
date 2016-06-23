<div class="main">
    <div class="container">

        <div class="row service-box" style="padding-bottom: 30px;padding-top: 30px;">
            <div class="col-md-12 col-sm-12">
                <div id="sp-pathway" class="clearfix">
                    <div class="sp-inner clearfix">
                        <span class="breadcrumbs">
                            <a href="<?= Yii::app()->getBaseUrl(true); ?>">Trang Chủ</a>
                            <span class="current">Sản Phẩm ...</span>
                        </span>
                        <span class="breadcrumbs-outer"></span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-xs-12 col-sm-12 col-md-3">
                <div class="text-center center-block btn-tab-product" style="padding-top: 10px;">
                    <div class="title-product text-center center-block" style="font-size: 18px">
                        <?php echo Yii::t('main', 'PRODUCT CATEGORY'); ?>
                        <div class="line-throught-promotion text-center center-block"></div>
                    </div>
                </div>
                <div class="body">
                    <aside>
                        <!-- mega menu -->
                        <ul class="sky-mega-menu-left sky-mega-menu-left-pos-left sky-mega-menu-left-response-to-icons sky-mega-menu-left-anim-scale">
                            <?php $this->widget('ext.categories.ECategories'); ?>
                        </ul>
                        <!--/ mega menu --> 
                    </aside>
                </div>

                <div class="clearfix"></div>

                <div class="text-center center-block btn-tab-product" style="padding-top: 10px;">
                    <div class="title-product text-center center-block" style="font-size: 18px">
                        VIDEO
                        <div class="line-throught-promotion text-center center-block"></div>
                    </div>
                </div>
                <div class="body">
                    <aside>
                        <?php
                        $video = Yii::app()->db->createCommand('select * from `' . MVideos::model()->tableName() . '` where `homepage` = 1 order by `id` desc limit 0,1')->queryRow();
                        ?>
                        <!-- mega menu -->
                        <iframe style="padding-top: 10px;padding-left: 5px;padding-right: 5px;" id="<?= $video['videoId']; ?>" frameborder="0" allowfullscreen="1" title="YouTube video player" width="100%" height="220" src="https://www.youtube.com/embed/<?= $this->config['videoID']; ?>?controls=1&amp;autoplay=0&amp;showinfo=0&amp;start=0&amp;loop=0&amp;modestbranding=1&amp;hl=vi&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fdemo.ngonhaidang.com.vn"></iframe>
                        <!--/ mega menu --> 
                    </aside>
                </div>

                <div class="clearfix"></div>

                <div class="text-center center-block btn-tab-product" style="padding-top: 10px;">
                    <div class="title-product text-center center-block" style="font-size: 18px">
                        FANPAGE
                        <div class="line-throught-promotion text-center center-block"></div>
                    </div>
                </div>
                <div class="body">
                    <aside>
                        <div class="fb-page" style="padding-top: 30px" data-href="https://www.facebook.com/<?= $this->website['fax']; ?>" data-tabs="timeline" data-width="400" data-height="200" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/<?= $this->website['fax']; ?>">
                                    <a href="https://www.facebook.com/<?= $this->website['fax']; ?>"><?= $this->website['fax']; ?></a>
                                </blockquote>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <div class="goods-page">
                    <div class="goods-data compare-goods clearfix">
                        <div class="table-wrapper-responsive">                
                            <table summary="Product Details">                  
                                <tr>
                                    <td class="compare-info">
                                        <p>There are 2 goods in the list.</p>
                                    </td>

                                    <?php
                                    foreach ($data as $product) :
                                        $product_info = MProducts::model()->getProduct($product);
                                        $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.status = 1 and c.id = o.children_id and o.product_id = "' . $product_info['id'] . '" order by c.id asc')->queryAll();
                                        $a = array();
                                        foreach ($optionModels as $options) :
                                            if (!in_array($options['name_vi'], $a)) {
                                                $a[$options['id']] = $options['name_vi'];
                                            }
                                        endforeach;
                                        $name = CHtml::encode($product_info['name_' . Yii::app()->language]);
                                        $des = CHtml::encode($product_info['des_' . Yii::app()->language]);
                                        $link = Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $product_info['slug']);
                                        ?>
                                        <td class="compare-item">
                                            <a href="<?php echo $link; ?>" title="<?php echo $name; ?>">
                                                <img src="<?php echo $product_info['image']; ?>" alt="<?php echo $name; ?>">
                                            </a>
                                            <h3><a href="<?php echo $link; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></h3>
                                            <strong class="compare-price"><?php echo $product_info['price']; ?></strong>
                                        </td>
                                        <?php
                                    endforeach;
                                    ?>

                                </tr>

                                <tr>
                                    <th colspan="3">
                                        <h2 style="color: #333">Product Details</h2>
                                    </th>
                                </tr>



                                <tr>
                                    <td class="compare-info">
                                        Mô Tả Sản Phẩm
                                    </td>
                                    <?php
                                    foreach ($data as $product) :
                                        $product_info = MProducts::model()->getProduct($product);
                                        $des = CHtml::encode($product_info['des_' . Yii::app()->language]);
                                        ?>
                                        <td class="compare-item">
                                            <?php echo $des; ?>
                                        </td>
                                        <?php
                                    endforeach;
                                    ?>
                                </tr>
                                <tr>
                                    <td class="compare-info">
                                        Nội Dung Sản Phẩm
                                    </td>
                                    <?php
                                    foreach ($data as $product) :
                                        $product_info = MProducts::model()->getProduct($product);
                                        $content = $product_info['content_' . Yii::app()->language];
                                        ?>
                                        <td class="compare-item">
                                            <?php echo $content; ?>
                                        </td>
                                        <?php
                                    endforeach;
                                    ?>
                                </tr>



                                <tr>
                                    <th colspan="3">
                                        <h2 style="color: #333">Features</h2>
                                    </th>
                                </tr>

                                <?php
                                foreach ($a as $key => $items) :
                                    ?>
                                    <tr>
                                        <td class="compare-info">
                                            <?php echo $items; ?>
                                        </td>
                                        <?php
                                        foreach ($data as $product) :
                                            $product_info = MProducts::model()->getProduct($product);
                                            $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.active = 1 and c.id = o.children_id and o.children_id = "' . $key . '"  and o.product_id = "' . $product_info['id'] . '" order by c.id asc')->queryRow();
                                            ?>
                                            <td class="compare-item">
                                                <?php echo $optionModels['val']; ?>
                                            </td>
                                            <?php
                                        endforeach;
                                        ?>

                                    </tr>
                                    <?php
                                endforeach;
                                ?>

                                <tr>
                                    <td class="compare-info">&nbsp;</td>
                                    <?php
                                    foreach ($data as $product) :
                                        $product_info = MProducts::model()->getProduct($product);
                                        $remove = Yii::app()->createUrl('/compare/index/', array('remove' => $product_info['id']));
                                        ?>
                                        <td class="compare-item">
                                            <a class="btn btn-primary" href="#">Add to cart</a><br>
                                            <a class="btn btn-default" href="<?php echo $remove; ?>">Delete</a>
                                        </td>
                                        <?php
                                    endforeach;
                                    ?>
                                </tr>
                            </table>
                            <p class="padding-top-20"><strong>Notice:</strong> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip commodo consequat. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->

        </div>
    </div>
</div>