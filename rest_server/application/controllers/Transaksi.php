<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Transaksi extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data user
	function index_get() {
		$id = $this->get('id');
		if(!empty($this->get('level'))){
			$level = $this->get('level');
				if ($level == 'driver') {
					$this->db->where('id_driver', $id);
				}elseif ($level == 'customer') {
					$this->db->where('id_user', $id);
				}
		}else{
			$this->db->where('id_transaksi', $id);
		}
		$transaksi = $this->db->get('transaksi')->result();
		$this->response($transaksi, 200);
	}


//Mengirim atau menambah data kontak baru
	 function index_post() {
	 	$id_transaksi =$this->post('id_transaksi');
	 	$totalHarga =$this->post('totalHarga');
		$denda =$this->post('denda');

		$update1 = $this->db->query("UPDATE transaksi set totalHarga = '".$totalHarga."' where id_transaksi = '".$id_transaksi."'");

		$update2 = $this->db->query("UPDATE transaksi set denda = '".$denda."' where id_transaksi = '".$id_transaksi."'");

		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
	//Memperbarui data kontak yang telah ada
	function index_put() {
		$id = $this->put('id_transaksi');
		$status = $this->put('status');
		$data = array(
				'status' => $this->put('status'));
		$this->db->where('id_transaksi', $id);
		$update = $this->db->update('transaksi', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
	//Menghapus salah satu data kontak
	function index_delete() {
		$id = $this->delete('id_transaksi');
		$this->db->where('id_transaksi', $id);
		$delete = $this->db->delete('transaksi');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}
?>