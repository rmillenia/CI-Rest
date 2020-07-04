<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Saldo extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	function index_get() {
		$query = $this->db->query("SELECT * from saldo inner join user on saldo.id_user = user.id where status = 'proses'");
		$transaksi = $query->result();
		$this->response($transaksi, 200);
	}

	function index_put(){
        //$status = $this->get('status');
        $status = $this->put('status');
        $idSaldo = $this->put('idSaldo');
        $data = array(
                'status' => $status);
        $this->db->where('idSaldo', $idSaldo);
        $query = $this->db->update('saldo',$data);
        if ($query) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>
