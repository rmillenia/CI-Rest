<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Driver extends CI_Controller {

	var $API ="";
	var $level = "driver";
	var $soap_client;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_driver');
		$this->load->helper('form');
		$this->load->model('m_driver');
		$this->soap_client = new SoapClient("http://192.168.63.193:8080/rinda-enterprise/soap_server/index.php/User?wsdl");
	}

	public function index()
	{
		$session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['level'] = $session_data['level'];

        $id = $session_data['id'];
		$data['name'] = $this->m_driver->selectAll($id);
		$data['epay'] = $this->m_driver->selectSaldo($id);
		$this->load->view('driver/template/header');
		$this->load->view('driver/v_index');
		//$this->load->view('admin/template/footer');
	}

	public function riwayatPerjalanan()
	{
		$session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['level'] = $session_data['level'];

        $id_user = $session_data['id'];
		$data['jalan'] = json_decode($this->soap_client->getData(json_encode(array("table"=>"transaksi","table2"=>"rating","table3"=>"user",'id_user'=>$id_user,"level"=>$this->level))));
		$this->load->view('driver/template/header');
		$this->load->view('driver/v_lihatPerjalanan',$data);
		//$this->load->view('admin/template/footer');
	}

	public function riwayatTransaksi()
	{
		$session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['level'] = $session_data['level'];

        $id_user = $session_data['id'];

        $data['trans'] = json_decode($this->soap_client->getDataTransaksi(json_encode(array("table"=>"transaksi","table2"=>"user","table3"=>"harga",'id_user'=>$id_user,"level"=>$this->level))));
		$this->load->view('driver/template/header');
		$this->load->view('driver/v_lihatTransaksi',$data);
		//$this->load->view('admin/template/footer');
	}

	public function riwayatGaji()
	{
		$session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['level'] = $session_data['level'];

        $id = $session_data['id'];
		$data['gajiNow'] = $this->m_driver->selectGajiSekarang($id);
		$data['gaji'] = $this->m_driver->selectGaji($id);
		$this->load->view('driver/template/header');
		$this->load->view('driver/v_lihatGaji',$data);
		//$this->load->view('admin/template/footer');
	}

}

/* End of file C_Driver.php */
/* Location: ./application/controllers/driver/C_Driver.php */