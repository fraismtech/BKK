<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardBkk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Dashboard","dashboard");
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '1') {
				redirect('Bkk');
			}
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
              	if(!$this->upload->do_upload('file')) {  
                  	$error =  $this->upload->display_errors(); 
                  	echo json_encode(array('msg' => $error, 'success' => false));
              	} else {  
                   	$data = $this->upload->data();
                   	$data = array(
			            'tanggal_slider' => $tanggal,
			            'judul_slider' => $judul,
			            'foto_slider' => $data['file_name']
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

    public function ajax_list()
	{
		$id_user = $this->session->userdata('id_user');
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
	            data-tanggal="'.$slider->tanggal_slider.'"
	            data-judul="'.$slider->judul_slider.'"
	            data-foto="'.$slider->foto_slider.'"
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
    // End Of Ajax Serverside

	public function profil()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Profil", $path),
			"content" => $this->load->view('dashboardBkk/profil', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function kegiatan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kegiatan", $path),
			"content" => $this->load->view('dashboardBkk/kegiatan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function loker()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Lowongan Kerja", $path),
			"content" => $this->load->view('dashboardBkk/loker', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function alumni()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Alumni", $path),
			"content" => $this->load->view('dashboardBkk/alumni', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
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

}
