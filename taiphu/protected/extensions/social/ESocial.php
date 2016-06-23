<?php

class ESocial extends CWidget {

    private $config = array();

    public function init() {
        $this->config = MConfigs::model()->getAllConfig();
    }

    public function run() {
        ?>
        <!--        <ul class="social-footer list-unstyled list-inline text-right pull-right">
                    <li><a href="<?= $this->config['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?= $this->config['facebook']; ?>"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="<?= $this->config['facebook']; ?>"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="<?= $this->config['facebook']; ?>"><i class="fa fa-skype"></i></a></li>
                    <li><a href="<?= $this->config['facebook']; ?>"><i class="fa fa-youtube"></i></a></li>
                </ul>-->

        <ul class="text-center center-block list-unstyled list-inline">
                <!--<li><a class="rss" data-original-title="rss" href="<? $this->config['facebook']; ?>"></a></li>-->
            <li>
                <a  href="<?= $this->config['facebook']; ?>" target="_blank">
                    <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/facebook.png"/>
                </a>
            </li>
            <!--<li><a class="googleplus" data-original-title="googleplus" href="<? $this->config['facebook']; ?>"></a></li>-->
            <!--<li><a class="skype" data-original-title="skype" href="<? $this->config['facebook']; ?>"></a></li>-->
            <li>
                <a  href="<?= $this->config['twitter']; ?>" target="_blank">
                    <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/twitter.png"/>
                </a>
            </li>
            <!--<li><a class="linkedin" data-original-title="linkedin" href="<? $this->config['facebook']; ?>"></a></li>-->
            <li>
                <a  href="<?= $this->config['googleplus']; ?>" target="_blank">
                    <img src="<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/rss.png"/>
                </a>
            </li>
        </ul>


        <?php
    }

}
?>