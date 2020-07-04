<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class SaldoAndro extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	function index_get() {
        $id = $this->get('id');
		$query = $this->db->query("SELECT * from user where id =".$id);
		$transaksi = $query->result();
		$this->response(array("result"=>$transaksi, 200));
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

     function index_post(){
            $data = array(
                'id_user' => $this->post('id_user'),
                'saldoEpay' => $this->post('saldoEpay'),
                'rekening' => $this->post('rekening'),
                'status' => $this->post('status')
            );
            $insert = $this->db->insert('saldo',$data);
            if ($insert) {
                $this->response($data,200);
            } else {
                $this->response(false, 502);
            }
        }

}
?>
