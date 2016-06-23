<?php

class MenuItem implements IMenuItem {

    public function getObject($type) {
        return CActiveRecord::model($type);
    }

    public function getItemName($id, $type) {
        if ($type == "MProductsTop"):
            return 'SẢN PHẨM';
        elseif ($type == "contact") :
            return 'LIÊN HỆ';
        elseif ($type == "videos") :
            return 'VIDEOS';
        elseif ($type == "gallery") :
            return 'GALLERY';
        elseif ($type == "map") :
            return 'BẢN ĐỒ';
        elseif ($type == "recruitment") :
            return 'TUYỂN DỤNG';
        elseif ($type == "price") :
            return 'BẢNG GIÁ';
        elseif ($type == "home") :
            return 'TRANG CHỦ';
        else:
            $model = $this->getItem($id, $type);
            return $model ? CHtml::encode($model->name_vi) : 'N/A';
        endif;
    }

    public function getItem($id, $type) {
        $obj = $this->getObject($type);
        return $obj->findByPk($id);
    }

    public function getType(CActiveRecord $item) {
        return get_class($item);
    }

    public function getLink(CActiveRecord $item) {
        switch ($this->getType($item)) {
            case 'MNewsCats':
                $link = Yii::app()->createUrl('/news/' . $item['slug']);
                break;
            case 'MPages':
                $link = Yii::app()->createUrl('/bai-viet/' . $item['slug']);
//                $link = Yii::app()->createUrl('page/page', array('lg' => Yii::app()->language, 'slug' => $item['slug']));
                break;
            case 'MModels':
                $link = Yii::app()->createUrl('/san-pham/' . $item['slug']);
                break;

            case 'MProducts':
                $link = Yii::app()->createUrl('/san-pham/chi-tiet-san-pham/' . $item['slug']);
                break;
            
            case 'MNews':
                $link = Yii::app()->createUrl('/chi-tiet-ban-tin/' . $item['slug']);
                break;

            case 'MProductsTop':
                $link = Yii::app()->createUrl('/san-pham/');
                break;

            case 'contact':
                $link = Yii::app()->createUrl('/lien-he/');
                break;

            case 'videos':
                $link = Yii::app()->createUrl('/videos/');
                break;
            
            case 'recruitment':
                $link = Yii::app()->createUrl('/recruitment/');
                break;
            
            case 'price':
                $link = Yii::app()->createUrl('/price/');
                break;
            
            case 'gallery':
                $link = Yii::app()->createUrl('/gallery/');
                break;
            
            case 'map':
                $link = Yii::app()->createUrl('/map/');
                break;

            case 'home':
                $link = Yii::app()->createUrl('/site/index');
                break;
//            case 'MModels':
//                $link = Yii::app()->createUrl('product/index', array('lg' => Yii::app()->language, 'slug' => $item['slug']));
//                break;
            default:
                $link = Yii::app()->getBaseUrl();
                break;
        }
        return $link;
    }

}

?>