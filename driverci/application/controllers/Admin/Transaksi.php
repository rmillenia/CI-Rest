<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	var $API ="";

	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/rinda-enterprise/rest_server/index.php";
		$this->load->model('M_transaksi');
		//$this->load->model('M_Admin');
		//$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('curl');
		 
	}

	
	public function getTransaksi()
	{
		$session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $id = $session_data['id'];
        $level = $session_data['level'];

		$data['datatransaksi'] = json_decode($this->curl->simple_get($this->API.'/Transaksi',array("level"=>$level,"id"=>$session_data['id'])),true);
		$this->load->view('admin/header');
		$this->load->view('admin/user/v_lihattransaksi', $data);
		//$this->load->view('admin/template/footer');
	}

	public function deleteTransaksi($id)
	{
		$this->curl->simple_delete($this->API.'/Transaksi', array('id_transaksi'=>$id), array(CURLOPT_BUFFERSIZE => 10));
		//$this->M_transaksi->delete($id);
		redirect('Admin/Transaksi/getTransaksi','refresh');
	}
	public function editTransaksi($id)
	{
		$set=array(
			'id_transaksi'=>$id,
			'status'=>'selesai');
		$this->curl->simple_put($this->API.'/Transaksi', $set, array(CURLOPT_BUFFERSIZE => 10));
		redirect('Admin/Transaksi/getTransaksi','refresh');
	}

	public function keAddDriverTransaksi($id)
	{
		$data['transaksi'] = json_decode($this->curl->simple_get($this->API.'/Transaksi',array("id"=>$id)),true);
		foreach ($data['transaksi'] as $key) {
			$idUser = $data['transaksi'][$key]['id_user'];
		}
		$data['user'] =  json_decode($this->curl->simple_get($this->API.'/User',array("id"=>$idUser)),true);
		$data['driver'] = json_decode($this->curl->simple_get($this->API.'/TransaksiAdd'),true);
		$this->load->view('admin/header');
		$this->load->view('admin/user/v_tambahDriverKeTransaksi', $data);
	}

	public function keUbahDriverTransaksi($id){
		$data['transaksi'] = json_decode($this->curl->simple_get($this->API.'/Transaksi',array("id"=>$id)),true);
		foreach ($data['transaksi'] as $key=>$trans) {
			$idUser = $data['transaksi'][$key]['id_user'];
			$idDriver = $data['transaksi'][$key]['id_driver']; 
		}
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/User',array("id"=>$idUser)),true);
		$data['selectedDriver'] = json_decode($this->curl->simple_get($this->API.'/Driver',array("id"=>$idDriver)),true);
		$data['driver'] = json_decode($this->curl->simple_get($this->API.'/TransaksiAdd'),true);
		$this->load->view('admin/header');
		$this->load->view('admin/user/v_ubahDriverKeTransaksi', $data);
	}

	public function ubahDriverKeTransaksi()
	{
		$set = array(
			'idTransaksi' => $this->input->post('idTransaksi'), 
			'idDriverLama' => $this->input->post('selectedDriverId'),
			'idDriverBaru' => $this->input->post('newDriverId'),
		);

		// $idTransaksi = $this->input->post('idTransaksi');
		// $idDriverLama = $this->input->post('selectedDriverId');
		// $idDriverBaru = $this->input->post('newDriverId');

		$this->curl->simple_put($this->API.'/TransaksiAdd', $set, array(CURLOPT_BUFFERSIZE => 10));
		redirect('Admin/Transaksi/getTransaksi','refresh');

		// $this->curl->simple_put($this->API.'/User',array('idTransaksi' => $idTransaksi,'idDriverLama' => $idDriverLama,'idDriverBaru' => $idDriverBaru));
		//redirect('Admin/Driver','refresh');
		//$this->M_transaksi->ubahDriverKeTransaksi($idTransaksi, $idDriverLama, $idDriverBaru);
		redirect('admin/Transaksi/gettransaksi');
	}

	public function tambahDriverKeTransaksi()
	{
		$idTransaksi = $this->input->post('idTransaksi');
		$idDriver = $this->input->post('idDriver');
		 $this->curl->simple_put($this->API.'/Driver',array('idTransaksi' => $idTransaksi, 'idDriver' => $idDriver));
		// $this->M_transaksi->tambahDriverKeTransaksi($idTransaksi, $idDriver);
		redirect('admin/Transaksi/gettransaksi');
	}

}
