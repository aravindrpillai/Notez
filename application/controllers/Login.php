<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
         parent::__construct();
		 $this->load->library("form_validation");
		 $this->load->helper('security');
         $this->load->model('LoginModel');
	}

	public function index(){
		$this->load->view('login');
	}

	public function authenticate(){
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[15]');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error_flash_message', validation_errors());
			$this->load->view("Login",$_POST);
		} else {
			$resp = $this->LoginModel->authenticate($_POST["email"],$_POST["password"]);
			if(count($resp) == 1){
				$this->session->set_userdata('user_id',$resp[0]["id"]);
				$this->session->set_userdata('name',$resp[0]["name"]);
				redirect("Home");
			} else {
				$this->session->set_flashdata('error_flash_message', "Invalid Login Credentials");
				$this->load->view("Login",$_POST);
			}
		}
	}

	
	public function logout(){
		$this->session->sess_destroy();
		redirect("Login");
	}
	

	
	public function _register(){
		$this->form_validation->set_rules('name','Full Name','trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[15]');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('myform');
		} else {
			$resp = $this->NewUserRegistrationModel->saveUser($name,$email,$password);
			$this->session->set_flashdata('success_flash_message',"User Registered Successfully.");
			redirect("Login");
			$this->load->view('formsuccess');
		}
	}
	
}
