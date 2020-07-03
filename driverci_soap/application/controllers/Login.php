<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
    
        public function logout()
        {
            $this->load->library('session');
            $this->session->unset_userdata('logged_in');
            $this->session->sess_destroy();
            redirect("Home");        
        }

        public function cekDb($password)
        {
            $this->load->model('M_Login');
            $username = $this->input->post('username'); 
            $result = $this->M_Login->login($username,$password);
            if($result){
                $session_array = array();
                foreach ($result as $key) {
                    $session_array = array(
                        'id'=>$key->id,
                        'username'=>$key->username,
                        'level'=>$key->level,
                        'foto'=>$key->foto
                    );
                    $this->session->set_userdata('logged_in',$session_array);
                }
                return true;
            }else{
                $this->form_validation->set_message('cekDb',"login failed");
                return false;
            }
        }

        public function cekLogin()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDb');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('v_login');
            } else {
                $session_data = $this->session->userdata('logged_in');
                $data['id'] = $session_data['id'];
                $data['username'] = $session_data['username'];
                $data['level'] = $session_data['level'];
                if ($data['level']=='admin') {
                    redirect('admin/Admin');
                }elseif($data['level']=='customer') {
                redirect('user/C_user','refresh');
                }else{
                redirect('driver/C_driver','refresh');
                }
            }
        }
}