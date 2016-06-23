<?php

class EMenuTopMobile extends CWidget {

    private $menuTop = array();
    private $item;

    public function init() {
        $this->item = new MenuItem();
        $this->menuTop = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = 0 and `group` = "main" order by `sort` asc, `id` desc')->queryAll();
    }

    public function run() {
        if ($this->menuTop) {
            foreach ($this->menuTop as $keyM => $valM):
                if ($valM['targetId'] == 9999 && $valM['type'] == "MProductsTop"):
                    $linkProduct = Yii::app()->createUrl('/san-pham/');
                    $nameProduct = "Sản Phẩm";
                    $subMenuProduct = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valM['id'] . '" and `group` = "main" order by `sort` asc, `id` desc')->queryAll();
                    if ($subMenuProduct):
                        ?>  
                        <h3>
                            <?= CHtml::encode($nameProduct); ?>
                            <ul>
                                <li>
                                    <?php
                                    foreach ($subMenuProduct as $keyM => $valS):
                                        $subItem = $this->item->getItem($valS['targetId'], $valS['type']);
                                        $subLink = $this->item->getLink($subItem);
                                        $subName = 'name_' . Yii::app()->language;
                                        $subMenuProductChild = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valS['id'] . '" and `group` = "main" order by `sort` asc, `id` desc')->queryAll();
                                        ?>
                                        <a href="<?= $subLink; ?>" title="<?= CHtml::encode($subItem->$subName); ?>">
                                            <?= CHtml::encode($subItem->$subName); ?>
                                        </a>

                                        <?php
                                        if ($subMenuProductChild):
                                            ?>
                                            <ul>
                                                <?php
                                                foreach ($subMenuProductChild as $keyM => $valCS):
                                                    $subItemChild = $this->item->getItem($valCS['targetId'], $valCS['type']);
                                                    $subLinkChild = $this->item->getLink($subItemChild);
                                                    $subNameChild = 'name_' . Yii::app()->language;
                                                    ?>
                                                    <li>
                                                        <a href="<?= $subLinkChild; ?>" title="<?= CHtml::encode($subItemChild->$subNameChild); ?>">
                                                            <?= CHtml::encode($subItemChild->$subNameChild); ?>
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
                elseif ($valM['targetId'] == 99999 && $valM['type'] == "contact") :
                    $link = Yii::app()->createUrl('/lien-he/');
                    $name = "Liên Hệ";
                    ?>
                    <li>
                        <a href="<?= $link; ?>" title="<?= $name; ?>">
                            <?php echo $name; ?>
                        </a>
                    </li>
                    <?php
                elseif ($valM['targetId'] == 999999 && $valM['type'] == "home") :
                    $link = Yii::app()->createUrl('/site/index');
                    $name = "Trang Chủ";
                    ?>
                    <li>
                        <a href="<?= $link; ?>" title="<?= $name; ?>">
                            <?php echo $name; ?>
                        </a>
                    </li>
                    <?php
                elseif ($valM['targetId'] == 9999999 && $valM['type'] == "videos") :
                    $link = Yii::app()->createUrl('/videos');
                    $name = "Video";
                    ?>
                    <li>
                        <a href="<?= $link; ?>" title="<?= $name; ?>" >
                            <?php echo $name; ?>
                        </a>
                    </li>
                    <?php
                elseif ($valM['targetId'] == 2222 && $valM['type'] == "recruitment") :
                    $link = Yii::app()->createUrl('/recruitment');
                    $name = "TUYỂN DỤNG";
                    ?>
                    <li>
                        <a href="<?= $link; ?>" title="<?= $name; ?>" >
                            <?php echo $name; ?>
                        </a>
                    </li>
                    <?php
                elseif ($valM['targetId'] == 1234 && $valM['type'] == "price") :
                    $link = Yii::app()->createUrl('/price');
                    $name = "BẢNG GIÁ";
                    ?>
                    <li>
                        <a href="<?= $link; ?>" title="<?= $name; ?>" >
                            <?php echo $name; ?>
                        </a>
                    </li>
                    <?php
                elseif ($valM['targetId'] == 1111 && $valM['type'] == "map") :
                    $link = Yii::app()->createUrl('/map');
                    $name = "Bản Đồ";
                    ?>
                    <li>
                        <a href="<?= $link; ?>" title="<?= $name; ?>" >
                            <?php echo $name; ?>
                        </a>
                    </li>
                    <?php
                elseif ($valM['targetId'] == 99999999 && $valM['type'] == "gallery") :
                    $link = Yii::app()->createUrl('/gallery');
                    $name = "Hình Ảnh";
                    ?>
                    <li>
                        <a href="<?= $link; ?>" title="<?= $name; ?>" >
                            <?php echo $name; ?>
                        </a>
                    </li>
                    <?php
                else:
                    $menuItem = $this->item->getItem($valM['targetId'], $valM['type']);
                    $linkPage = $this->item->getLink($menuItem);
                    $namePage = 'name_' . Yii::app()->language;
                    $subMenu = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valM['id'] . '" and `group` = "main" order by `sort` asc, `id` desc')->queryAll();
                    if ($subMenu):
                        ?>  
                        <h3>
                            <?= CHtml::encode($menuItem->$namePage); ?> 
                            <ul>
                                <li>
                                    <?php
                                    foreach ($subMenu as $keyM => $valM):
                                        $subItem = $this->item->getItem($valM['targetId'], $valM['type']);
                                        $subLink = $this->item->getLink($subItem);
                                        $subName = 'name_' . Yii::app()->language;
                                        $TreeMenu = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valM['id'] . '" and `group` = "main" order by `sort` asc, `id` desc')->queryAll();
                                        ?>
                                        <a href="<?= $subLink; ?>" title="<?= CHtml::encode($subItem->$subName); ?>">
                                            <?= CHtml::encode($subItem->$subName); ?>
                                        </a>

                                        <?php
                                        if ($TreeMenu):
                                            ?>
                                            <ul>
                                                <?php
                                                foreach ($TreeMenu as $three) :
                                                    $threeItem = $this->item->getItem($three['targetId'], $three['type']);
                                                    $threeLink = $this->item->getLink($threeItem);
                                                    $threeName = 'name_' . Yii::app()->language;
                                                    ?>
                                                    <li>
                                                        <a href="<?= $threeLink; ?>" title="<?= CHtml::encode($threeItem->$threeName); ?>">
                                                            <?= CHtml::encode($threeItem->$threeName); ?>
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
                            <a href="<?= $linkPage; ?>" title="<?= CHtml::encode($menuItem->$namePage); ?>">
                                <?php echo CHtml::encode($menuItem->$namePage); ?>
                            </a>
                        </li>
                    <?php
                    endif;
                    ?>
                <?php
                endif;
            endforeach;
        }
    }

}
?>