<?php 

class LoginModel extends CI_Model{

    function authenticate($email,$password){
		$this->db->select("id,name,email_id");
		$this->db->from("users");
		$this->db->where(array('email_id' => $email, 'password'=>$password));
		$query = $this->db->get();
		$return = $query->result_array();
		return $return;
    }

}

?>