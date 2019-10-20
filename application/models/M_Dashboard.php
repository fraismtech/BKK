<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model
{ 
    // Slider
    var $table          = 'table_slider';
    var $column_order   = array('tanggal_slider','judul_slider','foto_slider'); //set column field database for datatable orderable
    var $column_search  = array('DATE_FORMAT(tanggal_slider, "%d %b %Y")','judul_slider','foto_slider'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where = array('');
    var $order = array('id_slider' => 'asc'); // default order

    // Kegiatan
    var $table_1          = 'table_kegiatan';
    var $column_order_1   = array('tanggal_kegiatan','judul_kegiatan','uraian_kegiatan','foto_skegiatan'); //set column field database for datatable orderable
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

    // Slider
    var $table_4          = 'table_alumni';
    var $column_order_4   = array('nisn','nama','no_telp','tahun_lulus','status'); //set column field database for datatable orderable
    var $column_search_4  = array('nisn','nama','no_telp','tahun_lulus','status'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_4 = array('');
    var $order_4 = array('id_alumni' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function jurusan($id_sekolah)
    {
        $query = $this->db->query("SELECT * FROM table_jurusan WHERE id_sekolah = '$id_sekolah' ORDER BY nama_jurusan ASC");
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
    private function _get_datatables_query($id_sekolah)
    {
        $this->db->from($this->table);
        $this->db->where('id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
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

    public function get_datatables($id_sekolah)
    {
        $this->_get_datatables_query($id_sekolah);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered($id_sekolah)
    {
        $this->db->from('table_slider');
        $this->db->where('id_sekolah=', $id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($id_sekolah)
    {
        $this->db->from('table_slider');
        $this->db->where('id_sekolah=', $id_sekolah);
        $this->db->count_all_results();
    }

    // Kegiatan
    private function _get_datatables_query_kegiatan($id_sekolah)
    {
        $this->db->from($this->table_1);
        $this->db->where('id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->order_by('id_kegiatan', 'DESC');

        $i = 0;
    
        foreach ($this->column_search_1 as $item) // loop column 
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

                if(count($this->column_search_1) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_1'])) // here order processing
        {
            $this->db->order_by($this->column_order_1[$_POST['order_1']['0']['column']], $_POST['order_1']['0']['dir']);
        } 
        else if(isset($this->order_1))
        {
            $order_1 = $this->order_1;
            $this->db->order_by(key($order_1), $order_1[key($order_1)]);
        }
    }

    public function get_datatables_kegiatan($id_sekolah)
    {
        $this->_get_datatables_query_kegiatan($id_sekolah);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_kegiatan($id_sekolah)
    {
        $this->db->from('table_kegiatan');
        $this->db->where('id_sekolah', $id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_kegiatan($id_sekolah)
    {
        $this->db->from('table_kegiatan');
        $this->db->where('id_sekolah', $id_sekolah);
        $this->db->count_all_results();
    }

    // Mitra
    public function get_id_sekolah($id_user)
    {
        $query = $this->db->query("SELECT * FROM table_login AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = tl.id_sekolah JOIN table_perijinan AS tp ON tl.id_perijinan = tp.id_perijinan WHERE tl.id_user = '$id_user'");
        return $query->row();
    }

    private function _get_datatables_query_mitra($id_sekolah)
    {
        $this->db->from($this->table_2);
        $this->db->join($this->table_2_1, $this->table_2_1.'.id_cp_mitra ='.$this->table_2.'.id_cp_mitra');
        $this->db->join($this->table_2_2, $this->table_2_2.'.id_periode ='.$this->table_2.'.id_periode');
        $this->db->join($this->table_2_3, $this->table_2_3.'.id_sekolah ='.$this->table_2.'.id_sekolah');
        $this->db->where('table_mitra.id_sekolah=', $id_sekolah);
        $this->db->order_by('id_mitra', 'DESC');

        $i = 0;
    
        foreach ($this->column_search_2 as $item) // loop column 
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

                if(count($this->column_search_2) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_2'])) // here order processing
        {
            $this->db->order_by($this->column_order_2[$_POST['order_2']['0']['column']], $_POST['order_2']['0']['dir']);
        } 
        else if(isset($this->order_2))
        {
            $order_2 = $this->order_2;
            $this->db->order_by(key($order_2), $order_2[key($order_2)]);
        }
    }

    public function get_datatables_mitra($id_sekolah)
    {
        $this->_get_datatables_query_mitra($id_sekolah);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_mitra($id_sekolah)
    {
        $this->_get_datatables_query_mitra($id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_mitra($id_sekolah)
    {
        $this->db->from($this->table_2);
        $this->db->join($this->table_2_1, $this->table_2_1.'.id_cp_mitra ='.$this->table_2.'.id_cp_mitra');
        $this->db->join($this->table_2_2, $this->table_2_2.'.id_periode ='.$this->table_2.'.id_periode');
        $this->db->join($this->table_2_3, $this->table_2_3.'.id_sekolah ='.$this->table_2.'.id_sekolah');
        $this->db->where('table_mitra.id_sekolah=', $id_sekolah);
        $this->db->count_all_results();
    }

    // DataTable User
    private function _get_datatables_query_user($id_sekolah)
    {
        $this->db->from($this->table_3);
        $this->db->join($this->table_3_1, $this->table_3_1.'.id_sekolah ='.$this->table_3.'.id_sekolah');
        $this->db->join($this->table_3_2, $this->table_3_2.'.id_perijinan ='.$this->table_3.'.id_perijinan');
        $this->db->where('table_login.id_sekolah=', $id_sekolah);
        $this->db->order_by('id_user', 'DESC');

        $i = 0;
    
        foreach ($this->column_search_3 as $item) // loop column 
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

                if(count($this->column_search_3) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order_3'])) // here order processing
        {
            $this->db->order_by($this->column_order_3[$_POST['order_3']['0']['column']], $_POST['order_3']['0']['dir']);
        } 
        else if(isset($this->order_3))
        {
            $order_3 = $this->order_3;
            $this->db->order_by(key($order_3), $order_3[key($order_3)]);
        }
    }

    public function get_datatables_user($id_sekolah)
    {
        $this->_get_datatables_query_user($id_sekolah);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_user($id_sekolah)
    {
        $this->_get_datatables_query_user($id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_user($id_sekolah)
    {
        $this->db->from($this->table_3);
        $this->db->join($this->table_3_1, $this->table_3_1.'.id_sekolah ='.$this->table_3.'.id_sekolah');
        $this->db->join($this->table_3_2, $this->table_3_2.'.id_perijinan ='.$this->table_3.'.id_perijinan');
        $this->db->where('table_login.id_sekolah=', $id_sekolah);
        $this->db->count_all_results();
    }

    // Alumni
    private function _get_datatables_query_alumni($id_sekolah)
    {
        $this->db->from($this->table_4);
        $this->db->where('id_sekolah=', $id_sekolah);
        // $this->db->where('table_nabung.username=', $username);
        $this->db->order_by('id_alumni', 'DESC');

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

    public function get_datatables_alumni($id_sekolah)
    {
        $this->_get_datatables_query_alumni($id_sekolah);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_alumni($id_sekolah)
    {
        $this->db->from('table_alumni');
        $this->db->where('id_sekolah', $id_sekolah);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_alumni($id_sekolah)
    {
        $this->db->from('table_slider');
        $this->db->where('id_sekolah', $id_sekolah);
        $this->db->count_all_results();
    }

    // Profil
    public function profil($id_user)
    {
        $query = $this->db->query("SELECT * FROM table_login AS a JOIN table_sekolah AS b ON a.id_sekolah = b.id_sekolah JOIN table_perijinan AS c ON a.id_perijinan = c.id_perijinan WHERE a.id_user = '$id_user'");
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
        $query = $this->db->query("SELECT * FROM table_alumni AS ta JOIN table_sekolah AS ts ON ta.id_sekolah = ts.id_sekolah JOIN table_jurusan AS tj ON ta.jurusan = tj.id_jurusan WHERE ta.id_alumni = '$id_alumni'");
        return $query->result();
    }

}