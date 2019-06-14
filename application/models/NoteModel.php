<?php 

class NoteModel extends CI_Model{

	
    function newNote(){
		$last_id = $this->db->select('id')->order_by('id','desc')->limit(1)->get('notes')->row('id');
		$newNoteID = "N".(1000 + $last_id);
		$data = array( "note_id"=>$newNoteID, "note_name"=>"New Note ".$newNoteID );
		$this->db->insert('notes', $data); 
		if($this->db->affected_rows() == 1){
			return $newNoteID;
		}else{
			return false;
		}
	}

	
    function loadNote($note_id){
		$this->db->select("*");
		$this->db->from("notes");
		$this->db->where(array('note_id' => $note_id));
		$query = $this->db->get();
		$return = $query->result_array();
		return $return;
	}

    function updateNoteName($note_id, $note_name){
		$this->db->where('note_id', $note_id);
		$this->db->update('notes', array("note_name"=>$note_name));
		return ($this->db->affected_rows() == 1);
	}

}

?>