<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Auth", "auth");
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
		if ($this->session->has_userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level_user') == '2') {
				redirect('dashboard/index');
			}
			if ($this->session->userdata('level_user') == '1') {
				redirect('dashboardBkk/index');
			}
		} else {
			$path = "";
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Login", $path),
				"content" => $this->load->view('login', false, true),
			);
			$this->load->view('login', $data);
		}
	}

	// Auth Login
	public function auth_login()
	{
		try {

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $data = $this->auth->login($username, $password);

            if($data){
            	if ($data->status == '0') {
            		$this->session->set_flashdata("notif", "Akun anda belum terverifikasi");
            		redirect('login');
            	} else {
            		$newdata = array(
                        'username'  => $data->username,
                        'nama'  => $data->nama_operator,
                        'email'  => $data->email,
                        'level_user' => $data->level,
                        'id_sekolah' => $data->id_sekolah,
                        'id_perijinan' => $data->id_perijinan,
                        'logged_in' => TRUE,
                        'id'  => $data->id_user,
                    );
                    if ($data->level == '2' && $data->id_sekolah == NULL && $data->id_perijinan == NULL) {
		            	$this->session->set_userdata($newdata);
		            	$this->session->set_flashdata('notif','<div class="alert border-0 alert-success bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert"><strong>Selamat Datang '.$data->nama_operator.' !</strong> Bursa Kerja Khusus Kota Depok <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ti ti-close"></i></button></div>');
		            	redirect("Dashboard/index");
		            } elseif ($data->level == '1') {
		            	$this->session->set_userdata($newdata);
		            	$this->session->set_flashdata('notif','<div class="alert border-0 alert-success bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert"><strong>Selamat Datang '.$data->nama_operator.' !</strong> Bursa Kerja Khusus Kota Depok <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ti ti-close"></i></button></div>');
		            	redirect("DashboardBkk/index");
		            }
            	}
                
            }
            else{
            	$this->session->set_flashdata("notif", "Masukkan Username & Password Dengan Benar");
                redirect('login');
            }
		} catch(Exception $e) {
            redirect('login');
        }
	}

	public function logout()
	{
		$this->session->sess_destroy();
        redirect('Home');
	}
	
}
