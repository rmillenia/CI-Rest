<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	var $API ="";
	var $level = "admin";
	var $soap_client;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_transaksi');
		$this->load->model('M_Admin');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->soap_client = new SoapClient("http://localhost/rinda-enterprise/soap_server/index.php/Transaksi?wsdl");
		 
	}

	public function index(){
		$this->load->model('M_transaksi');
		$session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['level'] = $session_data['level'];
        $data['daftarHarga'] = json_decode($this->soap_client->getData(json_encode(array("table"=>"harga",'id'=>null,"level"=>$this->level))));
        $this->load->view('user/template/header');;
        $this->load->view('user/form_transaksi',$data);
        $this->load->view('template/footer');
	}

	public function addTransaksi(){
		//$this->load->model('M_transaksi');
		$session_data = $this->session->userdata('logged_in');
        $id = $session_data['id'];
        $data['username'] = $session_data['username'];
		$data['level'] = $session_data['level'];
			$waktu = $this->input->post('paket');
			$data = json_decode($this->soap_client->getHargaId(json_encode(array("table"=>"harga",'id_harga'=>$waktu,"level"=>$this->level))));

			foreach ($data as $key) {
				$harga = $data->harga;
				if (!empty($this->input->post('denda'))) {
					$denda = $this->input->post('denda');
					$harga = $data->harga + $denda;
				}
			}
			$set1 = array(
				'id_user' => $id,
				'id_driver'=> null,
				'startTime' => $this->input->post('startTime'),
				'endTime' => $this->input->post('endTime'),
				'paket' => $waktu,
				'denda' => $this->input->post('denda'),
				'totalHarga' => $harga,
				'rating_id' => 1,
				'lokasi_jemput' =>$this->input->post('lokasi_jemput'),
				'status' => "baru",
			);
			//$this->M_transaksi->add($set);
			$query=$this->soap_client->insertData(json_encode(array("table"=>"transaksi",'id'=>null,"data"=>$set1)));
			redirect('transaksi','refresh');

}
	public function getTransaksi()
	{
		 
		$this->load->model('M_transaksi');
		// $data['datatransaksi']= $this->M_transaksi->getAllTransaksi();

		$data['datatransaksi'] = json_decode($this->soap_client->getData(json_encode(array("table"=>"transaksi",'id'=>null,"level"=>$this->level))));
		$this->load->view('admin/header');
		$this->load->view('admin/user/v_lihattransaksi', $data);
		//$this->load->view('admin/template/footer');
	}

	public function deleteTransaksi($id)
	{
		 
		//$this->M_transaksi->delete($id);
		$this->soap_client->deleteData(json_encode(array("table"=>"transaksi",'id'=>$id)));
		redirect('Transaksi/getTransaksi','refresh');
	}
	public function editTransaksi($id,$idDriver)
	{
		
		// $this->M_transaksi->edit($id);
		$this->soap_client->updateData(json_encode(array("table"=>"transaksi",'id'=>$id)));
		$this->soap_client->updateDriver(json_encode(array("table"=>"driver_detail",'id'=>$idDriver)));
		redirect('Transaksi/getTransaksi','refresh');
	}

	public function keAddDriverTransaksi($id)
	{
		 
		$data['transaksi']= json_decode($this->soap_client->getTransId(json_encode(array("table"=>"transaksi",'id'=>$id,"level"=>$this->level))));

		foreach ($data['transaksi'] as $key) {
			$idUser = $data['transaksi']->id_user;
		}

		$data['user'] = json_decode($this->soap_client->getDataId(json_encode(array("table"=>"user",'id'=>$idUser,"level"=>$this->level))));

		$data['driver'] = json_decode($this->soap_client->getDriverKosong(json_encode(array('table'=>'driver_detail','table2'=>'user',"level"=>$this->level))));

		$this->load->view('admin/header');
		$this->load->view('admin/user/v_tambahDriverKeTransaksi', $data);
	}

	public function keUbahDriverTransaksi($id)
	{
		$data['transaksi']= json_decode($this->soap_client->getTransId(json_encode(array("table"=>"transaksi",'id'=>$id,"level"=>$this->level))));

		foreach ($data['transaksi'] as $key) {
			$idUser = $data['transaksi']->id_user;
			$idDriver = $data['transaksi']->id_driver;
		}

		$data['user'] = json_decode($this->soap_client->getDataId(json_encode(array("table"=>"user",'id'=>$idUser,"level"=>$this->level))));

		$data['selectedDriver'] = json_decode($this->soap_client->getDriverId(json_encode(array('table'=>'driver_detail','table2'=>'user','id'=>$idDriver,"level"=>$this->level))));

		$data['driver'] = json_decode($this->soap_client->getDriverKosong(json_encode(array('table'=>'driver_detail','table2'=>'user',"level"=>$this->level))));

		$this->load->view('admin/header');
		$this->load->view('admin/user/v_ubahDriverKeTransaksi', $data);
	}

	public function ubahDriverKeTransaksi()
	{
		$idTransaksi = $this->input->post('idTransaksi');
		$idDriverLama = $this->input->post('selectedDriverId');
		$idDriverBaru = $this->input->post('newDriverId');
		//$this->M_transaksi->ubahDriverKeTransaksi($idTransaksi, $idDriverLama, $idDriverBaru);
		json_decode($this->soap_client->updateDriverTrans(json_encode(array('table'=>'transaksi','id'=> $idDriverBaru,'id_transaksi'=> $idTransaksi,"level"=>$this->level))));

		json_decode($this->soap_client->updateDriverPesan(json_encode(array('table'=>'driver_detail','id'=> $idDriverBaru,"level"=>$this->level))));

		json_decode($this->soap_client->updateDriver(json_encode(array('table'=>'driver_detail','id'=>$idDriverLama,"level"=>$this->level))));

		redirect('Transaksi/getTransaksi','refresh');
	}

	public function tambahDriverKeTransaksi()
	{
		$idTransaksi = $this->input->post('idTransaksi');
		$idDriver = $this->input->post('idDriver');
		$this->M_transaksi->tambahDriverKeTransaksi($idTransaksi, $idDriver);
		redirect('Transaksi/getTransaksi','refresh');
	}

}
