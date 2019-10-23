<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardBkk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Dashboard","dashboard");
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '2') {
				redirect('Dashboard');
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
			"content" => $this->load->view('dashboardBkk/index', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function slider()
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
			$row[] = $kegiatan->uraian_kegiatan;
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
			$row[] = date('d M Y', strtotime($mitra->dari)) .' - '. date('d M Y', strtotime($mitra->sampai));
			$row[] = '
	              	<a href="'.base_url().'dashboardBkk/mitraEdit/'.$mitra->id_mitra.'" title="Edit Data">
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
	public function ajax_list_alumni()
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
			if(strtotime($loker->tanggal_berlaku) >= strtotime(date('Y-m-d')) AND strtotime($loker->tanggal_berakhir) <= strtotime(date('Y-m-d'))){
				$status = 'Aktif';
			}else{
				$status = 'Tidak Aktif';
			}
			$row[] = $no.'.';
			$row[] = $loker->nama_lowongan;
			$row[] = $loker->nama_perusahaan;
			$row[] = date('d M Y', strtotime($loker->tanggal_berlaku));
			$row[] = date('d M Y', strtotime($loker->tanggal_berakhir));
			$row[] = $status;
			$row[] = $loker->jml_pria;
			$row[] = $loker->jml_wanita;
			$row[] = '
	              	<a href="'.base_url().'dashboardBkk/lokerEdit/'.$loker->id_lowongan.'" title="Edit Data">
	            		<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
	            	</a>
		            <button class="btn btn-sm btn-danger hapus-loker" data-toggle="modal" id="id" data-toggle="modal" data-id="'.$loker->id_lowongan.'" title="Hapus Data">
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

	public function profil()
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
              	$config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';  
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
    		redirect('dashboardBkk/kegiatan');
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
	public function kegiatan()
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
              	$config['allowed_types'] = 'jpg|jpeg|png';  
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
              	$config['allowed_types'] = 'jpg|jpeg|png';  
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

	public function loker()
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
			"jurusan" => $this->dashboard->jurusan($id_sekolah),
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
                redirect('dashboardBkk/loker');
           	} else {
           		$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
                redirect('dashboardBkk/loker');
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

	//Alumni
	public function alumni()
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
			"jurusan" 	=> $this->dashboard->jurusan($id_sekolah),
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
                redirect('dashboardBkk/alumni');
           	} else {
           		$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
                redirect('dashboardBkk/alumni');
           	}

		} catch (Exception $e) {
			
		}
	}

	// Import Format Alumni
	private $filename = "import_data";

	public function importAlumni(){
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
					'tanggal_lahir'=>$row['F'],
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
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$upload = $this->db->insert_batch('table_alumni', $data);
		
		if($upload) {
        	$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
            redirect('dashboardBkk/alumni');
       	} else {
       		$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
            redirect('dashboardBkk/alumni');
       	}
		
	}

	// Edit Alumni
	public function alumniEdit()
	{
		$id_sekolah = $this->session->userdata('id_sekolah');
		$id_alumni  = $this->uri->segment(3);

		$path = "";
		$get = array(
			"jurusan" 			=> $this->dashboard->jurusan($id_sekolah),
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
          	);

          	$update = $this->db->where('id_alumni', $id_alumni);
			$this->db->update('table_alumni', $data);

          	if($update) {
            	$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
                redirect('dashboardBkk/alumni');
           	} else {
           		$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
                redirect('dashboardBkk/alumni');
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
	public function mitra()
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

			$id_user = $this->session->userdata('id');
			$id_sekolah = $this->session->userdata('id_sekolah');

			$nama_perusahaan 	= $this->input->post("nama_perusahaan");
          	$bidang_usaha 	 	= $this->input->post("bidang_usaha");
          	$no_telp 		 	= $this->input->post("no_telp");
          	$email 				= $this->input->post("email");
          	$no_telp 			= $this->input->post("no_telp");
          	$jenis_kemitraan 	= $this->input->post("jenis_kemitraan");

          	$alamat 	= $this->input->post("alamat");
          	$provinsi 	= $this->input->post("prov");
          	$kota 		= $this->input->post("kab");
          	$kecamatan 	= $this->input->post("kec");
          	$kelurahan 	= $this->input->post("kel");
          	$kode_pos 	= $this->input->post("kode_pos");

          	$nama_cp 	= $this->input->post("nama_cp");
          	$jabatan_cp = $this->input->post("jabatan_cp");
          	$no_telp_cp = $this->input->post("no_telp_cp");

			$dari 	= date('Y-m-d', strtotime($this->input->post("dari")));
			$sampai = date('Y-m-d', strtotime($this->input->post("sampai")));

           	$data_periode = array(
	            'dari' 		=> $dari,
	            'sampai'	=> $sampai,
	        ); 

           	$this->db->insert('table_periode', $data_periode);
			$id_periode = $this->db->insert_id();

	        $data_cp = array(
	        	'nama_cp' 		=> $nama_cp, 
	        	'jabatan_cp' 	=> $jabatan_cp,
	        	'no_telp_cp'	=> $no_telp_cp,
	        );

	        $this->db->insert('table_cp_mitra', $data_cp);
			$id_cp_mitra = $this->db->insert_id();

	        $data_alamat_mitra = array(
	        	'alamat_lengkap' 	=> $alamat,
	        	'provinsi' 			=> $provinsi,
	        	'kota' 				=> $kota,
	        	'kecamatan' 		=> $kecamatan,
	        	'kelurahan' 		=> $kelurahan,
	        	'kode_pos' 			=> $kode_pos, 
	        );

	        $this->db->insert('table_alamat', $data_alamat_mitra);
			$id_alamat = $this->db->insert_id();

	        $data_mitra = array(
	        	'nama_perusahaan' 	=> $nama_perusahaan,
	        	'bidang_usaha' 		=> $bidang_usaha,
	        	'no_telp' 			=> $no_telp,
	        	'email' 			=> $email,
	        	'jenis_kemitraan' 	=> $jenis_kemitraan,
	        	'id_alamat' 		=> $id_alamat,
	        	'id_cp_mitra' 		=> $id_cp_mitra,
	        	'id_periode' 		=> $id_periode,
	        	'id_sekolah' 		=> $id_sekolah,
	        );

	        $simpan = $this->db->insert('table_mitra', $data_mitra);

           	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

           	if($simpan){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);
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

			$id_mitra 		= $this->input->post("id_mitra");
          	$id_cp_mitra 	= $this->input->post("id_cp_mitra");
          	$id_alamat 		= $this->input->post("id_alamat");
          	$id_periode 	= $this->input->post("id_periode");
          	$id_sekolah 	= $this->input->post("id_sekolah");

			$nama_perusahaan 	= $this->input->post("nama_perusahaan");
          	$bidang_usaha 	 	= $this->input->post("bidang_usaha");
          	$no_telp 		 	= $this->input->post("no_telp");
          	$email 				= $this->input->post("email");
          	$no_telp 			= $this->input->post("no_telp");
          	$jenis_kemitraan 	= $this->input->post("jenis_kemitraan");

          	$alamat 	= $this->input->post("alamat");
          	$provinsi 	= $this->input->post("prov");
          	$kota 		= $this->input->post("kab");
          	$kecamatan 	= $this->input->post("kec");
          	$kelurahan 	= $this->input->post("kel");
          	$kode_pos 	= $this->input->post("kode_pos");

          	$nama_cp 	= $this->input->post("nama_cp");
          	$jabatan_cp = $this->input->post("jabatan_cp");
          	$no_telp_cp = $this->input->post("no_telp_cp");

			$dari 	= date('Y-m-d', strtotime($this->input->post("dari")));
			$sampai = date('Y-m-d', strtotime($this->input->post("sampai")));

           	$data_periode = array(
	            'dari' 		=> $dari,
	            'sampai'	=> $sampai,
	        ); 

           	$update_1 = $this->db->where('id_periode', $id_periode);
			$this->db->update('table_periode', $data_periode);

	        $data_cp = array(
	        	'nama_cp' 		=> $nama_cp, 
	        	'jabatan_cp' 	=> $jabatan_cp,
	        	'no_telp_cp'	=> $no_telp_cp,
	        );

	        $update_2 = $this->db->where('id_cp_mitra', $id_cp_mitra);
			$this->db->update('table_cp_mitra', $data_cp);

	        $data_alamat_mitra = array(
	        	'alamat_lengkap' 	=> $alamat,
	        	'provinsi' 			=> $provinsi,
	        	'kota' 				=> $kota,
	        	'kecamatan' 		=> $kecamatan,
	        	'kelurahan' 		=> $kelurahan,
	        	'kode_pos' 			=> $kode_pos, 
	        );

	        $update_3 = $this->db->where('id_alamat', $id_alamat);
			$this->db->update('table_alamat', $data_alamat_mitra);

	        $data_mitra = array(
	        	'nama_perusahaan' 	=> $nama_perusahaan,
	        	'bidang_usaha' 		=> $bidang_usaha,
	        	'no_telp' 			=> $no_telp,
	        	'email' 			=> $email,
	        	'jenis_kemitraan' 	=> $jenis_kemitraan,
	        	'id_alamat' 		=> $id_alamat,
	        	'id_cp_mitra' 		=> $id_cp_mitra,
	        	'id_periode' 		=> $id_periode,
	        	'id_sekolah' 		=> $id_sekolah,
	        );

	        $update_4 = $this->db->where('id_mitra', $id_mitra);
			$this->db->update('table_mitra', $data_mitra);

           	if($update_1 == true && $update_2 == true && $update_3 == true && $update_4 == true) {
            	$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
                redirect('dashboardBkk/mitra');
           	} else {
           		$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
                redirect('dashboardBkk/mitra');
           	}

		} catch (Exception $e) {
			redirect('dashboardBkk/mitra');
		}

	}

	// Hapus Mitra
	public function hapusMitra()
	{
		$id_mitra  = $this->uri->segment(3);
		$data_mitra = $this->db->get_where('table_mitra',['id_mitra' => $id_mitra])->row();

		// Hapus CP
        $query_1 = $this->db->delete('table_cp_mitra',['id_cp_mitra'=>$data_mitra->id_cp_mitra]);

        // Hapus Alamat
        $query_2 = $this->db->delete('table_alamat',['id_alamat'=>$data_mitra->id_alamat]);

        // Hapus Periode
        $query_3 = $this->db->delete('table_periode',['id_periode'=>$data_mitra->id_periode]);

        // Hapus Mitra
        $query_4 = $this->db->delete('table_mitra',['id_mitra'=>$data_mitra->id_mitra]);

        $arr = array('msg' => 'Data gagal dihapus', 'success' => false);
 
       	if($query_1 == true && $query_2 == true && $query_3 == true && $query_4 == true){
        	$arr = array('msg' => 'Data berhasil dihapus', 'success' => true);
       	}
        echo json_encode($arr);
	}

	public function user()
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
			date_default_timezone_set('Asia/Jakarta');

            $nama_operator 	= $this->input->post('nama_operator');
            $email   		= $this->input->post('email');
            $no_hp   		= $this->input->post('no_hp');
            $username 		= $this->input->post('username');
            $password   	= $this->input->post('password');
            $id_sekolah 	= $this->input->post('id_sekolah');
            $id_perijinan   = $this->input->post('id_perijinan');
            $date_created  	= date("Y-m-d H:i:s");

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
	            'date_created' 	=> $date_created,
	        );

	        $simpan = $this->db->insert('table_login', $data);

           	$arr = array('msg' => 'Data gagal disimpan', 'success' => false);

           	if($simpan){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);

		} catch (Exception $e) {
			redirect('dashboardBkk/user');
		}
	}

	// Edit User 
	public function editUser()
	{
		try {
			$nama_operator 	= $this->input->post('nama_operator');
            $email   		= $this->input->post('email');
            $no_hp   		= $this->input->post('no_hp');
            $username 		= $this->input->post('username');
            $password   	= $this->input->post('password');
            $id_sekolah 	= $this->input->post('id_sekolah');
            $id_perijinan   = $this->input->post('id_perijinan');
            $id_user   		= $this->input->post('id_user');

            $data = array(
	            'username' 		=> $username,
	            'password'      => md5($password),
	            'nama_operator'	=> $nama_operator,
	            'email' 		=> $email,
	            'no_hp' 		=> $no_hp,
	            'id_sekolah' 	=> $id_sekolah,
	            'id_perijinan' 	=> $id_perijinan,
	        );

	        $update = $this->db->where('id_user', $id_user);
			$this->db->update('table_login', $data);

			$arr = array('msg' => 'Data gagal disimpan', 'success' => false);
 
           	if($update){
            	$arr = array('msg' => 'Data berhasil disimpan', 'success' => true);
           	}
          	echo json_encode($arr);

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

}
