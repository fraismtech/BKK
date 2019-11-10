<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Home extends CI_Model{ 

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function slider()
    {
    	$query = $this->db->query("SELECT * FROM table_slider WHERE id_sekolah=''");
    	return $query->result();
    }

    public function total_bkk()
    {
    	$query = $this->db->query("SELECT * FROM table_sekolah");
    	return $query->num_rows();
    }

    public function total_alumni()
    {
    	$query = $this->db->query("SELECT * FROM table_alumni");
    	return $query->num_rows();
    }

    public function total_mitra()
    {
    	$query = $this->db->query("SELECT * FROM table_mitra");
    	return $query->num_rows();
    }

    public function total_loker()
    {
    	$query = $this->db->query("SELECT * FROM table_lowongan");
    	return $query->num_rows();
    }

    public function data_kegiatan()
    {
        $query = $this->db->query("SELECT * FROM table_kegiatan AS tk JOIN table_sekolah AS ts ON tk.id_sekolah = ts.id_sekolah ORDER BY tanggal_kegiatan DESC LIMIT 6");
        return $query->result();
    }

    public function data_lowongan()
    {
    	$query = $this->db->query("SELECT * 
                                 FROM table_lowongan AS tl 
                                 JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah 
                                 JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra 
                                 JOIN table_posisi_jabatan AS tpj ON tl.id_posisi_jabatan = tpj.id_posisi_jabatan 
                                 JOIN table_keahlian AS tk ON tl.id_keahlian = tk.id_keahlian 
                                 JOIN table_status_pendidikan AS tsp ON tl.id_status_pendidikan = tsp.id_status_pendidikan 
                                 JOIN table_jenis_pengupahan AS tjp ON tl.id_jenis_pengupahan = tjp.id_jenis_pengupahan 
                                 JOIN table_status_hub_kerja AS tshp ON tl.id_status_hub_kerja = tshp.id_status_hub_kerja 
                                 JOIN table_jurusan AS tj ON tl.jurusan = tj.id_jurusan 
                                 JOIN table_jenis_lowongan AS tjl ON tk.id_jenis_lowongan = tjl.id_jenis_lowongan  
                                 WHERE tl.ket = 'Aktif' ORDER BY tl.register_date DESC LIMIT 6");
    	return $query->result();
    }

    public function data_lowongan_all()
    {
    	$this->load->library('pagination'); // Load librari paginationnya
    
	    $query = "SELECT * FROM table_lowongan AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra JOIN table_posisi_jabatan AS tpj ON tl.id_posisi_jabatan = tpj.id_posisi_jabatan JOIN table_keahlian AS tk ON tl.id_keahlian = tk.id_keahlian JOIN table_status_pendidikan AS tsp ON tl.id_status_pendidikan = tsp.id_status_pendidikan JOIN table_jenis_pengupahan AS tjp ON tl.id_jenis_pengupahan = tjp.id_jenis_pengupahan JOIN table_status_hub_kerja AS tshp ON tl.id_status_hub_kerja = tshp.id_status_hub_kerja JOIN table_jurusan AS tj ON tl.jurusan = tj.id_jurusan JOIN table_jenis_lowongan AS tjl ON tk.id_jenis_lowongan = tjl.id_jenis_lowongan WHERE tl.ket = 'Aktif' ORDER BY tl.register_date DESC"; // Query untuk menampilkan semua data siswa
	    
	    $config['base_url'] = base_url('home/lowongan');
	    $config['total_rows'] = $this->db->query($query)->num_rows();
	    $config['per_page'] = 9;
	    $config['uri_segment'] = 3;
	    $config['num_links'] = 2;
	    
	    // Style Pagination
	    // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
	    $config['full_tag_open']   = '<ul class="pagination text-center justify-content-center">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = '<i class="fa fa-angle-double-left"></i>'; 
        $config['first_tag_open']  = '<li class="page-link">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = '<i class="fa fa-angle-double-right"></i>'; 
        $config['last_tag_open']   = '<li class="page-link">';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '<i class="fa fa-angle-right"></i> '; 
        $config['next_tag_open']   = '<li class="page-link">';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = ' <i class="fa fa-angle-left"></i> '; 
        $config['prev_tag_open']   = '<li class="page-link">';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li class="page-link">';
        $config['num_tag_close']   = '</li>';
        // End style pagination
	    
	    $this->pagination->initialize($config); // Set konfigurasi paginationnya
	    
	    $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
	    $query .= " LIMIT ".$page.", ".$config['per_page'];
	    
	    $data['limit'] = $config['per_page'];
	    $data['total_rows'] = $config['total_rows'];
	    $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
	    $data['lowongan'] = $this->db->query($query)->result();
	    
	    return $data;
    }

    public function data_kegiatan_all()
    {
        $this->load->library('pagination'); // Load librari paginationnya
    
        $query = "SELECT * FROM table_kegiatan AS tk JOIN table_sekolah AS ts ON tk.id_sekolah = ts.id_sekolah ORDER BY tanggal_kegiatan DESC"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('Home/berita');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 6;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination text-center justify-content-center">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = '<i class="fa fa-angle-double-left"></i>'; 
        $config['first_tag_open']  = '<li class="page-link">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = '<i class="fa fa-angle-double-right"></i>'; 
        $config['last_tag_open']   = '<li class="page-link">';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '<i class="fa fa-angle-right"></i> '; 
        $config['next_tag_open']   = '<li class="page-link">';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = ' <i class="fa fa-angle-left"></i> '; 
        $config['prev_tag_open']   = '<li class="page-link">';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li class="page-link">';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['kegiatan'] = $this->db->query($query)->result();
        
        return $data;
    }

    public function data_lowongan_cari($cari)
    {
        $query = $this->db->query("SELECT * FROM table_lowongan AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra JOIN table_posisi_jabatan AS tpj ON tl.id_posisi_jabatan = tpj.id_posisi_jabatan JOIN table_keahlian AS tk ON tl.id_keahlian = tk.id_keahlian JOIN table_status_pendidikan AS tsp ON tl.id_status_pendidikan = tsp.id_status_pendidikan JOIN table_jenis_pengupahan AS tjp ON tl.id_jenis_pengupahan = tjp.id_jenis_pengupahan JOIN table_status_hub_kerja AS tshp ON tl.id_status_hub_kerja = tshp.id_status_hub_kerja JOIN table_jurusan AS tj ON tl.jurusan = tj.id_jurusan JOIN table_jenis_lowongan AS tjl ON tk.id_jenis_lowongan = tjl.id_jenis_lowongan WHERE tpj.nama_posisi_jabatan like '%$cari%' OR tk.nama_keahlian like '%$cari%' OR tsp.nama_status_pendidikan like '%$cari%' OR tjp.nama_jenis_pengupahan like '%$cari%' OR tshp.nama_status_hub_kerja like '%$cari%' OR tl.tanggal_berlaku like '%$cari%' OR tl.tanggal_berakhir like '%$cari%' OR tl.nama_lowongan like '%$cari%' OR tl.uraian_pekerjaan like '%$cari%' OR tl.uraian_tugas like '%$cari%' OR tl.penempatan like '%$cari%' OR tl.batas_umur like '%$cari%' OR tl.jml_pria like '%$cari%' OR tl.jml_wanita like '%$cari%' OR tj.nama_jurusan like '%$cari%' OR tl.pengalaman like '%$cari%' OR tl.syarat_khusus like '%$cari%' OR tl.gaji_per_bulan like '%$cari%' OR tl.jam_kerja like '%$cari%' WHERE tl.ket = 'Aktif' ORDER BY tl.register_date DESC");
        return $query->result();
    }

    public function data_kegiatan_cari($cari)
    {
         $query = $this->db->query("SELECT * FROM table_kegiatan AS tk JOIN table_sekolah AS ts ON tk.id_sekolah = ts.id_sekolah WHERE tk.tanggal_kegiatan like '%$cari%' OR tk.judul_kegiatan like '%$cari%' OR tk.uraian_kegiatan like '%$cari%' ORDER BY tanggal_kegiatan DESC");
         return $query->result();
    }

    public function detailKegiatan($id_kegiatan)
    {
        $query = $this->db->query("SELECT * FROM table_kegiatan WHERE id_kegiatan='$id_kegiatan'");
        return $query->result();
    }

    public function listKegiatan($id_kegiatan)
    {
        $query = $this->db->query("SELECT * FROM table_kegiatan WHERE id_kegiatan !='$id_kegiatan' ORDER BY tanggal_kegiatan DESC LIMIT 5");
        return $query->result();
    }

    public function listLowongan()
    {
        $query = $this->db->query("SELECT * FROM table_lowongan AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra JOIN table_posisi_jabatan AS tpj ON tl.id_posisi_jabatan = tpj.id_posisi_jabatan JOIN table_keahlian AS tk ON tl.id_keahlian = tk.id_keahlian JOIN table_status_pendidikan AS tsp ON tl.id_status_pendidikan = tsp.id_status_pendidikan JOIN table_jenis_pengupahan AS tjp ON tl.id_jenis_pengupahan = tjp.id_jenis_pengupahan JOIN table_status_hub_kerja AS tshp ON tl.id_status_hub_kerja = tshp.id_status_hub_kerja JOIN table_jurusan AS tj ON tl.jurusan = tj.id_jurusan JOIN table_jenis_lowongan AS tjl ON tk.id_jenis_lowongan = tjl.id_jenis_lowongan WHERE tl.ket = 'Aktif' ORDER BY tl.register_date DESC LIMIT 5");
        return $query->result();
    }

}