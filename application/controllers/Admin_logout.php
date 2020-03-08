<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_logout extends CI_Controller {

    public function index()
    {
        $this->session->sess_destroy('login_admin');
		
		redirect('Admin','refresh');
        
    }

}

/* End of file Controllername.php */
