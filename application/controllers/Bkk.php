<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bkk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Bkk", "bkk");
		if ($this->session->userdata('level_user') == '1') {
			redirect('dashboardBkk/index');
		}
		if ($this->session->userdata('level_user') == '2') {
			redirect('dashboard/index');
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
				'total_alumni' => $this->bkk->total_alumni($bkk[0]['id_sekolah']),
				'total_mitra' => $this->bkk->total_mitra($bkk[0]['id_sekolah']),
				'total_loker' => $this->bkk->total_loker($bkk[0]['id_sekolah']),
				'lowongan' => $this->bkk->data_lowongan($bkk[0]['id_sekolah']),
				'berita' => $this->bkk->data_kegiatan($bkk[0]['id_sekolah']), 
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
				'keg' => $this->bkk->data_kegiatan_all($bkk[0]['id_sekolah'], $npsn),

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
			$id_kegiatan = $this->uri->segment(3);
			$path = "";
			$get = array(
				'detailSekolah' => $this->bkk->detailSekolah($npsn),
				'detailKegiatan' => $this->bkk->detailKegiatan($id_kegiatan),
				'listKegiatan' => $this->bkk->listKegiatan($id_kegiatan, $bkk[0]['id_sekolah']),
				'listLowongan' => $this->bkk->listLowongan($bkk[0]['id_sekolah']),
			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kegiatan Detail", $path),
				"content" => $this->load->view('bkk/kegiatanDetail', $get, true),
			);
			$this->load->view('bkk/template/default_template', $data);
		}
	}

	public function loker($npsn)
	{	
		$ceknpsn = $this->db->query("SELECT COUNT(npsn) as total FROM table_sekolah WHERE npsn='$npsn'")->result_array();
		if ($ceknpsn[0]['total'] == NULL || $ceknpsn[0]['total'] == 0) {
			redirect(base_url(), "refresh");
		}else{
			$bkk = $this->bkk->detailSekolah($npsn);
			$path = "";
			$get = array(
				'detailSekolah' => $this->bkk->detailSekolah($npsn),
				'lowongan' => $this->bkk->data_lowongan_all($bkk[0]['id_sekolah'], $npsn),

			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Lowongan Kerja", $path),
				"content" => $this->load->view('bkk/lowongan', $get, true),
			);
			$this->load->view('bkk/template/default_template', $data);
		}
	}

	public function lowongandetail($npsn)
	{
		$ceknpsn = $this->db->query("SELECT COUNT(npsn) as total FROM table_sekolah WHERE npsn='$npsn'")->result_array();
		if ($ceknpsn[0]['total'] == NULL || $ceknpsn[0]['total'] == 0) {
			redirect(base_url(), "refresh");
		}else{
			$bkk = $this->bkk->detailSekolah($npsn);
			$id_lowongan = $this->uri->segment(3);
			$path = "";
			$get = array(
				'detailSekolah' => $this->bkk->detailSekolah($npsn),
				'detailLowongan' => $this->bkk->detailLowongan($id_lowongan),
				'listKegiatan' => $this->bkk->kegiatanList($bkk[0]['id_sekolah']),
				'listLowongan' => $this->bkk->lowonganList($bkk[0]['id_sekolah'], $id_lowongan),
			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kegiatan Detail", $path),
				"content" => $this->load->view('bkk/lowonganDetail', $get, true),
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
				'detailProfil' => $this->bkk->dataProfil($bkk[0]['id_sekolah']),
				'mitra_bkk' => $this->bkk->dataMitra($bkk[0]['id_sekolah']),
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
				'id_sekolah' => $bkk[0]['id_sekolah'],
				"jurusan" 	=> $this->bkk->jurusan($bkk[0]['id_sekolah']),
			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Alumni", $path),
				"content" => $this->load->view('bkk/alumni', $get, true),
			);
			$this->load->view('bkk/template/default_template', $data);
		}
	}

	public function addAlumni($npsn)
	{
		$ceknpsn = $this->db->query("SELECT COUNT(npsn) as total FROM table_sekolah WHERE npsn='$npsn'")->result_array();
		if ($ceknpsn[0]['total'] == NULL || $ceknpsn[0]['total'] == 0) {
			redirect(base_url(), "refresh");
		}else{
			error_reporting(0);
			try {
				$id_sekolah 	= $this->input->post("id_sekolah");

				$nisn 			= $this->input->post("nisn");
	          	$nik 	 		= $this->input->post("nik");
	          	$nama 		 	= $this->input->post("nama");
	          	$jenis_kelamin 	= $this->input->post("jenis_kelamin");
	          	$tempat_lahir 	= $this->input->post("tempat_lahir");
	          	$tanggal_lahir 	= $this->input->post("tanggal_lahir");

	          	$alamat 		= $this->input->post("alamat");
	          	$no_telp 		= $this->input->post("no_telp");
	          	$email 			= $this->input->post("email");
	          	$jurusan 		= $this->input->post("jurusan");
	          	$tahun_lulus 	= $this->input->post("tahun_lulus");
	          	$status 		= $this->input->post("status");

	          	$nama_perusahaan 	= $this->input->post("nama_perusahaan");
	          	$no_telp_perusahaan = $this->input->post("no_telp_perusahaan");
	          	$alamat_perusahaan 	= $this->input->post("alamat_perusahaan");

	          	$data = array(
	          		'nisn' 					=> $nisn,	
	          		'nik' 					=> $nik,
	          		'nama' 					=> $nama,
	          		'jenis_kelamin' 		=> $jenis_kelamin,
	          		'tempat_lahir' 			=> $tempat_lahir,
	          		'tanggal_lahir' 		=> date('Y-m-d', strtotime($tanggal_lahir)),
	          		'alamat_alumni' 		=> $alamat,
	          		'no_telp'				=> $no_telp,
	          		'email' 				=> $email,
	          		'jurusan' 				=> $jurusan,
	          		'tahun_lulus' 			=> $tahun_lulus,
	          		'status' 				=> $status,
	          		'nama_perusahaan' 		=> $nama_perusahaan,
	          		'alamat_perusahaan' 	=> $alamat_perusahaan,
	          		'no_telp_perusahaan' 	=> $no_telp_perusahaan,
	          		'id_sekolah' 			=> $id_sekolah,
	          	);

	          	$simpan = $this->db->insert('table_alumni', $data);

	          	if($simpan) {
	            	$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
	                redirect($npsn.'/alumni');
	           	} else {
	           		$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
	                redirect($npsn.'/alumni');
	           	}

			} catch (Exception $e) {
				
			}
		}
	}

	public function mitra($npsn)
	{	
		$ceknpsn = $this->db->query("SELECT COUNT(npsn) as total FROM table_sekolah WHERE npsn='$npsn'")->result_array();
		if ($ceknpsn[0]['total'] == NULL || $ceknpsn[0]['total'] == 0) {
			redirect(base_url(), "refresh");
		}else{
			$bkk = $this->bkk->detailSekolah($npsn);
			$path = "";
			$get = array(
				'detailSekolah' => $this->bkk->detailSekolah($npsn),
				'dataMitra' => $this->bkk->data_mitra_all($bkk[0]['id_sekolah'], $npsn),

			);
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Lowongan Kerja", $path),
				"content" => $this->load->view('bkk/mitra', $get, true),
			);
			$this->load->view('bkk/template/default_template', $data);
		}
	}
}
