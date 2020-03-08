<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        
        if($this->session->userdata('login_admin') != true){
			
            redirect('Admin','refresh');
            
        }
    }
    
    // Halaman Utama
    public function index()
    {
        $data['nama'] = $this->session->userdata('nama_admin');
        $this->load->view('v_dashboard_admin', $data);
        
    }


    // Pengolahan User
    public function user()
    {
        $this->load->view('v_view_user_admin');

    }


    // Petugas
    public function petugas()
    {
        $data['petugas'] = $this->M_petugas->all();
        $this->load->view('v_tabel_petugas_Admin', $data);
        
    }


    // Pegawai
    public function pegawai()
    {
        $data['pegawai'] = $this->M_pegawai->all();
        $this->load->view('v_tabel_pegawai_Admin', $data);
        
    }

    public function add_pegawai()
    {
        $this->load->view('v_tambah_pegawai_admin');
        
    }

    public function proses_add_pegawai()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('telp', 'No. Telp', 'required');
        $this->form_validation->set_rules('pass', 'Kata Sandi', 'required');

        if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('email', form_error('email'));
			$this->session->set_flashdata('pass', form_error('pass'));
			$this->session->set_flashdata('telp', form_error('telp'));
			$this->session->set_flashdata('alaamt', form_error('alamat'));
            $this->session->set_flashdata('nama', form_error('nama'));
            
            redirect('Admin_dashboard/add_pegawai','refresh');

        }else{
            $aku = array('nama_pegawai' => $this->input->post('nama'),
                        'telp' => $this->input->post('telp'),
                        'alamat' => $this->input->post('alamat'),
                        'password' => md5($this->input->post('pass')),
                        'email' => $this->input->post('email'));

            $this->M_pegawai->add_pegawai($aku);

            $this->session->set_flashdata('add_pegawai', 'Pegawai baru berhasil ditambahkan');

            redirect('Admin_dashboard/pegawai','refresh');

        }
          
    }

    public function edit_pegawai($id_pegawai)
    {
        $data['pegawai'] = $this->M_pegawai->pegawai($id_pegawai);
        $this->load->view('v_edit_pegawai_admin', $data);
        
    }

    public function proses_edit_pegawai()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('telp', 'No. Telp', 'required');

        if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('email', form_error('email'));
			$this->session->set_flashdata('pass', form_error('pass'));
			$this->session->set_flashdata('telp', form_error('telp'));
			$this->session->set_flashdata('alaamt', form_error('alamat'));
            $this->session->set_flashdata('nama', form_error('nama'));
            
            redirect('Admin_dashboard/edit_pegawai','refresh');

        }else{
            $id = $this->input->post('id');
            $aku = array('nama_pegawai' => $this->input->post('nama'),
                        'telp' => $this->input->post('telp'),
                        'alamat' => $this->input->post('alamat'),
                        'email' => $this->input->post('email'));

            $this->M_pegawai->edit_pegawai($aku, $id);

            $this->session->set_flashdata('edit_pegawai', 'data Pegawai berhasil diubah');

            redirect('Admin_dashboard/pegawai','refresh');

        }
          
    }

    public function hapus_pegawai($id_pegawai)
    {
        $this->M_pegawai->hapus_pegawai($id_pegawai);

        $this->session->set_flashdata('hapus', 'Pegawai berhasil dihapus');

        redirect('Admin_dashboard/pegawai','refresh');
    }


    // Pengolahan Peminjaman
    public function peminjaman()
    {
        $this->load->view('v_view_peminjaman_admin');
        
    }

    public function permohonan()
    {
        $data['pinjam'] = $this->M_pinjam->permohonan();
        $this->load->view('v_tabel_permohonan_admin', $data);
        
    }

    public function edit_permohonan($id, $in)
    {
        $admin = $this->session->userdata('id_admin');


        $this->M_pinjam->ke_proses($id, $admin);

        $jumlah = $this->M_barang->one_inventaris($in);

        $array = array('jumlah' => $jumlah - 1, );
        $this->M_barang->edit_inventaris($in, $array);

        redirect('Admin_dashboard/proses','refresh');
        
    }

    public function proses()
    {
        $data['pinjam'] = $this->M_pinjam->proses();
        $this->load->view('v_tabel_proses_admin', $data);
        
    }

    public function edit_proses($id, $in)
    {
        $admin = $this->session->userdata('id_admin');

        $tanggal = Date('Y-m-d');
        $this->M_pinjam->ke_histori($id, $admin, $tanggal);

        $jumlah = $this->M_barang->one_inventaris($in);

        $array = array('jumlah' => $jumlah + 1, );
        $this->M_barang->edit_inventaris($in, $array);

        redirect('Admin_dashboard/histori','refresh');
        
    }

    public function histori()
    {
        $data['pinjam'] = $this->M_pinjam->histori();
        $this->load->view('v_tabel_histori_admin', $data);
        
    }


    //Pengolahan Barang
    public function barang()
    {
        $this->load->view('v_view_barang_admin');
        
    }

    public function inventaris()
    {
        $data['pinjam'] = $this->M_barang->inventaris();
        $this->load->view('v_tabel_inventaris_admin', $data);
        
    }

    public function add_inventaris()
    {
        $this->load->view('v_tambah_inventaris_admin');
        
    }

    public function proses_add_inventaris()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('telp', 'No. Telp', 'required');
        $this->form_validation->set_rules('pass', 'Kata Sandi', 'required');

        if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('email', form_error('email'));
			$this->session->set_flashdata('pass', form_error('pass'));
			$this->session->set_flashdata('telp', form_error('telp'));
			$this->session->set_flashdata('alaamt', form_error('alamat'));
            $this->session->set_flashdata('nama', form_error('nama'));
            
            redirect('Admin_dashboard/add_pegawai','refresh');

        }else{
            $aku = array('nama' => $this->input->post('nama'),
                        'deskrisi' => $this->input->post('telp'),
                        'jumlah' => $this->input->post('alamat'),
                        'id_jenis' => $this->input->post('email'),
                        'date' => $this->input->post('pass'));

            $this->M_barang->add_inventaris($aku);

            $this->session->set_flashdata('add_pegawai', 'Pegawai baru berhasil ditambahkan');

            redirect('Admin_dashboard/inventaris','refresh');

        }
    }

    public function edit_inventaris($in)
    {
        $data['inventaris'] = $this->M_barang->on_inventaris($in);
        $this->load->view('v_edit_inventaris_admin', $data);
        
    }

    public function proses_edit_inventaris()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('telp', 'No. Telp', 'required');
        $this->form_validation->set_rules('pass', 'Kata Sandi', 'required');

        if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('email', form_error('email'));
			$this->session->set_flashdata('pass', form_error('pass'));
			$this->session->set_flashdata('telp', form_error('telp'));
			$this->session->set_flashdata('alaamt', form_error('alamat'));
            $this->session->set_flashdata('nama', form_error('nama'));
            
            redirect('Admin_dashboard/edit_inventaris','refresh');

        }else{
            $aku = array('nama' => $this->input->post('nama'),
                        'deskrisi' => $this->input->post('telp'),
                        'jumlah' => $this->input->post('alamat'),
                        'id_jenis' => $this->input->post('email'),
                        'date' => $this->input->post('pass'));

            $id = $this->input->post('id');

            $this->M_barang->edit_inventaris($id, $aku);

            $this->session->set_flashdata('add_pegawai', 'Pegawai baru berhasil ditambahkan');

            redirect('Admin_dashboard/inventaris','refresh');

        }
    }

    public function hapus_inventaris($in)
    {
        $this->M_barang->hapus_inventaris($in);

        $this->session->set_flashdata('hapus', 'Pegawai berhasil dihapus');

        redirect('Admin_dashboard/inventaris','refresh');
    }

    public function jenis()
    {
        $data['pinjam'] = $this->M_barang->jenis();
        $this->load->view('v_tabel_jenis_admin', $data);
        
    }

    public function add_jenis()
    {
        $this->load->view('v_tambah_jenis_Admin');
        
    }

    public function proses_add_jenis()
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('jenis', form_error('jenis'));
			$this->session->set_flashdata('deskripsi', form_error('deskripsi'));
            
            redirect('Admin_dashboard/add_jenis','refresh');

        }else{
            $aku = array('nama_jenis' => $this->input->post('jenis'),
                        'keterangan' => $this->input->post('deskripsi'),
                        'id_jenis' => Date('Y-m'));

            $this->M_barang->add_jenis($aku);

            $this->session->set_flashdata('add_jenis', 'Pegawai baru berhasil ditambahkan');

            redirect('Admin_dashboard/jenis','refresh');

        }
          
    }


    public function edit_jenis($jenis)
    {
        $data['jeni'] = $this->M_barang->one_jenis($jenis);
        $this->load->view('v_edit_jenis_admin', $data);
    }

    public function proses_edit_jenis($jenis)
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('jenis', form_error('jenis'));
			$this->session->set_flashdata('deskripsi', form_error('deskripsi'));
            
            redirect('Admin_dashboard/add_jenis','refresh');

        }else{
            $aku = array('keterangan' => $this->input->post('deskripsi'),
                            'nama_jenis' => $this->input->post('jenis'));

            $this->M_barang->edit_jenis($jenis, $aku);

            $this->session->set_flashdata('add_jenis', 'Pegawai baru berhasil ditambahkan');

            redirect('Admin_dashboard/jenis','refresh');

        }
    }

    public function hapus_jenis($jenis)
    {
        $this->M_barang->hapus_jenis($jenis);

        $this->session->set_flashdata('hapus', 'Pegawai berhasil dihapus');

        redirect('Admin_dashboard/jenis','refresh');
    }

}

/* End of file Admin_dashboard.php */
