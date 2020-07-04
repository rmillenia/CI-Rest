<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbandroid extends CI_Model {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	function LoginApi($username,$password){
        $this->db->select('id,username,password,level,foto');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $query = $this->db->get();
        if($query->num_rows() == 1){
            $user = $query->result_array();
            return $user ;
        }             
	}

}

/* End of file dbandroid.php */
/* Location: ./application/models/dbandroid.php */