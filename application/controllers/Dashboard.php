<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Dashboard_Pusat", "dashboard");
    $this->load->model("M_Dashboard", "dashboardReport");
		$this->load->model("M_Auth", "auth");

		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('dashboardBkk/index');
			}
		} else {
			redirect('Home');
		}
	}

	private function load($title = '', $datapath = '')
	{
		$id_user = $this->session->userdata('id');
		$get = array(
			"title" => $title,
			"bkk_baru" => $this->dashboard->bkk_baru(),
			"profil_user" => $this->dashboard->profil($id_user),
		);
		$page = array(
			"head" => $this->load->view('dashboard/template/head', $get, true),
			"footer" => $this->load->view('dashboard/template/footer', false, true),
			"sidebar" => $this->load->view('dashboard/template/sidebar', false, true),
		);
		return $page;
	}

	public function index()
	{
		$path = "";
		$get = array(
			"total_bkk" => $this->dashboard->total_bkk(),
			"total_loker" => $this->dashboard->total_loker(),
			"total_kegiatan" => $this->dashboard->total_kegiatan(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Dashboard", $path),
			"content" => $this->load->view('dashboard/index', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function slider()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Slide Show", $path),
			"content" => $this->load->view('dashboard/slider', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Tambah Slider
	public function tambahSlider()
	{
		try {
    		if(isset($_FILES["file"]["name"])) {  
              	$config['upload_path'] = './assets/upload/image';  
              	$config['allowed_types'] = 'jpg|jpeg|png';  
              	$this->load->library('upload', $config); 

              	$tanggal = date('Y-m-d', strtotime($this->input->post("tanggal")));
              	$judul = $this->input->post("judul");
              	$id_sekolah = $this->session->userdata('id_sekolah');

              	if(!$this->upload->do_upload('file')) {  
                  	$error =  $this->upload->display_errors(); 
                  	echo json_encode(array('msg' => $error, 'success' => false));
              	} else {  
                   	$data = $this->upload->data();
                   	$data = array(
			            'tanggal_slider' => $tanggal,
			            'judul_slider' => $judul,
			            'foto_slider' => $data['file_name'],
			            'id_sekolah' => $id_sekolah,
			        );  
			        $this->db->insert('table_slider', $data); 
                   	// $insert['name'] = $data['file_name'];
                   	// $this->db->insert('images',$insert);
                   	$getId = $this->db->insert_id();
 
                   	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);
 
                   	if($getId){
                    	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
                   	}
                  	echo json_encode($arr);
             	}  
         	}  

    	} catch (Exception $e) {
    		redirect('dashboardBkk/slider');
    	}
	}

	// Edit Slider
	public function editSlider()
	{
		try {
    		if(isset($_FILES["file"]["name"])) {  
              	$config['upload_path'] = './assets/upload/image/';  
              	$config['allowed_types'] = 'jpg|jpeg|png';  
              	$this->load->library('upload', $config); 
              	$id_slider = $this->input->post("id_slider");
              	$id_sekolah = $this->session->userdata('id_sekolah');

              	$_id = $this->db->get_where('table_slider',['id_slider' => $id_slider])->row();
              	unlink("./assets/upload/image/".$_id->foto_slider);

              	$tanggal = date('Y-m-d', strtotime($this->input->post("tanggal")));
              	$judul = $this->input->post("judul");
              	if(!$this->upload->do_upload('file')) {  
                  	$error =  $this->upload->display_errors(); 
                  	echo json_encode(array('msg' => $error, 'success' => false));
              	} else {  
                   	$data = $this->upload->data();
                   	$data = array(
			            'tanggal_slider' => $tanggal,
			            'judul_slider' => $judul,
			            'foto_slider' => $data['file_name'],
			            'id_sekolah' => $id_sekolah,
			        );  
			        $update = $this->db->where('id_slider', $id_slider);
			        $this->db->update('table_slider', $data); 
                   	// $insert['name'] = $data['file_name'];
                   	// $this->db->insert('images',$insert);
 
                   	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);
 
                   	if($update){
                    	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
                   	}
                  	echo json_encode($arr);
             	}  
         	}  

    	} catch (Exception $e) {
    		redirect('dashboardBkk/slider');
    	}
	}

	// Hapus Slider
	public function hapusSlider(){
		$id  = $this->uri->segment(3);
		$_id = $this->db->get_where('table_slider',['id_slider' => $id])->row();
        $query = $this->db->delete('table_slider',['id_slider'=>$id]);
        $arr = array('msg' => 'Data gagal dihapus', 'success' => false);
 
       	if($query){
       		unlink("./assets/upload/image/".$_id->foto_slider);
        	$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
       	}
        echo json_encode($arr);
	}

	public function databkk()
	{
		$id_kecamatan = '3276';
		$path = "";
		$get = array(
			"kecamatan" => $this->dashboard->kecamatan($id_kecamatan),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data BKK", $path),
			"content" => $this->load->view('dashboard/databkk', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Edit BKK
	public function updateBKK(){
		try {
			$id_sekolah		= $this->input->post('id_s');
			$id_perijinan 	= $this->input->post('id_perijinan');

			$npsn 			= $this->input->post('npsn');
			$nama_sekolah 	= $this->input->post('nama_sekolah');
			$alamat_sekolah = $this->input->post('alamat_sekolah');
			$kecamatan 		= $this->input->post('kecamatan');
			$kelurahan 		= $this->input->post('kelurahan');
			$visi 			= $this->input->post('visi');
			$misi 			= $this->input->post('misi');

			$ijin_bkk 		= $this->input->post('ijin_bkk');
			$no_ijin 		= $this->input->post('no_ijin');
			$tgl_perijinan 	= $this->input->post('tgl_perijinan');

	        $data = array(
	            'npsn'			=> $npsn,
	            'nama_sekolah'	=> $nama_sekolah,
	            'alamat_sekolah'=> $alamat_sekolah,
	            'kecamatan'		=> $kecamatan,
	            'kelurahan'		=> $kelurahan,
	            'visi'			=> $visi,
	            'misi'			=> $misi,
	        );  

	        $update_sekolah = $this->dashboard->simpanBKK($data, $id_sekolah);

	        $data_perijinan = array(
	            'ijin_bkk'		=> $ijin_bkk,
	            'no_ijin'		=> $no_ijin,
	            'tgl_perijinan'	=> date('Y-m-d', strtotime($tgl_perijinan)),
	        ); 	        

	        $update_perijinan = $this->db->where('id_perijinan', $id_perijinan);
	        $this->db->update('table_perijinan', $data_perijinan);

	        // $arr = array('msg' => 'Data gagal disimpan', 'success' => false);

         //   	if($update_sekolah){
         //    	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
         //   	}
         //  	echo json_encode($arr);
	        if($update_sekolah && $update_perijinan) {
				$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
				redirect('dashboard/databkk');
			} else {
				$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
				redirect('dashboard/databkk');
			}
		} catch (Exception $e) {

		}
	}

	// Hapus BKK
	public function hapusBKK()
	{
		try {
			$id_sekolah  = $this->uri->segment(3);
			$id_perijinan  = $this->uri->segment(4);
			$_id = $this->db->query("SELECT * FROM table_login AS tl JOIN table_sekolah AS ts ON tl.id_sekolah = ts.id_sekolah JOIN table_perijinan AS tp ON tl.id_perijinan = tp.id_perijinan WHERE ts.id_sekolah = '$id_sekolah' AND tp.id_perijinan = '$id_perijinan'")->row();

			if ($_id->foto == NULL) {
				# code...
			} else {
				unlink("./assets/upload/image/user/".$_id->foto);
			}

			if ($_id->struktur == NULL) {
				# code...
			} else {
				unlink("./assets/upload/struktur_bkk/".$_id->struktur);
			}

			if ($_id->dokumen == NULL) {
				# code...
			} else {
				unlink("./assets/upload/dokumen/".$_id->dokumen);
			}

			$query1 = $this->db->delete('table_login',['id_sekolah' => $id_sekolah, 'id_perijinan'=> $id_perijinan]);
			$query2 = $this->db->delete('table_sekolah',['id_sekolah' => $id_sekolah]);
			$query3 = $this->db->delete('table_perijinan',['id_perijinan'=> $id_perijinan]);

			$arr = array('msg' => 'Data gagal dihapus', 'success' => false);

			if($query1 && $query2 && $query3){
				$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
			}
			echo json_encode($arr);
		} catch (Exception $e) {
			redirect('dashboardBkk/user');
		}
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

	// Edit Loker
	public function lokerEditPusat()
	{
		$id_lowongan  = $this->uri->segment(3);

		$path = "";
		$get = array(
			"get_lowongan" => $this->dashboard->data_loker($id_lowongan),
			"mitra_bkk" => $this->dashboard->mitra_bkk_pusat(),
			"posisi_jabatan" => $this->dashboard->posisi_jabatan(),
			"jenis_lowongan" => $this->dashboard->jenis_lowongan(),
			"data_keahlian" => $this->dashboard->keahlian(),
			"status_pendidikan" => $this->dashboard->status_pendidikan(),
			"jenis_pengupahan" => $this->dashboard->jenis_pengupahan(),
			"hubungan_kerja" => $this->dashboard->hubungan_kerja(),
			"jurusan" => $this->dashboard->jurusan(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Lowongan Kerja", $path),
			"content" => $this->load->view('dashboard/loker-edit', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function editLokerPusat()
	{
		error_reporting(0);
		try {
			date_default_timezone_set('Asia/Jakarta');
			$id_lowongan 			= $this->input->post("id_lowongan");

			$id_mitra 				= $this->input->post("mitra");
			$id_posisi_jabatan 		= $this->input->post("posisi_jabatan");
			$id_keahlian 			= $this->input->post("keahlian");
			$id_status_pendidikan 	= $this->input->post("pendidikan");
			$id_jenis_pengupahan 	= $this->input->post("jenis_pengupahan");
			$id_status_hub_kerja 	= $this->input->post("hubungan_kerja");

			$nama_lowongan 		= $this->input->post("nama_lowongan");
			$tanggal_berlaku 	= date('Y-m-d', strtotime($this->input->post("tanggal_berlaku")));
			$tanggal_berakhir 	= date('Y-m-d', strtotime($this->input->post("tanggal_berakhir")));
			$uraian_pekerjaan 	= $this->input->post("uraian_pekerjaan");
			$uraian_tugas 		= $this->input->post("uraian_tugas");
			$penempatan 		= $this->input->post("penempatan");
			$jml_pria 			= $this->input->post("jml_pria");
			$jml_wanita 		= $this->input->post("jml_wanita");

			$batas_umur 		= $this->input->post("batas_umur");
			$jurusan 	 		= $this->input->post("jurusan");
			$pengalaman 		= $this->input->post("pengalaman");
			$syarat_khusus 		= $this->input->post("syarat_khusus");

			$gaji_per_bulan 	= $this->input->post("gaji_per_bulan");
			$jam_kerja 			= $this->input->post("jam_kerja");

			$date_created  		= date("Y-m-d H:i:s");

			$data = array(
				'id_mitra' 				=> $id_mitra,
				'id_posisi_jabatan' 	=> $id_posisi_jabatan,
				'id_keahlian' 			=> $id_keahlian, 
				'id_status_pendidikan' 	=> $id_status_pendidikan,
				'id_jenis_pengupahan' 	=> $id_jenis_pengupahan,
				'id_status_hub_kerja' 	=> $id_status_hub_kerja,
				'tanggal_berlaku' 		=> $tanggal_berlaku,
				'tanggal_berakhir' 		=> $tanggal_berakhir,
				'nama_lowongan' 		=> $nama_lowongan,
				'uraian_pekerjaan' 		=> $uraian_pekerjaan,
				'uraian_tugas' 			=> $uraian_tugas,
				'penempatan' 			=> $penempatan,
				'batas_umur' 			=> $batas_umur,
				'jml_pria' 				=> $jml_pria,
				'jml_wanita' 			=> $jml_wanita,
				'jurusan' 				=> $jurusan,
				'pengalaman' 			=> $pengalaman,
				'syarat_khusus' 		=> $syarat_khusus,
				'gaji_per_bulan'		=> $gaji_per_bulan,
				'jam_kerja' 			=> $jam_kerja,
				'register_date' 		=> $date_created,
			);

			$update = $this->db->where('id_lowongan', $id_lowongan);
			$this->db->update('table_lowongan', $data);

			if($update) {
				$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
				redirect('dashboard/dataloker');
			} else {
				$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
				redirect('dashboard/dataloker');
			}

		} catch (Exception $e) {
			
		}
	}

	// Hapus Loker
	public function hapusLoker()
	{
		try {
			$id  = $this->uri->segment(3);
			$_id = $this->db->get_where('table_lowongan',['id_lowongan' => $id])->row();
			$query = $this->db->delete('table_lowongan',['id_lowongan'=>$id]);

			$arr = array('msg' => 'Data gagal dihapus', 'success' => false);

			if($query){
				$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
			}
			echo json_encode($arr);
		} catch (Exception $e) {
			redirect('dashboard/dataloker');
		}
	}

	// Aktifkan Loker
	public function aktifkanLoker()
	{
		try {
			date_default_timezone_set('Asia/Jakarta');
			$id  = $this->uri->segment(3);
			$_id = $this->db->get_where('table_lowongan',['id_lowongan' => $id])->row();
			$data = array(
				'ket' 			=> 'Aktif',
				'register_date' => date("Y-m-d H:i:s"),
			);
			$aktif = $this->db->where('id_lowongan', $id);
			$this->db->update('table_lowongan', $data);

			$arr = array('msg' => 'Lowongan berhasil diaktifkan kembali', 'success' => false);

			if($aktif){
				$arr = array('msg' => 'Lowongan gagal diaktifkan kembali', 'success' => true);
			}
			echo json_encode($arr);
		} catch (Exception $e) {
			redirect('dashboard/dataloker');
		}
	}

	// Nonaktifkan Loker
	public function noaktifkanLoker()
	{
		try {
			date_default_timezone_set('Asia/Jakarta');
			$id  = $this->uri->segment(3);
			$_id = $this->db->get_where('table_lowongan',['id_lowongan' => $id])->row();
			$data = array(
				'ket' 			=> 'Tidak Aktif',
				'register_date' => date("Y-m-d H:i:s"),
			);
			$nonaktif = $this->db->where('id_lowongan', $id);
			$this->db->update('table_lowongan', $data);

			$arr = array('msg' => 'Lowongan di nonaktifkan', 'success' => false);

			if($nonaktif){
				$arr = array('msg' => 'Lowongan gagal di nonaktifkan', 'success' => true);
			}
			echo json_encode($arr);
		} catch (Exception $e) {
			redirect('dashboard/dataloker');
		}
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

	// Edit Alumni
	public function alumniEditPusat()
	{
		$id_sekolah = $this->session->userdata('id_sekolah');
		$id_alumni  = $this->uri->segment(3);

		$path = "";
		$get = array(
			"jurusan" 			=> $this->dashboard->jurusan(),
			"data_alumni" 		=> $this->dashboard->data_alumni($id_alumni),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Edit Alumni", $path),
			"content" => $this->load->view('dashboard/alumni-edit', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function editAlumniPusat()
	{
		error_reporting(0);
		try {
			date_default_timezone_set('Asia/Jakarta');

			$id_sekolah 	= $this->input->post("id_sekolah");
			$id_alumni 		= $this->input->post("id_alumni");

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
				'register_date' 		=> date("Y-m-d H:i:s"),
			);

			$update = $this->db->where('id_alumni', $id_alumni);
			$this->db->update('table_alumni', $data);

			if($update) {
				$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
				redirect('dashboard/dataalumni');
			} else {
				$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
				redirect('dashboard/dataalumni');
			}

		} catch (Exception $e) {
			
		}
	}

	// Hapus Alumni
	public function hapusAlumniPusat(){
		$id_alumni  = $this->uri->segment(3);
		$data_alumni = $this->db->get_where('table_alumni',['id_alumni' => $id_alumni])->row();

		$hapus = $this->db->delete('table_alumni',['id_alumni'=>$data_alumni->id_alumni]);

		$arr = array('msg' => 'Data gagal dihapus', 'success' => false);

		if($hapus){
			$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
		}
		echo json_encode($arr);
	}

	public function laporanBkk()
	{
		$id_kecamatan = '3276';
		$path = "";
		$get = array(
			"kecamatan" => $this->dashboard->kecamatan($id_kecamatan),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan BKK", $path),
			"content" => $this->load->view('dashboard/laporanBkk', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function laporanAlumni()
	{
		$path = "";
		$get = array(
			"sekolah" => $this->dashboard->sekolah(),
			"jurusan" 			=> $this->dashboard->jurusan(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan Alumni", $path),
			"content" => $this->load->view('dashboard/laporanAlumni', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Get Jurusan
	public function get_jurusan()
    {
        $skl = $this->input->post('skl');

        echo $this->dashboard->get_jurusan($skl);

    }

	public function laporanMitraKerja()
	{
		$path = "";
		$get = array(
			"sekolah" => $this->dashboard->sekolah(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan Mitra Kerja", $path),
			"content" => $this->load->view('dashboard/laporanMitra', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function laporanKeterserapan()
	{
		$path = "";
		$get = array(
			"sekolah" => $this->dashboard->sekolah(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan Keterserapan", $path),
			"content" => $this->load->view('dashboard/laporanKeterserapan', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function dataJurusan()
	{
		$path = "";
		$get = array(
			"sekolah" => $this->dashboard->sekolah(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Jurusan", $path),
			"content" => $this->load->view('dashboard/dataJurusan', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Tambah Jurusan
	public function tambahJurusan()
	{
		try {
			$nama_jurusan 	= $this->input->post('nama_jurusan');

	        $data = array(
	            'nama_jurusan'	=> $nama_jurusan,
	        );  

	        $simpan = $this->db->insert('table_jurusan', $data);

           	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

           	if($simpan){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);

		} catch (Exception $e) {
			
		}
	}

	// Edit Jurusan
	public function editJurusan()
	{
		try {
			$id_jurusan 	= $this->input->post('id_jurusan');
			$nama_jurusan 	= $this->input->post('nama_jurusan');

	        $data = array(
	            'nama_jurusan'	=> $nama_jurusan,
	        );  

	        $update = $this->db->where('id_jurusan', $id_jurusan);
	        $this->db->update('table_jurusan', $data);

           	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

           	if($update){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);

		} catch (Exception $e) {
			
		}
	}

	// Hapus Jurusan
	public function hapusJurusan(){
		try {
			$id  = $this->uri->segment(3);
	        $query = $this->db->delete('table_jurusan',['id_jurusan'=>$id]);

	        $arr = array('msg' => 'Data gagal dihapus', 'success' => false);

	       	if($query){
	        	$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
	       	}
	        echo json_encode($arr);
		} catch (Exception $e) {
			redirect('dashboardBkk/user');
		}
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

	// Tambah Jurusan
	public function tambahPosisiLowongan()
	{
		try {
			$id_jenis_lowongan 		= $this->input->post('id_jenis_lowongan');
			$nama_jenis_lowongan 	= $this->input->post('nama_jenis_lowongan');

	        $data = array(
	        	'id_jenis_lowongan'		=> $id_jenis_lowongan,
	            'nama_jenis_lowongan'	=> $nama_jenis_lowongan,
	        );  

	        $simpan = $this->db->insert('table_jenis_lowongan', $data);

           	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

           	if($simpan){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);

		} catch (Exception $e) {
			
		}
	}

	// Edit Jurusan
	public function editPosisiLowongan()
	{
		try {
			$id_jenis_lowongan 		= $this->input->post('id_jenis_lowongan');
			$nama_jenis_lowongan 	= $this->input->post('nama_jenis_lowongan');

	        $data = array(
	            'nama_jenis_lowongan'	=> $nama_jenis_lowongan,
	        );  

	        $update = $this->db->where('id_jenis_lowongan', $id_jenis_lowongan);
	        $this->db->update('table_jenis_lowongan', $data);

           	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

           	if($update){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);

		} catch (Exception $e) {
			
		}
	}

	// Hapus Posisi Lowongan
	public function hapusPosisiLowongan(){
		try {
			$id  = $this->uri->segment(3);
	        $query = $this->db->delete('table_jenis_lowongan',['id_jenis_lowongan'=>$id]);

	        $arr = array('msg' => 'Data gagal dihapus', 'success' => false);

	       	if($query){
	        	$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
	       	}
	        echo json_encode($arr);
		} catch (Exception $e) {
			redirect('dashboardBkk/user');
		}
	}

	public function dataKeterampilan()
	{
		$path = "";
		$get = array(
			"p_loker" => $this->dashboard->posisi_loker(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Data Keterampilan", $path),
			"content" => $this->load->view('dashboard/dataKeterampilan', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Tambah Keterampilan
	public function tambahKeterampilan()
	{
		try {
			$id_keahlian 	 		= $this->input->post('id_keahlian');
			$id_jenis_lowongan 		= $this->input->post('id_jenis_lowongan');
			$nama_keahlian 			= $this->input->post('nama_keahlian');

	        $data = array(
	        	'id_keahlian'			=> $id_keahlian,
	        	'id_jenis_lowongan'		=> $id_jenis_lowongan,
	            'nama_keahlian'			=> $nama_keahlian,
	        );  

	        $simpan = $this->db->insert('table_keahlian', $data);

           	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

           	if($simpan){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);

		} catch (Exception $e) {
			
		}
	}

	// Edit Keterampilan
	public function editKeterampilan()
	{
		try {
			$id_keahlian 	 		= $this->input->post('id_keahlian');
			$id_jenis_lowongan 		= $this->input->post('id_jenis_lowongan');
			$nama_keahlian 			= $this->input->post('nama_keahlian');

	        $data = array(
	        	'id_jenis_lowongan'		=> $id_jenis_lowongan,
	            'nama_keahlian'			=> $nama_keahlian,
	        );  

	        $update = $this->db->where('id_keahlian', $id_keahlian);
	        $this->db->update('table_keahlian', $data);

           	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

           	if($update){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);

		} catch (Exception $e) {
			
		}
	}

	// Hapus Keterampilan
	public function hapusKeterampilan(){
		try {
			$id  = $this->uri->segment(3);
	        $query = $this->db->delete('table_keahlian',['id_keahlian'=>$id]);

	        $arr = array('msg' => 'Data gagal dihapus', 'success' => false);

	       	if($query){
	        	$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
	       	}
	        echo json_encode($arr);
		} catch (Exception $e) {
			redirect('dashboardBkk/user');
		}
	}

	public function helpdesk()
	{
		$path = "";
		$get = array(
			"helpdesk" => $this->dashboard->data_helpdesk(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Helpdesk", $path),
			"content" => $this->load->view('dashboard/helpdesk', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Ajax Serverside
	public function get_alldata(){
        echo json_encode($this->dashboard->get_alldata());
    }

    // Slider
    public function ajax_list()
	{
		$id_user = $this->session->userdata('id');

		$id_sekolah = $this->session->userdata('id_sekolah');
		$list = $this->dashboard->get_datatables();
		$data = array();
		$no = 1;
		foreach ($list as $slider) {
			if ($slider->foto_slider == NULL) {
				$button = '<button type="button" class="btn btn-secondary">No File</button>';
			} else {
				$button = '<a href="'.base_url().'assets/upload/image/'.$slider->foto_slider.'" class="btn btn-primary fa fa-download"><span> Download</span></a>';
			}
			$row = array();
			$row[] = $no.'.';
			$row[] = date('d M Y', strtotime($slider->tanggal_slider));
			$row[] = $slider->judul_slider;
			$row[] = $button;
			$row[] = '
	              <a
	            href="javascript:void(0)"
	            data-id="'.$slider->id_slider.'"
	            data-tanggal="'.date('m/d/Y', strtotime($slider->tanggal_slider)).'"
	            data-judul="'.$slider->judul_slider.'"
	            data-foto="'.$slider->foto_slider.'"
	            data-foto1="'.$slider->foto_slider.'"
	            data-toggle="modal" data-target="#edit-data"
	            title="Edit Data">
	            	<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
	            </a>
	            <button
	            class="btn btn-sm btn-danger hapus-menabung" 
	            data-toggle="modal"
	            id="id" 
	            data-toggle="modal" 
	            data-id="'.$slider->id_slider.'"
	            data-tanggal="'.$slider->tanggal_slider.'"
	            data-judul="'.$slider->judul_slider.'"
	            data-foto="'.$slider->foto_slider.'"
	            title="Hapus Data">
	            	<i class="fa fa-trash"></i>
	            </button>';

			$data[] = $row;
			$no++;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dashboard->count_all(),
						"recordsFiltered" => $this->dashboard->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	// Lowongan Kerja
	public function ajax_list_loker()
	{
		date_default_timezone_set('Asia/Jakarta');

		$id_user = $this->session->userdata('id');

		$list = $this->dashboard->get_datatables_loker();
		$data = array();
		$no = 1;
		foreach ($list as $loker) {
			$row = array();
			if($loker->tanggal_berlaku <= date('Y-m-d') && $loker->tanggal_berakhir >= date('Y-m-d')) {
				$status = '<span class="badge badge-success">OPEN</span>';
			} else {
				$status = '<span class="badge badge-danger">EXPIRED</span>';
			}
			if ($loker->ket == 'Aktif') {
				$keterangan = '<span class="badge badge-info">Aktif</span>';
			} else {
				$keterangan = '<span class="badge badge-danger">Tidak Aktif</span>';
			}
			if ($loker->ket == 'Aktif') {
				$ket = '
				<button class="btn btn-sm btn-danger non-loker" data-toggle="modal" id="id" data-toggle="modal" data-id="'.$loker->id_lowongan.'" title="Nonaktifkan Lowongan">
				<i class="fa fa-times"></i>
				</button>';
			} else {
				$ket = '
				<button class="btn btn-sm btn-success aktif-loker" data-toggle="modal" id="id" data-toggle="modal" data-id="'.$loker->id_lowongan.'" title="Aktifkan Lowongan">
				<i class="fa fa-check"></i>
				</button>';
			}
			$row[] = $no.'.';
			$row[] = $loker->nama_lowongan;
			$row[] = $loker->nama_perusahaan;
			$row[] = date('d M Y', strtotime($loker->tanggal_berlaku));
			$row[] = date('d M Y', strtotime($loker->tanggal_berakhir));
			$row[] = $status;
			$row[] = $loker->jml_pria;
			$row[] = $loker->jml_wanita;
			$row[] = $keterangan;
			$row[] = '
			<a href="'.base_url().'dashboard/lokerEditPusat/'.$loker->id_lowongan.'" title="Edit Data">
			<button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
			</a>'.
			// $ket.
			'
			<button class="btn btn-sm btn-warning hapus-loker" data-toggle="modal" id="id" data-toggle="modal" data-id="'.$loker->id_lowongan.'" title="Hapus Data">
			<i class="fa fa-trash"></i>
			</button>';

			$data[] = $row;
			$no++;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dashboard->count_all_loker(),
						"recordsFiltered" => $this->dashboard->count_filtered_loker(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	// Alumni
	public function ajax_list_alumni_pusat()
	{
		$id_user = $this->session->userdata('id');

		$list = $this->dashboard->get_datatables_alumni();
		$data = array();
		$no = 1;
		foreach ($list as $alumni) {
			$row = array();
			$row[] = $no.'.';
			$row[] = $alumni->nisn;
			$row[] = $alumni->nama;
			$row[] = $alumni->tempat_lahir.', '.date('Y-m-d', strtotime($alumni->tanggal_lahir));
			$row[] = $alumni->jurusan;
			$row[] = $alumni->no_telp;
			$row[] = $alumni->tahun_lulus;
			$row[] = $alumni->nama_sekolah;
			$row[] = $alumni->sts;
			$row[] = '
	              	<a href="'.base_url().'dashboard/alumniEditPusat/'.$alumni->id_alumni.'" title="Edit Data">
	            		<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
	            	</a>
		            <button class="btn btn-sm btn-danger hapus-alumni" data-toggle="modal" id="id" data-toggle="modal" data-id="'.$alumni->id_alumni.'" title="Hapus Data">
		            	<i class="fa fa-trash"></i>
		            </button>';

			$data[] = $row;
			$no++;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dashboard->count_all_alumni(),
						"recordsFiltered" => $this->dashboard->count_filtered_alumni(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	// Jurusan 
	public function ajax_list_jurusan()
	{
		$id_user = $this->session->userdata('id');

		$list = $this->dashboard->get_datatables_jurusan();
		$data = array();
		$no = 1;
		foreach ($list as $jurusan) {
			$row = array();
			$row[] = $no.'.';
			$row[] = $jurusan->nama_jurusan;
			$row[] = '
	              <a
	            href="javascript:void(0)"
	            data-id="'.$jurusan->id_jurusan.'"
	            data-jurusan="'.$jurusan->nama_jurusan.'"
	            data-toggle="modal" data-target="#edit-data"
	            title="Edit Data">
	            	<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
	            </a>
	            <button
	            class="btn btn-sm btn-danger hapus-menabung" 
	            data-toggle="modal"
	            id="id" 
	            data-toggle="modal" 
	            data-id="'.$jurusan->id_jurusan.'"
	            title="Hapus Data">
	            	<i class="fa fa-trash"></i>
	            </button>';

			$data[] = $row;
			$no++;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dashboard->count_all_jurusan(),
						"recordsFiltered" => $this->dashboard->count_filtered_jurusan(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	// Posisi Lowongan 
	public function ajax_list_posisi_loker()
	{
		$id_user = $this->session->userdata('id');

		$list = $this->dashboard->get_datatables_posisi_loker();
		$data = array();
		$no = 1;
		foreach ($list as $posisi) {
			$row = array();
			$row[] = $no.'.';
			$row[] = $posisi->id_jenis_lowongan;
			$row[] = $posisi->nama_jenis_lowongan;
			$row[] = '
	              <a
	            href="javascript:void(0)"
	            data-id="'.$posisi->id_jenis_lowongan.'"
	            data-posisi_lowongan="'.$posisi->nama_jenis_lowongan.'"
	            data-toggle="modal" data-target="#edit-data"
	            title="Edit Data">
	            	<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
	            </a>
	            <button
	            class="btn btn-sm btn-danger hapus-menabung" 
	            data-toggle="modal"
	            id="id" 
	            data-toggle="modal" 
	            data-id="'.$posisi->id_jenis_lowongan.'"
	            title="Hapus Data">
	            	<i class="fa fa-trash"></i>
	            </button>';

			$data[] = $row;
			$no++;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dashboard->count_all_posisi_loker(),
						"recordsFiltered" => $this->dashboard->count_filtered_posisi_loker(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	// Keterampilan 
	public function ajax_list_keterampilan()
	{
		$id_user = $this->session->userdata('id');

		$list = $this->dashboard->get_datatables_keterampilan();
		$data = array();
		$no = 1;
		foreach ($list as $keterampilan) {
			$row = array();
			$row[] = $no.'.';
			$row[] = $keterampilan->id_keahlian;
			$row[] = $keterampilan->nama_jenis_lowongan;
			$row[] = $keterampilan->nama_keahlian;
			$row[] = '
	              <a
	            href="javascript:void(0)"
	            data-id="'.$keterampilan->id_keahlian.'"
	            data-id_posisi="'.$keterampilan->id_jenis_lowongan.'"
	            data-nama_keahlian="'.$keterampilan->nama_keahlian.'"
	            data-toggle="modal" data-target="#edit-data"
	            title="Edit Data">
	            	<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
	            </a>
	            <button
	            class="btn btn-sm btn-danger hapus-menabung" 
	            data-toggle="modal"
	            id="id" 
	            data-toggle="modal" 
	            data-id="'.$keterampilan->id_keahlian.'"
	            title="Hapus Data">
	            	<i class="fa fa-trash"></i>
	            </button>';

			$data[] = $row;
			$no++;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dashboard->count_all_keterampilan(),
						"recordsFiltered" => $this->dashboard->count_filtered_keterampilan(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	// BKK
	public function ajax_list_bkk()
	{
		date_default_timezone_set('Asia/Jakarta');

		$id_user = $this->session->userdata('id');

		$list = $this->dashboard->get_datatables_bkk();
		$data = array();
		$no = 1;
		foreach ($list as $bkk) {
			if ($bkk->struktur == NULL) {
				$button1 = '<button type="button" class="btn btn-dark" disabled="">No File</button>';
			} else {
				$button1 = '<a href="'.base_url().'assets/upload/struktur_bkk/'.$bkk->struktur.'" class="btn btn-primary fa fa-download"><span> Download</span></a>';
			}

			if ($bkk->dokumen == NULL) {
				$button2 = '<button type="button" class="btn btn-secondary">No File</button>';
			} else {
				$button2 = '<a href="'.base_url().'assets/upload/file/'.$bkk->dokumen.'" class="btn btn-primary fa fa-download"><span> Download</span></a>';
			}

			$row = array();
			$row[] = $no.'.';
			$row[] = $bkk->npsn;
			$row[] = $bkk->nama_sekolah;
			$row[] = $bkk->alamat_sekolah.', '.$bkk->kelurahan.', '.$bkk->kecamatan;
			$row[] = $bkk->no_ijin;
			$row[] = date('d M Y', strtotime($bkk->tgl_perijinan));
			$row[] = $button1;
			$row[] = $button2;
			$row[] = '
	              <a
	            href="javascript:void(0)"
	            data-id_sekolah="'.$bkk->id_sekolah.'"
	            data-npsn="'.$bkk->npsn.'"
	            data-nama_sekolah="'.$bkk->nama_sekolah.'"
	            data-alamat_sekolah="'.$bkk->alamat_sekolah.'"
	            data-kecamatan="'.$bkk->kecamatan.'"
	            data-kelurahan="'.$bkk->kelurahan.'"
	            data-visi="'.$bkk->visi.'"
	            data-misi="'.$bkk->misi.'"
	            data-id_perijinan="'.$bkk->id_perijinan.'"
	            data-tgl_perijinan="'.date('Y-m-d', strtotime($bkk->tgl_perijinan)).'"
	            data-ijin_bkk="'.$bkk->ijin_bkk.'"
	            data-no_ijin="'.$bkk->no_ijin.'"
	            data-toggle="modal" data-target="#edit-data"
	            title="Edit Data">
	            	<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
	            </a>
	            <button
	            class="btn btn-sm btn-danger hapus-bkk" 
	            data-toggle="modal"
	            id="id" 
	            data-toggle="modal" 
	            data-id_sekolah="'.$bkk->id_sekolah.'"
	            data-id_perijinan="'.$bkk->id_perijinan.'"
	            title="Hapus Data">
	            	<i class="fa fa-trash"></i>
	            </button>';
			// $row[] = '
	  //             	<a href="'.base_url().'dashboardBkk/lokerEdit/'.$loker->id_lowongan.'" title="Edit Data">
	  //           		<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
	  //           	</a>
		 //            <button class="btn btn-sm btn-danger hapus-loker" data-toggle="modal" id="id" data-toggle="modal" data-id="'.$loker->id_lowongan.'" title="Hapus Data">
		 //            	<i class="fa fa-trash"></i>
		 //            </button>';

			$data[] = $row;
			$no++;
		}
		// <a
		//             href="javascript:void(0)"
		//             data-id_lowongan="'.$loker->id_lowongan.'"
		//             data-id_sekolah="'.$loker->id_sekolah.'"
		//             data-id_mitra="'.$loker->id_mitra.'"
		//             data-id_posisi_jabatan="'.$loker->id_posisi_jabatan.'"
		//             data-id_keahlian="'.$loker->id_keahlian.'"
		//             data-id_status_pendidikan="'.$loker->id_status_pendidikan.'"
		//             data-id_jenis_pengupahan="'.$loker->id_jenis_pengupahan.'"
		//             data-id_status_hub_kerja="'.$loker->id_status_hub_kerja.'"
		//             data-tanggal_berlaku="'.$loker->tanggal_berlaku.'"
		//             data-tanggal_berakhir="'.$loker->tanggal_berakhir.'"
		//             data-nama_lowongan="'.$loker->nama_lowongan.'"
		//             data-uraian_pekerjaan="'.$loker->uraian_pekerjaan.'"
		//             data-uraian_tugas="'.$loker->uraian_tugas.'"
		//             data-penempatan="'.$loker->penempatan.'"
		//             data-batas_umur="'.$loker->batas_umur.'"
		//             data-jml_pria="'.$loker->jml_pria.'"
		//             data-jml_wanita="'.$loker->jml_wanita.'"
		//             data-jurusan="'.$loker->jurusan.'"
		//             data-pengalaman="'.$loker->pengalaman.'"
		//             data-syarat_khusus="'.$loker->syarat_khusus.'"
		//             data-gaji_per_bulan="'.$loker->gaji_per_bulan.'"
		//             data-jam_kerja="'.$loker->jam_kerja.'"
		//             data-toggle="modal" data-target="#edit-data"
		//             title="Edit Data">
		//             	<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
		//             </a>

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dashboard->count_all_bkk(),
						"recordsFiltered" => $this->dashboard->count_filtered_bkk(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	// Laporan BKK
	public function ajax_list_laporan_bkk()
	{
		date_default_timezone_set('Asia/Jakarta');

		$id_user = $this->session->userdata('id');

		$list = $this->dashboardReport->laporan_bkk();
		// $data = array();
		// $no = 1;
		// foreach ($list as $bkk) {
		// 	$row = array();

		// 	$row[] = $bkk->kecamatan;
		// 	$row[] = $bkk->total;
		// 	$row[] = $bkk->belum_terdaftar;
		// 	$row[] = $bkk->sudah_terdaftar;
		// 	$data[] = $row;
		// 	$no++;
		// }
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => count($list),
						"recordsFiltered" => count($list),
						"data" => $list,
				);
		//output to json format
		echo json_encode($output);
	}

	// Laporan Mitra Kerja
	public function ajax_list_laporan_mitra()
	{
		date_default_timezone_set('Asia/Jakarta');

		$id_user = $this->session->userdata('id');

		$list = $this->dashboard->get_datatables_laporan_mitra();
		$data = array();
		$no = 1;
		foreach ($list as $mitra) {
			$row = array();
			$row[] = $no.'.';
			$row[] = $mitra->nama_perusahaan;
			$row[] = $mitra->alamat;
			$row[] = $mitra->no_telp;
			$row[] = $mitra->email;
			$row[] = $mitra->bidang_usaha;
			$row[] = $mitra->nama_cp;
			$row[] = $mitra->jabatan_cp;
			$row[] = $mitra->no_telp_cp;
			$row[] = $mitra->jenis_kemitraan;
			$row[] = date('d M Y', strtotime($mitra->periode_dari)).' - '.date('d M Y', strtotime($mitra->periode_sampai));
			$data[] = $row;
			$no++;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dashboard->count_all_laporan_mitra(),
						"recordsFiltered" => $this->dashboard->count_filtered_laporan_mitra(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	// Alumni
	public function ajax_list_laporan_keterserapan()
	{
		$id_user = $this->session->userdata('id');

		$list = $this->dashboard->get_datatables_alumni();
		$data = array();
		$no = 1;
		foreach ($list as $serapan) {
			$row = array();
			if ($serapan->jenis_kelamin == 'L') {
				$jenis = 'Laki-Laki';
			} else if ($serapan->jenis_kelamin == 'P'){
				$jenis = 'Perempuan';
			}
			$row[] = $no.'.';
			$row[] = $serapan->nisn;
			$row[] = $serapan->nik;
			$row[] = $serapan->nama;
			$row[] = $jenis;
			$row[] = $serapan->alamat_alumni;
			$row[] = $serapan->no_telp;
			$row[] = $serapan->email;
			$row[] = $serapan->jurusan;
			$row[] = $serapan->tahun_lulus;
			$row[] = $serapan->status;
			$row[] = $serapan->nama_perusahaan;
			$row[] = $serapan->alamat_perusahaan;

			$data[] = $row;
			$no++;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dashboard->count_all_alumni(),
						"recordsFiltered" => $this->dashboard->count_filtered_alumni(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}


	// End of Ajax Serverside

	public function get_kelurahan()
    {
        $kec = $this->input->post('kec');

        echo $this->dashboard->get_kelurahan($kec);

    }

    // Hilangkan Notif
    public function notifNull(){
    	try {
			$id 	 				= $this->input->post('id');

	        $data = array(
	        	'notif'					=> '0',
	        );  

	        $update = $this->db->where('notif', $id);
	        $this->db->update('table_sekolah', $data);

           	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

           	if($update){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);

		} catch (Exception $e) {
			
		}
    }

  public function laporan_bkk_pdf()
  {
    $tgl_awal 			= $this->input->post("tgl_awal");
		$tgl_akhir 	 		= $this->input->post("tgl_akhir");
    $tgl_awal       = $this->changeDateFormat($tgl_awal);
    $tgl_akhir      = $this->changeDateFormat($tgl_akhir);

    $dataLaporan = $this->dashboardReport->laporan_bkk($tgl_awal, $tgl_akhir);

    $dataView = [
      'dataLaporan' => $dataLaporan,
      'tgl_awal' => date("d M Y", strtotime($tgl_awal)),
      'tgl_akhir' => date("d M Y", strtotime($tgl_akhir))
    ];

    $view = $this->load->view('dashboardBkk/laporan_bkk', $dataView, true);
    // echo $view;
    $this->pdfgenerator->generate($view, "Laporan BKK");
  }

  public function laporan_bkk_xls()
  {
    $tgl_awal 			= $this->input->post("tgl_awal");
		$tgl_akhir 	 		= $this->input->post("tgl_akhir");
    $tgl_awal       = $this->changeDateFormat($tgl_awal);
    $tgl_akhir      = $this->changeDateFormat($tgl_akhir);

    $dataLaporan = $this->dashboardReport->laporan_bkk($tgl_awal, $tgl_akhir);

    $dirPath  = BASEPATH."../assets/excel/format_laporan_bkk.xlsx";
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($dirPath);

    $sheet = $spreadsheet->getActiveSheet();
    // $sheet->setCellValue('A1', 'Hello World !');
    $styleText = [
        'font' => [
            'bold' => false,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];

      $styleNumber = [
        'font' => [
            'bold' => false,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];
    $tableIndex = 4;
    for ($i=0; $i < count($dataLaporan) ; $i++) { 
      $tableIndex++;
      $sheet->setCellValue('A'.$tableIndex, $dataLaporan[$i]->kecamatan);
      $sheet->setCellValue('B'.$tableIndex, $dataLaporan[$i]->total_bkk);
      $sheet->setCellValue('C'.$tableIndex, $dataLaporan[$i]->terdaftar);
      $sheet->setCellValue('D'.$tableIndex, $dataLaporan[$i]->tidak_terdaftar);
      
      $spreadsheet->getActiveSheet()->getStyle('A'.$tableIndex)->applyFromArray($styleText);
      $spreadsheet->getActiveSheet()->getStyle('B'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('C'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('D'.$tableIndex)->applyFromArray($styleNumber);
    }

    if (!empty($tgl_awal)) {
      $sheet->setCellValue('B2', $tgl_awal);
    }

    if (!empty($tgl_akhir)) {
      $sheet->setCellValue('D2', $tgl_akhir);
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="laporan BKK.xlsx"');
    $writer->save("php://output");
    // $fileName = "{$dirPath}/filename.xls";

    // recursively creates all required nested directories   
    // $writer->save($fileName);
    // echo $fileName;
  }

  public function laporan_alumni_pdf()
  {
    $tgl_awal 			= $this->input->post("tgl_awal");
		$tgl_akhir 	 		= $this->input->post("tgl_akhir");
    $tgl_awal       = $this->changeDateFormat($tgl_awal);
    $tgl_akhir      = $this->changeDateFormat($tgl_akhir);

    $dataLaporan = $this->dashboardReport->laporan_alumni($tgl_awal, $tgl_akhir);

    $dataView = [
      'dataLaporan' => $dataLaporan,
      'tgl_awal' => date("d M Y", strtotime($tgl_awal)),
      'tgl_akhir' => date("d M Y", strtotime($tgl_akhir))
    ];

    $view = $this->load->view('dashboardBkk/laporan_alumni', $dataView, true);
    // echo $view;
    $this->pdfgenerator->generate($view, "Laporan BKK");
  }

  public function laporan_alumni_xls()
  {
    $tgl_awal 			= $this->input->post("tgl_awal");
		$tgl_akhir 	 		= $this->input->post("tgl_akhir");
    $tgl_awal       = $this->changeDateFormat($tgl_awal);
    $tgl_akhir      = $this->changeDateFormat($tgl_akhir);

    $dataLaporan = $this->dashboardReport->laporan_alumni($tgl_awal, $tgl_akhir);

    $dirPath  = BASEPATH."../assets/excel/format_laporan_alumni.xlsx";
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($dirPath);

    $sheet = $spreadsheet->getActiveSheet();
    // $sheet->setCellValue('A1', 'Hello World !');
    $styleText = [
        'font' => [
            'bold' => false,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];

    $styleNumber = [
        'font' => [
            'bold' => false,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];


    $total = [
      'jurusan' => 0,
      'laki' => 0,
      'perempuan' => 0,
      'belum_bekerja' => 0,
      'bekerja' => 0,
      'kuliah' => 0,
      'wiraswasta' => 0
    ];

    $tableIndex = 5;
    for ($i=0; $i < count($dataLaporan); $i++) { 
      $tableIndex++;
      $sheet->setCellValue('A'.$tableIndex, trim($dataLaporan[$i]->jurusan));
      $sheet->setCellValue('B'.$tableIndex, $dataLaporan[$i]->total);
      $sheet->setCellValue('C'.$tableIndex, $dataLaporan[$i]->laki);
      $sheet->setCellValue('D'.$tableIndex, $dataLaporan[$i]->perempuan);
      $sheet->setCellValue('E'.$tableIndex, $dataLaporan[$i]->belum_bekerja);
      $sheet->setCellValue('F'.$tableIndex, $dataLaporan[$i]->bekerja);
      $sheet->setCellValue('G'.$tableIndex, $dataLaporan[$i]->kuliah);
      $sheet->setCellValue('H'.$tableIndex, $dataLaporan[$i]->wiraswasta);
      
      $spreadsheet->getActiveSheet()->getStyle('A'.$tableIndex)->applyFromArray($styleText);
      $spreadsheet->getActiveSheet()->getStyle('B'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('C'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('D'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('E'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('F'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('G'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('H'.$tableIndex)->applyFromArray($styleNumber);

      $total['jurusan'] += $dataLaporan[$i]->total;
      $total['laki'] += $dataLaporan[$i]->laki;
      $total['perempuan'] += $dataLaporan[$i]->perempuan;
      $total['belum_bekerja'] += $dataLaporan[$i]->belum_bekerja;
      $total['bekerja'] += $dataLaporan[$i]->bekerja;
      $total['kuliah'] += $dataLaporan[$i]->kuliah;
      $total['wiraswasta'] += $dataLaporan[$i]->wiraswasta;
    }

    $styleText['font']['bold'] = TRUE;
    $styleNumber['font']['bold'] = TRUE;
    $tableIndex++;
    $sheet->setCellValue('A'.$tableIndex, "Total");
    $sheet->setCellValue('B'.$tableIndex, $total['jurusan']);
    $sheet->setCellValue('C'.$tableIndex, $total['laki']);
    $sheet->setCellValue('D'.$tableIndex, $total['perempuan']);
    $sheet->setCellValue('E'.$tableIndex, $total['belum_bekerja']);
    $sheet->setCellValue('F'.$tableIndex, $total['bekerja']);
    $sheet->setCellValue('G'.$tableIndex, $total['kuliah']);
    $sheet->setCellValue('H'.$tableIndex, $total['wiraswasta']);

    $spreadsheet->getActiveSheet()->getStyle('A'.$tableIndex)->applyFromArray($styleText);
    $spreadsheet->getActiveSheet()->getStyle('B'.$tableIndex)->applyFromArray($styleNumber);
    $spreadsheet->getActiveSheet()->getStyle('C'.$tableIndex)->applyFromArray($styleNumber);
    $spreadsheet->getActiveSheet()->getStyle('D'.$tableIndex)->applyFromArray($styleNumber);
    $spreadsheet->getActiveSheet()->getStyle('E'.$tableIndex)->applyFromArray($styleNumber);
    $spreadsheet->getActiveSheet()->getStyle('F'.$tableIndex)->applyFromArray($styleNumber);
    $spreadsheet->getActiveSheet()->getStyle('G'.$tableIndex)->applyFromArray($styleNumber);
    $spreadsheet->getActiveSheet()->getStyle('H'.$tableIndex)->applyFromArray($styleNumber);

    if (!empty($tgl_awal)) {
      $sheet->setCellValue('D2', $tgl_awal);
    }

    if (!empty($tgl_akhir)) {
      $sheet->setCellValue('F2', $tgl_akhir);
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="laporan Alumni.xlsx"');
    $writer->save("php://output");
    // $fileName = "{$dirPath}/filename.xls";

    // recursively creates all required nested directories   
    // $writer->save($fileName);
    // echo $fileName;
  }

  public function laporan_kemitraan_pdf()
  {
    $tgl_awal 			= $this->input->post("tgl_awal");
		$tgl_akhir 	 		= $this->input->post("tgl_akhir");
    $tgl_awal       = $this->changeDateFormat($tgl_awal);
    $tgl_akhir      = $this->changeDateFormat($tgl_akhir);
    // echo $tgl_awal." ".$tgl_akhir;

    $dataLaporan = $this->dashboardReport->laporan_kemitraan($tgl_awal, $tgl_akhir);

    $dataView = [
      'dataLaporan' => $dataLaporan,
      'tgl_awal' => date("d M Y", strtotime($tgl_awal)),
      'tgl_akhir' => date("d M Y", strtotime($tgl_akhir))
    ];

    $view = $this->load->view('dashboardBkk/laporan_kemitraan', $dataView, true);
    // echo $view;
    $this->pdfgenerator->generate($view, "Laporan Kemitraan");
  }

  public function laporan_kemitraan_xls()
  {
    $tgl_awal 			= $this->input->post("tgl_awal");
		$tgl_akhir 	 		= $this->input->post("tgl_akhir");
    $tgl_awal       = $this->changeDateFormat($tgl_awal);
    $tgl_akhir      = $this->changeDateFormat($tgl_akhir);

    $dataLaporan = $this->dashboardReport->laporan_kemitraan($tgl_awal, $tgl_akhir);

    $dirPath  = BASEPATH."../assets/excel/format_laporan_kemitraan.xlsx";
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($dirPath);

    $sheet = $spreadsheet->getActiveSheet();
    // $sheet->setCellValue('A1', 'Hello World !');
    $styleText = [
        'font' => [
            'bold' => false,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];

    $styleNumber = [
        'font' => [
            'bold' => false,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];


    $total = [
      'jurusan' => 0,
      'laki' => 0,
      'perempuan' => 0,
      'belum_bekerja' => 0,
      'bekerja' => 0,
      'kuliah' => 0,
      'wiraswasta' => 0
    ];

    $tableIndex = 5;
    for ($i=0; $i < count($dataLaporan); $i++) { 
      $tableIndex++;
      $sheet->setCellValue('A'.$tableIndex, trim($dataLaporan[$i]->kecamatan));
      $sheet->setCellValue('B'.$tableIndex, $dataLaporan[$i]->mitra);
      $sheet->setCellValue('C'.$tableIndex, $dataLaporan[$i]->loker);
      $sheet->setCellValue('D'.$tableIndex, $dataLaporan[$i]->tk);
      $sheet->setCellValue('E'.$tableIndex, $dataLaporan[$i]->magang);
      $sheet->setCellValue('F'.$tableIndex, $dataLaporan[$i]->pelatihan);
      $sheet->setCellValue('G'.$tableIndex, $dataLaporan[$i]->perekrutan);
      $sheet->setCellValue('H'.$tableIndex, $dataLaporan[$i]->lainnya);
      
      $spreadsheet->getActiveSheet()->getStyle('A'.$tableIndex)->applyFromArray($styleText);
      $spreadsheet->getActiveSheet()->getStyle('B'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('C'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('D'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('E'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('F'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('G'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('H'.$tableIndex)->applyFromArray($styleNumber);
    }

    if (!empty($tgl_awal)) {
      $sheet->setCellValue('D2', $tgl_awal);
    }

    if (!empty($tgl_akhir)) {
      $sheet->setCellValue('F2', $tgl_akhir);
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="laporan Kemitraan.xlsx"');
    $writer->save("php://output");
    // $fileName = "{$dirPath}/filename.xls";

    // recursively creates all required nested directories   
    // $writer->save($fileName);
    // echo $fileName;
  }

  public function laporan_keterserapan_pdf()
  {
    $tgl_awal 			= $this->input->post("tgl_awal");
		$tgl_akhir 	 		= $this->input->post("tgl_akhir");
    $tgl_awal       = $this->changeDateFormat($tgl_awal);
    $tgl_akhir      = $this->changeDateFormat($tgl_akhir);

    $dataLaporan = $this->dashboardReport->laporan_keterserapan($tgl_awal, $tgl_akhir);

    $dataView = [
      'dataLaporan' => $dataLaporan,
      'tgl_awal' => date("d M Y", strtotime($tgl_awal)),
      'tgl_akhir' => date("d M Y", strtotime($tgl_akhir))
    ];

    $view = $this->load->view('dashboardBkk/laporan_keterserapan', $dataView, true);
    // echo $view;
    $this->pdfgenerator->generate($view, "Laporan Keterserapan");
  }

  public function laporan_keterserapan_xls()
  {
    $tgl_awal 			= $this->input->post("tgl_awal");
		$tgl_akhir 	 		= $this->input->post("tgl_akhir");
    $tgl_awal       = $this->changeDateFormat($tgl_awal);
    $tgl_akhir      = $this->changeDateFormat($tgl_akhir);

    $dataLaporan = $this->dashboardReport->laporan_keterserapan($tgl_awal, $tgl_akhir);

    $dirPath  = BASEPATH."../assets/excel/format_laporan_keterserapan.xlsx";
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($dirPath);

    $sheet = $spreadsheet->getActiveSheet();
    // $sheet->setCellValue('A1', 'Hello World !');
    $styleText = [
        'font' => [
            'bold' => false,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];

    $styleNumber = [
        'font' => [
            'bold' => false,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'left' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'right' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];


    $total = [
      'jurusan' => 0,
      'laki' => 0,
      'perempuan' => 0,
      'belum_bekerja' => 0,
      'bekerja' => 0,
      'kuliah' => 0,
      'wiraswasta' => 0
    ];

    $tableIndex = 5;
    for ($i=0; $i < count($dataLaporan); $i++) { 
      $tableIndex++;
      $sheet->setCellValue('A'.$tableIndex, trim($dataLaporan[$i]->kecamatan));
      $sheet->setCellValue('B'.$tableIndex, $dataLaporan[$i]->total);
      $sheet->setCellValue('C'.$tableIndex, $dataLaporan[$i]->belum_bekerja);
      $sheet->setCellValue('D'.$tableIndex, $dataLaporan[$i]->bekerja);
      $sheet->setCellValue('E'.$tableIndex, $dataLaporan[$i]->kuliah);
      $sheet->setCellValue('F'.$tableIndex, $dataLaporan[$i]->wiraswasta);
      
      $spreadsheet->getActiveSheet()->getStyle('A'.$tableIndex)->applyFromArray($styleText);
      $spreadsheet->getActiveSheet()->getStyle('B'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('C'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('D'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('E'.$tableIndex)->applyFromArray($styleNumber);
      $spreadsheet->getActiveSheet()->getStyle('F'.$tableIndex)->applyFromArray($styleNumber);
    }

    if (!empty($tgl_awal)) {
      $sheet->setCellValue('C2', $tgl_awal);
    }

    if (!empty($tgl_akhir)) {
      $sheet->setCellValue('E2', $tgl_akhir);
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="laporan Keterserapan.xlsx"');
    $writer->save("php://output");
    // $fileName = "{$dirPath}/filename.xls";

    // recursively creates all required nested directories   
    // $writer->save($fileName);
    // echo $fileName;
  }

	private function changeDateFormat($date)
  {
    $date  = str_replace("/","-",$date );
    $date  = str_replace("%3A",":",$date );

    $datadate= "";


    $dateTemp = DateTime::createFromFormat('d-m-Y', $date);
    $datadate= $dateTemp->format('Y-m-d');

    return $datadate;
  }
}
