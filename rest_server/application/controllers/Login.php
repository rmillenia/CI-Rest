<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data user
	function index_get() {
		$username = $this->get("username");
		$password = $this->get("password");
		$this->db->select('id,username,password,level,foto');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $query = $this->db->get();
        $user = $query->result_array();
        if($user){
            $this->response($user, 200);
        } 
        else{
             $this->response(array('status' => 'fail', 502)); 
        }		
	}

    function index_post(){
        //$status = $this->get('status');
        $this->load->model('dbandroid');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->dbandroid->LoginApi($username, $password);
        if($result){
            $this->response($result, 200);
        }else{
           $this->response(array('status' => 'fail', 502));
        }
        
    }
}
?>