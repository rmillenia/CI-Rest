<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Driver_detail extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data driver_detail
	function index_get() {
		$query = $this->db->query('SELECT id from user order by id desc limit 1');		
		$driver_detail = $query->result();
		$this->response($driver_detail, 200);
	}
//Mengirim atau menambah data kontak baru
	function index_post() {
		$data1 = array(
				'id_driver' => $this->post('id_driver') ,
				'status' => $this->post('status'),
				'fotoSim' => $this->post('fotoSim') 
		);
		$insert = $this->db->insert('driver_detail',$data1);

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
			'driver_detailname' => $this->put('driver_detailname'),
			'password' => $this->put('password')
		);
		$this->db->where('id', $id);
		$update = $this->db->update('driver_detail', $data);
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
		$delete = $this->db->delete('driver_detail');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
?>