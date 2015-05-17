<?php 
class Transformations_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_simp_transformations(){
		$query = $this->db->query("SELECT * FROM transformations LEFT JOIN after_pic ON transformations.after_pic_id = after_pic.id ORDER BY rand() LIMIT 3");
		return $query->result_array();
	}

	function get_transformation($id){
		$query = $this->db->query("SELECT * FROM transformations LEFT JOIN after_pic ON transformations.after_pic_id = after_pic.id WHERE transformations.user_id AND after_pic.user_id ='$id'");
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	function update_before_pic($upload,$user_id,$weight,$date){
		$query = $this->db->query("UPDATE transformations SET before_pic = '$upload', before_weight = '$weight', before_date = '$date' WHERE user_id = '$user_id'");
	}

	
	function get_before_pic($user_id){
		$query = $this->db->query("SELECT before_pic,before_weight,before_date FROM transformations WHERE user_id = '$user_id'");
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	function get_progress_pics($user_id){
		$query = $this->db->query("SELECT after_pic,after_weight,after_date,id FROM after_pic WHERE user_id = '$user_id' limit 20");
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

	}
	function get_after_pic(){

	}
}
?>