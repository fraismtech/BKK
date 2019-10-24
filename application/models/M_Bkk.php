<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Bkk extends CI_Model{ 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function slider($id)
    {
        $query = $this->db->query("SELECT * FROM table_slider WHERE id_sekolah='$id'");
        return $query->result();
    }

    public function detailSekolah($npsn){
        $detailSekolah = $this->db->query("SELECT * FROM table_sekolah WHERE npsn='$npsn' ORDER BY npsn DESC LIMIT 1")->result_array();
        return $detailSekolah;
    }
}