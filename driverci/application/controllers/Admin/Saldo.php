<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldo extends CI_Controller {

	var $API ="";
	var $level = "admin";
	
	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/rinda-enterprise/rest_server/index.php";
		$this->load->library('form_validation');
		$this->load->library('curl');
		$this->load->model('M_Admin');

	}
	public function index()
	{
		$data['level'] = ucfirst($this->level);
		$data['saldo'] = json_decode($this->curl->simple_get($this->API.'/Saldo',array("level"=>$this->level)),true);
		$this->load->view('admin/header');
		$this->load->view('admin/user/konfirmasisaldo',$data);
	}
	
	public function update($idSaldo,$idUser,$epay)
	{		
		$data['transaksi'] = json_decode($this->curl->simple_get($this->API.'/Konfirmasi',array("id_user"=>$idUser)),true);
		$Saldo = 0;
		foreach ($data['transaksi'] as $key=>$trans) {
			$Saldo = $data['transaksi'][$key]['totalSaldo'];
		}
		$Saldo2 = $Saldo + $epay;
		$data = array(
			'idSaldo' => $idSaldo,
			'status' => 'sudah dikonfirmasi');
		$data1 = array(
			'id' => $idUser,
			'totalSaldo' => $Saldo2);
		$this->curl->simple_put($this->API.'/Saldo', $data, array(CURLOPT_BUFFERSIZE => 10));
		$this->curl->simple_put($this->API.'/Konfirmasi', $data1, array(CURLOPT_BUFFERSIZE => 10));
		redirect('Admin/Saldo','refresh');
	}
	
	public function updateTolak($idSaldo,$idUser)
	{
			$set = array(
				'idSaldo' => $idSaldo,
				'status' => 'ditolak'
			);
			//$this->M_Admin->UpdateUser($id);
			$this->curl->simple_put($this->API.'/Saldo', $set, array(CURLOPT_BUFFERSIZE => 10));
			redirect('Admin/Saldo','refresh');
	}
}
 