<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class DriverAndro extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	function index_get() {
		$idDriver = $this->get('id_driver');
		$idUser = $this->get('id_user');
		$query = $this->db->query("SELECT * from transaksi inner join harga on transaksi.id_harga = harga.idHarga inner join user on transaksi.id_user = user.id where id_driver = $idDriver and id_user=$idUser Order by id_transaksi desc Limit 1");
		$transaksi = $query->result();
		$this->response(array("result"=>$transaksi, 200));
	}

	// function index_post() {
	// 	$data = array(
	// 	'id_user' => $this->post('id_user'),
	// 	'id_driver'=> $this->post('id_driver'),
	// 	'startTime' => $this->post('startTime'),
	// 	'endTime' => $this->post('endTime'),
	// 	'totalHarga' => $this->post('totalHarga'),
	// 	'latJem' => $this->post('latJem'),
	// 	'longJem' => $this->post('longJem'),
	// 	'lokasi_jemput' =>$this->input->post('lokasi_jemput'),
	// 	'latTuj' => $this->post('latTuj'),
	// 	'longTuj' => $this->post('longTuj'),
	// 	'tujuan' =>$this->input->post('tujuan'),
	// 	'status' => "baru",
	// );
	// 	$insert = $this->db->insert('transaksi', $data);
	// 	if ($insert) {
	// 		$this->response($data,200);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }

	function index_post(){
		$id_transaksi =$this->post('id_transaksi');
		$id_driver =$this->post('id_driver');
		$endTime =$this->post('endTime');
		$startTime =$this->post('startTime');
    	//$status = 'kosong';

		$datetime1 = new DateTime($endTime);
		$datetime2 = new DateTime($startTime);

		$interval = $datetime1->diff($datetime2);
		//var_dump($interval->format('%h')." Hours ".$interval->format('%i')." Minutes");

		$format = $interval->format('%h')." Hours ".$interval->format('%i')." Minutes".$interval->format('%s')." Second";
		$hour = $interval->format('%h');
		$minutes = $interval->format('%i');


$status = $format;
		$update = $this->db->query("UPDATE driver_detail set status = 'kosong' where id_driver = '". $id_driver."'");

		$update1 = $this->db->query("UPDATE transaksi set status = 'selesai' where id_transaksi = '".$id_transaksi."'");

		$update2 = $this->db->query("UPDATE transaksi set endTime = '".$endTime."' where id_transaksi = '".$id_transaksi."'");

		if ($update && $update1 && $update2) {
			$this->response(array('status' => 'success','message' => $status,'minute' => $minutes,'hour' => $hour), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
?>