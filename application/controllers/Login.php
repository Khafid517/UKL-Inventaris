<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if($this->session->userdata('login') == true){
			
            redirect('Dashboard','refresh');
            
        }
    }
    

    public function index()
    {
        $this->load->view('f_login');
        
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('pass', 'Kata Sandi', 'required');
        
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('email', form_error('email'));
			$this->session->set_flashdata('pass', form_error('pass'));
			redirect('','refresh');
			
			
		}else{

			$email = $this->input->post('email', true);
			$pass = md5($this->input->post('pass', true));
			 

			$check = $this->M_pegawai->check($email, $pass);

			if($check != NULL){
			
				$array = array(
					'id' => $check['id_pegawai'],
					'nama' => $check['nama_pegawai'],
					'login' => true
				);
			
				$this->session->set_userdata($array);

                $this->session->set_flashdata('kosong', 'Berhasil Login !');
				
                redirect('Dashboard','refresh');
                
			}else{
				$this->session->set_flashdata('kosong', 'Akun tidak diemukan !');
				redirect('','refresh');
				
			}

		}

    }   

}

/* End of file Controllername.php */
