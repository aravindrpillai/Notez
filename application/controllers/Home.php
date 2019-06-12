<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->set_flashdata('error_flash_message', 'Session timeout');
			redirect("Login");
			die();
		 }
		 $this->load->model('HomeModel');
	}

	public function index(){
		$this->load->view('home');
	}

}
