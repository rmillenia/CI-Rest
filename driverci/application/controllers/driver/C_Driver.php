<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Driver extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_driver');
		$this->load->helper('form');
		$this->load->model('m_driver');
	}

	public function index()
	{
		$session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $id = $session_data['id'];
        $level = $session_data['level'];

		$data['name'] = $this->m_driver->selectAll($id);
		$data['epay'] = $this->m_driver->selectSaldo($id);
		$this->load->view('driver/template/header');
		$this->load->view('driver/v_index');
		//$this->load->view('admin/template/footer');
	}

	public function riwayatPerjalanan()
	{
		$session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $id = $session_data['id'];
        $level = $session_data['level'];

		$data['jalan'] = $this->m_driver->selectPerjalanan($id);
		$this->load->view('driver/template/header');
		$this->load->view('driver/v_lihatPerjalanan',$data);
		//$this->load->view('admin/template/footer');
	}

	public function riwayatTransaksi()
	{
		$session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $id = $session_data['id'];
        $level = $session_data['level'];

		$data['trans'] = $this->m_driver->selectTransaksi($id);
		$this->load->view('driver/template/header');
		$this->load->view('driver/v_lihatTransaksi',$data);
		//$this->load->view('admin/template/footer');
	}

}

/* End of file C_Driver.php */
/* Location: ./application/controllers/driver/C_Driver.php */