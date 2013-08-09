<?php 

class Controller
{
	function __construct()
	{
		Session::init();

		//instantiating view so it is 
		//available in child classes
		$this->view = new View();

		//by convention models for controllers should
		//be the controllername followeed by '_Model'
		$class_name = get_called_class()."_Model";
		if(class_exists($class_name)){
			try {
				$this->model = new $class_name();
			} catch (Exception $e) {
				throw new Model_Exception("Error creating model");
			}
		}
	}

	public function __call($name, $args = null){

		if(!method_exists($this, $name)){
			throw new Exception("Action $name does not exist, create it in the appropriate controller, probably ".get_called_class());
			return false;
		}

		//sets the default controller and action variables
		//for the view to use for rendering
		$this->view->prepare(get_called_class(), $name);

		// $reflectionMethod = new ReflectionMethod(get_called_class(), $name);
		// $reflectionMethod->invoke($this, $args);

		//now manually invoke the function passing any parameters
		$this->$name($args);
	}
}

?>