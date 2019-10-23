<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Home", "home");
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '2') {
				redirect('Dashboard');
			}
			if ($this->session->userdata('level_user') == '1') {
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
		$get = array(
			'slider' => $this->home->slider(),
			'total_bkk' => $this->home->total_bkk(),
			'total_alumni' => $this->home->total_alumni(),
			'total_mitra' => $this->home->total_mitra(),
			'total_loker' => $this->home->total_loker(),
			'lowongan' => $this->home->data_lowongan(), 
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok", $path),
			"content" => $this->load->view('home/index', $get, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function lowongan()
	{
		$path = "";
		$data1['model'] = $this->home->data_lowongan_all();
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Lowongan", $path),
			"content" => $this->load->view('home/lowongan', $data1, true),
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
