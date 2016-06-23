<?php

class EMenuMobile extends CWidget {

    private $menuTop = array();
    private $item;

    public function init() {
        $this->item = new MenuItem();
    }

    public function run() {
        ?>
        <ul class="hideButton">
            <li class="md-trigger" data-modal="menuLink"><i class="fa fa-bars"></i> Menu</li>
            <li class="md-trigger" data-modal="menuPopup"><i class="fa fa-lightbulb-o"></i> Danh mục sản phẩm</li>
        </ul>

        <div class="md-modal md-effect" id="menuLink">
            <div class="md-content">
                <h4>Menu</h4>
                <span class="md-close">x</span>
                <div id="menuMobile">
                    <ul>
                        <?php $this->widget('ext.menu_top.EMenuTopMobile'); ?>
                    </ul>
                </div><!--menu menuMobile-->
            </div><!--end md-content-->
            <div class="clr"></div>
        </div><!--end popup-->


        <div class="md-modal md-effect" id="menuPopup">
            <div class="md-content">
                <h4><a href="">Danh mục sản phẩm</a></h4>
                <span class="md-close">x</span>
                <div id="menuMobile">
                    <ul>
                        <?php
                        $menuTop = Yii::app()->db->createCommand('select * from `' . MModels::model()->tableName() . '` where `parent` = 0 and `status` = 1 order by `number` asc, `id` desc')->queryAll();
                        if ($menuTop) {
                            foreach ($menuTop as $keyM => $valM):
                                $linkProduct = Yii::app()->createUrl('san-pham/' . $valM['slug']);
                                $nameProduct = $valM['name_' . Yii::app()->language];
                                $subMenuProduct = Yii::app()->db->createCommand('select * from `' . MModels::model()->tableName() . '` where `parent` = "' . $valM['id'] . '" and `status` = 1 order by `number` asc, `id` desc')->queryAll();
                                if ($subMenuProduct):
                                    ?>  
                                    <h3>
                                        <?= CHtml::encode($nameProduct); ?>
                                        <ul>
                                            <li>
                                                <?php
                                                foreach ($subMenuProduct as $keyM => $valS):
                                                    $subLink = Yii::app()->createUrl('san-pham/' . $valS['slug']);
                                                    $subName = $valS['name_' . Yii::app()->language];
                                                    $subMenuProductChild = Yii::app()->db->createCommand('select * from `' . MModels::model()->tableName() . '` where `parent` = "' . $valS['id'] . '" and `status` = 1 order by `number` asc, `id` desc')->queryAll();
                                                    ?>
                                                    <a href="<?= $subLink; ?>" title="<?= $subName; ?>">
                                                        <?= $subName; ?>
                                                    </a>

                                                    <?php
                                                    if ($subMenuProductChild):
                                                        ?>
                                                        <ul>
                                                            <?php
                                                            foreach ($subMenuProductChild as $keyM => $valCS):
                                                                $subLinkChild = Yii::app()->createUrl('san-pham/' . $valCS['slug']);
                                                                $subNameChild = $valCS['name_' . Yii::app()->language];
                                                                ?>
                                                                <li>
                                                                    <a href="<?= $subLinkChild; ?>" title="<?= $subNameChild; ?>">
                                                                        <?= $subNameChild; ?>
                                                                    </a>
                                                                </li>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                        </ul>
                                                        <?php
                                                    endif;
                                                    ?>

                                                    <?php
                                                endforeach;
                                                ?>
                                            </li>
                                        </ul>
                                    </h3>

                                    <?php
                                else :
                                    ?>
                                    <li>
                                        <a href="<?= $linkProduct; ?>" title="<?= $nameProduct; ?>">
                                            <?php echo $nameProduct; ?>
                                        </a>
                                    </li>
                                <?php
                                endif;

                            endforeach;
                        }
                        ?>
                        <h3>Đèn trang trí</h3>
                    </ul>
                </div><!--menu menuMobile-->
            </div><!--end md-content-->
            <div class="clr"></div>
        </div><!--end popup-->


        <div class="md-overlay"></div>
        <?php
    }

}
?>