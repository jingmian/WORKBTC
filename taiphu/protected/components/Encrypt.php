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
                Yii::app()->theme = 'mobile';
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

    function convert_vi_to_en($strTitle) {
        $strTitle = strtolower($strTitle);
        $strTitle = trim($strTitle);
        $strTitle = str_replace(' ', '-', $strTitle);
        $strTitle = preg_replace("/(ò|ó|&#7885;|&#7887;|õ|&#417;|&#7901;|&#7899;|&#7907;|&#7903;|&#7905;|ô|&#7891;|&#7889;|&#7897;|&#7893;|&#7895;)/", 'o', $strTitle);
        $strTitle = preg_replace("/(Ò|Ó|&#7884;|&#7886;|Õ|&#416;|&#7900;|&#7898;|&#7906;|&#7902;|&#7904;|Ô|&#7888;|&#7892;|&#7896;|&#7890;|&#7894;)/", 'o', $strTitle);
        $strTitle = preg_replace("/(à|á|&#7841;|&#7843;|ã|&#259;|&#7857;|&#7855;|&#7863;|&#7859;|&#7861;|â|&#7847;|&#7845;|&#7853;|&#7849;|&#7851;)/", 'a', $strTitle);
        $strTitle = preg_replace("/(À|Á|&#7840;|&#7842;|Ã|&#258;|&#7856;|&#7854;|&#7862;|&#7858;|&#7860;|Â|&#7844;|&#7846;|&#7852;|&#7848;|&#7850;)/", 'a', $strTitle);
        $strTitle = preg_replace("/(&#7873;|&#7871;|&#7879;|&#7875;|ê|&#7877;|é|è|&#7867;|&#7869;|&#7865;)/", 'e', $strTitle);
        $strTitle = preg_replace("/(&#7874;|&#7870;|&#7878;|&#7874;|Ê|&#7876;|É|È|&#7866;|&#7868;|&#7864;)/", 'e', $strTitle);
        $strTitle = preg_replace("/(&#7915;|&#7913;|&#7921;|&#7917;|&#432;|&#7919;|ù|ú|&#7909;|&#7911;|&#361;)/", 'u', $strTitle);
        $strTitle = preg_replace("/(&#7914;|&#7912;|&#7920;|&#7916;|&#431;|&#7918;|Ù|Ú|&#7908;|&#7910;|&#360;)/", 'u', $strTitle);
        $strTitle = preg_replace("/(ì|í|&#7883;|&#7881;|&#297;)/", 'i', $strTitle);
        $strTitle = preg_replace("/(Ì|Í|&#7882;|&#7880;|&#296;)/", 'i', $strTitle);
        $strTitle = preg_replace("/(&#7923;|ý|&#7925;|&#7927;|&#7929;)/", 'y', $strTitle);
        $strTitle = preg_replace("/(&#7922;|Ý|&#7924;|&#7926;|&#7928;)/", 'y', $strTitle);
        $strTitle = preg_replace('/(&#273;|&#272;)/', 'd', $strTitle);
        $strTitle = preg_replace("/[^-a-zA-Z0-9]/", '', $strTitle);
        return $strTitle;
    }