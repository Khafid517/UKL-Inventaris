<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model {

    public function check($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        return $this->db->get('petugas')->row_array();
        
    }

    public function all()
    {
        return $this->db->get('petugas')->result_array();
        
    }

}

/* End of file ModelName.php */
