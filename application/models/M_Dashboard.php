<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model
{ 
    var $table          = 'table_slider';
    var $column_order   = array('tanggal_slider','judul_slider','foto_slider'); //set column field database for datatable orderable
    var $column_search  = array('tanggal_slider','judul_slider','foto_slider'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where = array('');
    var $order = array('id_slider' => 'asc'); // default order

    var $table_1          = 'table_kegiatan';
    var $column_order_1   = array('tanggal_kegiatan','judul_kegiatan','uraian_kegiatan','foto_skegiatan'); //set column field database for datatable orderable
    var $column_search_1  = array('tanggal_kegiatan','judul_kegiatan','uraian_kegiatan','foto_kegiatan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $where_1 = array('');
    var $order_1 = array('id_kegiatan' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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

    public function registrasi($data)
    {
    	$query = $this->db->insert("table_login", $data);

        if($query){
            return true;
        }else{
            return false;
        }
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
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('table_slider');
                 // ->where('username', $username);
        $this->db->count_all_results();
    }

    // Kegiatantable_kegiatan
    private function _get_datatables_query_kegiatan()
    {
        $this->db->from($this->table_1);
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

    public function get_datatables_kegiatan()
    {
        $this->_get_datatables_query_kegiatan();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_kegiatan()
    {
        $this->db->from('table_kegiatan');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_kegiatan()
    {
        $this->db->from('table_kegiatan');
                 // ->where('username', $username);
        $this->db->count_all_results();
    }

}