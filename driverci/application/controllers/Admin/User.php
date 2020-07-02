<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	var $API ="";
	var $level = "customer";
	
	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/rinda-enterprise/rest_server/index.php";
		$this->load->library('form_validation');
		$this->load->library('curl');

	}
	public function index()
	{
		$data['level'] = ucfirst($this->level);
		$data['data'] = json_decode($this->curl->simple_get($this->API.'/User',array("level"=>$this->level)));
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
				'noHp' => $this->input->post('noHp'),
				'level' => $level,
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$this->curl->simple_post($this->API.'/User', $set, array(CURLOPT_BUFFERSIZE => 10));
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
		$data['admin'] = json_decode($this->curl->simple_get($this->API.'/User',$param))[0];
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/user/edit',$data);
		} else {
			$set = array(
				'id' => $id,
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'noHp' => $this->input->post('noHp'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$this->curl->simple_put($this->API.'/User', $set, array(CURLOPT_BUFFERSIZE => 10));
			redirect('Admin/Admin','refresh');
		}
	}
	public function delete($id)
	{
		$this->curl->simple_delete($this->API.'/User', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10));
		redirect('Admin/Admin','refresh');
	}
}
