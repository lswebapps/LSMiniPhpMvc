<?php  

class Dashboard extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		$is_logged_in = Session::get('is_logged_in');

		if(!$is_logged_in){
			Session::destroy();
			header("Location: ".URL."login");
			exit();
		}
	}

	function index(){
		$this->view->render();
	}

	function logout(){
		Session::destroy();
		header("Location: ../login");
		exit();
	}
}

?>