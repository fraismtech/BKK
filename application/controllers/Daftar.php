<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Auth", "auth");
		$this->load->model("M_Dashboard", "dashboard");
	}

	private function load($title = '', $datapath = '')
	{
		$page = array(
			"head" => $this->load->view('dashboard/template/head', array("title" => $title), true),
			"footer" => $this->load->view('dashboard/template/footer', false, true),
			"sidebar" => $this->load->view('dashboard/template/sidebar', false, true),
		);
		return $page;
	}
	
	public function index()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('dashboardBkk/index');
			}
			if ($this->session->userdata('level_user') == '2') {
				redirect('dashboard/index');
			}
		} else {
			$id_kecamatan = '3276';
			$path = "";
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Daftar", $path),
				"content" => $this->load->view('daftar', false, true),
				"kecamatan" => $this->dashboard->kecamatan($id_kecamatan),
			);
			$this->load->view('daftar', $data);
		}
	}

	public function get_kelurahan()
    {
        $kec = $this->input->post('kec');

        echo $this->dashboard->get_kelurahan($kec);

    }

    // Registrasi User
    public function registrasi_user()
    {
    	try {
    		date_default_timezone_set('Asia/Jakarta');

    		$npsn 			= $this->input->post('npsn');
    		$nama_sekolah 	= $this->input->post('nama_sekolah');
    		$alamat  		= $this->input->post('alamat_sekolah');
    		$kecamatan  	= $this->input->post('kecamatan');
            $kelurahan  	= $this->input->post('kelurahan');
            $nama_operator 	= $this->input->post('nama_operator');
            $email   		= $this->input->post('alamat_email');
            $no_hp   		= $this->input->post('no_hp');
            $username 		= $this->input->post('username');
            $password   	= $this->input->post('password');
            $ijin_bkk 		= $this->input->post("ijin");
            $tanggal 		= date('Y-m-d', strtotime($this->input->post("tanggal_ijin")));
            $no_ijin 		= $this->input->post("no_ijin");
            // $level   		= $this->input->post('level');
            $date_created  	= date("Y-m-d H:i:s");

            if(isset($_FILES["file"]["name"])) {  
              	$config['upload_path'] = './assets/upload/file';  
              	$config['allowed_types'] = 'pdf|docx|doc'; 

              	$this->load->library('upload', $config); 

              	if(!$this->upload->do_upload('file')) {  
                  	$error =  $this->upload->display_errors(); 
                  	echo json_encode(array('msg' => $error, 'success' => false));
              	} else { 
              		$data = $this->upload->data();
			        $data = array(
			            'ijin_bkk' 		=> $ijin_bkk,
			            'no_ijin' 		=> $no_ijin,
			            'tgl_perijinan' => $tanggal,
			            'dokumen' 		=> $data['file_name'],
			        );
			        $this->db->insert('table_perijinan', $data);
			        $id_perijinan = $this->db->insert_id();

                   	$data1 = array(
			            'npsn'        	=> $npsn,
			            'nama_sekolah' 	=> $nama_sekolah,
			            'alamat_sekolah'=> $alamat,
			            'kecamatan' 	=> $kecamatan,
			            'kelurahan' 	=> $kelurahan,
			        );
			        $this->db->insert('table_sekolah', $data1);
			        $id_sekolah = $this->db->insert_id();

                   	$data2 = array(
			            'username' 		=> $username,
			            'password'      => md5($password),
			            'nama_operator'	=> $nama_operator,
			            'email' 		=> $email,
			            'no_hp' 		=> $no_hp,
			            'id_sekolah' 	=> $id_sekolah,
			            'id_perijinan' 	=> $id_perijinan,
			            'level' 		=> '1',
			            'date_created' 	=> $date_created,
			        );  
			        
			        $this->db->insert('table_login', $data2); 
                   	$getId = $this->db->insert_id();
 
                   	$arr = array('msg' => 'Silahkan isi data dengan benar!', 'success' => false);
 
                   	if($getId){
                    	$arr = array('msg' => 'Silahkan cek email untuk verifikasi data!', 'success' => true);
                   	}
                  	echo json_encode($arr);
             	}
            }
    	} catch (Exception $e) {
    		redirect('daftar');
    	}
    }
	
}
