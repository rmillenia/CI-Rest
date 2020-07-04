<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class History extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	function index_get() {
		// $Rating = $this->get('rating');
        $id_driver = $this->get('id_driver');
		$query = $this->db->query("SELECT * from transaksi inner join rating on transaksi.id_transaksi = rating.transaksi_id inner join user on transaksi.id_user = user.id where transaksi.id_driver = $id_driver  order by startTime desc");
		$transaksi = $query->result();
		$this->response(array("result"=>$transaksi, 200));
	}

	// function index_post() {
	// 	$data = array(
	// 	'rating' => $this->post('rating'),
	// 	'transaksi_id'=> $this->post('transaksi_id')
	// );
	// 	$insert = $this->db->insert('rating', $data);
	// 	if ($insert) {
	// 		$this->response($data,200);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }

}
?>