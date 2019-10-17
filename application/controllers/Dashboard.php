<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Dashboard", "dashboard");
		$this->load->model("M_Auth", "auth");

		
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
		} else {
			redirect('login');
		}

		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Dashboard", $path),
			"content" => $this->load->view('dashboard/index', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function daftar()
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

	public function login()
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
			$path = "";
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Login", $path),
				"content" => $this->load->view('login', false, true),
			);
			$this->load->view('login', $data);
		}
	}

	// Auth Login
	public function auth_login()
	{
		try {

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $data = $this->auth->login($username, $password);

            if($data){
                $newdata = array(
                        'username'  => $data->username,
                        'nama'  => $data->nama,
                        'email'  => $data->email,
                        'level_user' => $data->level,
                        'logged_in' => TRUE,
                        'id'  => $data->id_user,
                    );
                if ($data->level == '1') {
                	$this->session->set_userdata($newdata);
                	$this->session->set_flashdata('notif','<div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert"><strong>Selamat Datang '.$data->nama.' !</strong> Bursa Kerja Khusus Kota Depok <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ti ti-close"></i></button></div>');
                	redirect("Bkk");
                } elseif ($data->level == '2') {
                	$this->session->set_userdata($newdata);
                	$this->session->set_flashdata('notif','<div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert"><strong>Selamat Datang '.$data->nama.' !</strong> Bursa Kerja Khusus Kota Depok <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ti ti-close"></i></button></div>');
                	redirect("Dashboard");
                } elseif ($data->level == '3') {
                	$this->session->set_userdata($newdata);
                	$this->session->set_flashdata('notif','<div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert"><strong>Selamat Datang '.$data->nama.' !</strong> Bursa Kerja Khusus Kota Depok <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ti ti-close"></i></button></div>');
                	redirect("DashboardBkk");
                }
            }
            else{
            	$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" style="text-align: center"> Masukkan Username & Password Dengan Benar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('login');
            }
		} catch(Exception $e) {
            redirect('login');
        }
	}

	public function logout()
	{
		$this->session->sess_destroy();
        redirect('Home');
	}

	public function databkk()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('login');
		}

		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data BKK", $path),
			"content" => $this->load->view('dashboard/databkk', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataloker()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('login');
		}

		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Loker", $path),
			"content" => $this->load->view('dashboard/dataloker', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataalumni()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('login');
		}

		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Alumni", $path),
			"content" => $this->load->view('dashboard/dataalumni', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function laporanBkkPerkecamatan()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('login');
		}

		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan BKK Perkecamatan", $path),
			"content" => $this->load->view('dashboard/laporanBkkPerkecamatan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function laporanBkkPerjurusan()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('login');
		}

		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan BKK Perjurusan", $path),
			"content" => $this->load->view('dashboard/laporanBkkPerjurusan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function laporanBkkLoker()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('login');
		}

		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan BKk Loker", $path),
			"content" => $this->load->view('dashboard/laporanBkkLoker', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataJurusan()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('login');
		}

		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Jurusan", $path),
			"content" => $this->load->view('dashboard/dataJurusan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataPosisi()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('login');
		}

		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Posisi", $path),
			"content" => $this->load->view('dashboard/dataPosisi', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataKeterampilan()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('login');
		}

		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Keterampilan", $path),
			"content" => $this->load->view('dashboard/dataKeterampilan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function helpdesk()
	{
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('login');
		}
		
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Helpdesk", $path),
			"content" => $this->load->view('dashboard/helpdesk', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}
	
}
