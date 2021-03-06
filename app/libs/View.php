<?php 

/**
* 
*/
class View
{
	public $controller;
	public $action;
	
	function __construct(){

	}

	/**
	* This creates the html page for display
	* You can optionally pass in a custom action to render
	* but by default the action used is the action in the 
	* calling controller
	*/
	public function render($action = null, $layout = null){
		require(APP_PATH."/views/header.php");
		if($action === null){
			$view_file = APP_PATH."/views/".$this->controller."/".$this->action.".php";
			if(!file_exists($view_file)){
				throw new Exception("View file for action $this->action does not exist, please create it");
			}
			require($view_file);
		}
		else{
			$view_file = APP_PATH."/views/".$this->controller."/".$action.".php";
			require($view_file);
		}
		require(APP_PATH."/views/footer.php");
	}

	/**
	* This assigns the default
	* view and controller to use for rendering
	*/
	public function prepare($controller, $action){
		$this->controller = strtolower($controller);
		$this->action = strtolower($action);
	}

}

?>