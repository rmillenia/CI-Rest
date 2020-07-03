<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}


	public function getDataDriverArray(){
		$query = $this->db->query("select * from user where level=driver");
		return $query->result_array();
	}

	public function addDriver($data, $tabel)
	{
		$this->db->insert($tabel, $data);
	}

	public function getDriverByID($idDriver)
	{
		$query = $this->db->query('SELECT * from driver_detail inner join user on driver_detail.id_driver = user.id where id_driver = "'.$idDriver.'"');
		return $query->result_array();
	}

	public function editDriverNoImg($data)
	{
		$query = $this->db->query("UPDATE driver set nama = '".$data['nama']."',
			alamat = '".$data['alamat']."',
			NIK = '".$data['NIK']."',
			nomorhp = '".$data['nomorhp']."',
			tgl_lahir = '".$data['tgl_lahir']."',
			jenis_kelamin = '".$data['jenis_kelamin']."',
			tgl_kerja = '".$data['tgl_kerja']."', 
			gaji = ".$data['gaji']." where id = ".$data['id']);
	}

	public function editDriverWithImg($data)
	{
		$query = $this->db->query("UPDATE driver set nama = '".$data['nama']."',
			alamat = '".$data['alamat']."',
			NIK = '".$data['NIK']."',
			nomorhp = '".$data['nomorhp']."',
			tgl_lahir = '".$data['tgl_lahir']."',
			jenis_kelamin = '".$data['jenis_kelamin']."',
			tgl_kerja = '".$data['tgl_kerja']."', 
			foto = '".$data['foto']."',
			gaji = ".$data['gaji']." where id = ".$data['id']);
	}

	public function getDataAdmin()
	{
		$this->db->order_by('username');
		$this->db->where('level', 'admin');
		$query = $this->db->get('user');

		return $query->result_array();
	}
	public function deleteDataAdmin($id)
	{
		if (!empty($id)) {
			$delete = $this->db->delete('admin', array('id'=>$id));
			return $delete ? true : false;
		}else{
			return false;
		}
	}
	public function get_admin_by_id($id)
	{
		$query = $this->db->get_where('admin', array('id' => $id));
		return $query->row();
	}

	public function deleteDriver($id)
	{
		$this->db->query('delete from driver_detail where id = '.$id);
	}

	public function getDriverWhenKosong()
	{
		$result = $this->db->query("select * from driver_detail inner join user on driver_detail.id_driver = user.id where status = 'kosong'");
		return $result->result_array();
	}

	public function selectAll($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }                        
    }

    public function tambahAdmin()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'noHp' => $this->input->post('noHp'),
				'level' => "admin",
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
		);
		return $this->db->insert('user', $data);
	}

	public function updateAdmin($id)
	{
		$data = array(
				'id' => $id,
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'noHp' => $this->input->post('noHp'),
				'level' => "admin",
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
		);	
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	public function updateUser($id)
	{
		$data = array(
				'id' => $id,
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'noHp' => $this->input->post('noHp'),
				'level' => "user",
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
		);	
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	public function updateDriver($id)
	{
		$data = array(
				'id' => $id,
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'noHp' => $this->input->post('noHp'),
				'level' => "driver",
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
		);	
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}


	public function tambahDriver()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'noHp' => $this->input->post('noHp'),
				'level' => "driver",
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
		);
		return $this->db->insert('user', $data);
	}

	public function tambahUser()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'noHp' => $this->input->post('noHp'),
				'level' => "customer",
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
		);
		return $this->db->insert('user', $data);
	}

}

/* End of file driver.php */
/* Location: ./application/models/driver.php */