<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

	var $API ="";
	var $level = "admin";
	var $soap_client;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin');
		$this->soap_client = new SoapClient("http://192.168.63.193:8080/rinda-enterprise/soap_server/index.php/MySoapServer?wsdl");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['level'] = ucfirst($this->level);

		$data['data'] = json_decode($this->soap_client->getData(json_encode(array("table"=>"user",'id'=>null,"level"=>$this->level))));
		// var_dump($data);
		$this->load->view('admin/user/tampil',$data);
	}

	public function insert()
	{
		$data['level'] = ucfirst($this->level);
		$this->form_validation->set_rules('nama','nama','required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/user/tambah',$data);
		} else {
			$set = array(
				'id' => $this->input->post('id'),
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'noHp' => $this->input->post('noHp'),
				'level' => $this->level,
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'foto' => "",
				'totalSaldo' => ""
			);
			//$this->M_Admin->tambahAdmin();
			$query = $this->soap_client->insertData(json_encode(array("table"=>"user",'id'=>null,"data"=>$set)));
			// var_dump($query);
			redirect('Admin/Admin','refresh');
		}
	}

	public function update($id)
	{
		$data['level'] = ucfirst($this->level);
		$this->form_validation->set_rules('nama','nama','required');
		$param = array(
			'id' => $id,
		);
		$data['user'] = json_decode($this->soap_client->getDataId(json_encode(array("table"=>"user",'id'=>$id))));[0];
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/user/edit',$data);
		} else {
			$set = array(
				'id' => $id,
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'noHp' => $this->input->post('noHp'),
				'level' => $this->level,
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'foto' => "",
				'totalSaldo' => ""
			);
			$this->M_Admin->updateAdmin($id);
			$this->soap_client->updateData(json_encode(array("table"=>"user",'id'=>$id,"data"=>$set)));
			redirect('Admin/Admin','refresh');
		}
	}

	public function delete($id)
	{
		$this->soap_client->deleteData(json_encode(array("table"=>"user",'id'=>$id)));
		redirect('Admin/Admin','refresh');
	}
}
