<?php 
class Quotes_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_simp_quotes(){
		$query = $this->db->query("SELECT * FROM quotes ORDER BY rand() LIMIT 3");
		return $query->result_array();
	}

	function quote_otw($id){
		$query = $this->db->query("SELECT * FROM quotes WHERE id='$id' LIMIT 1");
		return $query->result_array();
	}


	function quotes_rows(){
		$query = $this->db->query("SELECT * FROM quotes ORDER BY dt");
		return $query->num_rows();
	}

	function fetch_data($limit,$page){
		$query = $this->db->query("SELECT * FROM quotes ORDER BY dt DESC LIMIT $page,$limit");

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