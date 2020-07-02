<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
	
	public function selectTransaksi($id){
				$query = $this->db->query("SELECT * from transaksi inner join user on transaksi.id_driver = user.id where id_user = $id order by startTime");
            			return $query->result_array();
	
		}

	public function selectPerjalanan($id){
				$query = $this->db->query("SELECT * from rating inner join transaksi on rating.transaksi_id = transaksi.id_transaksi inner join user on transaksi.id_driver = user.id where id_user = $id order by startTime");
            			return $query->result_array();

        }
	
	public function editProfilFoto($id)
	{
		$data = array
		(
			'username' =>$this->input->post('username'),
			'nama' =>$this->input->post(nl2br('nama')),
			'foto' =>$this->upload->data('file_name'),
			'tgl_lahir' =>$this->input->post('tgl_lahir'),
			'alamat' =>$this->input->post('alamat'),
			'NIK' =>$this->input->post('nik'),
			'nomorhp' =>$this->input->post('nomorhp'),
			'jenis_kelamin' =>$this->input->post('jenis_kelamin')

		);
		$this->db->where('id', $id);
		$this->db->update('user', $data);
		
	}
	public function editProfil($id)
	{
		$data = array
		(
			'username' =>$this->input->post('username'),
			'nama' =>$this->input->post(nl2br('nama')),
			'tgl_lahir' =>$this->input->post('tgl_lahir'),
			'alamat' =>$this->input->post('alamat'),
			'NIK' =>$this->input->post('nik'),
			'nomorhp' =>$this->input->post('nomorhp'),
			'jenis_kelamin' =>$this->input->post('jenis_kelamin')
		);
		$this->db->where('id', $id);
		$this->db->update('user', $data);
		
	}

	public function deleteTransaksi($id)
	{
		$this->db->query("delete from transaksi where id_transaksi = ".$id);
	}
}

/* End of file m_UserTransaksi.php */
/* Location: ./application/models/m_UserTransaksi.php */