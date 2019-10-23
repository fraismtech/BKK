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

    public function data_lowongan()
    {
    	$query = $this->db->query("SELECT * FROM table_lowongan AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra ORDER BY register_date DESC LIMIT 6");
    	return $query->result();
    }

    public function data_lowongan_all()
    {
    	$this->load->library('pagination'); // Load librari paginationnya
    
	    $query = "SELECT * FROM table_lowongan AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra ORDER BY register_date DESC"; // Query untuk menampilkan semua data siswa
	    
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

  //   	$this->db->from('table_lowongan');
  //       $this->db->join('table_sekolah','table_sekolah.id_sekolah = table_lowongan.id_sekolah');
  //       $this->db->join('table_mitra', 'table_mitra.id_mitra = table_mitra.id_mitra');
  //       $this->db->limit($limit,$offset);  
		// $query = $this->db->get();

		// return $query->result();
    	// $query = $this->db->query("SELECT * FROM table_lowongan AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra ORDER BY register_date DESC");
    	// return $query->result();
    }

}