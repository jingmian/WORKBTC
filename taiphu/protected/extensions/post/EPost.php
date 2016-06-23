<?php

class EPost extends CWidget {

    private $post = array();
    private $item;

    public function init() {
        $this->item = new MenuItem();
        $this->post = Yii::app()->db->createCommand('select * from `' . MMenus::model()->tableName() . '` where `group` = "cat" order by `sort` asc, `id` desc')->queryAll();
    }

    function html_ordered_menu($array, $parent_id = 0, $class = "") {
        $has_children = false;
        $item = new MenuItem();
        foreach ($array as $element) {
            $subItem = $item->getItem($element['targetId'], $element['type']);
            $subLink = $item->getLink($subItem);
            $subName = 'name_' . Yii::app()->language;
            if ($element['parent'] == $parent_id) {
                if ($has_children === false && $parent_id) {
                    $has_children = true;
                    echo '<div class="grid-container3">';
                    echo '<ul>';
                }
                echo '<li aria-haspopup="true">';
                echo '<a href="' . $subLink . '" title="' . CHtml::encode($subItem->$subName) . '">' . CHtml::encode($subItem->$subName) . '</a>';
                echo $this->html_ordered_menu($array, $element['id'], $class);
                echo '</li>';
            }
        }
        if ($has_children === true && $parent_id) {
            echo '</ul>';
            echo '</div>';
        }
    }

    public function run() {
        if ($this->post) {
            $class = "sky-mega-menu-left sky-mega-menu-left-pos-left sky-mega-menu-left-response-to-icons sky-mega-menu-left-anim-scale";
            echo $this->html_ordered_menu($this->post, 0, $class);
        }
    }

}

?>