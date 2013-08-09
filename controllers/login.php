<?php  

class Login extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		# code...
	}

	function index(){
		$this->view->render();
	}

	function run(){
		$this->model->run();
	}
}

?>