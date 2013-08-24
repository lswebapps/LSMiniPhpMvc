<?php  

if(strpos($_SERVER['HTTP_HOST'], 'localhost') !== false){
	define('URL', 'http://localhost/LSMiniPhpMvc/');
}
else{
	//Define url constant here for your remote server
}

?>