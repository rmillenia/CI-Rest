<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class GetTransaksi extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	function index_get() {
		$id_user = $this->get("id_user");
		$id_driver = $this->get("id_driver")
		$query = $this->db->query("SELECT * from transaksi where id_user = $id_user and id_driver=$id_driver order by id_transaksi");
		$transaksi = $query->result();
		$this->response(array("result"=>$transaksi, 200));
	}
}
?>