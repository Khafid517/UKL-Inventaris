<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

    public function jenis()
    {
        return $this->db->get('jenis')->result_array();
        
    }

    public function add_jenis($jenis)
    {
        $this->db->insert('jenis', $jenis);
    }

    public function one_jenis($jenis)
    {
        $this->db->where('id_jenis', $jenis);

        return $this->db->get('jenis')->result_array();
    }

    public function edit_jenis($jenis, $array)
    {
        $this->db->where('id_jenis', $jenis);
        
        $this->db->update('jenis', $array);
    }

    public function hapus_jenis($jenis)
    {
        $this->db->where('nama_jenis', $jenis);
        
        $this->db->delete('jenis');
    }

    public function inventaris()
    {
        return $this->db->get('inventaris')->result_array();
    }

    public function one_inventaris($in)
    {
        $this->db->where('id_inventaris', $in);
        

        $data = $this->db->get('inventaris')->result_array(); 
        foreach ($data as $key):
            $jumlah = $key['jumlah'];
        endforeach;

        return $jumlah;
    }

    public function on_inventaris($in)
    {
        $this->db->where('id_inventaris', $in);
        

        return $this->db->get('inventaris')->result_array();
    }

    public function add_inventaris($jenis)
    {
        $this->db->insert('inventaris', $jenis);
    }

    public function edit_inventaris($in, $array)
    {
        $this->db->where('id_inventaris', $in);
        
        $this->db->update('inventaris', $array);
    }

    public function hapus_inventaris($in)
    {
        $this->db->where('id_inventaris', $in);
        
        $this->db->delete('inventaris');
    }


}

/* End of file ModelName.php */
