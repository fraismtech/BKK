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
