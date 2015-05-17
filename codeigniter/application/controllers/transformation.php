<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transformation extends CI_Controller {

	public function view()
	{
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('transformations_model');
		$user_name = $this->session->userdata('user_name');
		$first_name = $this->session->userdata('first_name');
		$user_id = $this->session->userdata('user_id');
		$logged_in = $this->session->userdata('logged_in');
		$other_user_id = $this->input->get('user_id');


		if ($logged_in == TRUE){

			$data['title'] = 'Body Progress';
			$data['logged_in'] = $logged_in;
			$data['user_id'] = $user_id;
			$data['first_name'] = $first_name;
			$data['user_name'] = $user_name;
			$data['other_user_id'] = $other_user_id;

			$before_pic_query = $this->transformations_model->get_before_pic($other_user_id);
			$progress_pictures_query = $this->transformations_model->get_progress_pics($other_user_id);
			$data['before_pic'] = $before_pic_query;
			$data['progress_pictures'] = $progress_pictures_query;

			$this->load->view('pages/template/header',$data);
			$this->load->view('pages/trans_view',$data);
			$this->load->view('pages/template/sidebar',$data);
			$this->load->view('pages/template/footer');

		}else{
			redirect('login');
		}
	}

}