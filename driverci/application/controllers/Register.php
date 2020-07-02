<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
                $this->M_Login->insertUser();
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