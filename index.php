<?php 
	
//use an autoloader
require('libs/Bootstrap.php');
require('helpers/controller_helper.php');
require('libs/Controller.php');
require('libs/Model.php');
require('libs/View.php');
require('libs/Session.php');
require('libs/Database.php');
require('config/paths.php');
require('config/database.php');
require('exceptions/view_exception.php');
require('exceptions/model_exception.php');

$app = new Bootstrap();

?>