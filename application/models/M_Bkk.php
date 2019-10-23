<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Bkk extends CI_Model{ 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function slider()
    {
        $query = $this->db->query("SELECT * FROM table_slider WHERE id_sekolah!=''");
        return $query->result();
    }

}