<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update extends CI_Controller {


function transformation(){

	$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('form','url'));
		$this->load->model('quotes_model');
		$this->load->model('videos_model');
		$this->load->model('profile_model');
		$this->load->model('transformations_model');
		$user_name = $this->session->userdata('user_name');
		$first_name = $this->session->userdata('first_name');
		$user_id = $this->session->userdata('user_id');
		$logged_in = $this->session->userdata('logged_in');
		$other_user_id = $this->input->get('user_id');


		if ($logged_in == TRUE){

			$data['title'] = 'Update Transformation';
			$data['logged_in'] = $logged_in;
			$data['user_id'] = $user_id;
			$data['first_name'] = $first_name;
			$data['user_name'] = $user_name;
			$data['other_user_id'] = $other_user_id;

			$data['profile_query'] = $this->profile_model->get_user_info($other_user_id);
			$data['comment_query'] = $this->profile_model->get_comments($other_user_id);
			$data['trans_query'] = $this->transformations_model->get_transformation($other_user_id);

			if($user_id != $other_user_id){
				exit('No direct script access allowed'); //Later going to change to an error page.
			}

			$this->form_validation->set_rules('weight','Weight','required||max_length[3]');
			$this->form_validation->set_rules('date','Date','required');

			if($this->form_validation->run() == FALSE)
			{

			$this->load->view('pages/template/header',$data);
			$this->load->view('pages/update_trans',$data);
			$this->load->view('pages/template/sidebar',$data);
			$this->load->view('pages/template/footer');
			}else{

				$weight = $this->input->post('weight');
				$date = $this->input->post('date');

				if($_FILES['before-pic']['name']){
				$img = $user_id.'-'.$_FILES['before-pic']['name'];
				$img = str_replace(' ', '_', $img);


				$config['upload_path'] = './uploads/transformations';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '3000';
				$config['max_width']  = '1500';
				$config['max_height']  = '1500';
				$config['remove_spaces'] ='true';
				$config['file_name'] = $img;
				$this->load->library('upload', $config);
				$this->upload->initialize($config); 
				
					if(! $this->upload->do_upload('before-pic'))
					{
						$data['message'] = $this->upload->display_errors();
						$this->load->view('pages/template/header',$data);
						$this->load->view('pages/update_trans',$data);
						$this->load->view('pages/template/sidebar',$data);
						$this->load->view('pages/template/footer');

					}else 
					{
						$this->transformations_model->update_before_pic($img,$user_id,$weight,$date);
						redirect("profile?user_id=$user_id");
					}
				}else{
					$img = $this->transformations_model->get_transformation($other_user_id)[0]->before_pic;
					$this->transformations_model->update_before_pic($img,$user_id,$weight,$date);
					redirect("profile?user_id=$user_id");
				}
			}	

		}else{
			redirect('login');
		}
	}

}