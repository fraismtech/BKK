<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bkk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Bkk", "bkk");
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

	public function index($npsn)
	{
		$ceknpsn = $this->db->query("SELECT COUNT(npsn) as total FROM table_sekolah WHERE npsn='$npsn'")->result_array();
		if ($ceknpsn[0]['total'] == NULL || $ceknpsn[0]['total'] == 0) {
			redirect(base_url(), "refresh");
		}else{
			$bkk = $this->bkk->detailSekolah($npsn);
			$path = "";
			$get = array(
				'detailSekolah' => $this->bkk->detailSekolah($npsn),
				'slider' => $this->bkk->slider($bkk[0]['id_sekolah']),

			// 'lowongan' => $this->bkk->data_lowongan(), 
			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok", $path),
				"content" => $this->load->view('bkk/index', $get, true),
			);
			$this->load->view('bkk/template/default_template', $data);
		}
	}

	public function kegiatan($npsn)
	{	
		$ceknpsn = $this->db->query("SELECT COUNT(npsn) as total FROM table_sekolah WHERE npsn='$npsn'")->result_array();
		if ($ceknpsn[0]['total'] == NULL || $ceknpsn[0]['total'] == 0) {
			redirect(base_url(), "refresh");
		}else{
			$bkk = $this->bkk->detailSekolah($npsn);
			$path = "";
			$get = array(
				'detailSekolah' => $this->bkk->detailSekolah($npsn),
			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kegiatan", $path),
				"content" => $this->load->view('bkk/kegiatan', $get, true),
			);
			$this->load->view('bkk/template/default_template', $data);
		}
	}

	public function kegiatandetail($npsn)
	{
		$ceknpsn = $this->db->query("SELECT COUNT(npsn) as total FROM table_sekolah WHERE npsn='$npsn'")->result_array();
		if ($ceknpsn[0]['total'] == NULL || $ceknpsn[0]['total'] == 0) {
			redirect(base_url(), "refresh");
		}else{
			$bkk = $this->bkk->detailSekolah($npsn);
			$path = "";
			$get = array(
				'detailSekolah' => $this->bkk->detailSekolah($npsn),
			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kegiatan Detail", $path),
				"content" => $this->load->view('bkk/kegiatanDetail', $get, true),
			);
			$this->load->view('bkk/template/default_template', $data);
		}
	}

	public function profil($npsn)
	{
		$ceknpsn = $this->db->query("SELECT COUNT(npsn) as total FROM table_sekolah WHERE npsn='$npsn'")->result_array();
		if ($ceknpsn[0]['total'] == NULL || $ceknpsn[0]['total'] == 0) {
			redirect(base_url(), "refresh");
		}else{
			$bkk = $this->bkk->detailSekolah($npsn);
			$path = "";
			$get = array(
				'detailSekolah' => $this->bkk->detailSekolah($npsn),
			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Profil", $path),
				"content" => $this->load->view('bkk/profil', $get, true),
			);
			$this->load->view('bkk/template/default_template', $data);
		}
	}

	public function alumni($npsn)
	{
		$ceknpsn = $this->db->query("SELECT COUNT(npsn) as total FROM table_sekolah WHERE npsn='$npsn'")->result_array();
		if ($ceknpsn[0]['total'] == NULL || $ceknpsn[0]['total'] == 0) {
			redirect(base_url(), "refresh");
		}else{
			$bkk = $this->bkk->detailSekolah($npsn);
			$path = "";
			$get = array(
				'detailSekolah' => $this->bkk->detailSekolah($npsn),
			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Alumni", $path),
				"content" => $this->load->view('bkk/alumni', $get, true),
			);
			$this->load->view('bkk/template/default_template', $data);
		}
	}

	public function kontak($npsn)
	{
		$ceknpsn = $this->db->query("SELECT COUNT(npsn) as total FROM table_sekolah WHERE npsn='$npsn'")->result_array();
		if ($ceknpsn[0]['total'] == NULL || $ceknpsn[0]['total'] == 0) {
			redirect(base_url(), "refresh");
		}else{
			$bkk = $this->bkk->detailSekolah($npsn);
			$path = "";
			$get = array(
				'detailSekolah' => $this->bkk->detailSekolah($npsn),
			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kontak", $path),
				"content" => $this->load->view('bkk/kontak', $get, true),
			);
			$this->load->view('bkk/template/default_template', $data);
		}
	}
	
}
