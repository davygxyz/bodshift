<?php 
class Videos_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_simp_videos(){
		$query = $this->db->query("SELECT * FROM videos ORDER BY rand() LIMIT 3");
		return $query->result_array();
	}
}


?>