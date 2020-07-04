<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class TransaksiAdd extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data user
	function index_get() {
		$query = $this->db->query("SELECT * from driver_detail inner join user on driver_detail.id_driver = user.id where status = 'kosong'");
		$transaksi = $query->result();
		$this->response($transaksi, 200);
	}
// //Mengirim atau menambah data kontak baru
	function index_post() {
		$id_transaksi = $this->post('id_transaksi');;
		$status = $this->post('status');
		$update1 = $this->db->query("UPDATE transaksi set status = '".$status."' where id_transaksi = '".$id_transaksi."'");
		if ($update1) {
			$this->response($update1,200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}


	//Memperbarui data kontak yang telah ada
	function index_put() {
		$idTransaksi =  $this->put('idTransaksi');
		$idDriverBaru = $this->put('idDriverBaru');
		$idDriverLama = $this->put('idDriverLama');

		// $set = array(
		// 	'id_driver' => $this->put('idDriverBaru'), 
		// );
		// $update = $this->db->set($set)->where('id_transaksi',$idTransaksi)->update('transaksi');

		// $set2 = array(
		// 	'status' => 'dipesan' , 
		// );

		// $update1 = $this->db->set($set2)->where('id_driver',$idDriverBaru)->update('driver_detail');

		// $set3 = array(
		// 	'status' => 'kosong' , 
		// );

		// $update2 = $this->db->set($set3)->where('id_driver',$idDriverLama)->update('driver_detail');

		// 			'idDriverLama' => $this->input->post('selectedDriverId'),
		// 	'idDriverBaru' => $this->input->post('newDriverId'),

		$update = $this->db->query("update transaksi set id_driver = ".$idDriverBaru." where id_transaksi = ". $idTransaksi);
		$update1 = $this->db->query("update driver_detail set status = 'dipesan' where id_driver = ". $idDriverBaru);
		$update2 = $this->db->query("update driver_detail set status = 'kosong' where id_driver = ". $idDriverLama);

		if ($update && $update1 && $update2) {
			$this->response(array('status' => 'success'), 201);
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