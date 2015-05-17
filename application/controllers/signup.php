<?php if(!defined("BASEPATH")) exit('No direct script access allowed');

class Signup extends CI_Controller{

	public function view()
	{
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('signup_model');
		$this->load->library('session');
		$this->load->database();
		$data['title'] = 'Signup';

		$this->form_validation->set_rules('username', 'Username','callback_username_check');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('firstname','First Name','required');
		$this->form_validation->set_rules('lastname','Last Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('sex','Sex','required');
		$this->form_validation->set_rules('birth-date','Birth Date','required');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('pages/template/header',$data);
			$this->load->view('pages/signup',$data);
			$this->load->view('pages/template/footer');
		}else
		{
			
		}
	}

	public function username_check($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
			return FALSE;
		}
		else
		{
			
			return $str;
		}
	}
}

?>
