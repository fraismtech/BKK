<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardBkk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Dashboard","dashboard");
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '2') {
				redirect('dashboard/index');
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
			"alumni_baru" => $this->dashboard->alumni_baru(),
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
		$id_sekolah = $this->session->userdata('id_sekolah');
		$path = "";
		$get = array(
			"total_alumni" => $this->dashboard->total_alumni($id_sekolah),
			"total_loker" => $this->dashboard->total_loker($id_sekolah),
			"total_mitra" => $this->dashboard->total_mitra($id_sekolah),
			"total_kegiatan" => $this->dashboard->total_kegiatan($id_sekolah),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Dashboard", $path),
			"content" => $this->load->view('dashboardBkk/index', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function slider_bkk()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Slider", $path),
			"content" => $this->load->view('dashboardBkk/slider', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Tambah Slider
	public function tambahSlider()
	{
		try {
			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/image';  
				$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';  
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

	// Ajax Serverside
	public function get_alldata(){
		echo json_encode($this->dashboard->get_alldata());
	}

    // Slider
	public function ajax_list()
	{
		$id_user = $this->session->userdata('id');

		$id_sekolah = $this->session->userdata('id_sekolah');
		$list = $this->dashboard->get_datatables($id_sekolah);
		$data = array();
		$no = 1;
		foreach ($list as $slider) {
			$row = array();
			$row[] = $no.'.';
			$row[] = date('d M Y', strtotime($slider->tanggal_slider));
			$row[] = $slider->judul_slider;
			$row[] = '<a class="view popup portfolio-img" href="'.base_url().'assets/upload/image/'.$slider->foto_slider.'">'.$slider->foto_slider.'</a>';
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
			"recordsTotal" => $this->dashboard->count_all($id_sekolah),
			"recordsFiltered" => $this->dashboard->count_filtered($id_sekolah),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	// Kegiatan 
	public function ajax_list_kegiatan()
	{
		$id_user = $this->session->userdata('id');

		$id_sekolah = $this->session->userdata('id_sekolah');
		$list = $this->dashboard->get_datatables_kegiatan($id_sekolah);
		$data = array();
		$no = 1;
		foreach ($list as $kegiatan) {
			$row = array();
			$row[] = $no.'.';
			$row[] = date('d M Y', strtotime($kegiatan->tanggal_kegiatan));
			$row[] = $kegiatan->judul_kegiatan;
			$row[] = word_limiter($kegiatan->uraian_kegiatan, 15);
			$row[] = '<a class="view popup portfolio-img" href="'.base_url().'assets/upload/image/'.$kegiatan->foto_kegiatan.'">'.$kegiatan->foto_kegiatan.'</a>';
			$row[] = '
			<a
			href="javascript:void(0)"
			data-id="'.$kegiatan->id_kegiatan.'"
			data-tanggal="'.date('m/d/Y', strtotime($kegiatan->tanggal_kegiatan)).'"
			data-judul="'.$kegiatan->judul_kegiatan.'"
			data-uraian="'.$kegiatan->uraian_kegiatan.'"
			data-foto="'.$kegiatan->foto_kegiatan.'"
			data-foto1="'.$kegiatan->foto_kegiatan.'"
			data-toggle="modal" data-target="#edit-data"
			title="Edit Data">
			<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
			</a>
			<button
			class="btn btn-sm btn-danger hapus-menabung" 
			data-toggle="modal"
			id="id" 
			data-toggle="modal" 
			data-id="'.$kegiatan->id_kegiatan.'"
			data-tanggal="'.$kegiatan->tanggal_kegiatan.'"
			data-judul="'.$kegiatan->judul_kegiatan.'"
			data-foto="'.$kegiatan->foto_kegiatan.'"
			title="Hapus Data">
			<i class="fa fa-trash"></i>
			</button>';

			$data[] = $row;
			$no++;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->dashboard->count_all_kegiatan($id_sekolah),
			"recordsFiltered" => $this->dashboard->count_filtered_kegiatan($id_sekolah),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	// Mitra BKK
	public function ajax_list_mitra()
	{
		$id_user = $this->session->userdata('id');
		$id_sekolah = $this->session->userdata('id_sekolah');

		$list = $this->dashboard->get_datatables_mitra($id_sekolah);
		$data = array();
		$no = 1;
		foreach ($list as $mitra) {
			$row = array();
			$row[] = $no.'.';
			$row[] = $mitra->nama_perusahaan;
			$row[] = $mitra->bidang_usaha;
			$row[] = $mitra->no_telp;
			$row[] = $mitra->email;
			$row[] = date('d M Y', strtotime($mitra->periode_dari)) .' - '. date('d M Y', strtotime($mitra->periode_sampai));
			$row[] = '
			<a
			href="javascript:void(0)"
			data-id_mitra="'.$mitra->id_mitra.'"
			data-nama_perusahaan="'.$mitra->nama_perusahaan.'"
			data-alamat="'.$mitra->alamat.'"
			data-no_telp="'.$mitra->no_telp.'"
			data-email="'.$mitra->email.'"
			data-bidang_usaha="'.$mitra->bidang_usaha.'"
			data-nama_cp="'.$mitra->nama_cp.'"
			data-jabatan_cp="'.$mitra->jabatan_cp.'"
			data-no_telp_cp="'.$mitra->no_telp_cp.'"
			data-jenis_kemitraan="'.$mitra->jenis_kemitraan.'"
			data-periode_dari="'.date('Y-m-d', strtotime($mitra->periode_dari)).'"
			data-periode_sampai="'.date('Y-m-d', strtotime($mitra->periode_sampai)).'"
			data-logo_mitra="'.$mitra->logo_mitra.'"
			data-toggle="modal" data-target="#edit-data"
			title="Edit Data">
			<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
			</a>
			<button class="btn btn-sm btn-danger hapus-mitra" data-toggle="modal" id="id" data-toggle="modal" data-id="'.$mitra->id_mitra.'" title="Hapus Data">
			<i class="fa fa-trash"></i>
			</button>';

			$data[] = $row;
			$no++;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->dashboard->count_all_mitra($id_sekolah),
			"recordsFiltered" => $this->dashboard->count_filtered_mitra($id_sekolah),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	// User BKK
	public function ajax_list_user()
	{
		$id_user = $this->session->userdata('id');
		$id_sekolah = $this->session->userdata('id_sekolah');

		$list = $this->dashboard->get_datatables_user($id_sekolah);
		$data = array();
		$no = 1;
		foreach ($list as $user) {
			$row = array();
			$row[] = $no.'.';
			$row[] = $user->username;
			$row[] = $user->nama_operator;
			$row[] = $user->email;
			$row[] = $user->no_hp;
			$row[] = '
			<a
			href="javascript:void(0)"
			data-id_user="'.$user->id_user.'"
			data-username="'.$user->username.'"
			data-nama="'.$user->nama_operator.'"
			data-email="'.$user->email.'"
			data-no_hp="'.$user->no_hp.'"
			data-id_sekolah="'.$user->id_sekolah.'"
			data-id_perijinan="'.$user->id_perijinan.'"
			data-foto="'.$user->foto.'"
			data-toggle="modal" data-target="#edit-data"
			title="Edit Data">
			<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
			</a>
			<button
			class="btn btn-sm btn-danger hapus-menabung" 
			data-toggle="modal"
			id="id" 
			data-toggle="modal" 
			data-id_user="'.$user->id_user.'"
			data-username="'.$user->username.'"
			data-nama="'.$user->nama_operator.'"
			data-email="'.$user->email.'"
			data-no_hp="'.$user->no_hp.'"
			data-id_sekolah="'.$user->id_sekolah.'"
			data-id_perijinan="'.$user->id_perijinan.'"
			title="Hapus Data">
			<i class="fa fa-trash"></i>
			</button>';

			$data[] = $row;
			$no++;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->dashboard->count_all_user($id_sekolah),
			"recordsFiltered" => $this->dashboard->count_filtered_user($id_sekolah),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	// Alumni
	public function ajax_list_alumni_bkk()
	{
		$id_user = $this->session->userdata('id');
		$id_sekolah = $this->session->userdata('id_sekolah');

		$list = $this->dashboard->get_datatables_alumni($id_sekolah);
		$data = array();
		$no = 1;
		foreach ($list as $alumni) {
			$row = array();
			$row[] = $no.'.';
			$row[] = $alumni->nisn;
			$row[] = $alumni->nama;
			$row[] = $alumni->tempat_lahir.', '.date('d/m/Y', strtotime($alumni->tanggal_lahir));
			$row[] = $alumni->jurusan;
			$row[] = $alumni->no_telp;
			$row[] = $alumni->tahun_lulus;
			$row[] = $alumni->status;
			$row[] = '
			<a href="'.base_url().'dashboardBkk/alumniEdit/'.$alumni->id_alumni.'" title="Edit Data">
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
			"recordsTotal" => $this->dashboard->count_all_alumni($id_sekolah),
			"recordsFiltered" => $this->dashboard->count_filtered_alumni($id_sekolah),
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
		$id_sekolah = $this->session->userdata('id_sekolah');

		$list = $this->dashboard->get_datatables_loker($id_sekolah);
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
			<a href="'.base_url().'dashboardBkk/lokerEdit/'.$loker->id_lowongan.'" title="Edit Data">
			<button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
			</a>'.
			$ket.
			'
			<button class="btn btn-sm btn-warning hapus-loker" data-toggle="modal" id="id" data-toggle="modal" data-id="'.$loker->id_lowongan.'" title="Hapus Data">
			<i class="fa fa-trash"></i>
			</button>';

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
			"recordsTotal" => $this->dashboard->count_all_loker($id_sekolah),
			"recordsFiltered" => $this->dashboard->count_filtered_loker($id_sekolah),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
    // End Of Ajax Serverside

    // Edit Slider
	public function editSlider()
	{
		try {
			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/image/';  
				$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';  
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

	public function profil_bkk()
	{
		$id_user = $this->session->userdata('id');
		$id_kecamatan = '3276';

		$get = array(
			"profile" => $this->dashboard->profil($id_user),
			"kecamatan" => $this->dashboard->kecamatan($id_kecamatan),
		);
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Profil", $path),
			"content" => $this->load->view('dashboardBkk/profil', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Update Profil Sekolah
	public function updateProfilSekolah()
	{
		try {
			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/struktur_bkk';  
				$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG|doc|docx|pdf';  
				$this->load->library('upload', $config);

				$id_sekolah = $this->input->post("id_sekolah");

				$_id_sekolah = $this->db->get_where('table_sekolah',['id_sekolah' => $id_sekolah])->row();
				if ($_id_sekolah->struktur == NULL) {
              		# code...
				} else {
					unlink("./assets/upload/struktur_bkk/".$_id_sekolah->struktur);
				}

				$npsn 			= $this->input->post('npsn');
				$nama_sekolah 	= $this->input->post('nama_sekolah');
				$alamat  		= $this->input->post('alamat_sekolah');
				$kecamatan  	= $this->input->post('kecamatan');
				$kelurahan  	= $this->input->post('kelurahan');
				$visi  			= $this->input->post('visi');
				$misi  			= $this->input->post('misi');

				if(!$this->upload->do_upload('file')) {  
					$error =  $this->upload->display_errors(); 
					echo json_encode(array('msg' => $error, 'success' => false));
				} else {  
					$data = $this->upload->data();
					$data = array(
						'npsn'        	=> $npsn,
						'nama_sekolah' 	=> $nama_sekolah,
						'alamat_sekolah'=> $alamat,
						'kecamatan' 	=> $kecamatan,
						'kelurahan' 	=> $kelurahan,
						'visi' 			=> $visi,
						'misi' 			=> $misi,
						'struktur' 		=> $data['file_name']
					);  
					$update = $this->db->where('id_sekolah', $id_sekolah);
					$this->db->update('table_sekolah', $data);

					$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

					if($update){
						$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
					}
					echo json_encode($arr);
				}  
			}  

		} catch (Exception $e) {
			redirect('dashboardBkk/profil_bkk');
		}
	}

	// Update Perijinan
	public function updatePerijinan(){
		try {
			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/file';  
				$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG|doc|docx|pdf';  
				$this->load->library('upload', $config);

				$id_perijinan = $this->input->post("id_perijinan");

				$_id_perijinan = $this->db->get_where('table_perijinan',['id_perijinan' => $id_perijinan])->row();
				if ($_id_perijinan->dokumen == NULL) {
              		# code...
				} else {
					unlink("./assets/upload/file/".$_id_perijinan->dokumen);
				}

				$ijin_bkk 		= $this->input->post('ijin_bkk');
				$no_ijin 	 	= $this->input->post('no_ijin');
				$tgl_perijinan  = $this->input->post('tgl_perijinan');

				if(!$this->upload->do_upload('file')) {  
					$error =  $this->upload->display_errors(); 
					echo json_encode(array('msg' => $error, 'success' => false));
				} else {  
					$data = $this->upload->data();
					$data = array(
						'ijin_bkk'      => $ijin_bkk,
						'no_ijin' 		=> $no_ijin,
						'tgl_perijinan'	=> $tgl_perijinan,
						'dokumen' 		=> $data['file_name']
					);  
					$update = $this->db->where('id_perijinan', $id_perijinan);
					$this->db->update('table_perijinan', $data);

					$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

					if($update){
						$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
					}
					echo json_encode($arr);
				}  
			}  
		} catch (Exception $e) {
			redirect('dashboardBkk/profil_bkk');
		}
	}

	//Update Profil User
	public function updateProfilUser()
	{
		try {
			$id_user 		= $this->input->post('id_user');
			$username 		= $this->input->post('username');
			$password  		= md5($this->input->post('password'));
			$nama_operator  = $this->input->post('nama_operator');
			$email  		= $this->input->post('email');
			$no_hp  		= $this->input->post('no_hp');

			$data = array(
				'username' 		=> $username,
				'password'		=> $password,
				'nama_operator' => $nama_operator,
				'email' 		=> $email,
				'no_hp' 		=> $no_hp
			);  

			$update = $this->db->where('id_user', $id_user);
			$this->db->update('table_login', $data);

			$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

			if($update){
				$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
			}
			echo json_encode($arr);

		} catch (Exception $e) {
			
		}
	}

	// Kegiatan
	public function kegiatan_bkk()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kegiatan", $path),
			"content" => $this->load->view('dashboardBkk/kegiatan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Tambah Kegiatan
	public function tambahKegiatan()
	{
		try {
			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/image';  
				$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';  
				$this->load->library('upload', $config); 

				$tanggal = date('Y-m-d', strtotime($this->input->post("tanggal")));
				$judul = $this->input->post("judul");
				$uraian = $this->input->post("uraian");
				$id_sekolah = $this->session->userdata('id_sekolah');

				if(!$this->upload->do_upload('file')) {  
					$error =  $this->upload->display_errors(); 
					echo json_encode(array('msg' => $error, 'success' => false));
				} else {  
					$data = $this->upload->data();
					$data = array(
						'tanggal_kegiatan' => $tanggal,
						'judul_kegiatan' => $judul,
						'uraian_kegiatan' => $uraian,
						'foto_kegiatan' => $data['file_name'],
						'id_sekolah' => $id_sekolah,
					);  
					$this->db->insert('table_kegiatan', $data); 
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
			redirect('dashboardBkk/kegiatan');
		}
	}

	// Edit Kegiatan
	public function editKegiatan()
	{
		try {
			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/image/';  
				$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';  
				$this->load->library('upload', $config); 
				$id_kegiatan = $this->input->post("id_kegiatan");
				$id_sekolah = $this->session->userdata('id_sekolah');

				$_id_kegiatan = $this->db->get_where('table_kegiatan',['id_kegiatan' => $id_kegiatan])->row();
				unlink("./assets/upload/image/".$_id_kegiatan->foto_kegiatan);

				$tanggal = date('Y-m-d', strtotime($this->input->post("tanggal")));
				$judul = $this->input->post("judul");
				$uraian = $this->input->post("uraian");
				if(!$this->upload->do_upload('file')) {  
					$error =  $this->upload->display_errors(); 
					echo json_encode(array('msg' => $error, 'success' => false));
				} else {  
					$data = $this->upload->data();
					$data = array(
						'tanggal_kegiatan' => $tanggal,
						'judul_kegiatan' => $judul,
						'uraian_kegiatan' => $uraian,
						'foto_kegiatan' => $data['file_name'],
						'id_sekolah' => $id_sekolah,
					);  
					$update = $this->db->where('id_kegiatan', $id_kegiatan);
					$this->db->update('table_kegiatan', $data); 
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

	// Hapus Kegiatan
	public function hapusKegiatan(){
		$id  = $this->uri->segment(3);
		$_id = $this->db->get_where('table_kegiatan',['id_kegiatan' => $id])->row();
		$query = $this->db->delete('table_kegiatan',['id_kegiatan'=>$id]);
		$arr = array('msg' => 'Data gagal dihapus', 'success' => false);

		if($query){
			unlink("./assets/upload/image/".$_id->foto_kegiatan);
			$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
		}
		echo json_encode($arr);
	}

	public function loker_bkk()
	{
		$id_sekolah = $this->session->userdata('id_sekolah');
		$path = "";
		$get = array(
			"mitra_bkk" => $this->dashboard->mitra_bkk($id_sekolah),
			"posisi_jabatan" => $this->dashboard->posisi_jabatan(),
			"jenis_lowongan" => $this->dashboard->jenis_lowongan(),
			"status_pendidikan" => $this->dashboard->status_pendidikan(),
			"jenis_pengupahan" => $this->dashboard->jenis_pengupahan(),
			"hubungan_kerja" => $this->dashboard->hubungan_kerja(),
			"jurusan" => $this->dashboard->jurusan(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Lowongan Kerja", $path),
			"content" => $this->load->view('dashboardBkk/loker', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Tambah Loker
	public function simpanLoker()
	{
		error_reporting(0);
		try {
			date_default_timezone_set('Asia/Jakarta');

			$id_sekolah 			= $this->session->userdata('id_sekolah');
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
				'id_sekolah' 			=> $id_sekolah,
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
				'ket'		 			=> 'Aktif',
				'register_date' 		=> $date_created,
			);

			$simpan = $this->db->insert('table_lowongan', $data);

			$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

			if($simpan){
				$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
			}
			echo json_encode($arr);

		} catch (Exception $e) {
			
		}
	}

	// Edit Loker
	public function lokerEdit()
	{
		$id_sekolah = $this->session->userdata('id_sekolah');
		$id_lowongan  = $this->uri->segment(3);

		$path = "";
		$get = array(
			"get_lowongan" => $this->dashboard->data_loker($id_lowongan),
			"mitra_bkk" => $this->dashboard->mitra_bkk($id_sekolah),
			"posisi_jabatan" => $this->dashboard->posisi_jabatan(),
			"jenis_lowongan" => $this->dashboard->jenis_lowongan(),
			"data_keahlian" => $this->dashboard->keahlian(),
			"status_pendidikan" => $this->dashboard->status_pendidikan(),
			"jenis_pengupahan" => $this->dashboard->jenis_pengupahan(),
			"hubungan_kerja" => $this->dashboard->hubungan_kerja(),
			"jurusan" => $this->dashboard->jurusan($id_sekolah),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Lowongan Kerja", $path),
			"content" => $this->load->view('dashboardBkk/loker-edit', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function editLoker()
	{
		error_reporting(0);
		try {
			date_default_timezone_set('Asia/Jakarta');
			$id_lowongan 			= $this->input->post("id_lowongan");

			$id_sekolah 			= $this->session->userdata('id_sekolah');
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
				'id_sekolah' 			=> $id_sekolah,
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
				redirect('dashboardBkk/loker_bkk');
			} else {
				$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
				redirect('dashboardBkk/loker_bkk');
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
			redirect('dashboardBkk/user');
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
			redirect('dashboardBkk/user');
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
			redirect('dashboardBkk/user');
		}
	}

	//Alumni
	public function alumni_bkk()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Alumni", $path),
			"content" => $this->load->view('dashboardBkk/alumni', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Halaman Tambah Alumni
	public function tambahAlumni()
	{
		$id_sekolah = $this->session->userdata('id_sekolah');

		$path = "";
		$get = array(
			"jurusan" 	=> $this->dashboard->jurusan(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Tambah Alumni", $path),
			"content" => $this->load->view('dashboardBkk/tambah-alumni', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function addAlumni()
	{
		error_reporting(0);
		try {
			date_default_timezone_set('Asia/Jakarta');
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
				'register_date' => date("Y-m-d H:i:s"),
			);

			$simpan = $this->db->insert('table_alumni', $data);

			if($simpan) {
				$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
				redirect('dashboardBkk/alumni_bkk');
			} else {
				$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
				redirect('dashboardBkk/alumni_bkk');
			}

		} catch (Exception $e) {
			
		}
	}

	// Import Format Alumni
	private $filename = "import_data";

	public function importAlumni(){
		date_default_timezone_set('Asia/Jakarta');

		$id_sekolah = $this->session->userdata('id_sekolah');
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		$upload = $this->dashboard->upload_file($this->filename);
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'nisn'=>$row['A'], // Insert data nis dari kolom A di excel
					'nik'=>$row['B'], // Insert data nama dari kolom B di excel
					'nama'=>$row['C'],
					'jenis_kelamin'=>$row['D'], // Insert data jenis kelamin dari kolom C di excel
					'tempat_lahir'=>$row['E'],
					'tanggal_lahir'=>date('Y-m-d', strtotime($row['F'])),
					'alamat_alumni'=>$row['G'],
					'no_telp'=>$row['H'],
					'email'=>$row['I'], // Insert data alamat dari kolom D di excel
					'jurusan'=>$row['J'],
					'tahun_lulus'=>$row['K'],
					'status'=>$row['L'],
					'nama_perusahaan'=>$row['M'],
					'alamat_perusahaan'=>$row['N'],
					'no_telp_perusahaan'=>$row['O'],
					'id_sekolah'=>$id_sekolah,
					'register_date' => date("Y-m-d H:i:s"),
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$upload = $this->db->insert_batch('table_alumni', $data);
		
		if($upload) {
			$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
			redirect('dashboardBkk/alumni_bkk');
		} else {
			$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
			redirect('dashboardBkk/alumni_bkk');
		}
		
	}

	// Edit Alumni
	public function alumniEdit()
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
			"content" => $this->load->view('dashboardBkk/alumni-edit', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function editAlumni()
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
				redirect('dashboardBkk/alumni_bkk');
			} else {
				$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
				redirect('dashboardBkk/alumni_bkk');
			}

		} catch (Exception $e) {
			
		}
	}

	// Hapus Alumni
	public function hapusAlumni(){
		$id_alumni  = $this->uri->segment(3);
		$data_alumni = $this->db->get_where('table_alumni',['id_alumni' => $id_alumni])->row();

		$hapus = $this->db->delete('table_alumni',['id_alumni'=>$data_alumni->id_alumni]);

		$arr = array('msg' => 'Data gagal dihapus', 'success' => false);

		if($hapus){
			$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
		}
		echo json_encode($arr);
	}

	// Mitra BKK
	public function mitra_bkk()
	{
		$path = "";
		$get = array(
			"provinsi" => $this->dashboard->provinsi(),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Mitra BKK", $path),
			"content" => $this->load->view('dashboardBkk/mitra', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Tambah Mitra
	public function simpanMitra()
	{
		try {

			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/image/';  
				$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';  
				$this->load->library('upload', $config); 

				$id_user = $this->session->userdata('id');
				$id_sekolah = $this->session->userdata('id_sekolah');

				$nama_perusahaan 	= $this->input->post("nama_perusahaan");
				$alamat 	 		= $this->input->post("alamat");
				$no_telp 		 	= $this->input->post("no_telp");
				$email 				= $this->input->post("email");
				$bidang_usaha 		= $this->input->post("bidang_usaha");
				$nama_cp 			= $this->input->post("nama_cp");
				$jabatan_cp 		= $this->input->post("jabatan_cp");
				$no_telp_cp 		= $this->input->post("no_telp_cp");
				$jenis_kemitraan	= $this->input->post("jenis_kemitraan");
				$dari 				= date('Y-m-d', strtotime($this->input->post("dari")));
				$sampai 			= date('Y-m-d', strtotime($this->input->post("sampai")));

				if(!$this->upload->do_upload('file')) {  
					$error =  $this->upload->display_errors(); 
					echo json_encode(array('msg' => $error, 'success' => false));
				} else {  
					$data = $this->upload->data();
					$data = array(
						'nama_perusahaan' => $nama_perusahaan,
						'alamat' => $alamat,
						'no_telp' => $no_telp,
						'email' => $email,
						'bidang_usaha' => $bidang_usaha,
						'nama_cp' => $nama_cp,
						'jabatan_cp' => $jabatan_cp,
						'no_telp_cp' => $no_telp_cp,
						'jenis_kemitraan' => $jenis_kemitraan,
						'periode_dari' => $dari,
						'periode_sampai' => $sampai,
						'logo_mitra' => $data['file_name'],
						'id_sekolah' => $id_sekolah,
					);  
					$simpan = $this->db->insert('table_mitra', $data);

					$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

					if($simpan){
						$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
					}
					echo json_encode($arr);
				}  
			}
		} catch (Exception $e) {
			redirect('dashboardBkk/mitra');
		}
	}

	// Halaman Edit Mitra
	public function mitraEdit(){
		$id_mitra  = $this->uri->segment(3);

		$path = "";
		$get = array(
			"provinsi" 	=> $this->dashboard->provinsi(),
			"data" 		=> $this->dashboard->data_mitra($id_mitra),
		);
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Mitra BKK", $path),
			"content" => $this->load->view('dashboardBkk/mitra-edit', $get, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}
	// Edit Mitra
	public function editMitra()
	{
		try {

			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/image/';  
				$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';  
				$this->load->library('upload', $config); 

				$id_user 			= $this->session->userdata('id');
				$id_sekolah 		= $this->session->userdata('id_sekolah');

				$id_mitra 			= $this->input->post("id_mitra");
				$nama_perusahaan 	= $this->input->post("nama_perusahaan");
				$alamat 	 		= $this->input->post("alamat");
				$no_telp 		 	= $this->input->post("no_telp");
				$email 				= $this->input->post("email");
				$bidang_usaha 		= $this->input->post("bidang_usaha");
				$nama_cp 			= $this->input->post("nama_cp");
				$jabatan_cp 		= $this->input->post("jabatan_cp");
				$no_telp_cp 		= $this->input->post("no_telp_cp");
				$jenis_kemitraan	= $this->input->post("jenis_kemitraan");
				$dari 				= date('Y-m-d', strtotime($this->input->post("dari")));
				$sampai 			= date('Y-m-d', strtotime($this->input->post("sampai")));

				$_id_mitra = $this->db->get_where('table_mitra',['id_mitra' => $id_mitra])->row();
				unlink("./assets/upload/image/".$_id_mitra->logo_mitra);

				if(!$this->upload->do_upload('file')) {  
					$error =  $this->upload->display_errors(); 
					echo json_encode(array('msg' => $error, 'success' => false));
				} else {  
					$data = $this->upload->data();
					$data = array(
						'nama_perusahaan' => $nama_perusahaan,
						'alamat' => $alamat,
						'no_telp' => $no_telp,
						'email' => $email,
						'bidang_usaha' => $bidang_usaha,
						'nama_cp' => $nama_cp,
						'jabatan_cp' => $jabatan_cp,
						'no_telp_cp' => $no_telp_cp,
						'jenis_kemitraan' => $jenis_kemitraan,
						'periode_dari' => $dari,
						'periode_sampai' => $sampai,
						'logo_mitra' => $data['file_name'],
						'id_sekolah' => $id_sekolah,
					);  
					$update = $this->db->where('id_mitra', $id_mitra);
					$this->db->update('table_mitra', $data);

					$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

					if($update){
						$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
					}
					echo json_encode($arr);
				}  
			}

		} catch (Exception $e) {
			redirect('dashboardBkk/mitra_bkk');
		}

	}

	// Hapus Mitra
	public function hapusMitra()
	{
		$id_mitra  = $this->uri->segment(3);
		$data_mitra = $this->db->get_where('table_mitra',['id_mitra' => $id_mitra])->row();
		unlink("./assets/upload/image/".$data_mitra->logo_mitra);

        // Hapus Mitra
		$query_4 = $this->db->delete('table_mitra',['id_mitra'=>$data_mitra->id_mitra]);

		$arr = array('msg' => 'Data gagal dihapus', 'success' => false);

		if($query_4 == true){
			$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
		}
		echo json_encode($arr);
	}

	public function user_bkk()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - User", $path),
			"content" => $this->load->view('dashboardBkk/user', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	// Tambah User
	public function tambahUser()
	{
		try {
			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/image/user/';  
				$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';  
				$this->load->library('upload', $config); 

				date_default_timezone_set('Asia/Jakarta');

				$nama_operator 	= $this->input->post('nama_operator');
				$email   		= $this->input->post('email');
				$no_hp   		= $this->input->post('no_hp');
				$username 		= $this->input->post('username');
				$password   	= $this->input->post('password');
				$id_sekolah 	= $this->input->post('id_sekolah');
				$id_perijinan   = $this->input->post('id_perijinan');
				$date_created  	= date("Y-m-d H:i:s");

				if(!$this->upload->do_upload('file')) {  
					$error =  $this->upload->display_errors(); 
					echo json_encode(array('msg' => $error, 'success' => false));
				} else {  
					$data = $this->upload->data();
					$data = array(
						'username' 		=> $username,
						'password'      => md5($password),
						'nama_operator'	=> $nama_operator,
						'email' 		=> $email,
						'no_hp' 		=> $no_hp,
						'id_sekolah' 	=> $id_sekolah,
						'id_perijinan' 	=> $id_perijinan,
						'level' 		=> '1',
						'status' 		=> '1',
						'foto' 			=> $data['file_name'],
						'date_created' 	=> $date_created,
					);
					$simpan = $this->db->insert('table_login', $data);

					$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

					if($simpan){
						$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
					}
					echo json_encode($arr);
				}  
			}  
		} catch (Exception $e) {
			redirect('dashboardBkk/user');
		}
	}

	// Edit User 
	public function editUser()
	{
		try {
			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/image/user/';  
				$config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';  
				$this->load->library('upload', $config); 

				date_default_timezone_set('Asia/Jakarta');

				$nama_operator 	= $this->input->post('nama_operator');
				$email   		= $this->input->post('email');
				$no_hp   		= $this->input->post('no_hp');
				$username 		= $this->input->post('username');
				$password   	= $this->input->post('password');
				$id_sekolah 	= $this->input->post('id_sekolah');
				$id_perijinan   = $this->input->post('id_perijinan');
				$id_user   		= $this->input->post('id_user');
				$date_created  	= date("Y-m-d H:i:s");

				$_id_user = $this->db->get_where('table_login',['id_user' => $id_user])->row();
				unlink("./assets/upload/image/user/".$_id_user->foto);

				if(!$this->upload->do_upload('file')) {  
					$error =  $this->upload->display_errors(); 
					echo json_encode(array('msg' => $error, 'success' => false));
				} else {  
					$data = $this->upload->data();
					$data = array(
						'username' 		=> $username,
						'password'      => md5($password),
						'nama_operator'	=> $nama_operator,
						'email' 		=> $email,
						'no_hp' 		=> $no_hp,
						'id_sekolah' 	=> $id_sekolah,
						'id_perijinan' 	=> $id_perijinan,
						'foto' 			=> $data['file_name'],
						'date_created' 	=> $date_created,
					);  
					$update = $this->db->where('id_user', $id_user);
					$this->db->update('table_login', $data);

					$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

					if($update){
						$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
					}
					echo json_encode($arr);
				}  
			}
		} catch (Exception $e) {
			redirect('dashboardBkk/user');
		}
	}

	// Hapus User
	public function hapusUser()
	{
		try {
			$id  = $this->uri->segment(3);
			$_id = $this->db->get_where('table_login',['id_user' => $id])->row();
			unlink("./assets/upload/image/user/".$_id->foto);

			$query = $this->db->delete('table_login',['id_user'=>$id]);

			$arr = array('msg' => 'Data gagal dihapus', 'success' => false);

			if($query){
				$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
			}
			echo json_encode($arr);
		} catch (Exception $e) {
			redirect('dashboardBkk/user');
		}
	}

	// Cek Username
	public function usernameList(){
		$username   = $this->input->post('username');
		$sql = $this->db->query("SELECT username FROM table_login where username='$username'");
		$cek_nik = $sql->num_rows();
		if ($cek_nik > 0) {
			echo "1";
		} else{
			echo "2";
		}

	}

	// Address
	public function get_kota()
	{
		$prov = $this->input->post('prov');

		echo $this->dashboard->get_kota($prov);

	}

	public function get_nama_provinsi()
	{
		$prov = $this->input->post('prov');

		echo $this->dashboard->get_nama_provinsi($prov);

	}

	public function get_kec()
	{
		$kota = $this->input->post('kota');

		echo $this->dashboard->get_kec($kota);

	}

	public function get_nama_kota()
	{
		$kota = $this->input->post('kota');

		echo $this->dashboard->get_nama_kota($kota);

	}

	public function get_kel()
	{
		$kec = $this->input->post('kec');

		echo $this->dashboard->get_kel($kec);

	}

	public function get_nama_kec()
	{
		$kec = $this->input->post('kec');

		echo $this->dashboard->get_nama_kec($kec);

	}

	public function get_nama_kel()
	{
		$kel = $this->input->post('kel');

		echo $this->dashboard->get_nama_kel($kel);

	}

    // Get Keahlian
	public function get_keahlian()
	{
		$keahlian = $this->input->post('keahlian');

		echo $this->dashboard->get_keahlian($keahlian);

	}

    // Get Kategori
	public function get_kategori()
	{
		$kategori = $this->input->post('kategori');

		echo $this->dashboard->get_kategori($kategori);

	}

	// Hilangkan Notif
    public function notifNull(){
    	try {
			$id 	 				= $this->input->post('id');

	        $data = array(
	        	'notif'					=> '0',
	        );  

	        $update = $this->db->where('notif', $id);
	        $this->db->update('table_alumni', $data);

           	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

           	if($update){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);

		} catch (Exception $e) {
			
		}
    }

}
