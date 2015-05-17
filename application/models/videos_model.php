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

	function videos_otw($id){
		$query = $this->db->query("SELECT * FROM videos WHERE id='$id'");
		return $query->result_array();
	}

	function videos_rows(){
		$query = $this->db->query("SELECT * FROM videos");
		return $query->num_rows();
	}

	function fetch_data($limit,$page){
		$query = $this->db->query("SELECT * FROM videos ORDER BY dt DESC LIMIT $page,$limit" );

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