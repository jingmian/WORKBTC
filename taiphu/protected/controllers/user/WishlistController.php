<?php

class WishListController extends Controller {

    public function actionIndex() {
        if (!$this->customer->isLogged()) {
            Yii::app()->session['redirect'] = Yii::app()->createUrl('/wishlist/index/');
            $this->redirect('account/login');
        }
        if (isset($_GET['remove'])) {
            // Remove Wishlist
            MWishlist::model()->deleteWishlist($_GET['remove']);
            Yii::app()->session['success'] = "Remove This Products";
            $this->redirect('wishlist/index');
        }
        if (isset(Yii::app()->session['success'])) {
            $data['success'] = Yii::app()->session['success'];
            unset(Yii::app()->session['success']);
        } else {
            $data['success'] = '';
        }
        $data['products'] = array();
        $results = MWishlist::model()->getWishlist();
        $this->render('wishlist', array("data" => $results));
    }

    public function actionAdd() {
        $json = array();
        if (isset($_POST['product_id'])) {
            $product_id = $_POST['product_id'];
        } else {
            $product_id = 0;
        }
        $product_info = MProducts::model()->getProduct($product_id);
        if ($product_info) {
            if ($this->customer->isLogged()) {
                // Edit customers cart
                $this->load->model('account/wishlist');
                $this->model_account_wishlist->addWishlist($_POST['product_id']);
                $linkProduct = Yii::app()->createUrl('/san-pham/' . $product_info['slug']);
                $linkWishList = Yii::app()->createUrl('/compare/index/');
                $json['success'] = array($this->config['text_success'], "<a href='" . $linkProduct . "'>" . $product_info['name_' . Yii::app()->language] . "</a>", "to your", "<a href='" . $linkCompare . "'>" . "Products Comparison" . "</a>");
                $json['total'] = array($this->config['text_wishlist'], $this->model_account_wishlist->getTotalWishlist());
            } else {
                if (!isset(Yii::app()->session['wishlist'])) {
                    Yii::app()->session['wishlist'] = array();
                }
                Yii::app()->session['wishlist'][] = $_POST['product_id'];
                Yii::app()->session['wishlist'] = array_unique(Yii::app()->session['wishlist']);
                $linkProduct = Yii::app()->createUrl('/san-pham/' . $product_info['slug']);
                $linkWishList = Yii::app()->createUrl('/wishlist/index/');
                $linkLogin = Yii::app()->createUrl('/account/login/');
                $linkRegister = Yii::app()->createUrl('/account/register/');
                $json['success'] = array($this->config['text_login'], "<a href='" . $linkLogin . "'>" . "Login or " . "</a>", "<a href='" . $linkRegister . "'>" . "Register " . "</a>", "<a href='" . $linkProduct . "'>" . "To add products " . $product_info['name_' . Yii::app()->language] . "</a>", "<a href='" . $linkWishList . "'>" . " to Wishlish" . "</a>");
                $json['total'] = array($this->config['text_wishlist'], (isset(Yii::app()->session['compare']) ? count(Yii::app()->session['wishlist']) : 0));
            }
        }

        header('Content-type: application/json');
        echo CJSON::encode($json);
    }

}
