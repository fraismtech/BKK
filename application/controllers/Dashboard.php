<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Dashboard_Pusat", "dashboard");
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
			$id_sekolah 	= $this->input->post('sekolah');
			$nama_jurusan 	= $this->input->post('nama_jurusan');

	        $data = array(
	            'id_sekolah' 	=> $id_sekolah,
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
			$id_sekolah 	= $this->input->post('sekolah');
			$nama_jurusan 	= $this->input->post('nama_jurusan');

	        $data = array(
	            'id_sekolah' 	=> $id_sekolah,
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
			$row[] = $alumni->status;
			// $row[] = '
	  //             	<a href="'.base_url().'dashboardBkk/alumniEdit/'.$alumni->id_alumni.'" title="Edit Data">
	  //           		<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
	  //           	</a>
		 //            <button class="btn btn-sm btn-danger hapus-alumni" data-toggle="modal" id="id" data-toggle="modal" data-id="'.$alumni->id_alumni.'" title="Hapus Data">
		 //            	<i class="fa fa-trash"></i>
		 //            </button>';

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
			$row[] = $jurusan->nama_sekolah;
			$row[] = $jurusan->nama_jurusan;
			$row[] = '
	              <a
	            href="javascript:void(0)"
	            data-id="'.$jurusan->id_jurusan.'"
	            data-sekolah="'.$jurusan->nama_sekolah.'"
	            data-id_sekolah="'.$jurusan->id_sekolah.'"
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
			$row = array();
			$row[] = $no.'.';
			$row[] = $bkk->npsn;
			$row[] = $bkk->nama_sekolah;
			$row[] = $bkk->alamat_sekolah.', '.$bkk->kelurahan.', '.$bkk->kecamatan;
			$row[] = $bkk->no_ijin;
			$row[] = date('d M Y', strtotime($bkk->tgl_perijinan));
			$row[] = '<a class="view popup portfolio-img" href="'.base_url().'assets/upload/struktur_bkk/'.$bkk->struktur.'">'.$bkk->struktur.'</a>';
			$row[] = '<a class="view popup portfolio-img" href="'.base_url().'assets/upload/file/'.$bkk->dokumen.'">'.$bkk->dokumen.'</a>';
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

		$list = $this->dashboard->get_datatables_bkk();
		$data = array();
		$no = 1;
		foreach ($list as $bkk) {
			$row = array();
			$row[] = $no.'.';
			$row[] = $bkk->npsn;
			$row[] = $bkk->nama_sekolah;
			$row[] = $bkk->alamat_sekolah;
			$row[] = $bkk->kecamatan;
			$row[] = $bkk->kelurahan;
			$row[] = $bkk->no_ijin;
			$row[] = date('d M Y', strtotime($bkk->tgl_perijinan));
			$data[] = $row;
			$no++;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dashboard->count_all_bkk(),
						"recordsFiltered" => $this->dashboard->count_filtered_bkk(),
						"data" => $data,
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
			$row[] = $mitra->alamat_lengkap.', '.$mitra->kelurahan.', '.$mitra->kecamatan.', '.$mitra->kota.', '.$mitra->provinsi.', '.$mitra->kode_pos;
			$row[] = $mitra->no_telp;
			$row[] = $mitra->email;
			$row[] = $mitra->bidang_usaha;
			$row[] = $mitra->nama_cp;
			$row[] = $mitra->jabatan_cp;
			$row[] = $mitra->no_telp_cp;
			$row[] = $mitra->jenis_kemitraan;
			$row[] = date('d M Y', strtotime($mitra->dari)).' - '.date('d M Y', strtotime($mitra->sampai));
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
	
}
