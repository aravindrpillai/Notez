<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	public function __construct(){
         parent::__construct();
		 $this->load->library("form_validation");
		 $this->load->helper('security');
         $this->load->model('SignupModel');
	}

	public function index(){
		$this->load->view('Signup', array("data"=>$_POST));
	}

	public function register(){
		$this->form_validation->set_message('is_unique', 'The %s is already registered');
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|is_unique[users.email_id]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[15]');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error_flash_message', validation_errors());
			$this->load->view('Signup', $_POST);
		} else {
			$return = $this->SignupModel->register(array("name"=>$_POST["name"],"email_id"=>$_POST["email"],"password"=>$_POST["password"]));
			if($return == 1){
				$this->session->set_flashdata('success_flash_message', "User Registered Successfully");
				redirect("Login");
			}else{
				$this->session->set_flashdata('error_flash_message', "Failed To Registered New User");
				$this->load->view('Signup', $_POST);
			}
		}
	}

	
}
