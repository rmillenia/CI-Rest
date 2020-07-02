<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga extends CI_Controller {

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
		$data['data'] = json_decode($this->curl->simple_get($this->API.'/Harga',array("level"=>"admin")));
		$this->load->view('admin/user/lihatHarga',$data);
	}

	public function insert()
	{
		$data['level'] = ucfirst($this->level);
		$this->form_validation->set_rules('harga','harga','required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/user/tambahHarga',$data);
		} else {
			$set = array(
				'idHarga' => $this->input->post('idHarga'),
				'harga' => $this->input->post('harga'),
				'wilayah' => $this->input->post('wilayah'),
				'jam' => $this->input->post('jam')
			);
			//$this->M_Admin->tambahAdmin();
			$this->curl->simple_post($this->API.'/Harga', $set, array(CURLOPT_BUFFERSIZE => 10));
			redirect('Admin/Harga','refresh');
		}
	}

	public function update($id)
	{
		$this->form_validation->set_rules('harga','harga','required');
		$param = array(
			'idHarga' => $id,
		);
		$data['hargalist'] = json_decode($this->curl->simple_get($this->API.'/Harga',$param))[0];
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/user/updateHarga',$data);
		} else {
			$set = array(
				'idHarga' => $id,
				'harga' => $this->input->post('harga'),
				'wilayah' => $this->input->post('wilayah'),
				'jam' => $this->input->post('jam')
			);
			//$this->M_Admin->UpdateAdmin($id);
			$this->curl->simple_put($this->API.'/Harga', $set, array(CURLOPT_BUFFERSIZE => 10));
			redirect('Admin/Harga','refresh');
		}
	}

	public function delete($id)
	{
		$this->curl->simple_delete($this->API.'/Harga', array('idHarga'=>$id), array(CURLOPT_BUFFERSIZE => 10));
		redirect('Admin/Harga','refresh');
	}
}
