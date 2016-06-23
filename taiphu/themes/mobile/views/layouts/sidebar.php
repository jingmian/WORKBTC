<div class="snap-drawers">
    <!-- Left Sidebar -->
    <div class="snap-drawer snap-drawer-left">

        <div class="sidebar-header">
            <a href="#"><i class="fa fa-phone"></i></a>
            <a href="#"><i class="fa fa-comment"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-times"></i></a>                
        </div>

        <div class="sidebar-logo">
            <a href="<?= Yii::app()->getBaseUrl(true); ?>" class="pull-left main-logo" style="margin-bottom: 10px;">
                <img class="img-reponsive text-center center-block" src="<?= $this->website['banner']; ?>" />
            </a>
            <h1 style="text-align: center;font-size: 24px;color: #fff"><?= $this->config['namjeans']; ?></h1>
        </div>

        <div class="sidebar-divider">
            Navigation
        </div>

        <ul class="sidebar-navigation">

            <?php
            $mainMenu = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = 0 and `group` = "main" order by `sort` asc, `id` desc')->queryAll();
            if ($mainMenu):
                foreach ($mainMenu as $keyM => $valM):
                    if ($valM['targetId'] == 9999 && $valM['type'] == "MProductsTop"):
                        $linkProduct = Yii::app()->createUrl('/san-pham/');
                        $nameProduct = Yii::t('main', 'PRODUCTS');
                        $subMenuProduct = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valM['id'] . '" and `group` = "main" order by `sort` asc, `id` desc')->queryAll();
                        if ($subMenuProduct):
                            ?>  

                            <li class="has-submenu">
                                <a class="deploy-submenu" href="<?= $linkProduct; ?>" title="<?= $nameProduct; ?>">
                                    <i class="fa fa-angle-double-down"></i>  <?= CHtml::encode($nameProduct); ?> <i class="fa fa-plus"></i>
                                </a>
                                <ul class="submenu">
                                    <?php
                                    foreach ($subMenuProduct as $keyM => $valS):
                                        $subItem = $item->getItem($valS['targetId'], $valS['type']);
                                        $subLink = $item->getLink($subItem);
                                        $subName = 'name_' . Yii::app()->language;
                                        $subMenuProductChild = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valS['id'] . '" and `group` = "main" order by `sort` asc, `id` desc')->queryAll();
                                        ?>
                                        <li>
                                            <a style="padding-left: 56px!important;" href="<?= $subLink; ?>" title="<?= CHtml::encode($subItem->$subName); ?>">
                                                <i class="fa fa-angle-double-down"></i>  <?= CHtml::encode($subItem->$subName); ?>  <i class="fa fa-circle"></i>
                                            </a>
                                        </li>
                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </li>

                            <?php
                        else :
                            ?>
                            <li>
                                <a href="<?= $linkProduct; ?>" title="<?= $nameProduct; ?>">
                                    <i class="fa fa-angle-double-down"></i> <?php echo $nameProduct; ?> <i class="fa fa-circle"></i>
                                </a>
                            </li>
                        <?php
                        endif;
                    elseif ($valM['targetId'] == 99999 && $valM['type'] == "contact") :
                        $link = Yii::app()->createUrl('/lien-he/');
                        $name = Yii::t('main', 'CONTACT');
                        ?>
                        <li>
                            <a href="<?= $link; ?>" title="<?= $name; ?>">
                                <i class="fa fa-envelope"></i> <?php echo $name; ?> <i class="fa fa-circle"></i>
                            </a>
                        </li>
                        <?php
                    elseif ($valM['targetId'] == 999999 && $valM['type'] == "home") :
                        $link = Yii::app()->createUrl('/site/index');
                        $name = Yii::t('main', 'HOME');
                        ?>
                        <li>
                            <a href="<?= $link; ?>" title="<?= $name; ?>">
                                <i class="fa fa-home"></i>  <?= $name; ?> <i class="fa fa-circle"></i>
                            </a>
                        </li>
                        <?php
                    elseif ($valM['targetId'] == 9999999 && $valM['type'] == "videos") :
                        $link = Yii::app()->createUrl('/videos');
                        $name = "Video";
                        ?>
                        <li>
                            <a href="<?= $link; ?>" title="<?= $name; ?>" class="deploy-submenu">
                                <i class="fa fa-angle-double-down"></i> <?php echo $name; ?> <i class="fa fa-circle"></i>
                            </a>
                        </li>
                        <?php
                    elseif ($valM['targetId'] == 2222 && $valM['type'] == "recruitment") :
                        $link = Yii::app()->createUrl('/recruitment');
                        $name = Yii::t('main', 'RECRUITMENT');
                        ?>
                        <li>
                            <a href="<?= $link; ?>" title="<?= $name; ?>" class="deploy-submenu">
                                <i class="fa fa-angle-double-down"></i> <?php echo $name; ?> <i class="fa fa-circle"></i>
                            </a>
                        </li>
                        <?php
                    elseif ($valM['targetId'] == 1111 && $valM['type'] == "map") :
                        $link = Yii::app()->createUrl('/map');
                        $name = "Bản Đồ";
                        ?>
                        <li>
                            <a href="<?= $link; ?>" title="<?= $name; ?>">
                                <i class="fa fa-angle-double-down"></i> <?php echo $name; ?> <i class="fa fa-circle"></i>
                            </a>
                        </li>
                        <?php
                    elseif ($valM['targetId'] == 99999999 && $valM['type'] == "gallery") :
                        $link = Yii::app()->createUrl('/gallery');
                        $name = "Hình Ảnh";
                        ?>
                        <li>
                            <a href="<?= $link; ?>" title="<?= $name; ?>">
                                <i class="fa fa-angle-double-down"></i> <?php echo $name; ?> <i class="fa fa-circle"></i>
                            </a>
                        </li>
                        <?php
                    else:
                        $menuItem = $item->getItem($valM['targetId'], $valM['type']);
                        $linkPage = $item->getLink($menuItem);
                        $namePage = 'name_' . Yii::app()->language;
                        $subMenu = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valM['id'] . '" and `group` = "main" order by `sort` asc, `id` desc')->queryAll();
                        if ($subMenu):
                            ?> 

                            <li class="has-submenu">
                                <a class="deploy-submenu" href="<?= $linkPage; ?>" title="<?= CHtml::encode($menuItem->$namePage); ?>">
                                    <i class="fa fa-angle-double-down"></i> <?= CHtml::encode($menuItem->$namePage); ?>   <i class="fa fa-plus"></i>
                                </a>
                                <ul class="submenu">
                                    <?php
                                    foreach ($subMenu as $keyM => $valM):
                                        $subItem = $item->getItem($valM['targetId'], $valM['type']);
                                        $subLink = $item->getLink($subItem);
                                        $subName = 'name_' . Yii::app()->language;
                                        ?>
                                        <li>
                                            <a style="padding-left: 56px!important;" href="<?= $subLink; ?>" title="<?= CHtml::encode($subItem->$subName); ?>">
                                                <i class="fa fa-angle-double-down"></i>  <?= CHtml::encode($subItem->$subName); ?>  <i class="fa fa-circle"></i>
                                            </a>
                                        </li>
                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </li>

                            <?php
                        else :
                            ?>
                            <li>
                                <a href="<?= $linkPage; ?>" title="<?= CHtml::encode($menuItem->$namePage); ?>">
                                    <i class="fa fa-angle-double-down"></i>  <?php echo CHtml::encode($menuItem->$namePage); ?> <i class="fa fa-circle"></i>
                                </a>
                            </li>
                        <?php
                        endif;
                        ?>
                    <?php
                    endif;
                endforeach;
            endif;
            ?>
        </ul>                        
        <div class="sidebar-divider">
            Copyright 2015. All rights reserved.
        </div>
    </div>
</div>