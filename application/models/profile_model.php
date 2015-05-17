<?php 
class Profile_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_user_info($id){
		$query = $this->db->query("SELECT * FROM users WHERE user_id = '$id'");
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	function get_comments($id){
		$query = $this->db->query("SELECT * FROM comments LEFT JOIN users ON comments.com_user_id = users.user_id WHERE comments.user_id = '$id' ORDER BY date asc");
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