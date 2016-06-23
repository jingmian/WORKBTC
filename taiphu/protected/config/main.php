<?php

$opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);
//$iniUrl = 'http://demo.congnghewebsite.com/cauhinh/app-config.ini';
//$config = parse_ini_string(file_get_contents($iniUrl, false, $context));
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',
    'language' => 'vi',
    // preloading 'log' component
//'preload'=>array('log'),
// autoloading model and component classes
    'timeZone' => 'Asia/Ho_Chi_Minh',
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
    ),
    'behaviors' => array(
        'class' => 'WebApplication',
    ),
    'modules' => array(
        'shop' => array('debug' => 'true'),
// uncomment the following to enable the Gii tool
        'user' => array(
            'tableUsers' => 'users',
            'tableProfiles' => 'profiles',
            'tableProfileFields' => 'profiles_fields',
        ),
        'rights' => array(
            'install' => false,
        ),
        // ...
        'comment' => array(
            'class' => 'ext.comment-module.CommentModule',
            'commentableModels' => array(
// define commentable Models here (key is an alias that must be lower case, value is the model class name)
                'post' => 'Mproducts'
            ),
            // set this to the class name of the model that represents your users
            'userModelClass' => 'User',
            // set this to the username attribute of User model class
            'userNameAttribute' => 'username',
            // set this to the email attribute of User model class
            'userEmailAttribute' => 'email',
        // you can set controller filters that will be added to the comment controller {@see CController::filters()}
//          'controllerFilters'=>array(),
// you can set accessRules that will be added to the comment controller {@see CController::accessRules()}
//          'controllerAccessRules'=>array(),
// you can extend comment class and use your extended one, set path alias here
//          'commentModelClass'=>'comment.models.Comment',
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'file' => array(
            'class' => 'application.extensions.file.CFile',
        ),
        'phpThumb' => array(
            'class' => 'ext.EPhpThumb.EPhpThumb',
            'options' => array()
        ),
        'user' => array(
            'class' => 'RWebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('/user/login'),
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager',
            'connectionID' => 'db',
            'defaultRoles' => array('Authenticated', 'Guest'),
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(),
        ),
//        'db' => array(
//            'connectionString' => 'mysql:host=' . $config['mysql_host'] . ';dbname=' . $config['mysql_db'],
//            'emulatePrepare' => true,
//            'username' => $config['mysql_un'],
//            'password' => $config['mysql_pwd'],
//            'charset' => 'utf8',
//            'tablePrefix' => 'tbl_',
//        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=taiphu',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'tablePrefix' => 'tbl_',
            'charset' => 'utf8',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ),
        'errorHandler' => array(
// use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'clientScript' => array(
            'packages' => array(
                'jquery' => array(
                    'baseUrl' => '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/',
                    'js' => array('jquery.min.js'),
                    'coreScriptPosition' => CClientScript::POS_HEAD
                ),
            ),
        ),
        'cache' => array(
            'class' => 'system.caching.CDbCache',
            'connectionID' => 'db',
            'cacheTableName' => 'tbl_yiicache',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
//                    'class' => 'CFileLogRoute',
//                    'levels' => 'error, warning',
                    'class' => 'CProfileLogRoute',
                    'levels' => 'profile',
                    'showInFireBug' => true,
                    'categories' => 'system.db.CDbCommand.query'
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ), */
            ),
        ),
    ),
    // application-level parameters that can be accessed
// using Yii::app()->params['paramName']
    'params' => array(
//        'pushover' => array(
//            'key' => $config['pushover_key'],
//        ),
//        'google' => array(
//            'maps_api_key' => $config['google_maps_api_key'],
//        ),
// this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
