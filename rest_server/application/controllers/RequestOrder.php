<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class RequestOrder extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	function index_get() {
		$idDriver = $this->get('id_driver');
		$query = $this->db->query("SELECT * from request inner join user on request.id_user = user.id where id_driver = $idDriver and status = 'belum diterima'");
		$transaksi = $query->result();
		$this->response(array("result"=>$transaksi, 200));
	}

	function index_post(){
        //$status = $this->get('status');
        $data = array(
            'id_driver' => $this->post('id_driver'),
            'id_user' => $this->post('id_user'),
            'jemput' => $this->post('jemput'),
            'lat' => $this->post('lat'),
            'longs' => $this->post('longs'),
            'status' => $this->post('status')
        );
        $insert = $this->db->insert('request',$data);
        if ($insert) {
            $this->response($data,200);
        } else {
            //$this->response(false, 502);
        }
    }

    function index_put(){
    	$id =  $this->put('idReq');
    	$id_driver =  $this->put('id_driver');

    	$update = $this->db->query("UPDATE request set status = 'diterima' where idReq = ". $id);

    	$update1 = $this->db->query("UPDATE driver_detail set status = 'dipesan' where id_driver = ". $id_driver);

    	if ($update && $update1 ) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
    }

}
