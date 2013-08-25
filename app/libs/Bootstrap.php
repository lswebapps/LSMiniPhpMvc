<?php 	

class Bootstrap
{
	
	function __construct($url)
	{
		$this->url = $url;		
	}

	function start_app(){
		$this->extract_url_segments($this->url);
	}

	function extract_url_segments($url){

		$url_segments_array = array();

		//trim url with leading and ending slashes
		$url = rtrim($url, '/');

		//explode the url and get parts
		$url = explode('/', $url);

		//setting default controller name
		$controller_name = "index";
		$action_name = "index";

		if ($this->only_controller_set($url)){
			$controller_name = $url[0];
			$url_segments_array[0] = $controller_name;
			$this->call_controller_with_default_action($controller_name);
		}
		elseif ($this->only_controller_and_action_set($url)) {
			$controller_name = $url[0];
			$url_segments_array[0] = $controller_name;
			$action_name = $url[1];
			$url_segments_array[1] = $action_name;
			$this->call_controller_with_specified_action(
				$controller_name, $action_name);
		}
		elseif ($this->all_url_segments_set($url)){
			$controller_name = $url[0];
			$url_segments_array[0] = $controller_name;
			$action_name = $url[1];
			$url_segments_array[1] = $action_name;
			$parameter = $url[2];
			$url_segments_array[2] = $parameter;
			$this->call_controller_with_specified_action_and_parameter(
				$controller_name, $action_name, $parameter);
		}
		else{
			$url_segments_array[0] = $controller_name;
			$this->call_default_controller();
		}

		return $url_segments_array;
	}

	function only_controller_set($url_segments_array){

		if(isset($url_segments_array[0]) && 
				!isset($url_segments_array[1]) && 
				!isset($url_segments_array[2])){

			return true;
		}

		return false;
	}

	function only_controller_and_action_set($url_segments_array){

		if(isset($url_segments_array[0]) && 
				isset($url_segments_array[1]) && 
				!isset($url_segments_array[2])){

			return true;
		}

		return false;
	}

	function all_url_segments_set($url_segments_array){

		if(isset($url_segments_array[0]) && 
				isset($url_segments_array[1]) && 
				isset($url_segments_array[2])){

			return true;
		}

		return false;
	}

	function call_controller_with_default_action(
		$controller_name){

		try{
			$controller_name = ucfirst($controller_name);
			if(class_exists($controller_name)){
				$controller = new $controller_name();
				$controller->__call("index");	
				return true;
			}
		}
		catch(Exception $e){
			throw new Exception($e);	
		}
		return $this->call_error_controller();
	}

	function call_controller_with_specified_action(
		$controller_name, $action_name){

		try {
			$controller_name = ucfirst($controller_name);
			if(class_exists($controller_name)){
				$controller = new $controller_name();
				$controller->__call($action_name);
				return true;
			}
			
		} catch (Exception $e) {
			throw new Exception($e);
		}
		return $this->call_error_controller();
	}

	function call_controller_with_specified_action_and_parameter(
		$controller_name, $action_name, $parameter){

		try {
			$controller_name = ucfirst($controller_name);
			if(class_exists($controller_name)){
				$controller = new $controller_name();
				$controller->__call($action_name, $parameter);
				return true;
			}	
		} catch (Exception $e) {
			throw new Exception($e);
		}

		return $this->call_error_controller();
	}

	function call_error_controller(){

		$error_controller = new  Error();
		$error_controller->__call("index");
		return false;
	}

	function require_model_for_controller($controller_name){
		$model_filename = APP_PATH."/models/".$controller_name."_model.php";
		if(file_exists($model_filename)){
			require($model_filename);
		}
	}
}

?>