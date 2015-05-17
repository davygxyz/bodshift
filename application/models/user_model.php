<?php
class User_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function user_exists($user_id){
		$query = $this->db->query("SELECT * FROM users WHERE user_id = '$user_id'");
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

}
?>