<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Auth", "auth");
		$this->load->model("M_Dashboard", "dashboard");
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
			if ($this->session->userdata('level_user') == '1') {
				redirect('dashboardBkk/index');
			}
			if ($this->session->userdata('level_user') == '2') {
				redirect('dashboard/index');
			}
		} else {
			$id_kota = '3276';
			$path = "";
			$data = array(
				"page" => $this->load("Bursa Kerja Khusus Kota Depok - Daftar", $path),
				"content" => $this->load->view('daftar', false, true),
				"kecamatan" => $this->dashboard->kecamatan($id_kota),
			);
			$this->load->view('daftar', $data);
		}
	}

	public function get_kelurahan()
	{
		$kec = $this->input->post('kec');

		echo $this->dashboard->get_kelurahan($kec);

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

    // Registrasi User

	public function registrasi_user()
	{
		// try {
		// 	date_default_timezone_set('Asia/Jakarta');

		// 	$npsn 			= $this->input->post('npsn');
		// 	$nama_sekolah 	= $this->input->post('nama_sekolah');
		// 	$alamat  		= $this->input->post('alamat_sekolah');
		// 	$kecamatan  	= $this->input->post('kecamatan');
		// 	$kelurahan  	= $this->input->post('kelurahan');
		// 	$nama_operator 	= $this->input->post('nama_operator');
		// 	$email   		= $this->input->post('alamat_email');
		// 	$no_hp   		= $this->input->post('no_hp');
		// 	$username 		= $this->input->post('username');
		// 	$password   	= $this->input->post('password');
		// 	$ijin_bkk 		= $this->input->post("ijin");
		// 	$tanggal 		= date('Y-m-d', strtotime($this->input->post("tanggal_ijin")));
		// 	$no_ijin 		= $this->input->post("no_ijin");
  //           // $level   		= $this->input->post('level');
		// 	$date_created  	= date("Y-m-d H:i:s");


		// 	$this->load->library('PHPMailer');
		// 	$this->load->library('SMTP');
		// 	$email_admin = 'disnaker.depok@gmail.com';
		// 	$nama_admin = 'noreply-BKK';
		// 	$password_admin = '2014umar';
		// 	// $email = 'gilangpermana1407@gmail.com';

		// 	$mail = new PHPMailer;
		// 	$mail->isSMTP();  
		// 	$mail->Charset  = 'UTF-8';
		// 	$mail->IsHTML(true);
		// 	// $mail->SMTPDebug = 1;
		// 	$mail->SMTPAuth = true;
		// 	$mail->Host = 'smtp.gmail.com'; 
		// 	$mail->Port = 587;
		// 	// $mail->SMTPSecure = 'ssl';
		// 	$mail->Username = $email_admin;
		// 	$mail->Password = $password_admin;
		// 	// $mail->Mailer   = 'smtp';
		// 	$mail->WordWrap = 100;       

		// 	$mail->From = $email_admin;
		// 	$mail->FromName = $nama_admin;
		// 	$mail->addAddress($email);
		// 	$mail->Subject          = 'Email Verifikasi Akun BKK';
		// 	$mail_data['subject']   = 'Email Verifikasi Akun BKK';
		// 	$mail_data['npsn']   	= $npsn;
		// 	$mail_data['username']  = $username;
		// 	$mail_data['password']  = $password;
		// 	$message = $this->load->view('email_temp', $mail_data, TRUE);
		// 	$mail->Body = $message;

		// 	if ($mail->send()) {
		// 		if(isset($_FILES["file"]["name"])) {  
		// 			$config['upload_path'] = './assets/upload/file';  
		// 			$config['allowed_types'] = 'pdf|docx|doc'; 

		// 			$this->load->library('upload', $config); 

		// 			if(!$this->upload->do_upload('file')) {  
		// 				$error =  $this->upload->display_errors(); 
		// 				echo json_encode(array('msg' => $error, 'success' => false));
		// 			} else { 
		// 				$data = $this->upload->data();
		// 				$data = array(
		// 					'ijin_bkk' 		=> $ijin_bkk,
		// 					'no_ijin' 		=> $no_ijin,
		// 					'tgl_perijinan' => $tanggal,
		// 					'dokumen' 		=> $data['file_name'],
		// 				);
		// 				$this->db->insert('table_perijinan', $data);
		// 				$id_perijinan = $this->db->insert_id();

		// 				$data1 = array(
		// 					'npsn'        	=> $npsn,
		// 					'nama_sekolah' 	=> $nama_sekolah,
		// 					'alamat_sekolah'=> $alamat,
		// 					'kecamatan' 	=> $kecamatan,
		// 					'kelurahan' 	=> $kelurahan,
		// 				);
		// 				$this->db->insert('table_sekolah', $data1);
		// 				$id_sekolah = $this->db->insert_id();

		// 				$data2 = array(
		// 					'username' 		=> $username,
		// 					'password'      => md5($password),
		// 					'nama_operator'	=> $nama_operator,
		// 					'email' 		=> $email,
		// 					'no_hp' 		=> $no_hp,
		// 					'id_sekolah' 	=> $id_sekolah,
		// 					'id_perijinan' 	=> $id_perijinan,
		// 					'level' 		=> '1',
		// 					'date_created' 	=> $date_created,
		// 				);  

		// 				$this->db->insert('table_login', $data2); 
		// 				$getId = $this->db->insert_id();

		// 				$arr = array('msg' => 'Silahkan isi data dengan benar!', 'error' => false);

		// 				if($getId){
		// 					$arr = array('msg' => 'Silahkan cek email untuk verifikasi data!', 'success' => true);
		// 				}
		// 			}
		// 		}  else {
		// 			$npsn 			= $this->input->post('npsn');
		// 			$nama_sekolah 	= $this->input->post('nama_sekolah');
		// 			$alamat  		= $this->input->post('alamat_sekolah');
		// 			$kecamatan  	= $this->input->post('kecamatan');
		// 			$kelurahan  	= $this->input->post('kelurahan');
		// 			$nama_operator 	= $this->input->post('nama_operator');
		// 			$email   		= $this->input->post('alamat_email');
		// 			$no_hp   		= $this->input->post('no_hp');
		// 			$username 		= $this->input->post('username');
		// 			$password   	= $this->input->post('password');
		// 			$ijin_bkk 		= $this->input->post("ijin");
		// 			$tanggal 		= date('Y-m-d', strtotime($this->input->post("tanggal_ijin")));
		// 			$no_ijin 		= $this->input->post("no_ijin");
  //           	// $level   		= $this->input->post('level');
		// 			$date_created  	= date("Y-m-d H:i:s");

		// 			$data = array(
		// 				'ijin_bkk' 		=> $ijin_bkk,
		// 			);
		// 			$this->db->insert('table_perijinan', $data);
		// 			$id_perijinan = $this->db->insert_id();

		// 			$data1 = array(
		// 				'npsn'        	=> $npsn,
		// 				'nama_sekolah' 	=> $nama_sekolah,
		// 				'alamat_sekolah'=> $alamat,
		// 				'kecamatan' 	=> $kecamatan,
		// 				'kelurahan' 	=> $kelurahan,
		// 				'status' 		=> '0',
		// 				'notif' 		=> '1',
		// 			);
		// 			$this->db->insert('table_sekolah', $data1);
		// 			$id_sekolah = $this->db->insert_id();

		// 			$data2 = array(
		// 				'username' 		=> $username,
		// 				'password'      => md5($password),
		// 				'nama_operator'	=> $nama_operator,
		// 				'email' 		=> $email,
		// 				'no_hp' 		=> $no_hp,
		// 				'id_sekolah' 	=> $id_sekolah,
		// 				'id_perijinan' 	=> $id_perijinan,
		// 				'level' 		=> '1',
		// 				'date_created' 	=> $date_created,
		// 			);  

		// 			$this->db->insert('table_login', $data2); 
		// 			$getId = $this->db->insert_id();

		// 			$arr = array('msg' => 'Silahkan isi data dengan benar!', 'error' => false);

		// 			if($getId){
		// 				$arr = array('msg' => 'Silahkan cek email untuk verifikasi data!', 'success' => true);
		// 			}
		// 		}
		// 	} else {
		// 		$arr = array('msg' => 'Mailer Error: ' . $mail->ErrorInfo, 'error' => true);
		// 	}
		// 	echo json_encode($arr);

		// } catch (Exception $e) {
		// 	redirect('daftar');
		// }

    	try {
			date_default_timezone_set('Asia/Jakarta');

			$npsn 			= $this->input->post('npsn');
			$nama_sekolah 	= $this->input->post('nama_sekolah');
			$alamat  		= $this->input->post('alamat_sekolah');
			$kecamatan  	= $this->input->post('kecamatan');
			$kelurahan  	= $this->input->post('kelurahan');
			$nama_operator 	= $this->input->post('nama_operator');
			$email   		= $this->input->post('alamat_email');
			$no_hp   		= $this->input->post('no_hp');
			$username 		= $this->input->post('username');
			$password   	= $this->input->post('password');
			$ijin_bkk 		= $this->input->post("ijin");
			$tanggal 		= date('Y-m-d', strtotime($this->input->post("tanggal_ijin")));
			$no_ijin 		= $this->input->post("no_ijin");
            // $level   		= $this->input->post('level');
			$date_created  	= date("Y-m-d H:i:s");

			if(isset($_FILES["file"]["name"])) {  
				$config['upload_path'] = './assets/upload/file';  
				$config['allowed_types'] = 'pdf|docx|doc'; 

				$this->load->library('upload', $config); 

				if(!$this->upload->do_upload('file')) {  
					$error =  $this->upload->display_errors(); 
					echo json_encode(array('msg' => $error, 'success' => false));
				} else { 
					$data = $this->upload->data();
					$data = array(
						'ijin_bkk' 		=> $ijin_bkk,
						'no_ijin' 		=> $no_ijin,
						'tgl_perijinan' => $tanggal,
						'dokumen' 		=> $data['file_name'],
					);
					$this->db->insert('table_perijinan', $data);
					$id_perijinan = $this->db->insert_id();

					$data1 = array(
						'npsn'        	=> $npsn,
						'nama_sekolah' 	=> $nama_sekolah,
						'alamat_sekolah'=> $alamat,
						'kecamatan' 	=> $kecamatan,
						'kelurahan' 	=> $kelurahan,
						'status' 		=> '0',
						'notif' 		=> '1',
					);
					$this->db->insert('table_sekolah', $data1);
					$id_sekolah = $this->db->insert_id();

					$data2 = array(
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

					$this->db->insert('table_login', $data2); 
					$getId = $this->db->insert_id();

					$arr = array('msg' => 'Silahkan isi data dengan benar!', 'error' => false);

					if($getId){
						$arr = array('msg' => 'Pendaftaran Akun Berhasil!', 'success' => true);
					}
				}
			} else {
				$npsn 			= $this->input->post('npsn');
				$nama_sekolah 	= $this->input->post('nama_sekolah');
				$alamat  		= $this->input->post('alamat_sekolah');
				$kecamatan  	= $this->input->post('kecamatan');
				$kelurahan  	= $this->input->post('kelurahan');
				$nama_operator 	= $this->input->post('nama_operator');
				$email   		= $this->input->post('alamat_email');
				$no_hp   		= $this->input->post('no_hp');
				$username 		= $this->input->post('username');
				$password   	= $this->input->post('password');
				$ijin_bkk 		= $this->input->post("ijin");
				$tanggal 		= date('Y-m-d', strtotime($this->input->post("tanggal_ijin")));
				$no_ijin 		= $this->input->post("no_ijin");
            	// $level   		= $this->input->post('level');
				$date_created  	= date("Y-m-d H:i:s");

				$data = array(
					'ijin_bkk' 		=> $ijin_bkk,
				);
				$this->db->insert('table_perijinan', $data);
				$id_perijinan = $this->db->insert_id();

				$data1 = array(
					'npsn'        	=> $npsn,
					'nama_sekolah' 	=> $nama_sekolah,
					'alamat_sekolah'=> $alamat,
					'kecamatan' 	=> $kecamatan,
					'kelurahan' 	=> $kelurahan,
					'status' 		=> '0',
					'notif' 		=> '1',
				);
				$this->db->insert('table_sekolah', $data1);
				$id_sekolah = $this->db->insert_id();

				$data2 = array(
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

				$this->db->insert('table_login', $data2); 
				$getId = $this->db->insert_id();

				$arr = array('msg' => 'Silahkan isi data dengan benar!', 'error' => false);

				if($getId){
					$arr = array('msg' => 'Pendaftaran Akun Berhasil!', 'success' => true);
				}
			}
			echo json_encode($arr);
		} catch (Exception $e) {
			redirect('daftar');
		}
	}

	public function Verifikasi()
	{
		$npsn = $this->uri->segment(3);
		$_id = $this->db->query("SELECT * FROM table_sekolah AS ts JOIN table_login AS tl ON ts.id_sekolah = tl.id_sekolah WHERE ts.npsn='$npsn'")->row();
		if ($_id->status == '1') {
			$this->session->set_flashdata("notif1", "Akun Anda Sudah Di Verifikasi");
			redirect('login');
		}
		$data = array(
			'status' => '1',
		); 
		$update = $this->db->where('npsn', $npsn);
		$this->db->update('table_sekolah', $data);

		$update1 = $this->db->where('id_sekolah', $_id->id_sekolah);
		$this->db->update('table_login', $data);

		if($update == TRUE && $update1 == TRUE) {
			$this->session->set_flashdata("notif1", "Akun Berhasil Di Verifikasi");
			redirect('login');
		} else {
			$this->session->set_flashdata("notif2", "Akun Gagal Di Verifikasi");
			redirect('login');
		}
	}

	public function tanggapan()
	{
		try {
			$output = array('error' => false);

			date_default_timezone_set('Asia/Jakarta');

			$email 			= $this->input->post('email');
			$masukan 		= $this->input->post('masukan');
			$date_created  	= date("Y-m-d H:i:s");

			$data = array(
				'email' 		=> $email,
				'pesan' 		=> $masukan,
				'tanggal_pesan' => $date_created,
			);
			$simpanHelp = $this->db->insert('table_helpdesk', $data);

			if($simpanHelp) {
				$this->session->set_flashdata("notif1", "Tanggapan Anda Berhasil Dikirim");
				redirect('');
			} else {
				$this->session->set_flashdata("notif2", "Data Gagal Dikirim");
				redirect('');
			}

		} catch (Exception $e) {

		}
	}

	public function sendmail(){
		$this->load->library('PHPMailer');
		$this->load->library('SMTP');
		$email_admin = 'disnaker.depok@gmail.com';
		$nama_admin = 'noreply-BKOL';
		$password_admin = '2014umar';

		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->Username = $email_admin;
		$mail->Password = $password_admin;
		/*$mail->SMTPSecure = 'tls';*/
		$mail->From = $email_admin;
		$mail->FromName = $nama_admin;
		$mail->addAddress('gilangpermana1407@gmail.com');
		/*$mail->addCC('cc@example.com');*/
		/*$mail->addBCC('bcc@example.com');*/
		$mail->WordWrap = 100;
		/*$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/
		/*$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/
		$mail->isHTML(true);
		$mail->Subject = "asd";
		$mail->Body    = "asdw";
		$mail->AltBody = "asdw";
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    // header("Location: ../docs/confirmSubmit.html");
			echo "success";
		}

	}

    // Edit User 
	public function updateProfile()
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
			redirect('dashboard');
		}
	}
	
}
