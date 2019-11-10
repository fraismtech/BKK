<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard_Pusat extends CI_Model
{ 
    // Slider
    var $table          = 'table_slider';
    var $table2         = 'table_sekolah';
    var $column_order   = array('tanggal_slider','judul_slider','foto_slider'); //set column field database for datatable orderable
    var $column_search  = array('DATE_FORMAT(tanggal_slider, "%d %b %Y")','judul_slider','foto_slider'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where = array('');
    var $order = array('id_slider' => 'asc'); // default order

    // Kegiatan
    var $table_1          = 'table_kegiatan';
    var $column_order_1   = array('tanggal_kegiatan','judul_kegiatan','uraian_kegiatan','foto_kegiatan'); //set column field database for datatable orderable
    var $column_search_1  = array('DATE_FORMAT(tanggal_kegiatan, "%d %b %Y")','judul_kegiatan','uraian_kegiatan','foto_kegiatan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_1 = array('');
    var $order_1 = array('id_kegiatan' => 'asc'); // default order

    // Mitra
    var $table_2          = 'table_mitra';
    var $table_2_1        = 'table_cp_mitra';
    var $table_2_2        = 'table_periode';
    var $table_2_3        = 'table_sekolah';
    var $column_order_2   = array('table_mitra.nama_perusahaan','table_mitra.bidang_usaha','table_mitra.no_telp','table_mitra.email','table_periode.dari','table_periode.sampai'); //set column field database for datatable orderable
    var $column_search_2  = array('table_mitra.nama_perusahaan','table_mitra.bidang_usaha','table_mitra.no_telp','table_mitra.email','DATE_FORMAT(table_periode.dari, "%d %b %Y")','DATE_FORMAT(table_periode.sampai, "%d %b %Y")'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_2 = array('');
    var $order_2 = array('id_mitra' => 'asc'); // default order

    // User
    var $table_3          = 'table_login';
    var $table_3_1        = 'table_sekolah';
    var $table_3_2        = 'table_perijinan';
    var $column_order_3   = array('table_login.username','table_login.nama_operator','table_login.email','table_login.no_hp'); //set column field database for datatable orderable
    var $column_search_3  = array('table_login.username','table_login.nama_operator','table_login.email','table_login.no_hp'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_3 = array('');
    var $order_3 = array('id_user' => 'asc'); // default order

    // Alumni
    var $table_4          = 'table_alumni';
    var $table_4_1        = 'table_sekolah';
    var $column_order_4   = array('nisn','nama','no_telp','tahun_lulus','table_alumni.status','tanggal_lahir','tempat_lahir','jurusan','nama_sekolah'); //set column field database for datatable orderable
    var $column_search_4  = array('nisn','nama','no_telp','tahun_lulus','table_alumni.status','tanggal_lahir','tempat_lahir','jurusan','nama_sekolah'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_4 = array('');
    var $order_4 = array('tahun_lulus' => 'asc'); // default order

    var $table_l          = 'table_alumni';
    var $column_order_l   = array('jurusan'); //set column field database for datatable orderable
    var $column_search_l  = array('jurusan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_l = array('');
    var $order_l = array('jurusan' => 'asc'); // default order

    var $table_k          = 'table_alumni';
    var $column_order_k   = array('table_sekolah.kecamatan'); //set column field database for datatable orderable
    var $column_search_k  = array('table_sekolah.kecamatan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_k = array('');
    var $order_k = array('table_sekolah.kecamatan' => 'asc'); // default order

    // Loker
    var $table_5          = 'table_lowongan';
    var $table_5_1          = 'table_mitra';
    var $column_order_5   = array('nama_lowongan','nama_perusahaan','tanggal_berlaku','tanggal_berakhir'); //set column field database for datatable orderable
    var $column_search_5  = array('nama_perusahaan','DATE_FORMAT(tanggal_berlaku, "%d %b %Y")','DATE_FORMAT(tanggal_berakhir, "%d %b %Y")','nama_lowongan','ket'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_5 = array('');
    var $order_5 = array('id_lowongan' => 'asc'); // default order

    // Jurusan
    var $table_6          = 'table_jurusan';
    var $column_order_6   = array('nama_jurusan'); //set column field database for datatable orderable
    var $column_search_6  = array('nama_jurusan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_6 = array('');
    var $order_6 = array('id_jurusan' => 'asc'); // default order

    // Posisi Loker
    var $table_7          = 'table_jenis_lowongan';
    var $column_order_7   = array('id_jenis_lowongan','nama_jenis_lowongan'); //set column field database for datatable orderable
    var $column_search_7  = array('id_jenis_lowongan','nama_jenis_lowongan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_7 = array('');
    var $order_7 = array('id_jenis_lowongan' => 'asc'); // default order

    // Keterampilan
    var $table_8          = 'table_keahlian';
    var $table_8_2        = 'table_jenis_lowongan';
    var $column_order_8   = array('id_keahlian','nama_jenis_lowongan','nama_keahlian'); //set column field database for datatable orderable
    var $column_search_8  = array('id_keahlian','nama_jenis_lowongan','nama_keahlian'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_8 = array('');
    var $order_8 = array('id_keahlian' => 'asc'); // default order

    // BKK
    var $table_9          = 'table_sekolah';
    var $table_9_2        = 'table_login';
    var $table_9_3        = 'table_perijinan';
    var $column_order_9   = array('npsn','nama_sekolah','alamat_sekolah','no_ijin','tgl_perijinan'); //set column field database for datatable orderable
    var $column_search_9  = array('npsn','nama_sekolah','alamat_sekolah','kelurahan','kecamatan','no_ijin','DATE_FORMAT(tgl_perijinan, "%d %b %Y")','struktur','dokumen'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_9 = array('');
    var $order_9 = array('nama_sekolah' => 'asc'); // default order

    var $table_x          = 'table_sekolah';
    var $column_order_x   = array('kecamatan'); //set column field database for datatable orderable
    var $column_search_x  = array('kecamatan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_x = array('');
    var $order_x = array('kecamatan' => 'asc'); // default order

    // Laporan Mitra
    var $table_10          = 'table_mitra';
    var $table_10_3        = 'table_sekolah';
    var $column_order_10   = array('table_mitra.nama_perusahaan','table_mitra.alamat','table_mitra.no_telp','table_mitra.email','table_mitra.bidang_usaha','table_mitra.nama_cp','table_mitra.jabatan_cp','table_mitra.no_telp_cp','table_mitra.jenis_kemitraan','table_mitra.periode_dari','table_mitra.periode_sampai'); //set column field database for datatable orderable
    var $column_search_10  = array('table_mitra.nama_perusahaan','table_mitra.alamat','table_mitra.no_telp','table_mitra.email','table_mitra.bidang_usaha','table_mitra.nama_cp','table_mitra.jabatan_cp','table_mitra.no_telp_cp','table_mitra.jenis_kemitraan','DATE_FORMAT(table_mitra.periode_dari, "%d %b %Y")','DATE_FORMAT(table_mitra.periode_sampai, "%d %b %Y")'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_10 = array('');
    var $order_10 = array('id_mitra' => 'asc'); // default order

    var $table_lm          = 'table_sekolah';
    var $table_lm_1        = 'table_mitra';
    var $table_lm_2        = 'table_lowongan';
    var $column_order_lm   = array('kecamatan'); //set column field database for datatable orderable
    var $column_search_lm  = array('kecamatan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_lm = array('');
    var $order_lm = array('kecamatan' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Data BKK Baru
    public function bkk_baru(){
        $query = $this->db->query("SELECT * FROM table_sekolah WHERE notif = '1'");
        return $query->num_rows();
    }

    // Data Statistik
    public function total_bkk(){
        $query = $this->db->query("SELECT * FROM table_sekolah");
        return $query->num_rows();
    }

    public function total_loker(){
        $query = $this->db->query("SELECT * FROM table_lowongan");
        return $query->num_rows();
    }

    public function total_kegiatan(){
        $query = $this->db->query("SELECT * FROM table_kegiatan");
        return $query->num_rows();
    }
    //

    public function get_jurusan($id_sekolah)
    {
        $this->db->select('*');
        $this->db->from('table_jurusan');
        $this->db->where('id_sekolah', $id_sekolah);
        $query = $this->db->get();

        $output = '<option value="">Pilih Jurusan</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->nama_jurusan.'">'.$row->nama_jurusan.'</option>';
        }
        return $output;
    }

    public function jurusan()
    {
        $query = $this->db->query("SELECT * FROM table_jurusan ORDER BY nama_jurusan ASC");
        return $query->result();
    }

    public function sekolah()
    {
        $query = $this->db->query("SELECT * FROM table_sekolah ORDER BY nama_sekolah ASC");
        return $query->result();
    }

    public function posisi_loker()
    {
        $query = $this->db->query("SELECT * FROM table_jenis_lowongan ORDER BY id_jenis_lowongan ASC");
        return $query->result();
    }

    public function provinsi()
    {
        $query = $this->db->query("SELECT * FROM provinces");
        return $query->result();
    }

    public function get_kota($id_prov)
    {
        $this->db->select('*');
        $this->db->from('regencies');
        $this->db->where('province_id', $id_prov);
        $query = $this->db->get();

        $output = '<option value="">Pilih Kota/Kabupaten</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $output;
    }

    public function get_nama_provinsi($id_prov)
    {
        $this->db->select('*');
        $this->db->from('provinces');
        $this->db->where('id', $id_prov);
        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $output = $row->name;
        }
        return $output;
    }

    public function get_kec($id_kota)
    {
        $this->db->select('*');
        $this->db->from('districts');
        $this->db->where('regency_id', $id_kota);
        $query = $this->db->get();

        $output = '<option value="">Pilih Kecamatan</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $output;
    }

    public function get_nama_kota($id_kota)
    {
        $this->db->select('*');
        $this->db->from('regencies');
        $this->db->where('id', $id_kota);
        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $output = $row->name;
        }
        return $output;
    }

    public function get_kel($id_kec)
    {
        $this->db->select('*');
        $this->db->from('villages');
        $this->db->where('district_id', $id_kec);
        $query = $this->db->get();

        $output = '<option value="">Pilih Kelurahan</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $output;
    }

    public function get_nama_kec($id_kec)
    {
        $this->db->select('*');
        $this->db->from('districts');
        $this->db->where('id', $id_kec);
        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $output = $row->name;
        }
        return $output;
    }

    public function get_nama_kel($id_kel)
    {
        $this->db->select('*');
        $this->db->from('villages');
        $this->db->where('id', $id_kel);
        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $output = $row->name;
        }
        return $output;
    }

    public function kecamatan($id_kec)
    {
    	$query = $this->db->query("SELECT * FROM districts WHERE regency_id = '$id_kec' ORDER by name ASC");
    	return $query->result();
    }

    public function get_kelurahan($district_id)
    {
        $this->db->select('*');
        $this->db->from('districts');
        $this->db->where('name', $district_id);
        $this->db->where('regency_id', '3276');
        $query = $this->db->get()->row();

        $this->db->select('*');
        $this->db->from('villages');
        $this->db->where('district_id', $query->id);
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();

        $output = '<option value="">Pilih Kelurahan</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->name.'">'.$row->name.'</option>';
        }
        return $output;
    }

    // Lowongan
    public function get_keahlian($kategori)
    {
        $this->db->select('*');
        $this->db->from('table_keahlian');
        $this->db->where('id_jenis_lowongan', $kategori);
        $query = $this->db->get();

        $output = '<option value="">Pilih Keahlian</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->id_keahlian.'">'.$row->nama_keahlian.'</option>';
        }
        return $output;
    }

    public function get_kategori($keahlian)
    {
        
        $query2 = $this->db->query("SELECT * FROM table_jenis_lowongan AS tjl JOIN table_keahlian AS tk ON tjl.id_jenis_lowongan = tk.id_jenis_lowongan WHERE tk.id_keahlian = '$keahlian'");

        $output = '<option value="">Pilih Kategori</option>';
        foreach($query2->result() as $row)
        {
            $output .= '<option value="'.$row->id_jenis_lowongan.'">'.$row->nama_jenis_lowongan.'</option>';
        }
        return $output;
    }

    // Data Mitra
    public function mitra_bkk($id_sekolah)
    {
        $query = $this->db->query("SELECT * FROM table_mitra WHERE id_sekolah = '$id_sekolah' ORDER by nama_perusahaan ASC");
        return $query->result();
    }

    // Data Posisi Jabatan
    public function posisi_jabatan()
    {
        $query = $this->db->query("SELECT * FROM table_posisi_jabatan ORDER by nama_posisi_jabatan ASC");
        return $query->result();
    }

    // Jenis Lowongan
    public function jenis_lowongan()
    {
        $query = $this->db->query("SELECT * FROM table_jenis_lowongan ORDER by id_jenis_lowongan ASC");
        return $query->result();
    }

    // Keahlian
    public function keahlian()
    {
        $query = $this->db->query("SELECT * FROM table_keahlian ORDER by nama_keahlian ASC");
        return $query->result();
    }

    // Status Pendidikan
    public function status_pendidikan()
    {
        $query = $this->db->query("SELECT * FROM table_status_pendidikan ORDER by nama_status_pendidikan ASC");
        return $query->result();
    }

    // Jenis Pengupahan
    public function jenis_pengupahan()
    {
        $query = $this->db->query("SELECT * FROM table_jenis_pengupahan ORDER by nama_jenis_pengupahan ASC");
        return $query->result();
    }

    // Hubungan Kerja
    public function hubungan_kerja()
    {
        $query = $this->db->query("SELECT * FROM table_status_hub_kerja ORDER by nama_status_hub_kerja ASC");
        return $query->result();
    }

    // Tambah Slider
    public function simpan_slider($tanggal, $judul, $image)
    {
        $data = array(
            'tanggal_slider' => $judul,
            'judul_slider' => $judul,
            'foto_slider' => $image
        );  
        $result= $this->db->insert('table_slider', $data);
        return $result;
    }

    //Slider
    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        // $this->db->join($this->table2, $this->table2.'.id_sekolah ='.$this->table.'.id_sekolah');
        // $this->db->where($this->table2.'.id_sekolah=', $id_sekolah);
        $this->db->where('id_sekolah=', '');
        $this->db->order_by('id_slider', 'DESC');

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
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

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->db->from('table_slider');
        // $this->db->where('id_sekolah=', $id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('table_slider');
        // $this->db->where('id_sekolah=', $id_sekolah);
        $this->db->count_all_results();
    }

    // Jurusan
    private function _get_datatables_query_jurusan()
    {
        $this->db->from($this->table_6);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->order_by('nama_jurusan', 'ASC');

        $i = 0;
    
        foreach ($this->column_search_6 as $item) // loop column 
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

                if(count($this->column_search_6) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_6'])) // here order processing
        {
            $this->db->order_by($this->column_order_6[$_POST['order_6']['0']['column']], $_POST['order_6']['0']['dir']);
        } 
        else if(isset($this->order_6))
        {
            $order_6 = $this->order_6;
            $this->db->order_by(key($order_6), $order_6[key($order_6)]);
        }
    }

    public function get_datatables_jurusan()
    {
        $this->_get_datatables_query_jurusan();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_jurusan()
    {
        $this->db->from($this->table_6);
        // $this->db->where('id_sekolah', $id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_jurusan()
    {
        $this->db->from($this->table_6);
        // $this->db->where('id_sekolah', $id_sekolah);
        $this->db->count_all_results();
    }

    // Posisi Loker
    private function _get_datatables_query_posisi_loker()
    {
        $this->db->from($this->table_7);
        // $this->db->join($this->table_6_2, $this->table_6_2.'.id_sekolah ='.$this->table_6.'.id_sekolah');
        // $this->db->where('table_nabung.username=', $username);
        $this->db->order_by('id_jenis_lowongan', 'DESC');

        $i = 0;
    
        foreach ($this->column_search_7 as $item) // loop column 
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

                if(count($this->column_search_7) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_7'])) // here order processing
        {
            $this->db->order_by($this->column_order_7[$_POST['order_7']['0']['column']], $_POST['order_7']['0']['dir']);
        } 
        else if(isset($this->order_7))
        {
            $order_7 = $this->order_7;
            $this->db->order_by(key($order_7), $order_7[key($order_7)]);
        }
    }

    public function get_datatables_posisi_loker()
    {
        $this->_get_datatables_query_posisi_loker();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_posisi_loker()
    {
        $this->db->from($this->table_7);
        // $this->db->join($this->table_6_2, $this->table_6_2.'.id_sekolah ='.$this->table_6.'.id_sekolah');
        // $this->db->where('id_sekolah', $id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_posisi_loker()
    {
        $this->db->from($this->table_7);
        // $this->db->join($this->table_6_2, $this->table_6_2.'.id_sekolah ='.$this->table_6.'.id_sekolah');
        // $this->db->where('id_sekolah', $id_sekolah);
        $this->db->count_all_results();
    }

    // Jurusan
    private function _get_datatables_query_keterampilan()
    {
        $this->db->from($this->table_8);
        $this->db->join($this->table_8_2, $this->table_8_2.'.id_jenis_lowongan ='.$this->table_8.'.id_jenis_lowongan');
        // $this->db->where('table_nabung.username=', $username);
        $this->db->order_by('id_keahlian', 'DESC');

        $i = 0;
    
        foreach ($this->column_search_8 as $item) // loop column 
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

                if(count($this->column_search_8) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_8'])) // here order processing
        {
            $this->db->order_by($this->column_order_8[$_POST['order_8']['0']['column']], $_POST['order_8']['0']['dir']);
        } 
        else if(isset($this->order_8))
        {
            $order_8 = $this->order_8;
            $this->db->order_by(key($order_8), $order_8[key($order_8)]);
        }
    }

    public function get_datatables_keterampilan()
    {
        $this->_get_datatables_query_keterampilan();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_keterampilan()
    {
        $this->db->from($this->table_8);
        $this->db->join($this->table_8_2, $this->table_8_2.'.id_jenis_lowongan ='.$this->table_8.'.id_jenis_lowongan');
        // $this->db->where('id_sekolah', $id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_keterampilan()
    {
        $this->db->from($this->table_8);
        $this->db->join($this->table_8_2, $this->table_8_2.'.id_jenis_lowongan ='.$this->table_8.'.id_jenis_lowongan');
        // $this->db->where('id_sekolah', $id_sekolah);
        $this->db->count_all_results();
    }

    // Alumni
    private function _get_datatables_query_alumni()
    {
        $this->db->select("*, table_alumni.status AS sts");
        $this->db->from($this->table_4);
        $this->db->join($this->table_4_1, $this->table_4_1.'.id_sekolah ='.$this->table_4.'.id_sekolah');
        if($this->input->post('sekolah'))
        {
            $this->db->where($this->table_4_1.'.id_sekolah', $this->input->post('sekolah'));
        }
        if($this->input->post('jurusan'))
        {
            $this->db->where('jurusan', $this->input->post('jurusan'));
        }
        if($this->input->post('tahun_lulus'))
        {
            $this->db->where('tahun_lulus', $this->input->post('tahun_lulus'));
        }
        // $this->db->where('id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->order_by('table_alumni.register_date', 'DESC');

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

    public function get_datatables_alumni()
    {
        $this->_get_datatables_query_alumni();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_alumni()
    {
        $this->db->from('table_alumni');
        // $this->db->where('id_sekolah', $id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_alumni()
    {
        $this->db->from('table_alumni');
        // $this->db->where('id_sekolah', $id_sekolah);
        $this->db->count_all_results();
    }

    // Lowongan Kerja
    private function _get_datatables_query_loker()
    {
        $this->db->from($this->table_5);
        $this->db->join($this->table_5_1, $this->table_5_1.'.id_mitra ='.$this->table_5.'.id_mitra');
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->order_by('id_lowongan', 'DESC');

        $i = 0;
    
        foreach ($this->column_search_5 as $item) // loop column 
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

                if(count($this->column_search_5) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_5'])) // here order processing
        {
            $this->db->order_by($this->column_order_5[$_POST['order_5']['0']['column']], $_POST['order_5']['0']['dir']);
        } 
        else if(isset($this->order_5))
        {
            $order_5 = $this->order_5;
            $this->db->order_by(key($order_5), $order_5[key($order_5)]);
        }
    }

    public function get_datatables_loker()
    {
        $this->_get_datatables_query_loker();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_loker()
    {
        $this->db->from('table_lowongan');
        // $this->db->where('id_sekolah', $id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_loker()
    {
        $this->db->from('table_lowongan');
        // $this->db->where('id_sekolah', $id_sekolah);
        $this->db->count_all_results();
    }

    // Data BKK
    private function _get_datatables_query_bkk()
    {
        $this->db->from($this->table_9);
        $this->db->join($this->table_9_2, $this->table_9_2.'.id_sekolah ='.$this->table_9.'.id_sekolah');
        $this->db->join($this->table_9_3, $this->table_9_3.'.id_perijinan ='.$this->table_9_2.'.id_perijinan');
        if($this->input->post('kecamatan'))
        {
            $this->db->where('kecamatan', $this->input->post('kecamatan'));
        }
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->order_by('nama_sekolah', 'ASC');
        $this->db->group_by($this->table_9_2.'.id_sekolah');

        $i = 0;
    
        foreach ($this->column_search_9 as $item) // loop column 
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

                if(count($this->column_search_9) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_9'])) // here order processing
        {
            $this->db->order_by($this->column_order_9[$_POST['order_9']['0']['column']], $_POST['order_9']['0']['dir']);
        } 
        else if(isset($this->order_9))
        {
            $order_9 = $this->order_9;
            $this->db->order_by(key($order_9), $order_9[key($order_9)]);
        }
    }

    public function get_datatables_bkk()
    {
        $this->_get_datatables_query_bkk();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_bkk()
    {
        $this->db->from($this->table_9);
        $this->db->join($this->table_9_2, $this->table_9_2.'.id_sekolah ='.$this->table_9.'.id_sekolah');
        $this->db->join($this->table_9_3, $this->table_9_3.'.id_perijinan ='.$this->table_9_2.'.id_perijinan');
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->group_by($this->table_9_2.'.id_sekolah');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_bkk()
    {
        $this->db->select($this->table_9.'.id_sekolah');
        $this->db->from($this->table_9);
        $this->db->join($this->table_9_2, $this->table_9_2.'.id_sekolah ='.$this->table_9.'.id_sekolah');
        $this->db->join($this->table_9_3, $this->table_9_3.'.id_perijinan ='.$this->table_9_2.'.id_perijinan');
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->group_by($this->table_9_2.'.id_sekolah');
        $this->db->count_all_results();
    }

    // Data BKK
    private function _get_datatables_query_laporan_bkk()
    {
        $this->db->select("kecamatan, count(*) AS total, sum(case when status = '1' then 1 else 0 end) AS belum_terdaftar, sum(case when status = '0' then 1 else 0 end) AS sudah_terdaftar");
        $this->db->from($this->table_x);
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        if($this->input->post('kecamatan'))
        {
            $this->db->where('kecamatan', $this->input->post('kecamatan'));
        }
        $this->db->order_by('kecamatan', 'ASC');
        $this->db->group_by($this->table_x.'.kecamatan');

        $i = 0;
    
        foreach ($this->column_search_x as $item) // loop column 
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

                if(count($this->column_search_x) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_x'])) // here order processing
        {
            $this->db->order_by($this->column_order_x[$_POST['order_x']['0']['column']], $_POST['order_x']['0']['dir']);
        } 
        else if(isset($this->order_x))
        {
            $order_x = $this->order_x;
            $this->db->order_by(key($order_x), $order_x[key($order_x)]);
        }
    }

    public function get_datatables_laporan_bkk()
    {
        $this->_get_datatables_query_laporan_bkk();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_laporan_bkk()
    {
        $this->db->from($this->table_x);
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->group_by($this->table_x.'.kecamatan');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_laporan_bkk()
    {
        $this->db->from($this->table_x);
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->group_by($this->table_x.'.kecamatan');
        $this->db->count_all_results();
    }

    // Laporan Alumni
    private function _get_datatables_query_laporan_alumni()
    {
        $this->db->select("jurusan, count(*) AS total, sum(case when jenis_kelamin = 'L' then 1 else 0 end) AS jml_pria, sum(case when jenis_kelamin = 'P' then 1 else 0 end) AS jml_wanita, sum(case when ".$this->table_l.".status = 'Belum Bekerja' then 1 else 0 end) AS belum_bekerja, sum(case when ".$this->table_l.".status = 'Bekerja' then 1 else 0 end) AS bekerja, sum(case when ".$this->table_l.".status = 'Kuliah' then 1 else 0 end) AS kuliah, sum(case when ".$this->table_l.".status = 'Wiraswasta' then 1 else 0 end) AS wiraswasta");
        $this->db->from($this->table_l);
        $this->db->join($this->table_4_1, $this->table_4_1.'.id_sekolah ='.$this->table_l.'.id_sekolah');
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        if($this->input->post('sekolah'))
        {
            $this->db->where($this->table_4_1.'.id_sekolah', $this->input->post('sekolah'));
        }
        if($this->input->post('jurusan'))
        {
            $this->db->where('jurusan', $this->input->post('jurusan'));
        }
        if($this->input->post('tahun_lulus'))
        {
            $this->db->where('tahun_lulus', $this->input->post('tahun_lulus'));
        }
        $this->db->order_by('jurusan', 'ASC');
        $this->db->group_by($this->table_l.'.jurusan');

        $i = 0;
    
        foreach ($this->column_search_l as $item) // loop column 
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

                if(count($this->column_search_l) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_l'])) // here order processing
        {
            $this->db->order_by($this->column_order_l[$_POST['order_l']['0']['column']], $_POST['order_l']['0']['dir']);
        } 
        else if(isset($this->order_l))
        {
            $order_l = $this->order_l;
            $this->db->order_by(key($order_l), $order_l[key($order_l)]);
        }
    }

    public function get_datatables_laporan_alumni()
    {
        $this->_get_datatables_query_laporan_alumni();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_laporan_alumni()
    {
        $this->db->from($this->table_l);
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->group_by($this->table_l.'.jurusan');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_laporan_alumni()
    {
        $this->db->from($this->table_l);
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->group_by($this->table_l.'.jurusan');
        $this->db->count_all_results();
    }

    // Laporan Keterserapan
    private function _get_datatables_query_laporan_keterserapan()
    {
        $this->db->select("table_sekolah.kecamatan, table_alumni.jurusan, count(*) AS total, sum(case when jenis_kelamin = 'L' then 1 else 0 end) AS jml_pria, sum(case when jenis_kelamin = 'P' then 1 else 0 end) AS jml_wanita, sum(case when ".$this->table_k.".status = 'Belum Bekerja' then 1 else 0 end) AS belum_bekerja, sum(case when ".$this->table_k.".status = 'Bekerja' then 1 else 0 end) AS bekerja, sum(case when ".$this->table_k.".status = 'Kuliah' then 1 else 0 end) AS kuliah, sum(case when ".$this->table_k.".status = 'Wiraswasta' then 1 else 0 end) AS wiraswasta");
        $this->db->from($this->table_k);
        $this->db->join($this->table_4_1, $this->table_4_1.'.id_sekolah ='.$this->table_k.'.id_sekolah');
        $this->db->order_by('table_sekolah.kecamatan', 'ASC');
        $this->db->group_by('table_sekolah.kecamatan');

        $i = 0;
    
        foreach ($this->column_search_k as $item) // loop column 
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

                if(count($this->column_search_k) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_k'])) // here order processing
        {
            $this->db->order_by($this->column_order_k[$_POST['order_k']['0']['column']], $_POST['order_k']['0']['dir']);
        } 
        else if(isset($this->order_k))
        {
            $order_k = $this->order_k;
            $this->db->order_by(key($order_k), $order_k[key($order_k)]);
        }
    }

    public function get_datatables_laporan_keterserapan()
    {
        $this->_get_datatables_query_laporan_keterserapan();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_laporan_keterserapan()
    {
        $this->db->from($this->table_l);
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->group_by($this->table_l.'.jurusan');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_laporan_keterserapan()
    {
        $this->db->from($this->table_l);
        // $this->db->where($this->table_5.'.id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->group_by($this->table_l.'.jurusan');
        $this->db->count_all_results();
    }

    // Profil
    public function profil($id_user)
    {
        $query = $this->db->query("SELECT * FROM table_login AS a WHERE a.id_user = '$id_user'");
        return $query->result();
    }

    // Data Mitra
    public function data_mitra($id_mitra)
    {
        $query = $this->db->query("SELECT *, e.id AS id_prov, f.id AS id_kota, g.id AS id_kec, h.id AS id_kel FROM table_mitra AS a JOIN table_alamat AS b ON a.id_alamat= b.id_alamat JOIN table_cp_mitra AS c ON a.id_cp_mitra = c.id_cp_mitra JOIN table_periode AS d on a.id_periode = d.id_periode JOIN provinces AS e ON b.provinsi = e.name JOIN regencies AS f ON e.id = f.province_id AND b.kota = f.name JOIN districts AS g ON f.id = g.regency_id AND b.kecamatan = g.name JOIN villages AS h ON g.id = h.district_id AND b.kelurahan = h.name WHERE a.id_mitra = '$id_mitra'");
        return $query->result();
    }

    // Data Alumni
    public function data_alumni($id_alumni)
    {
        $query = $this->db->query("SELECT *, ta.status AS sts FROM table_alumni AS ta JOIN table_sekolah AS ts ON ta.id_sekolah = ts.id_sekolah WHERE ta.id_alumni = '$id_alumni'");
        return $query->result();
    }

    // Data Loker
    public function data_loker($id_lowongan)
    {
        $query = $this->db->query("SELECT * FROM table_lowongan AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_mitra AS tm ON tl.id_mitra = tm.id_mitra JOIN table_posisi_jabatan AS tpj ON tl.id_posisi_jabatan = tpj.id_posisi_jabatan JOIN table_keahlian AS tk ON tl.id_keahlian = tk.id_keahlian JOIN table_status_pendidikan AS tsp ON tl.id_status_pendidikan = tsp.id_status_pendidikan JOIN table_jenis_pengupahan AS tjp ON tl.id_jenis_pengupahan = tjp.id_jenis_pengupahan JOIN table_status_hub_kerja AS tshp ON tl.id_status_hub_kerja = tshp.id_status_hub_kerja JOIN table_jurusan AS tj ON tl.jurusan = tj.id_jurusan JOIN table_jenis_lowongan AS tjl ON tk.id_jenis_lowongan = tjl.id_jenis_lowongan WHERE tl.id_lowongan = '$id_lowongan'");
        return $query->result();
    }

    // Data Helpdesk
    public function data_helpdesk()
    {
        $query = $this->db->query("SELECT * FROM table_helpdesk ORDER BY tanggal_pesan DESC");
        return $query->result();
    }

    // Edit BKK
    public function simpanBKK($data, $id_sekolah)
    {
        $query = $this->db->where("id_sekolah", $id_sekolah);
        $this->db->update("table_sekolah", $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    // Data Mitra
    public function mitra_bkk_pusat()
    {
        $query = $this->db->query("SELECT * FROM table_mitra ORDER by nama_perusahaan ASC");
        return $query->result();
    }

    // Laporan Mitra
    public function laporanMitra()
    {
        $where = "";
        $sql = "SELECT 
                sekolah.kecamatan, 
                    COUNT(DISTINCT mitra.id_mitra) AS mitra, 
                    COUNT(DISTINCT lowongan.id_lowongan) AS loker, 
                    IFNULL(SUM(lowongan.jml_pria + lowongan.jml_wanita), 0) tk, 
                    IFNULL(SUM(CASE WHEN mitra.jenis_kemitraan = 'Magang' THEN 1 ELSE 0 END), 0) magang,
                    IFNULL(SUM(CASE WHEN mitra.jenis_kemitraan = 'Pelatihan' THEN 1 ELSE 0 END), 0) pelatihan,
                    IFNULL(SUM(CASE WHEN mitra.jenis_kemitraan = 'Perekrutan' THEN 1 ELSE 0 END), 0) perekrutan,
                    IFNULL(SUM(CASE WHEN mitra.jenis_kemitraan = 'Lainnya' THEN 1 ELSE 0 END), 0) lainnya 
                FROM table_sekolah sekolah 
                LEFT JOIN table_mitra mitra ON sekolah.id_sekolah = mitra.id_sekolah
                LEFT JOIN table_lowongan lowongan ON sekolah.id_sekolah = lowongan.id_sekolah AND mitra.id_mitra = lowongan.id_mitra
                GROUP BY sekolah.kecamatan";

      $prepared = $this->db->query($sql);
      return $prepared->result();
    }


}