<?php

return CMap::mergeArray(require('main.php'), array(
            'name' => 'Quản lý website',
            'theme' => 'admin',
            'components' => array(
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => true,
                    'rules' => array(
                    ),
                ),
                'authManager' => array(
                    'class' => 'CDbAuthManager',
                    'connectionID' => 'db',
                    'assignmentTable' => 'tbl_authassignmen',
                    'itemTable' => 'tbl_authitem',
                    'itemChildTable' => 'tbl_authitemchild',
                )
            ),
        ));
?>