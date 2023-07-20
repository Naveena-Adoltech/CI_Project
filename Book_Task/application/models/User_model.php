<?php 

class User_model extends CI_Model {
    
	public function register_user($data) {
		$this->db->insert('users',$data);
		return $this->db->insert_id();
	}

	public function login_user($email,$password) {
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query=$this->db->get('users');
		return $query->row();
	}
 
}