<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data user
	function index_get() {
		$id = $this->get('id');
		$level = $this->get('level');
		//$status = $this->get('status');
		if ($id != '') {
			$this->db->where('id', $id);
		}
		if ($level != '') {
			$this->db->where('level', $level);
		}
		$user = $this->db->get('user')->result();
		$this->response($user, 200);
	}
//Mengirim atau menambah data kontak baru
	function index_post() {
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
			$this->response($data,200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
	//Memperbarui data kontak yang telah ada
	function index_put() {
		$id = $this->put('id');
		$data = array(
			'id' => $this->put('id'),
			'nik' => $this->put('nik'),
			'nama' => $this->put('nama'),
			'noHp' => $this->put('noHp'),
			'level' => $this->put('level'),
			'email' => $this->put('email'),
			'username' => $this->put('username'),
			'password' => $this->put('password')
		);
		$this->db->where('id', $id);
		$update = $this->db->update('user', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
	//Menghapus salah satu data kontak
	function index_delete() {
		$id = $this->delete('id');
		$this->db->where('id', $id);
		$delete = $this->db->delete('user');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
?>