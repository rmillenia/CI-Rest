<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

var $API ="";

	public function __construct()
    {
        parent::__construct();
        $this->API="http://192.168.63.193:8080/rinda-enterprise/rest_server/index.php";
        $this->load->library('curl');
    }

    public function login($username,$password)
    {
        $param = array(
            'username' => $username,
            'password' => $password
        );
        $data = json_decode($this->curl->simple_get($this->API.'/Login',$param));
        if($data){
            return $data;
        }else{
            return false;
        }
    }

    public function insertUser(){
        $this->load->database("driverci");
        $password = $this->input->post('password');
        $pass = md5($password);
        $level = 'customer';
        $pic = 'icon.png';

            $object = array(
            	'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('name'),
                'alamat' => $this->input->post('add'),
                'ttl' => $this->input->post('ttl'),
                'noHp' => $this->input->post('phone'),
                'level'    => $level,
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $pass,
                'foto'  => $pic,

            );

            $insert = $this->db->insert('user', $object);
            if (!$insert && $this->db->_error_number()==1062) {
                        echo "<script>alert('Username is already used'); </script>";
                }          
    }
}