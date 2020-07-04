<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Driver extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data driver_detail
	function index_get() {
		$id = $this->get('id');
		$query = $this->db->query('SELECT * from driver_detail inner join user on driver_detail.id_driver = user.id where id_driver = "'.$id.'"');
		$driver = $query->result();
		$this->response($driver, 200);
	}

	function index_put(){
		$idDriver =  $this->put('idDriver');
		$idTransaksi =  $this->put('idTransaksi');
		$this->db->query("update transaksi set id_driver = ".$idDriver." where id_transaksi = ". $idTransaksi);
		$this->db->query("update driver_detail set status = 'dipesan' where id_driver = ". $idDriver);
	}
}