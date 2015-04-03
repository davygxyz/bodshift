<?php if(!defined("BASEPATH")) exit('No direct script access allowed');

class Login extends CI_Controller{

	public function view()
	{
		$this->load->helper('url');
		$data['title'] = 'Login';
		$this->load->view('pages/template/header',$data);
		$this->load->view('forms/login',$data);
		$this->load->view('pages/template/footer');
	}
}

?>
