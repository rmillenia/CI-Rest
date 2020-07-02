<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->model('M_User');
		$this->load->library('pagination');
		$this->load->model('m_user');
	}


	public function index()
	{

		$this->load->library('pagination');
		$this->load->library('table');

		$config['base_url'] = 'http://[::1]/rinda-enterprise/driverci/index.php/user/C_user/index';
		$config['total_rows'] = $this->db->get('driver_detail')->num_rows();
		$config['per_page'] = 1;
		$config['num_links'] = 2;
		$config["uri_segment"] = 4;
		$config['full_tag_open'] = "<ul class='pagination'>";
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';

                $config['next_link'] = 'Next Page';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';

                $config['prev_link'] = 'Previous Page';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
				
		$this->pagination->initialize($config);
		$this->db->select('*');    
		$this->db->from('driver_detail');
		$this->db->join('user', 'driver_detail.id_driver = user.id');
		$this->db->limit($config['per_page'], $this->uri->segment(4));
		$query = $this->db->get();
		//$query = $this->db->get('driver_detail', $config['per_page'], $this->uri->segment(4));
		$data['records'] = $query->result_array();
		$this->load->view('user/template/header');
		$this->load->view('user/v_home', $data);
		$this->load->view('template/footer');
	}

	public function riwayatPerjalanan()
	{
		$session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $id = $session_data['id'];
        $level = $session_data['level'];

		$data['jalan'] = $this->m_user->selectPerjalanan($id);
		$this->load->view('user/template/header');
		$this->load->view('user/v_lihatPerjalanan',$data);
		//$this->load->view('admin/template/footer');
	}

	public function riwayatTransaksi()
	{
		$session_data = $this->session->userdata('logged_in');
        $username = $session_data['username'];
        $id = $session_data['id'];
        $level = $session_data['level'];
        
		$data['trans'] = $this->m_user->selectTransaksi($id);
		$this->load->view('user/template/header');
		$this->load->view('user/v_lihatTransaksi',$data);
		//$this->load->view('admin/template/footer');
	}

	public function editProfil()
	{
			$this->load->model('M_User');

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
        	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

        $data['getprofil']=$this->M_User->getIdBySession($_SESSION['userid']);
        	if ($this->form_validation->run() == FALSE) {
        		$this->load->view('template/header');
				$this->load->view('editprofil', $data);
				$this->load->view('template/footer');
        	}else{
        	
        		$config['upload_path'] = './foto/user';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = 10000000; //kb
				$config['max_width']  = 10240; //pixel
				$config['max_height']  = 7680; //pixel
				$this->upload->initialize($config);

				$this->load->library('upload', $config);
				if ( !$this->upload->do_upload('foto')){
					$this->M_User->editProfil($_SESSION['userid']);
					echo '<script>alert("Data Calon Berhasil di Update")</script>';
					redirect('user/C_User/getProfil','refresh');
				}else{

					$this->M_User->editProfilFoto($_SESSION['userid']);
					echo '<script>alert("Data dan Foto Calon Berhasil di Update")</script>';
					redirect('user/C_User/getProfil','refresh');
				}
        	}
	}


}


/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>