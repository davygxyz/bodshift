<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function view()
	{
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('profile_model');
		$this->load->model('user_model');
		$this->load->model('transformations_model');
		$user_name = $this->session->userdata('user_name');
		$first_name = $this->session->userdata('first_name');
		$user_id = $this->session->userdata('user_id');
		$logged_in = $this->session->userdata('logged_in');
		$other_user_id = $this->input->get('user_id');


		if ($logged_in == TRUE){
			$data['title'] = 'Profile';
			$data['logged_in'] = $logged_in;
			$data['user_id'] = $user_id;
			$data['first_name'] = $first_name;
			$data['user_name'] = $user_name;
			$data['other_user_id'] = $other_user_id;


			$user_check = $this->user_model->user_exists($other_user_id);
			if ($user_check == FALSE){
				exit('No direct script access allowed'); //Later going to change to an error page.
			};

			$data['profile_query'] = $this->profile_model->get_user_info($other_user_id);
			$data['comment_query'] = $this->profile_model->get_comments($other_user_id);
			$data['trans_query'] = $this->transformations_model->get_transformation($other_user_id);

			$this->load->view('pages/template/header',$data);
			$this->load->view('pages/profile',$data);
			$this->load->view('pages/template/sidebar',$data);
			$this->load->view('pages/template/footer');



		}else{
			redirect('login');
		}
	}

}