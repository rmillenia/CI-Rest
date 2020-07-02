<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_AdminUser extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getDataUserArray()
	{
		$dataUser = $this->db->query('SELECT * from user');
		return $dataUser->result_array();
	}

	public function addUser($data, $tabel)
	{
		$this->db->insert($tabel, $data);
	}

	public function getUserByID($idUser)
	{
		$query = $this->db->query('SELECT * from user where id = "'.$idUser.'"');
		return $query->result_array();
	}

		public function getDriverByID($id)
	{
		$query = $this->db->query('SELECT * from driver where id = "'.$id.'"');
		return $query->result_array();
	}

	public function editUserNoImg($data)
	{
		$query = $this->db->query("UPDATE user set nama = '".$data['nama']."',
		 alamat = '".$data['alamat']."',
		 username = '".$data['username']."',
		 password = '".$data['password']."',
		 NIK = '".$data['NIK']."',
		 nomorhp = '".$data['nomorhp']."',
		 tgl_lahir = '".$data['tgl_lahir']."',
		 jenis_kelamin = '".$data['jenis_kelamin']."' where id = ".$data['id']);
	}

	public function editUserWithImg($data)
	{
		$query = $this->db->query("UPDATE user set nama = '".$data['nama']."',
		 alamat = '".$data['alamat']."',
		 NIK = '".$data['NIK']."',
		 username = '".$data['username']."',
		 password = '".$data['password']."',
		 nomorhp = '".$data['nomorhp']."',
		 tgl_lahir = '".$data['tgl_lahir']."',
		 jenis_kelamin = '".$data['jenis_kelamin']."',
		 foto = '".$data['foto']."' where id = ".$data['id']);
	}

	public function deleteUser($idUser)
	{
		$this->db->query("delete from user where id = ".$idUser);
	}

	public function getLevel()
	{
		$result = $this->db->query("select * from level where level <= 1");
		return $result->result_array();
	}
}

/* End of file M_UserAdmin.php */
/* Location: ./application/models/M_UserAdmin.php */