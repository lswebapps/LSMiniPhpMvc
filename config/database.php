<?php  

//Loading different database config based on 
//whether we are on local or remote server

//We are on local machine
if(strpos($_SERVER['SERVER_NAME'], 'localhost') !=== false){
	define('DB_TYPE', 'mysql');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'LSMiniPhpMvc');
	define('DB_USER', 'root');
	define('DB_PASS', '');
}
else{
//We are on remote machine
	//Put remote machines database config here
	define('DB_TYPE', 'mysql');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'LSMiniPhpMvc');
	define('DB_USER', 'root');
	define('DB_PASS', '');
}

?>