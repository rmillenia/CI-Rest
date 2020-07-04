<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rating extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	function index_get() {
		// $Rating = $this->get('rating');
        $Transaksi1 = $this->get('transaksi_id');
		$query = $this->db->query("SELECT * from rating where transaksi_id =". $Transaksi1);
		$transaksi = $query->result();
		$this->response(array("result"=>$transaksi, 200));
	}

	function index_post() {
		$data = array(
		'rating' => $this->post('rating'),
		'transaksi_id'=> $this->post('transaksi_id')
	);
		$insert = $this->db->insert('rating', $data);
		if ($insert) {
			$this->response($data,200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}
?>