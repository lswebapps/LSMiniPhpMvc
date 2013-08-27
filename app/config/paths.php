<?php

define('APP_PATH', __DIR__.'/../');

if(strpos($_SERVER['HTTP_HOST'], 'localhost') !== false){
	define('URL', 'http://localhost/LSMiniPhpMvc/');
}
else{
	//Define url constant here for your remote server
}

?>