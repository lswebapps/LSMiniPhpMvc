<?php 

class Error extends Controller
{
	
	function __construct($message = null)
	{
		parent::__construct();

		$this->view->msg = "This page doesn't exist";
	}

	public function index(){
		$this->view->render();
	}

} 
?>