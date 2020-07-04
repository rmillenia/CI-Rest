<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class TransaksiAndro extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	function index_get() {
		$query = $this->db->query("SELECT * from harga");
		$transaksi = $query->result();
		$this->response(array('result' => $transaksi),200);
	}

	function index_post() {
		$data = array(
		'id_user' => $this->post('id_user'),
		'id_driver'=> $this->post('id_driver'),
		'startTime' => $this->post('startTime'),
		'endTime' => $this->post('endTime'),
		'totalHarga' => $this->post('totalHarga'),
		'latJem' => $this->post('latJem'),
		'longJem' => $this->post('longJem'),
		'lokasi_jemput' =>$this->post('lokasi_jemput'),
		'status' =>$this->post('status'),
		'id_harga' => $this->post('id_harga'),
		'denda' => $this->post('denda')
	);
		$insert = $this->db->insert('transaksi', $data);
		if ($insert) {
			$this->response($data,200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put(){
    	$id =  $this->put('id_driver');

    	$update = $this->db->query("UPDATE driver_detail set status = 'dipesan' where id_driver = ". $id);

    	if ($update) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
    }
}
?>