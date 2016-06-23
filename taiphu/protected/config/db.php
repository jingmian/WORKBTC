<?php

$opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);
$iniUrl = 'http://demo.congnghewebsite.com/cauhinh/app-config.ini';
$config = parse_ini_string(file_get_contents($iniUrl, false, $context));
return CMap::mergeArray(require('main.php'), array(
            'components' => array(
                'db' => array(
                    'connectionString' => 'mysql:host=' . $config['mysql_host'] . ';dbname=' . $config['mysql_db'],
                    'emulatePrepare' => true,
                    'username' => $config['mysql_un'],
                    'password' => $config['mysql_pwd'],
                    'charset' => 'utf8',
                    'tablePrefix' => 'tbl_',
                ),
            ),
        ));
?>