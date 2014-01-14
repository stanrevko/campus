<?php

return //CMap::mergeArray(
        //require(dirname(__FILE__).'/../../../../core/config/main.php'),
        array(
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
            'defaultController' => 'Site',
            'theme' => 'basic',
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
                'widgetFactory' => array(
                    'enableSkin' => true,
                ),
                'urlManager' => array(
                    'urlFormat' => 'path',
                ),
                'errorHandler' => array(
                    'errorAction' => 'api/error',
                ),
            ),
        //     )
);
?>
