<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Bkk extends CI_Model{ 
    // Alumni
    var $table_4          = 'table_alumni';
    var $table_4_1        = 'table_sekolah';
    var $column_order_4   = array('nisn','nama','tahun_lulus','table_alumni.status','jurusan'); //set column field database for datatable orderable
    var $column_search_4  = array('nisn','nama','tahun_lulus','table_alumni.status','jurusan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_4 = array('');
    var $order_4 = array('tahun_lulus' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function jurusan()
    {
        $query = $this->db->query("SELECT * FROM table_jurusan ORDER BY nama_jurusan ASC");
        return $query->result();
    }
    
    public function slider($id)
    {
        $query = $this->db->query("SELECT * FROM table_slider WHERE id_sekolah='$id'");
        return $query->result();
    }

    public function detailSekolah($npsn)
    {
        $detailSekolah = $this->db->query("SELECT * FROM table_sekolah WHERE npsn='$npsn' ORDER BY npsn DESC LIMIT 1")->result_array();
        return $detailSekolah;
    }

    public function total_alumni($id)
    {
        $query = $this->db->query("SELECT * FROM table_alumni WHERE id_sekolah='$id'");
        return $query->num_rows();
    }

    public function total_mitra($id)
    {
        $query = $this->db->query("SELECT * FROM table_mitra WHERE id_sekolah='$id'");
        return $query->num_rows();
    }

    public function total_loker($id)
    {
        $query = $this->db->query("SELECT * FROM table_lowongan WHERE id_sekolah='$id'");
        return $query->num_rows();
    }

    public function data_lowongan($id)
    {
        $query = $this->db->query("SELECT * FROM table_lowongan AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra JOIN table_posisi_jabatan AS tpj ON tl.id_posisi_jabatan = tpj.id_posisi_jabatan JOIN table_keahlian AS tk ON tl.id_keahlian = tk.id_keahlian JOIN table_status_pendidikan AS tsp ON tl.id_status_pendidikan = tsp.id_status_pendidikan JOIN table_jenis_pengupahan AS tjp ON tl.id_jenis_pengupahan = tjp.id_jenis_pengupahan JOIN table_status_hub_kerja AS tshp ON tl.id_status_hub_kerja = tshp.id_status_hub_kerja JOIN table_jurusan AS tj ON tl.jurusan = tj.id_jurusan JOIN table_jenis_lowongan AS tjl ON tk.id_jenis_lowongan = tjl.id_jenis_lowongan WHERE ts.id_sekolah='$id' ORDER BY register_date DESC LIMIT 6");
        return $query->result();
    }

    public function data_kegiatan($id)
    {
        $query = $this->db->query("SELECT * FROM table_kegiatan WHERE id_sekolah='$id' ORDER BY id_kegiatan DESC LIMIT 3");
        return $query->result();
    }

    public function dataProfil($id)
    {
        $query = $this->db->query("SELECT * FROM table_sekolah WHERE id_sekolah='$id'");
        return $query->result();
    }

    public function dataMitra($id)
    {
        $query = $this->db->query("SELECT * FROM table_mitra AS tm JOIN table_sekolah AS ts ON tm.id_sekolah = ts.id_sekolah WHERE ts.id_sekolah='$id' ORDER BY id_mitra DESC LIMIT 4");
        return $query->result();
    }

    public function data_kegiatan_all($id, $npsn)
    {
        $this->load->library('pagination'); // Load librari paginationnya
    
        $query = "SELECT * FROM table_kegiatan AS tk JOIN table_sekolah AS ts ON tk.id_sekolah = ts.id_sekolah WHERE ts.id_sekolah = '$id' ORDER BY tanggal_kegiatan DESC"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url($npsn.'/kegiatan');
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

    public function data_lowongan_all($id, $npsn)
    {
        $this->load->library('pagination'); // Load librari paginationnya
    
        $query = "SELECT * FROM table_lowongan AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra JOIN table_posisi_jabatan AS tpj ON tl.id_posisi_jabatan = tpj.id_posisi_jabatan JOIN table_keahlian AS tk ON tl.id_keahlian = tk.id_keahlian JOIN table_status_pendidikan AS tsp ON tl.id_status_pendidikan = tsp.id_status_pendidikan JOIN table_jenis_pengupahan AS tjp ON tl.id_jenis_pengupahan = tjp.id_jenis_pengupahan JOIN table_status_hub_kerja AS tshp ON tl.id_status_hub_kerja = tshp.id_status_hub_kerja JOIN table_jurusan AS tj ON tl.jurusan = tj.id_jurusan JOIN table_jenis_lowongan AS tjl ON tk.id_jenis_lowongan = tjl.id_jenis_lowongan WHERE ts.id_sekolah = '$id' ORDER BY register_date DESC"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url($npsn.'/loker');
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
        $data['lowongan'] = $this->db->query($query)->result();
        
        return $data;
    }

    public function data_mitra_all($id, $npsn)
    {
        $this->load->library('pagination'); // Load librari paginationnya
    
        $query = "SELECT * FROM table_mitra AS tm JOIN table_sekolah AS ts ON tm.id_sekolah = ts.id_sekolah WHERE ts.id_sekolah='$id'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url($npsn.'/mitra');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 12;
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
        $data['mitra'] = $this->db->query($query)->result();
        
        return $data;
    }

    public function detailKegiatan($id_kegiatan)
    {
        $query = $this->db->query("SELECT * FROM table_kegiatan WHERE id_kegiatan='$id_kegiatan'");
        return $query->result();
    }

    public function listKegiatan($id_kegiatan, $id_sekolah)
    {
        $query = $this->db->query("SELECT * FROM table_kegiatan WHERE id_kegiatan !='$id_kegiatan' AND id_sekolah='$id_sekolah' ORDER BY tanggal_kegiatan DESC LIMIT 5");
        return $query->result();
    }

    public function listLowongan($id_sekolah)
    {
        $query = $this->db->query("SELECT * FROM table_lowongan AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra JOIN table_posisi_jabatan AS tpj ON tl.id_posisi_jabatan = tpj.id_posisi_jabatan JOIN table_keahlian AS tk ON tl.id_keahlian = tk.id_keahlian JOIN table_status_pendidikan AS tsp ON tl.id_status_pendidikan = tsp.id_status_pendidikan JOIN table_jenis_pengupahan AS tjp ON tl.id_jenis_pengupahan = tjp.id_jenis_pengupahan JOIN table_status_hub_kerja AS tshp ON tl.id_status_hub_kerja = tshp.id_status_hub_kerja JOIN table_jurusan AS tj ON tl.jurusan = tj.id_jurusan JOIN table_jenis_lowongan AS tjl ON tk.id_jenis_lowongan = tjl.id_jenis_lowongan WHERE tl.id_sekolah='$id_sekolah' ORDER BY register_date DESC LIMIT 5");
        return $query->result();
    }

    // Alumni
    private function _get_datatables_query_alumni($id)
    {
        $this->db->select("*, table_alumni.status AS sts");
        $this->db->from($this->table_4);
        $this->db->join($this->table_4_1, $this->table_4_1.'.id_sekolah ='.$this->table_4.'.id_sekolah');
        $this->db->where($this->table_4_1.'.id_sekolah', $id);
        // if($this->input->post('sekolah'))
        // {
        //     $this->db->where($this->table_4_1.'.id_sekolah', $this->input->post('sekolah'));
        // }
        // if($this->input->post('jurusan'))
        // {
        //     $this->db->where('jurusan', $this->input->post('jurusan'));
        // }
        // if($this->input->post('tahun_lulus'))
        // {
        //     $this->db->where('tahun_lulus', $this->input->post('tahun_lulus'));
        // }
        // $this->db->where('id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->order_by('tahun_lulus', 'DESC');

        $i = 0;
    
        foreach ($this->column_search_4 as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search_4) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_4'])) // here order processing
        {
            $this->db->order_by($this->column_order_4[$_POST['order_4']['0']['column']], $_POST['order_4']['0']['dir']);
        } 
        else if(isset($this->order_4))
        {
            $order_4 = $this->order_4;
            $this->db->order_by(key($order_4), $order_4[key($order_4)]);
        }
    }

    public function get_datatables_alumni($id)
    {
        $this->_get_datatables_query_alumni($id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_alumni($id)
    {
        $this->db->from('table_alumni');
        $this->db->where('id_sekolah', $id);
        // $this->db->where('id_sekolah', $id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_alumni($id)
    {
        $this->db->from('table_alumni');
        $this->db->where('id_sekolah', $id);
        // $this->db->where('id_sekolah', $id_sekolah);
        $this->db->count_all_results();
    }
}