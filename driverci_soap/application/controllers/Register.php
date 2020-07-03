<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    var $API ="";
    var $level = "user";
    var $soap_client;
    public function __construct()
    {
        parent::__construct();
        $this->soap_client = new SoapClient("http://192.168.63.193:8080/rinda-enterprise/soap_server/index.php/MySoapServer?wsdl");
        $this->load->library('form_validation');
    }

	public function create()
    {
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('M_Login');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('add', 'Address', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run()==FALSE){
            $this->load->view('v_register');
        }else{
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
            $this->soap_client->insertData(json_encode(array("table"=>"user",'id'=>null,"data"=>$set)));
                // $this->M_Login->insertUser();
                echo "<script>alert('Successfully Created'); </script>";
                redirect('Home/kelogin','refresh');
        }
     }

      function cekUsername($username)
    {
    	$this->load->model('M_Login');
        $result = $this->M_Login->register($username);
        if($result){
                return true;
            }else{
                $this->form_validation->set_message('create',"Username is already used");
                return false;
            }
    }
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */