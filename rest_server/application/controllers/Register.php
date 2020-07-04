<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Register extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }
    function index_post(){
        //$status = $this->get('status');
        $data = array(
            'id' => $this->post('id'),
            'nik' => $this->post('nik'),
            'nama' => $this->post('nama'),
            'noHp' => $this->post('noHp'),
            'level' => $this->post('level'),
            'email' => $this->post('email'),
            'username' => $this->post('username'),
            'password' => $this->post('password')
        );
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response(array("result"=>$transaksi, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('id');
        $data = array(
            'nama' => $this->put('nama'),
            'noHp' => $this->put('noHp'),
            'email' => $this->put('email'),
        );
        $this->db->where('id', $id);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>