<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  M_Driver extends CI_Model {

		public function selectAll($id){
        		$this->db->select('*');
        		$this->db->from('user');
        		$this->db->where('id', $id);
        		$query = $this->db->get();
        		if($query->num_rows()==1){
            		return $query->result_array();
        		}else{
            		return false;
        		}                        
		}

		public function selectSaldo($id){
				$query = $this->db->query("SELECT * from saldo where id_user = $id");
            			return $query->result_array();
	
		}

		public function selectTransaksi($id){
				$query = $this->db->query("SELECT * from transaksi inner join user on transaksi.id_user = user.id where id_driver = $id order by startTime");
            			return $query->result_array();
	
		}

		public function selectPerjalanan($id){
				$query = $this->db->query("SELECT * from rating inner join transaksi on rating.transaksi_id = transaksi.id_transaksi inner join user on transaksi.id_user = user.id where id_driver = $id order by startTime");
            			return $query->result_array();
	
		}

		public function selectGaji($id){
				$query = $this->db->query("SELECT * from gaji where driver_id = $id order by tgl_gajian asc");
            			return $query->result_array();
	
		}

		public function selectGajiSekarang($id){
				$query = $this->db->query("SELECT * from gaji where MONTH(gaji.tgl_gajian) = month(now()) ");
				return $query->result_array();
		}	

}

/* End of file M_Driver.php */
/* Location: ./application/models/M_Driver.php */