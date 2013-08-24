<?php  

class Login_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function test(){

	}

	function run(){
		$login = $_POST['login'];
		$password = sha1($_POST['password']);

		$statement = $this->db->prepare("SELECT id FROM users WHERE 
			login = :login AND password = :password");

		$statement->execute(array(
			':login' => $login,
			':password' => $password
		));

		$data = $statement->fetchAll();
		
		$count = $statement->rowCount();

		if($count > 0){
			Session::set("is_logged_in", true);
		}
	}
}

?>