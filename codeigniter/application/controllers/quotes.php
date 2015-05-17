<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller{

	function view(){
		$this->load->database();
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('quotes_model');
		$this->load->model('videos_model');
		$this->load->model('transformations_model');
		$user_name = $this->session->userdata('user_name');
		$first_name = $this->session->userdata('first_name');
		$user_id = $this->session->userdata('user_id');
		$logged_in = $this->session->userdata('logged_in');


		if ($logged_in == TRUE){
			$data['title'] = 'Quotes';
			$data['logged_in'] = $logged_in;
			$data['user_id'] = $user_id;
			$data['first_name'] = $first_name;
			$data['user_name'] = $user_name;

			
			$config = array();
			$config['base_url'] = base_url().'index.php/quotes';
			$config['total_rows'] = $this->quotes_model->quotes_rows();
			$config['per_page'] = 6; 
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config["uri_segment"] = 2;

			$this->pagination->initialize($config); 

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		
        	$data["pagination_result"] = $this->quotes_model->fetch_data($config["per_page"], $page);
        	$data["links"] = $this->pagination->create_links();

        	//Insert the id number for Quote of the week
			$data['quote_otw_query'] = $this->quotes_model->quote_otw(5);
			$this->load->view('pages/template/header',$data);
			$this->load->view('pages/quotes',$data);
			$this->load->view('pages/template/sidebar',$data);
			$this->load->view('pages/template/footer');

		}else{
			redirect('login');
		}
	}
}

?>