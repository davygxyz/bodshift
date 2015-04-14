<?php if(!defined("BASEPATH")) exit('No direct script access allowed');

class Login extends CI_Controller{

	public function view()
	{
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('login_model');
		$this->load->library('session');
		$this->load->database();
		$data['title'] = 'Login';

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('pages/template/header',$data);
			$this->load->view('forms/login',$data);
			$this->load->view('pages/template/footer');
		}else
		{
			if ($this->login_model->login_validation($username,$password) == NULL)
			{
				$data['error'] = 'Username And Password combination does not match our database.';
				$this->load->view('pages/template/header',$data);
				$this->load->view('forms/login',$data);
				$this->load->view('pages/template/footer');
			}else{
				$user_id = $this->login_model->login_validation($username,$password)['user_id'];
				$first_name = $this->login_model->login_validation($username,$password)['first_name'];
				$user_name = $this->login_model->login_validation($username,$password)['user_name'];
				$user_data = array('user_id' => $user_id,
									'first_name' => $first_name,
									'user_name' => $user_name,
									'logged_in' => TRUE,);
				$this->session->set_userdata($user_data);
				redirect('home');
			}
		}
	
	}
}

?>
