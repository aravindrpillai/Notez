<?php 

class HomeModel extends CI_Model{

	function getMyNotes($user_id, $limit, $index, $search_kw){
		
		//Get the limited records
		$this->db->select("id,note_id,note_name,created_on,expire,expiry_on");
		$this->db->limit($limit,($index-1)*$limit);
		if($search_kw != ""){
			$this->db->like('note_name', $search_kw, 'both');
		}
		$this->db->order_by("note_name","ASC");
		$query = $this->db->get_where("notes",array('owner' => $user_id));
		$return = $query->result_array();
		
		//Get total records count
		if($search_kw != ""){
			$this->db->like('note_name', $search_kw, 'both');
		}
		$query = $this->db->get_where("notes",array('owner' => $user_id));
		
		//Preparing final hashmap
		$returnData = array(
			"data"=>$return,
			"total_records"=>ceil(count($query->result_array())/$limit)
		);
		
		return $returnData;
	}

	function getAssociatedPeopleOnNote($id, $owner_id){
		$this->db->select("id");
		$this->db->from("notes");
		$this->db->where(array('id'=>$id,'owner' => $owner_id));
		$query = $this->db->get();
		$return = $query->result_array();
		if(count($return) == 1){
			$this->db->select("g.*, u.id, u.name, u.email_id");
			$this->db->from('groups g');
			$this->db->join('users u', 'u.id = g.user_id'); 
			$this->db->where(array('g.note_id' => $id));
			$this->db->order_by("u.name","ASC");
			$query = $this->db->get();
			return $query->result();
		}else{
			return false; //Selected Note Doesn't Exsist For The Current User
		}
	}

}

?>


