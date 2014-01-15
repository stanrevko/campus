<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/../../../../core/config/main.php'), array(
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
            'defaultController' => 'Site',
            'theme' => 'basic',
            'preload' => array(
                'bootstrap',
            ),
            'import' => array(
                'application.components.*',
                'application.models.*',
                'application.controllers.*',
            //   'core.extensions.yii-backvendor.web.webservice.*',
            ),
            'components' => array(
                'themeManager' => array(
                    'class' => 'CThemeManager',
                //'basePath' => 'application.themes',
                //'baseUrl' => 'www/themes',                  
                ),
                'bootstrap' => array(
                    'class' => 'core.extensions.bootstrap.components.Bootstrap',
                ),
                'widgetFactory' => array(
                    'enableSkin' => true,
                ),
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    'caseSensitive' => false,
                ),
                'errorHandler' => array(
                    'errorAction' => 'api/error',
                ),
                'cache' => array(
                    'class' => 'system.caching.CFileCache',
                    
                ),
            ),
                )
);
?>
