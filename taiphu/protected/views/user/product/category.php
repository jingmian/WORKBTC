<div class="pagewrap">
    <div class="colCent">

        <div class="titBox">
            <span class="tit text-center center-block"><?php echo $model['name_' . Yii::app()->language]; ?></span>
        </div>

        <div class="overHide">
            <div class="loadCont">
                <div class="listPro">

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
                                            <a href='javascript:;' onclick="AddToCart('<?php echo $valueV['id']; ?>');return false;">Đặt hàng</a>
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
                <?php
                $this->widget('CLinkPager', array(
                    'currentPage' => $pages->getCurrentPage(),
                    'itemCount' => $pages->getItemCount(),
                    'pageSize' => $pages->getPageSize(),
                    'maxButtonCount' => 5,
                    'header' => '',
                    'htmlOptions' => array('class' => 'nums'),
                ));
                ?>
                <div class="clr"></div>
            </div><!--end loadCont-->
        </div><!--end overHide-->
        <div class="clr"></div>
    </div>
</div>