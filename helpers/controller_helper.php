<?php 

/**
* 
*/
class Controller_Helper
{
	
	function __construct()
	{
		
	}

	function redirect($location){
		header("Location: ".URL.$location);
		exit();
	}
}

 ?>