<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	private $_PAGE_CONTENT_LIMIT = 5;
	
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
	
	public function loadMyNotes(){
		$page = $_POST["page"];
		$search_keyword = trim($_POST["search_kw"]);
		$user_id = $this->session->userdata('user_id');
		$myNotes = $this->HomeModel->getMyNotes($user_id,$this->_PAGE_CONTENT_LIMIT,$page,$search_keyword);
		echo json_encode($myNotes);
	}
	
	public function getAssociatedPeopleOnNote(){
		$people = $this->HomeModel->getAssociatedPeopleOnNote($_POST["id"],$this->session->userdata('user_id'));
		if($people == false && (@!count($people) == 0)){
			$resp = array(
				"status"=>false,
				"message"=>"Selected Note Doesn't Exsist For The Current User",
				"data"=>null
			);
		}else{
			$resp = array(
				"status"=>true,
				"message"=>null,
				"data"=>$people
			);
		}
		echo json_encode($resp);
	}

}
