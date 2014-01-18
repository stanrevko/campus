<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/../../../../core/config/main.php'), array(
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
            'sourceLanguage' => 'uk',
            'language' => 'uk',
            
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
                'application.modules.user.*',
                'application.modules.user.models.*',
                'application.modules.user.components.*',
                
            ),
            'modules' => array(
               
                    'menu' => array(
                        // path to the MenuModule class
                        //'class' => '/path/to/vendor/cornernote/yii-menu-module/menu/MenuModule',
                        // The ID of the CDbConnection application component. If not set, a SQLite3
                        // database will be automatically created in protected/runtime/menu-MenuVersion.db.
                        'connectionID' => 'db',
                        // Whether the DB tables should be created automatically if they do not exist. Defaults to true.
                        // If you already have the table created, it is recommended you set this property to be false to improve performance.
                        'autoCreateTables' => true,
                        // The layout used for module controllers.
                        'layout' => 'menu.views.layouts.column1',
                        // Defines the access filters for the module.
                        // The default is MenuAccessFilter which will allow any user listed in MenuModule::adminUsers to have access.
                        'controllerFilters' => array(
                            'menuAccess' => array('menu.components.MenuAccessFilter'),
                        ),
                        // A list of users who can access this module.
                        'adminUsers' => array('admin'),
                        
                        //'yiiStrapPath' => '/path/to/vendor/crisu83/yiistrap',
                    ),
             
               
                #...
                'user' => array(
                    # encrypting method (php hash function)
                    'hash' => 'md5',
                    # send activation email
                    'sendActivationMail' => true,
                    # allow access for non-activated users
                    'loginNotActiv' => false,
                    # activate user on registration (only sendActivationMail = false)
                    'activeAfterRegister' => false,
                    # automatically login from registration
                    'autoLogin' => true,
                    # registration path
                    'registrationUrl' => array('/user/registration'),
                    # recovery password path
                    'recoveryUrl' => array('/user/recovery'),
                    # login form path
                    'loginUrl' => array('/user/login'),
                    # page after login
                    'returnUrl' => array('/user/profile'),
                    # page after logout
                    'returnLogoutUrl' => array('/user/login'),
                ),
            #...
            ),
            'components' => array(
                'user' => array(
                    // enable cookie-based authentication
                    'class' => 'WebUser',
                    'allowAutoLogin' => true,
                    'loginUrl' => array('/user/login'),
                ),
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
