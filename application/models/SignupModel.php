<?php 

class SignupModel extends CI_Model{

    function register($data){
		$this->db->insert('users', $data); 
		return $this->db->affected_rows();
	}
}

?>