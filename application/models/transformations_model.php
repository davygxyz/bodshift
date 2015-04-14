<?php 
class Transformations_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_simp_transformations(){
		$query = $this->db->query("SELECT * FROM transformations ORDER BY rand() LIMIT 3");
		return $query->result_array();
	}
}


?>