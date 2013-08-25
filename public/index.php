<?php

define('APP_PATH', __DIR__.'/../app');
	
//use an autoloader
require(APP_PATH.'/packages/autoload.php');
// require(APP_PATH.'/libs/Bootstrap.php');
// require(APP_PATH.'/helpers/controller_helper.php');
// require(APP_PATH.'/libs/Controller.php');
// require(APP_PATH.'/libs/Model.php');
// require(APP_PATH.'/libs/View.php');
// require(APP_PATH.'/libs/Session.php');
// require(APP_PATH.'/libs/Database.php');
require(APP_PATH.'/config/paths.php');
require(APP_PATH.'/config/database.php');
// require(APP_PATH.'/exceptions/view_exception.php');
// require(APP_PATH.'/exceptions/model_exception.php');

$app = new Bootstrap($_GET['url']);
$app->start_app();
?>	