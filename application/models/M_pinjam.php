<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pinjam extends CI_Model {

    public function permohonan()
    {
        $this->db->where('status', 'Belum Dikonfirmasi');
        
        return $this->db->get('peminjaman')->result_array();
        
    }

    public function add_pinjam($array)
    {
        $this->db->insert('peminjaman', $array);
        
    }

    public function ke_proses($id, $admin)
    {
        $array = array('id_petugas' => $admin,
                        'status' => 'Belum Dikembalikan' );

        $this->db->where('id_pinjam', $id);
        
        $this->db->update('peminjaman', $array);
        
    }

    public function proses()
    {
        $this->db->where('status', 'Belum Dikembalikan');
        
        return $this->db->get('peminjaman')->result_array();
        
    }

    public function ke_histori($id, $admin, $tanggal)
    {
        $array = array('id_petugas' => $admin,
                        'status' => 'Sudah Dikembalikan',
                        'tgl_kembali' => $tanggal);

        $this->db->where('id_pinjam', $id);
        
        $this->db->update('peminjaman', $array);
    }
    
    public function histori()
    {
        $this->db->where('status', 'Sudah Dikembalikan');
        
        return $this->db->get('peminjaman')->result_array();
        
    }

    public function my_histori($id)
    {
        $this->db->where('id_pegawai', $id);

        return $this->db->get('peminjaman')->result_array();
    }
}

/* End of file M_pinjam.php */
