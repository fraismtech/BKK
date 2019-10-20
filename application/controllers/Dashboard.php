<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Dashboard", "dashboard");
		$this->load->model("M_Auth", "auth");

		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('DashboardBkk');
			}
		} else {
			redirect('Home');
		}
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
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Dashboard", $path),
			"content" => $this->load->view('dashboard/index', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function databkk()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data BKK", $path),
			"content" => $this->load->view('dashboard/databkk', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataloker()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Loker", $path),
			"content" => $this->load->view('dashboard/dataloker', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataalumni()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Alumni", $path),
			"content" => $this->load->view('dashboard/dataalumni', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function laporanBkkPerkecamatan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan BKK Perkecamatan", $path),
			"content" => $this->load->view('dashboard/laporanBkkPerkecamatan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function laporanBkkPerjurusan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan BKK Perjurusan", $path),
			"content" => $this->load->view('dashboard/laporanBkkPerjurusan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function laporanBkkLoker()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan BKk Loker", $path),
			"content" => $this->load->view('dashboard/laporanBkkLoker', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataJurusan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Jurusan", $path),
			"content" => $this->load->view('dashboard/dataJurusan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataPosisi()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Posisi", $path),
			"content" => $this->load->view('dashboard/dataPosisi', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataKeterampilan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Keterampilan", $path),
			"content" => $this->load->view('dashboard/dataKeterampilan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function helpdesk()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Helpdesk", $path),
			"content" => $this->load->view('dashboard/helpdesk', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}
	
}
