<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model
{ 

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

}