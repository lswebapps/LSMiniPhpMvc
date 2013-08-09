<?php 	

class Bootstrap
{
	
	function __construct()
	{
		$url = $_GET['url'];
		$url = rtrim($url, '/');
		$url = explode('/', $url);

		//setting default controller name
		$controller_name = "index";

		//check if a controller has been specified
		if(isset($url[0]) && !empty($url[0])){
			$controller_name = $url[0];

			//require/load controller file
			$file = 'controllers/'.$controller_name.'.php';
			if(file_exists($file)){
				require($file);
				$this->require_model_for_controller($controller_name);
				$controller = new $controller_name();
			}
			else{
				//throw an error if the file does not exist
				require("controllers/error.php");
				$this->require_model_for_controller($controller_name);
				$error_controller = new  Error();
				$error_controller->__call("index");
				return false;
			}
		}
		else{
			$file = 'controllers/'.$controller_name.'.php';
			require($file);
			$this->require_model_for_controller($controller_name);
			//if not, then load default controller
			$controller = new $controller_name();
		}

		//call controller with method and argument
		if(isset($url[2]) && isset($url[1])){
			$controller->__call($url[1], $url[2]);
		}
		else if(isset($url[1])){

			//call controller with method only
			$controller->__call($url[1]);
		}
		else{
			//call controller with default method
			//because no method was explicitly given
			$controller->__call('index');
		}
	}

	function require_model_for_controller($controller_name){
		$model_filename = "models/".$controller_name."_model.php";
		if(file_exists($model_filename)){
			require($model_filename);
		}
	}
}

?>