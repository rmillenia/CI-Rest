<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class DriverLihat extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}
 //Menampilkan data user
	function index_get() {
		$query = $this->db->query("SELECT * from driver_detail inner join user on driver_detail.id_driver = user.id where status = 'kosong'");
		$transaksi = $query->result();
		$this->response(array('result' =>$transaksi, 200));
	}
}