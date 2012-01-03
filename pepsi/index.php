<?php
$yii=dirname(__FILE__).'/../yii/yii.php';
if(file_exists('./server.me'))
{
    $config=dirname(__FILE__).'/protected/config/production.php';
}
else
{
    ini_set('xdebug.var_display_max_depth',5);
    $config=dirname(__FILE__).'/protected/config/development.php';
    defined('YII_DEBUG') or define('YII_DEBUG',true);
}

require_once($yii);
Yii::createWebApplication($config)->run();
?>
