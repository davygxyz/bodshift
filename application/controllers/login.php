<?php if(!defined("BASEPATH")) exit('No direct script access allowed');

class Login extends CI_Controller{

	public function view()
	{
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$data['title'] = 'Login';

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');


		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('pages/template/header',$data);
			$this->load->view('forms/login',$data);
			$this->load->view('pages/template/footer');
		}else
		{

		}
	
	}
}

?>
