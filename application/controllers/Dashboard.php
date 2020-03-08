<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        
        if($this->session->userdata('login') != true){
			
            redirect('Login','refresh');
            
        }
    }

    public function index()
    {
        $this->load->view('f_dashboard');
        
    }

    public function pinjam()
    {
        $data['pinjam'] = $this->M_barang->inventaris();
        $this->load->view('f_pinjam', $data);
    }

    public function proses_add_pinjam()
    {
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('id', form_error('id'));
			$this->session->set_flashdata('tgl', form_error('tgl'));
            
            redirect('Dashboard/pinjam','refresh');

        }else{
            $aku = array('id_inventaris' => $this->input->post('id'),
                        'id_pegawai' => $this->session->userdata('id'),
                        'status' => 'Belum Dikonfirmasi',
                        'tgl_peminjaman' => $this->input->post('tgl'));

            $this->M_pinjam->add_pinjam($aku);

            $this->session->set_flashdata('add_pegawai', 'Pegawai baru berhasil ditambahkan');

            redirect('Dashboard/histori','refresh');

        }
    }

    public function histori()
    {
        $id = $this->session->userdata('id');
        
        $data['histori'] = $this->M_pinjam->my_histori($id);
        $this->load->view('f_histori', $data);
        
    }
}

/* End of file Dashboard.php */
