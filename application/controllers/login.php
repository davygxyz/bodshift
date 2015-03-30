<?php if(!defined("BASEPATH")) exit('No direct script access allowed');

class Login extends CI_Controller{

	public function view()
	{
	$this->load->view('pages/template/header');
	$this->load->view('pages/template/footer');
	}
}



?>
