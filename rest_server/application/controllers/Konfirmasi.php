<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Konfirmasi extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	function index_get() {
        $id_user = $this->get('id_user');
		$query = $this->db->query("SELECT * from user where id =". $id_user);
		$transaksi = $query->result();
		$this->response($transaksi, 200);
	}

	function index_put(){
        //$status = $this->get('status');
        $id = $this->put('id');
        $totalSaldo = $this->put('totalSaldo');
        $data = array(
                'totalSaldo' => $totalSaldo);
        $this->db->where('id', $id);
        $query = $this->db->update('user',$data);
        if ($query) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>
