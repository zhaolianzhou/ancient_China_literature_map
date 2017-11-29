<?php

$dirname = dirname(__FILE__);
if (file_exists($dirname . '/vendor/autoload.php')){
    require_once($dirname . '/vendor/autoload.php');
}
if (file_exists($dirname . '/vendor/yiisoft/yii/framework/yii.php')) {
    $yii = $dirname . '/vendor/yiisoft/yii/framework/yii.php';
} else {
    $yii = $dirname . '/protected/yii/framework/yii.php';
}$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();

