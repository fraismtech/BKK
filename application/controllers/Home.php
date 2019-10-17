<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
			if ($this->session->userdata('level_user') == '2') {
				redirect('Dashboard');
			}
			if ($this->session->userdata('level_user') == '3') {
				redirect('DashboardBkk');
			}
		}

	}

	private function load($title = '', $datapath = '')
	{
		$page = array(
			"head" => $this->load->view('home/template/head', array("title" => $title), true),
			"main_js" => $this->load->view('home/template/main_js', false, true),
		);
		return $page;
	}

	public function index()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok", $path),
			"content" => $this->load->view('home/index', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function lowongan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Lowongan", $path),
			"content" => $this->load->view('home/lowongan', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function lowongandetail()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Lowongan Detail", $path),
			"content" => $this->load->view('home/lowonganDetail', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function sebaran()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Sebaran", $path),
			"content" => $this->load->view('home/sebaran', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function tentang()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Tentang Kami", $path),
			"content" => $this->load->view('home/tentang', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}
	
}
