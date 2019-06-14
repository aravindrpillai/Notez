<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Controller {
	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->set_flashdata('error_flash_message', 'Session timeout');
			redirect("Login");
			die();
		 }
		 $this->load->model('NoteModel');
	}

	public function index($note_id = "N"){
		$note = $this->NoteModel->loadNote($note_id);
		if(count($note) == 1){
			$this->load->view('Note',array("data"=>$note[0]));
		}else{
			$this->session->set_flashdata('error_flash_message', 'No Note Found. Either Create a new note or enter a valid note id');
			redirect("Home");
		}
	}
	
	public function NewNote(){
		$note_id = $this->NoteModel->newNote();
		if($note_id != false){
			redirect("Note/Index/".$note_id);
		}else{
			$this->session->set_flashdata('error_flash_message', 'Failed to load new note');
			redirect("Home");
		}
	}
	
	
	public function updateNoteName(){
		$noteId = $_POST["note_id"];
		$newName = $_POST["note_name"];
		if($newName == ""){
			echo "Note Name Cannot Be Empty";
		} else {
			if($this->NoteModel->updateNoteName($noteId,$newName)){
				echo true;
			}else{
				echo "Failed to update Note Name";
			}
		}
	}
	
	

}
