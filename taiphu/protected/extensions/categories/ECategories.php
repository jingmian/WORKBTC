<?php

class ECategories extends CWidget {

    private $categories = array();

    public function init() {
        $this->categories = Yii::app()->db->createCommand('select * from `' . MModels::model()->tableName() . '` where `status` = 1 order by `number` asc, `id` desc')->queryAll();
//        $this->categories = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `group` = "cat" order by `sort` asc, `id` desc')->queryAll();
    }

    function html_ordered_menu($array, $parent_id = 0, $class = "") {
        $has_children = false;
        $item = new MenuItem();
        foreach ($array as $element) {
            $menuName = 'name_' . Yii::app()->language;
            if ($element['parent'] == $parent_id) {
                if ($has_children === false && $parent_id) {
                    $has_children = true;
//                    echo '<div class="grid-container3">';
                    echo '<ul>';
                }
                echo '<li>';
                echo '<a href="' . '/san-pham/' . $element['slug'] . '">' . CHtml::encode($element['name_' . Yii::app()->language]) . '</a>';
                echo $this->html_ordered_menu($array, $element['id'], $class);
                echo '</li>';
            }
        }
        if ($has_children === true && $parent_id) {
            echo '</ul>';
//            echo '</div>';
        }
    }

//    function html_ordered_menu($array, $parent_id = 0, $class = "") {
//        $has_children = false;
//        $item = new MenuItem();
//        foreach ($array as $element) {
//            $menuItem = $item->getItem($element['targetId'], $element['type']);
//            $menuLink = $item->getLink($menuItem);
//            $menuName = 'name_' . Yii::app()->language;
//            if ($element['parent'] == $parent_id) {
//                if ($has_children === false && $parent_id) {
//                    $has_children = true;
//                    echo '<div class="grid-container3">';
//                    echo '<ul>';
//                }
//                echo '<li aria-haspopup="true">';
//                echo '<a href="' . $menuLink . '">' . CHtml::encode($menuItem->$menuName) . '</a>';
//                echo $this->html_ordered_menu($array, $element['id'], $class);
//                echo '</li>';
//            }
//        }
//        if ($has_children === true && $parent_id) {
//            echo '</ul>';
//            echo '</div>';
//        }
//    }

    public function run() {
        if ($this->categories) {
            $class = "sky-mega-menu-left sky-mega-menu-left-pos-left sky-mega-menu-left-response-to-icons sky-mega-menu-left-anim-scale";
            echo $this->html_ordered_menu($this->categories, 0, $class);
        }
    }

}

?>