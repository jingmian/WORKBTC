<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    public $title;
    public $metaTitle;
    public $metaKeywords;
    public $metaDescription;
    public $metaImages;

    public function getTitle() {
        if (!$this->title)
            return $this->website['name_' . Yii::app()->language]; //return default keywords   
        return $this->title;
    }

    public function getMetaTitle() {
        if (!$this->metaTitle)
            return $this->website['seo_title']; //return default keywords   
        return $this->metaTitle;
    }

    public function getMetaKeywords() {
        if (!$this->metaKeywords)
            return $this->website['seo_keyworld']; //return default keywords   
        return $this->metaKeywords;
    }

    public function getMetaDescription() {
        if (!$this->metaDescription)
            return $this->website['seo_description']; //return default description
        return $this->metaDescription;
    }

    public function getMetaImages() {
        return $this->metaImages;
    }

    public $layout = '//layout/main';
    public $is_mobile = false;

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            $id = 1;
            $this->screen = Yii::app()->controller->id . '_' . $action->id;
            $this->config = MConfigs::model()->getAllConfig();
            $this->website = MConfig::model()->findByPk($id);
            $this->feature = MFeature::model()->getAllConfig();
            $str = Yii::app()->request->requestUri;
            $arr = explode("/", $str);
            parent::init();
            // access from mobile browser?
            $this->is_mobile = $this->checkMobileAccess();
            if ($this->is_mobile && $this->website['responsive'] == 1) {
//            echo "this is mobile";
                Yii::app()->theme = 'templates';
                $this->layout = '//layouts/main';
            } else if ($arr[1] == "admin") {
//            echo "this is admin";
                Yii::app()->theme = 'admin';
                $this->layout = '//layouts/main';
            } else {
//            echo "this is desktop";
                Yii::app()->theme = 'templates';
                $this->layout = '//layouts/main';
            }

            $this->registerGoogleAnalytics();
//            $this->registerDefaults();
        }
        return true;
    }

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    private function checkMobileAccess() {
        $ua = $_SERVER['HTTP_USER_AGENT'];
        $is_mobile = (
                (strpos($ua, 'iPhone') !== false) // iPhone
                || ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false)) // Android Mobile
                || (strpos($ua, 'Windows Phone') !== false) // Windows Phone
                || (strpos($ua, 'BlackBerry') !== false) // BlackBerry
                );
        return $is_mobile;
    }

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $language = 'vi';

    /**
     * @var string context this controler'name and action'name for current page.
     */
    public $screen = '';

    /**
     * @var array contain all config options for website  
     */
    public $config = array();
    public $website = array();
    public $feature = array();

    /**
     * @var string the canonical link for current page
     */
    public $canonical = '';

    public function setCanonical($url = '') {
        $this->canonical = Yii::app()->getBaseUrl(true) . $url;
    }

    public function setMeta($model) {
        if (isset($model['title']) && isset($model['description']) && $model['keyword']) {
            $this->seo_title = CHtml::encode($model['title']);
            $this->seo_description = CHtml::encode($model['description']);
            $this->seo_keywords = CHtml::encode($model['keyword']);
        }
    }

    function myTruncate($string, $limit, $break = ".", $pad = "...") {
        // return with no change if string is shorter than $limit
        if (strlen($string) <= $limit)
            return $string;

        // is $break present between $limit and the end of the string?
        if (false !== ($breakpoint = strpos($string, $break, $limit))) {
            if ($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $pad;
            }
        }

        return $string;
    }

    protected $_canonicalUrl;

    /**
     * Default canonical url generator, will remove all get params beside 'id' and generates an absolute url.
     * If the canonical url was already set in a child controller, it will be taken instead.
     */
    public function getCanonicalUrl() {
        if ($this->_canonicalUrl === null) {
            $params = array();
            if (isset($_GET['id'])) {
                //just keep the id, because it identifies our model pages
                $params = array('id' => $_GET['id']);
            }
            $this->_canonicalUrl = Yii::app()->createAbsoluteUrl($this->route, $params);
        }
        return $this->_canonicalUrl;
    }

    public function registerDefaults() {
        $cs = Yii::app()->clientScript;
        $cs->packages = array(
            'jquery.ui' => array(
                'baseUrl' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.8/',
                'js' => array('jquery-ui.min.js'),
                'depends' => array('jquery'),
                'coreScriptPosition' => CClientScript::POS_BEGIN
            ),
            'googlemap' => array(
                'baseUrl' => '//maps.googleapis.com/maps/',
                'js' => array('api/js'),
                'depends' => array('jquery'),
                'coreScriptPosition' => CClientScript::POS_BEGIN
            ),
            'addthis' => array(
                'baseUrl' => '//s7.addthis.com/js/300/',
                'js' => array('addthis_widget.js#pubid=ra-5646a7b75cc716ee'),
                'depends' => array('jquery'),
                'coreScriptPosition' => CClientScript::POS_BEGIN
            ),
            'main.css' => array(
                'basePath' => 'application.res',
                'baseUrl' => Yii::app()->theme->baseUrl . '/assets/frontend/layout',
                'css' => array('css/main.css'),
                'coreScriptPosition' => CClientScript::POS_HEAD
            ),
            'script.js' => array(
                'baseUrl' => Yii::app()->theme->baseUrl . '/assets/frontend/layout',
                'js' => array('scripts/script.js'),
                'depends' => array('jquery'),
                'coreScriptPosition' => CClientScript::POS_END
            ),
        );
        $cs->registerPackage('jquery.ui');
        $cs->registerPackage('addthis');
        $cs->registerPackage('googlemap');
        $cs->registerPackage('main.css');
        Yii::app()->clientScript->registerMetaTag($this->getMetaTitle(), 'title');
        Yii::app()->clientScript->registerMetaTag($this->getMetaKeywords(), 'keywords');
        Yii::app()->clientScript->registerMetaTag($this->getMetaDescription(), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getMetaTitle(), null, null, array('property' => "og:title"));
        Yii::app()->clientScript->registerMetaTag($this->getMetaTitle(), null, null, array('property' => "og:site_name"));
        Yii::app()->clientScript->registerMetaTag($this->getMetaDescription(), null, null, array('property' => "og:description"));
        Yii::app()->clientScript->registerMetaTag($this->getMetaTitle(), null, null, array('property' => "og:type"));
        Yii::app()->clientScript->registerMetaTag(Yii::app()->getBaseUrl(true) . $this->getMetaImages(), null, null, array('property' => "og:image"));
        Yii::app()->clientScript->registerMetaTag(Yii::app()->getBaseUrl(true) . Yii::app()->getRequest()->getRequestUri(), null, null, array('property' => "og:url"));
        if ($this->website['responsive'] == 2):
            ?>
            <meta name="viewport" content="width=1024">
            <?php
        else:
            ?>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <?php
        endif;
    }

    public function registerGoogleAnalytics() {
        if ($this->website['google']) {
            Yii::app()->clientScript->registerScript('GA', "
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', '" . Yii::app()->params['cdn'] . "', '{$_SERVER['SERVER_NAME']}');
            ga('send', 'pageview');
        ");
        }
        Yii::app()->clientScript->registerScript('facebook-jssdk', "(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = '//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=991283187581767';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));");
    }

    private function _get_viewed_product($product_id = 0) {
        $flag = FALSE;
        if ($this->phpsession->get('viewed_product') == '')
            $this->phpsession->save('viewed_product', $product_id);
        else {
            $str = $product_id;
            $viewed_array = explode(':', $this->phpsession->get('viewed_product'));
            foreach ($viewed_array as $a) {
                if ($str == $a) {
                    $flag = FALSE;
                    break;
                } else {
                    $flag = TRUE;
                }
            }
        } if ($flag)
            $this->phpsession->save('viewed_product', $this->phpsession->get('viewed_product') . ':' . $str);
        $product_ids = explode(':', $this->phpsession->get('viewed_product'));
        if (count($product_ids) > 4) {
            array_shift($product_ids);
            $b = '';
            foreach ($product_ids as $id) {
                if ($b == '')
                    $b .= $id;
                else
                    $b .= ':' . $id;
            } $this->phpsession->save('viewed_product', $b);
        } return explode(':', $this->phpsession->get('viewed_product'));
    }

}
