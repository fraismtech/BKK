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
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
			if ($this->session->userdata('level_user') == '2') {
				redirect('Dashboard');
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
    		$output = array('error' => false);
    		date_default_timezone_set('Asia/Jakarta');

    		$npsn 			= $this->input->post('npsn');
    		$nama_sekolah 	= $this->input->post('nama_sekolah');
    		$jurusan 		= $this->input->post('jurusan');
    		$alamat  		= $this->input->post('alamat_sekolah');
    		$kecamatan  	= $this->input->post('kecamatan');
            $kelurahan  	= $this->input->post('kelurahan');
            $nama_operator 	= $this->input->post('nama_operator');
            $email   		= $this->input->post('alamat_email');
            $no_hp   		= $this->input->post('no_hp');
            $username 		= $this->input->post('username');
            $password   	= $this->input->post('password');
            $level   		= $this->input->post('level');
            $date_created  	= date("Y-m-d H:i:s");

            $data = array(

                'username' 		=> $username,
                'password'      => md5($password),
                'nama'        	=> $nama_operator,
                'jurusan' 		=> $jurusan,
                'npsn' 			=> $npsn,
                'nama_sekolah' 	=> $nama_sekolah,
                'email' 		=> $email,
                'no_hp' 		=> $no_hp,
                'alamat' 		=> $alamat,
                'kecamatan' 	=> $kecamatan,
                'kelurahan' 	=> $kelurahan,
                'level' 		=> '1',
                'date_created' 	=> $date_created,
                
            );

            $registrasi = $this->dashboard->registrasi($data);
            
            if($registrasi == true){
                
            }
            else{
                $output['error'] = true;
            }

            echo json_encode($output);
    	} catch (Exception $e) {
    		redirect('daftar');
    	}
    }
	
}
