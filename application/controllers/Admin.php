<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if($this->session->userdata('login_admin') == true){
			
            redirect('Admin_dashboard','refresh');
            
        }
    }
    

    public function index()
    {
        $this->load->view('v_login_admin');
        
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('pass', 'Kata Sandi', 'required');
        
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('email', form_error('email'));
			$this->session->set_flashdata('pass', form_error('pass'));
			redirect('Admin','refresh');
			
			
		}else{

			$email = $this->input->post('email', true);
			$pass = md5($this->input->post('pass', true));
			 

			$check = $this->M_petugas->check($email, $pass);

			if($check != NULL){
			
				$array = array(
					'id_admin' => $check['id_petugas'],
					'nama_admin' => $check['nama_petugas'],
					'login_admin' => true
				);
			
				$this->session->set_userdata($array);

                $this->session->set_flashdata('kosong', 'Berhasil Login !');
				
                redirect('Admin_dashboard','refresh');
                
			}else{
				$this->session->set_flashdata('kosong', 'Akun tidak diemukan !');
				redirect('Admin','refresh');
				
			}

		}

	}   

}

/* End of file Controllername.php */
