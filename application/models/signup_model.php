<?php 
class Signup_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function login_validation($uname,$pass){
		$query = $this->db->query("SELECT * FROM users WHERE password = '$pass' AND user_name = '$uname'");
		return $query->row_array();
	}
}


?>