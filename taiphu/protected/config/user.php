<?php

return CMap::mergeArray(require('main.php'), array(
            'components' => array(
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    'urlSuffix' => '.html',
                    'rules' => array(
                        '/' => 'site/index',
                        'thu-vien-anh/<slug:>' => 'slide/index',
                        'news/<slug:>' => 'post/PostCat/slug/<slug>',
//                        'news/tin-tuc' => 'post/index',
//                        'news/tin-tuc-su-kien' => 'post/index',
                        'lien-he' => 'contact/contact',
                        'giao-hang-tan-noi' => 'feedback/Feedback',
                        'gio-hang' => 'cart/index',
                        'tin-tuc' => 'post/index',
                        'chi-tiet-ban-tin/<slug:>' => 'post/post',
                        'bai-viet/<slug:>' => 'page/index/slug/<slug>',
                        'san-pham' => 'product/ViewAllProducts',
                        'san-pham/page/<page:\d+>' => 'product/ViewAllProducts',
                        'san-pham/<slug:>/' => 'product/productcategory',
                        'tag/<slug:>/' => 'product/tag/slug/<slug>/',
                        'gallery/<slug:>/' => 'gallery/index/slug/<slug>/',
                        'san-pham/chi-tiet-san-pham/<slug:>/' => 'product/ViewProduct/slug/<slug>/',
//                        'compare/remove/<remove:>/' => 'compare/index/remove/<remove>/',
                        'login' => '/user/login',
                        'register' => '/user/registration',
                        'profile' => '/user/profile',
                        'recovery' => '/user/recovery',
                        '<lg:[a-z]+>/ngon-ngu' => 'site/changelanguage',
                    ),
                ),
                
                
            ),
//            'theme' => 'templates',
            'language' => 'vi',
        ));
?>