<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class SaldoUpdate extends REST_Controller {
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
        $id = $this->put('id');
        $saldoEpay = $this->put('saldoEpay');
        $data = array(
                'totalSaldo' => $saldoEpay);
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
