<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

    public function check($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        return $this->db->get('pegawai')->row_array();
        
    }

    public function all()
    {
        return $this->db->get('pegawai')->result_array();
        
    }

    public function pegawai($id)
    {
        $this->db->where('id_pegawai', $id);
        
        return $this->db->get('pegawai')->result_array();
    }

    public function add_pegawai($pegawai)
    {
        $this->db->insert('pegawai', $pegawai);
        
    }
    
    public function edit_pegawai($pegawai, $id)
    {
        $this->db->where('id_pegawai', $id);
    
    
        $this->db->update('pegawai', $pegawai);
        
    }

    public function hapus_pegawai($id)
    {
        $this->db->where('id_pegawai', $id);
        
        $this->db->delete('pegawai');
    }

}

/* End of file ModelName.php */
