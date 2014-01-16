<?php
        function bin_rand($min = null, $max = null)
{
    $min = ($min) ? (int) $min : 0;
    $max = ($max) ? (int) $max : PHP_INT_MAX;
    
    $range = range($min, $max);
    $average = array_sum($range) / count($range);
    
    $dist = array();
    for ($x = $min; $x <= $max; $x++) {
        $dist[$x] = -abs($average - $x) + $average + 1;
    }
    
    $map = array();
    foreach ($dist as $int => $quantity) {
        for ($x = 0; $x < $quantity; $x++) {
            $map[] = $int;
        }
    }
    
    shuffle($map);
    return current($map);
}
Yii::setPathOfAlias('core', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..');
Yii::setPathOfAlias('images', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../applications/images');
if(YII_DEBUG)
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../extensions/kint/Kint.class.php';
return array(
    'name' => 'PTI-campus',
    'sourceLanguage'=>'ru',
    'language'=>'ru',
    'import' => array(
        'core.models.*',
        'core.components.*',
        'core.components.ImageRouter.*',
        'core.extensions.yii-backvendor.base.*',
        'core.extensions.yii-backvendor.extensions.*',
        'core.extensions.yii-backvendor.utils.*',
    ),
    'preload' => array(
        'log',
    ),
    'components' => array(

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
            'generatorPaths'=>array(
                'core.extensions.bootstrap.gii',
            ),
        ),
    ),
);
?>
