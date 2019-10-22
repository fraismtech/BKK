<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Auth extends CI_Model{ 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password)
    {
    	try {
    		$query = $this->db->query("SELECT * FROM table_login WHERE username = '$username' AND password = '$password'");
    		return $query->row();
    	} catch (Exception $e) {
    		return null;
    	}
    }

}