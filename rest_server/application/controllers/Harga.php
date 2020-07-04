<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Harga extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data user
	function index_get() {
		$id = $this->get('idHarga');
		//$status = $this->get('status');
		if ($id != '') {
			$this->db->where('idHarga', $id);
		}
		$harga = $this->db->get('harga')->result();
		$this->response($harga, 200);
	}
//Mengirim atau menambah data kontak baru
	function index_post() {
		//$status = $this->get('status');
		$data = array(
				'idHarga' => $this->post('idHarga'),
				'harga' => $this->post('harga'),
				'wilayah' => $this->post('wilayah'),
				'jam' => $this->post('jam')
		);
		$insert = $this->db->insert('harga', $data);
		if ($insert) {
			$this->response($data,200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
	//Memperbarui data kontak yang telah ada
	function index_put() {
		$id = $this->put('idHarga');
		$data = array(
			'idHarga' => $this->put('idHarga'),
			'harga' => $this->put('harga'),
			'wilayah' => $this->put('wilayah'),
			'jam' => $this->put('jam')
		);
		$this->db->where('idHarga', $id);
		$update = $this->db->update('harga', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
	//Menghapus salah satu data kontak
	function index_delete() {
		$id = $this->delete('idHarga');
		$this->db->where('idHarga', $id);
		$delete = $this->db->delete('harga');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
?>