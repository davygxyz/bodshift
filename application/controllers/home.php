<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function view()
	{
		$this->load->database();
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
			$data['quotes_query'] = $this->quotes_model->get_simp_quotes();
			$data['videos_query'] = $this->videos_model->get_simp_videos();
			$data['transformations_query'] = $this->transformations_model->get_simp_transformations();
			$data['title'] = 'Home';
			$data['logged_in'] = $logged_in;
			$data['user_id'] = $user_id;

			echo $user_id;
			$data['first_name'] = $first_name;
			$data['user_name'] = $user_name;
			$this->load->view('pages/template/header',$data);
			$this->load->view('pages/dashboard',$data);
			$this->load->view('pages/template/sidebar',$data);
			$this->load->view('pages/template/footer');
		}else{
			$data['title'] = 'Welcome';
			$this->load->view('pages/template/header',$data);
			$this->load->view('pages/welcome_message',$data);
			$this->load->view('pages/template/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */