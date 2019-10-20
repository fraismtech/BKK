<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bkk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level_user') == '1') {
			redirect('DashboardBkk');
		}
		if ($this->session->userdata('level_user') == '2') {
			redirect('Dashboard');
		}

	}

	private function load($title = '', $datapath = '')
	{
		$page = array(
			"head" => $this->load->view('bkk/template/head', array("title" => $title), true),
			"main_js" => $this->load->view('bkk/template/main_js', false, true),
		);
		return $page;
	}

	public function index()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok", $path),
			"content" => $this->load->view('bkk/index', false, true),
		);
		$this->load->view('bkk/template/default_template', $data);
	}

	public function kegiatan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kegiatan", $path),
			"content" => $this->load->view('bkk/kegiatan', false, true),
		);
		$this->load->view('bkk/template/default_template', $data);
	}

	public function kegiatandetail()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kegiatan Detail", $path),
			"content" => $this->load->view('bkk/kegiatanDetail', false, true),
		);
		$this->load->view('bkk/template/default_template', $data);
	}

	public function profil()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Profil", $path),
			"content" => $this->load->view('bkk/profil', false, true),
		);
		$this->load->view('bkk/template/default_template', $data);
	}

	public function alumni()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Alumni", $path),
			"content" => $this->load->view('bkk/alumni', false, true),
		);
		$this->load->view('bkk/template/default_template', $data);
	}

	public function kontak()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kontak", $path),
			"content" => $this->load->view('bkk/kontak', false, true),
		);
		$this->load->view('bkk/template/default_template', $data);
	}
	
}
