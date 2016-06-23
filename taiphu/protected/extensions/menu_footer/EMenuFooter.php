<?php

class EMenuFooter extends CWidget {

    private $menuTop = array();
    private $item;

    public function init() {
        $this->item = new MenuItem();
        $this->menuTop = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = 0 and `group` = "cat" order by `sort` asc, `id` desc')->queryAll();
    }

    public function run() {
        if ($this->menuTop) {
            foreach ($this->menuTop as $keyM => $valM):
                $menuItem = $this->item->getItem($valM['targetId'], $valM['type']);
                $linkPage = $this->item->getLink($menuItem);
                $namePage = 'name_' . Yii::app()->language;
                $subMenu = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valM['id'] . '" and `group` = "cat" order by `sort` asc, `id` desc')->queryAll();
                if ($subMenu):
                    ?>  
                    <!--<div class="footer_block__3 footer_links wow">-->
                        <h3><?= CHtml::encode($menuItem->$namePage); ?> </h3>
                        <!--<ul>-->
                            <?php
                            foreach ($subMenu as $keyM => $valM):
                                $subItem = $this->item->getItem($valM['targetId'], $valM['type']);
                                $subLink = $this->item->getLink($subItem);
                                $subName = 'name_' . Yii::app()->language;
                                $TreeMenu = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `parent` = "' . $valM['id'] . '" and `group` = "cat" order by `sort` asc, `id` desc')->queryAll();
                                ?>
                                <li>
                                    <a href="<?= $subLink; ?>" title="<?= CHtml::encode($subItem->$subName); ?>">
                                        <?= CHtml::encode($subItem->$subName); ?>
                                    </a>
                                </li>
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
                        <!--</ul>-->
                    <!--</div>-->

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
            endforeach;
        }
    }

}
?>