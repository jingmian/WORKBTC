<div class="pagewrap">
    <div class="colCent" >
        <div class="proView">

            <div class="col span_1_of_2 matchheight wow fadeInDown">
                <div class="viewLeft">
                    <div class="imgLarge">
                        <ul id="etalage">
                            <?php
                            if ($models['thumbnail']) {
                                $arrImg = explode(',', rtrim($models['thumbnail'], ","));
                                foreach ($arrImg as $items_img) {
                                    ?>
                                    <li>
                                        <img class="etalage_thumb_image" src="<?php echo $items_img; ?>" />
                                        <img class="etalage_source_image" src="<?php echo $items_img; ?>" style="margin-top: -299px"/>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <!--</div>-->

                    </div>
                </div><!--end viewLeft-->
            </div>


            <div class="col span_1_of_2 matchheight wow fadeInDown">
                <div class="viewRight">
                    <form name="frmproduct">
                        <p class="price"> <?php echo number_format(str_replace(',', '', $models['price']), 0, ".", "."); ?> VNĐ</p>
                        <p class="code"><b>Tên Sản phẩm</b>: <?php echo $models['name_' . Yii::app()->language]; ?></p>
                        <div class="scrollbar ps-container">
                            <ul class="proInfo">
                                <?php
                                $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.active = 1 and c.id = o.children_id and o.product_id = "' . $models['id'] . '" order by c.id asc')->queryAll();
                                $a = array();
                                foreach ($optionModels as $options) :
                                    if (!in_array($options['name_vi'], $a)) {
                                        $a[$options['id']] = $options['name_vi'];
                                    }
                                endforeach;
                                ?>

                                <?php
                                foreach ($a as $key => $items) :
                                    $optionModels = Yii::app()->db->createCommand('select c.*,o.val from `' . MCategories::model()->tableName() . '` as c, `' . MOptions::model()->tableName() . '` as o where c.active = 1 and c.id = o.children_id and o.children_id = "' . $key . '"  and o.product_id = "' . $models['id'] . '" order by c.id asc')->queryRow();
                                    ?>
                                    <p>- <?php echo $items; ?>  : <?php echo $optionModels['val']; ?> </p>
                                    <?php
                                endforeach;
                                ?>

                                <p><?php echo $models['des_' . Yii::app()->language]; ?></p>
                                <p><?php echo $models['content_' . Yii::app()->language]; ?></p>

                            </ul>

                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 270px; display: none;">
                                <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>

                            </div>
                            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 187px; display: none;">
                                <div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div>

                            </div>

                        </div>

                        <div class="clr"></div>
                    </form>
                    <div class="clr"></div>
                    <div class="viewShare">
                        <div class="contShare">
                            <div class="addthis_sharing_toolbox"></div>
                        </div><!--end contShare-->
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div><!--end viewRight-->
            </div>

            <div class="clr"></div>
        </div><!--end proView-->


        <div class="titBox text-center center-block"><span class="tit text-center center-block">Sản phẩm cùng loại</span></div>

        <div class="overHide">
            <div class="listPro">
                <?php
                if ($productSame):
                    foreach ($productSame as $valueV):
                        $name = CHtml::encode($valueV['name_' . Yii::app()->language]);
                        $des = CHtml::encode($valueV['des_' . Yii::app()->language]);
                        $link = Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $valueV['slug']);
                        ?>

                        <div class="col span_1_of_4 matchheight wow fadeInDown">
                            <li class='onePro'>
                                <ul>
                                    <a href="<?php echo $link; ?>" title="<?php echo $name; ?>" class="img" >
                                        <img src="<?php echo $valueV['image']; ?>" alt="<?php echo $name; ?>" width='215' height='215' />
                                    </a>
                                    <span>
                                        <a href=''>Đặt hàng</a>
                                        <b>Giá: <?php echo number_format(str_replace(',', '', $valueV['price_promotion']), 0, ".", "."); ?> VNĐ</b>
                                        <sub><?php echo number_format(str_replace(',', '', $valueV['price']), 0, ".", "."); ?> VNĐ</sub>
                                    </span>
                                </ul>
                                <a  href="<?php echo $link; ?>" title="<?php echo $name; ?>">
                                    <?php echo $name; ?>
                                </a>
                            </li>
                        </div>

                        <?php
                    endforeach;
                endif;
                ?>


            </div><!--end listPro-->

            <div class="clr"></div>

        </div><!--end overHide-->

        <div class="clr"></div>
    </div>
</div>