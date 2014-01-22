<?php

Yii::setPathOfAlias('core', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..');
Yii::setPathOfAlias('images', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../applications/images');
if (YII_DEBUG)
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../extensions/kint/Kint.class.php';
return array(
    'name' => 'PTI-campus',
    'import' => array(
        'core.models.*',
        'core.components.*',
        'core.components.ImageRouter.*',
        'core.extensions.yii-backvendor.base.*',
        'core.extensions.yii-backvendor.extensions.*',
        'core.extensions.yii-backvendor.utils.*',
        'core.extensions.yiifilemanager.*',
        'core.extensions.yiifilemanagerfilepicker.*', // <<--THIS
         'core.extensions.yiifilemanagerfilepicker.component.*', // <<--THIS
    ),
    'preload' => array(
        'log',
    ),
    'components' => array(
        'fileman' => array(
            'class' => 'core.extensions.yiifilemanager.YiiDiskFileManager',
            'storage_path' => dirname($_SERVER["SCRIPT_FILENAME"]) . DIRECTORY_SEPARATOR . "data",)
        ,
        'db' => require( dirname(__FILE__) . '/db.php' ),
        'imageRouter' => require( dirname(__FILE__) . '/image_router.php' ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'warning, error',
                ),
            ),
        ),
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'pass123',
            'generatorPaths' => array(
                'core.extensions.bootstrap.gii',
            ),
        ),
    ),
);
?>
