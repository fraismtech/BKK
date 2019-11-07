<?php
function timeago($date) {
	date_default_timezone_set('Asia/Jakarta');
	
	$timestamp = strtotime($date);	

	$strTime = array("second", "minute", "hour", "day", "month", "year");
	$length = array("60","60","24","30","12","10");

	$currentTime = time();
	if($currentTime >= $timestamp) {
		$diff     = time()- $timestamp;
		for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
		}

		$diff = round($diff);
		return $diff . " " . $strTime[$i] . "(s) ago ";
	}
}
?>
<!-- begin app-header -->
<header class="app-header top-bar">
	<!-- begin navbar -->
	<nav class="navbar navbar-expand-md">

		<!-- begin navbar-header -->
		<div class="navbar-header d-flex align-items-center">
			<a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
			<a class="navbar-brand" href="<?php echo base_url(); ?>dashboard">
				<img src="<?php echo base_url(); ?>assets/home/images/icon.png" class="img-fluid logo-desktop" alt="logo" />
				<img src="<?php echo base_url(); ?>assets/home/images/icon.png" class="img-fluid logo-mobile" alt="logo" />
				BKK KOTA DEPOK
			</a>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<i class="ti ti-align-left"></i>
		</button>
		<!-- end navbar-header -->
		<!-- begin navigation -->
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<div class="navigation d-flex">
				<ul class="navbar-nav nav-left">
					<li class="nav-item">
						<a href="javascript:void(0)" class="nav-link sidebar-toggle">
							<i class="ti ti-align-right"></i>
						</a>
					</li>
					<li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
						<a href="javascript:void(0)" class="nav-link expand">
							<i class="icon-size-fullscreen"></i>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav nav-right ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="ti ti-email"></i>
						</a>
						<div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
							<ul>
								<li class="dropdown-header bg-gradient p-4 text-white text-left">Messages
									<label class="label label-info label-round">6</label>
									<a href="#" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
										<span class="font-13"> Mark all as read</span></a>
								</li>
								<li class="dropdown-body">
									<ul class="scrollbar scroll_dark max-h-240">
										<li>
											<a href="javascript:void(0)">
												<div class="notification d-flex flex-row align-items-center">
													<div class="notify-icon bg-img align-self-center">
														<img class="img-fluid" src="<?php echo base_url(); ?>assets/dashboard/img/avtar/03.jpg" alt="user3">
													</div>
													<div class="notify-message">
														<p class="font-weight-bold">Brianing Leyon</p>
														<small>You will sail along until you...</small>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<div class="notification d-flex flex-row align-items-center">
													<div class="notify-icon bg-img align-self-center">
														<img class="img-fluid" src="<?php echo base_url(); ?>assets/dashboard/img/avtar/01.jpg" alt="user">
													</div>
													<div class="notify-message">
														<p class="font-weight-bold">Jimmyimg Leyon</p>
														<small>Okay</small>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<div class="notification d-flex flex-row align-items-center">
													<div class="notify-icon bg-img align-self-center">
														<img class="img-fluid" src="<?php echo base_url(); ?>assets/dashboard/img/avtar/02.jpg" alt="user2">
													</div>
													<div class="notify-message">
														<p class="font-weight-bold">Brainjon Leyon</p>
														<small>So, make the decision...</small>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<div class="notification d-flex flex-row align-items-center">
													<div class="notify-icon bg-img align-self-center">
														<img class="img-fluid" src="<?php echo base_url(); ?>assets/dashboard/img/avtar/04.jpg" alt="user4">
													</div>
													<div class="notify-message">
														<p class="font-weight-bold">Smithmin Leyon</p>
														<small>Thanks</small>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<div class="notification d-flex flex-row align-items-center">
													<div class="notify-icon bg-img align-self-center">
														<img class="img-fluid" src="<?php echo base_url(); ?>assets/dashboard/img/avtar/05.jpg" alt="user5">
													</div>
													<div class="notify-message">
														<p class="font-weight-bold">Jennyns Leyon</p>
														<small>How are you</small>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<div class="notification d-flex flex-row align-items-center">
													<div class="notify-icon bg-img align-self-center">
														<img class="img-fluid" src="<?php echo base_url(); ?>assets/dashboard/img/avtar/06.jpg" alt="user6">
													</div>
													<div class="notify-message">
														<p class="font-weight-bold">Demian Leyon</p>
														<small>I like your themes</small>
													</div>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="dropdown-footer">
									<a class="font-13" href="javascript:void(0)"> View All messages </a>
								</li>
							</ul>
						</div>
					</li>
				<?php if ($this->uri->segment(1) == "dashboardBkk" || $this->uri->segment(1) == "DashboardBkk") { ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fe fe-bell"></i>
							<?php if (empty($alumni_baru)) { ?>

							<?php }else{ ?>
								<span class="notify" id="a2">
									<span class="blink" id="b2"></span>
									<span class="dot" id="c2"></span>
								</span>
							<?php } ?>
						</a>
						<div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
							<ul>
								<li class="dropdown-header bg-gradient p-4 text-white text-left">Notifications
										<!-- <a href="#" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
											<span class="font-13"> Clear all</span></a> -->
								</li>
								<li class="dropdown-body min-h-auto nicescroll">
									<ul class="scrollbar scroll_dark max-h-auto">
										<?php if (empty($alumni_baru)) { ?>
											<li>
												<a href="javascript:void(0)">
													<div class="notification d-flex flex-row align-items-center">
														<div class="notify-message">
															<p class="font-weight-bold">Tidak Ada Notifikasi</p>
															<!-- <small><?= timeago($help->tanggal_pesan); ?></small> -->
														</div>
													</div>
												</a>
											</li>
										<?php }else{ ?>
											<li>
												<a href="javascript:void(0)" id="notif1">
													<div class="notification d-flex flex-row align-items-center">
														<div class="notify-icon bg-img align-self-center">
															<div class="bg-type bg-type-md">
																<span><?= $alumni_baru ?></span>
															</div>
														</div>
														<div class="notify-message">
															<p class="font-weight-bold">Alumni baru telah terdaftar</p>
															<!-- <small><?= timeago($help->tanggal_pesan); ?></small> -->
														</div>
													</div>
												</a>
											</li>
										<?php } ?>
									</ul>
								</li>
								<li class="dropdown-footer">
									<!-- <a class="font-13" href="javascript:void(0)"> View All Notifications
									</a> -->
								</li>
							</ul>
						</div>

					</li>
				<?php }else{ ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fe fe-bell"></i>
							<?php if (empty($bkk_baru)) { ?>

							<?php }else{ ?>
								<span class="notify" id="a">
									<span class="blink" id="b"></span>
									<span class="dot" id="c"></span>
								</span>
							<?php } ?>
						</a>
						<div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
							<ul>
								<li class="dropdown-header bg-gradient p-4 text-white text-left">Notifications
								<!-- <a href="#" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
									<span class="font-13"> Clear all</span></a> -->
								</li>
								<li class="dropdown-body min-h-auto nicescroll">
									<ul class="scrollbar scroll_dark max-h-auto">
										<?php if (empty($bkk_baru)) { ?>
											<li>
												<a href="javascript:void(0)">
													<div class="notification d-flex flex-row align-items-center">
														<div class="notify-message">
															<p class="font-weight-bold">Tidak Ada Notifikasi</p>
															<!-- <small><?= timeago($help->tanggal_pesan); ?></small> -->
														</div>
													</div>
												</a>
											</li>
										<?php }else{ ?>
											<li>
												<a href="javascript:void(0)" id="notif">
													<div class="notification d-flex flex-row align-items-center">
														<div class="notify-icon bg-img align-self-center">
															<div class="bg-type bg-type-md">
																<span><?= $bkk_baru ?></span>
															</div>
														</div>
														<div class="notify-message">
															<p class="font-weight-bold">Akun BKK baru telah terdaftar</p>
															<!-- <small><?= timeago($help->tanggal_pesan); ?></small> -->
														</div>
													</div>
												</a>
											</li>
										<?php } ?>
									</ul>
								</li>
								<li class="dropdown-footer">
									<!-- <a class="font-13" href="javascript:void(0)"> View All Notifications
									</a> -->
								</li>
							</ul>
						</div>

					</li>
				<?php } ?>
					<!-- <li class="nav-item">
						<a class="nav-link search" href="javascript:void(0)">
							<i class="ti ti-search"></i>
						</a>
						<div class="search-wrapper">
							<div class="close-btn">
								<i class="ti ti-close"></i>
							</div>
							<div class="search-content">
								<form>
									<div class="form-group">
										<i class="ti ti-search magnifier"></i>
										<input type="text" class="form-control autocomplete" placeholder="Search Here" id="autocomplete-ajax" autofocus="autofocus">
									</div>
								</form>
							</div>
						</div>
					</li> -->
					<li class="nav-item dropdown user-profile">
						<a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php if ($this->session->userdata('foto') == NULL) { ?>
								<img src="<?php echo base_url(); ?>assets/dashboard/img/avtar/02.jpg" alt="avtar-img">
								<span class="bg-success user-status"></span>
							<?php } else { ?>
								<img src="<?php echo base_url(); ?>assets/upload/image/user/<?= $this->session->userdata('foto') ?>" alt="avtar-img">
								<span class="bg-success user-status"></span>
							<?php } ?>
						</a>
						<div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
							<div class="bg-gradient px-4 py-3">
								<div class="d-flex align-items-center justify-content-between">
									<div class="mr-1">
										<h4 class="text-white mb-0"><?= $this->session->userdata('nama') ?></h4>
										<small class="text-white"><?= $this->session->userdata('email') ?></small>
									</div>
									<a href="javascript:void(0)" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" id="logout" data-original-title="Logout"> <i
										class="zmdi zmdi-power"></i></a>
								</div>
							</div>
							<div class="p-4">
								<a class="dropdown-item d-flex nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#profilAdmin">
									<i class="fa fa-user pr-2 text-success"></i> Profile</a>
								<a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
									<i class="fa fa-envelope pr-2 text-primary"></i> Inbox
									<span class="badge badge-primary ml-auto">6</span>
								</a>
								<a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
									<i class=" ti ti-settings pr-2 text-info"></i> Settings
								</a>
								<a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
									<i class="fa fa-compass pr-2 text-warning"></i> Need help?</a>
								<div class="row mt-2">
									<div class="col">
										<a class="bg-light p-3 text-center d-block" href="#">
											<i class="fe fe-mail font-20 text-primary"></i>
											<span class="d-block font-13 mt-2">My messages</span>
										</a>
									</div>
									<div class="col">
										<a class="bg-light p-3 text-center d-block" href="#">
											<i class="fe fe-plus font-20 text-primary"></i>
											<span class="d-block font-13 mt-2">Compose new</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- end navigation -->
	</nav>
	<!-- end navbar -->
</header>
<!-- end app-header -->
<!-- begin app-nabar -->
<aside class="app-navbar">
	<!-- begin sidebar-nav -->
	<div class="sidebar-nav scrollbar scroll_light">
		<ul class="metismenu " id="sidebarNav">
			<?php if ($this->uri->segment(1) == "dashboardBkk" || $this->uri->segment(1) == "DashboardBkk") { ?>
				<li class="nav-static-title">Dashboard</li>
				<li class="active"><a href="<?php echo base_url(); ?>dashboardBkk/index" aria-expanded="false"><i class="nav-icon ti ti-dashboard"></i><span class="nav-title">Dashboard</span></a> </li>
				<li class="nav-static-title">Menu</li>
				<li><a href="<?php echo base_url(); ?>dashboardBkk/slider_bkk" aria-expanded="false"><i class="nav-icon ti ti-desktop"></i><span class="nav-title">Slider Header</span></a> </li>
				<li><a href="<?php echo base_url(); ?>dashboardBkk/profil_bkk" aria-expanded="false"><i class="nav-icon ti ti-id-badge"></i><span class="nav-title">Profil</span></a> </li>
				<li><a href="<?php echo base_url(); ?>dashboardBkk/kegiatan_bkk" aria-expanded="false"><i class="nav-icon ti ti-package"></i><span class="nav-title">Kegiatan</span></a> </li>
				<li><a href="<?php echo base_url(); ?>dashboardBkk/loker_bkk" aria-expanded="false"><i class="nav-icon ti ti-pulse"></i><span class="nav-title">Loker</span></a> </li>
				<li><a href="<?php echo base_url(); ?>dashboardBkk/alumni_bkk" aria-expanded="false"><i class="nav-icon ti ti-clipboard"></i><span class="nav-title">Alumni</span></a> </li>
				<li><a href="<?php echo base_url(); ?>dashboardBkk/mitra_bkk" aria-expanded="false"><i class="nav-icon ti ti-user"></i><span class="nav-title">Mitra BKK</span></a> </li>
				<li><a href="<?php echo base_url(); ?>dashboardBkk/user_bkk" aria-expanded="false"><i class="nav-icon ti ti-briefcase"></i><span class="nav-title">User</span></a> </li>
			<?php }else{ ?>
				<li class="nav-static-title">Dashboard</li>
				<li class="active"><a href="<?php echo base_url(); ?>dashboard" aria-expanded="false"><i class="nav-icon ti ti-dashboard"></i><span class="nav-title">Dashboard</span></a> </li>
				<li class="nav-static-title">Menu</li>
				<li><a href="<?php echo base_url(); ?>dashboard/slider" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Slide Show</span></a> </li>
				<li><a href="<?php echo base_url(); ?>dashboard/databkk" aria-expanded="false"><i class="nav-icon ti ti-package"></i><span class="nav-title">Data BKK</span></a> </li>
				<li><a href="<?php echo base_url(); ?>dashboard/dataloker" aria-expanded="false"><i class="nav-icon ti ti-pulse"></i><span class="nav-title">Data Loker</span></a> </li>
				<li><a href="<?php echo base_url(); ?>dashboard/dataalumni" aria-expanded="false"><i class="nav-icon ti ti-clipboard"></i><span class="nav-title">Data Alumni</span></a> </li>
				<li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-notepad"></i><span class="nav-title">Laporan</span></a>
					<ul aria-expanded="false">
						<li> <a href='<?php echo base_url(); ?>dashboard/laporanBkk'>Laporan BKK</a> </li>
						<li> <a href='<?php echo base_url(); ?>dashboard/laporanAlumni'>Laporan Alumni</a> </li>
						<li> <a href='<?php echo base_url(); ?>dashboard/laporanMitraKerja'>Laporan Mitra Kerja</a> </li>
						<li> <a href='<?php echo base_url(); ?>dashboard/laporanKeterserapan'>Laporan Keterserapan</a> </li>
					</ul>
				</li>
				<li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-gift"></i><span class="nav-title">Data Master</span></a>
					<ul aria-expanded="false">
						<li> <a href='<?php echo base_url(); ?>dashboard/dataJurusan'>Data Jurusan SMK</a> </li>
						<li> <a href='<?php echo base_url(); ?>dashboard/dataPosisi'>Data Posisi Lowongan Kerja</a> </li>
						<li> <a href='<?php echo base_url(); ?>dashboard/dataKeterampilan'>Data Keterampilan</a> </li>
					</ul>
				</li>
				<li><a href="<?php echo base_url(); ?>dashboard/helpdesk" aria-expanded="false"><i class="nav-icon ti ti-headphone-alt"></i><span class="nav-title">Data Helpdesk</span></a> </li>
			<?php } ?>
		</ul>
	</div>
	<!-- end sidebar-nav -->
</aside>
<!-- end app-navbar -->
<?php foreach ($profil_user as $profil) { ?>
	<!-- Modal Edit -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="profilAdmin" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="panel-title">
						<h4>Profil</h4>
					</div>
					<button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
				</div>
				<div class="modal-body">
					<center><img id="foto" src="<?php echo base_url(); ?>assets/upload/image/user/<?= $profil->foto ?>" alt="gallery-img" class="img-circle" style="width: 50%; height: 50%;"></center>
					<form method="POST" id="profileForm" enctype="multipart/form-data">
						<input type="hidden" name="id_user" value="<?= $profil->id_user ?>">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" id="username" name="username" value="<?= $profil->username ?>" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" value="" id="password" required="" placeholder="******" id="password" onkeyup="cek_password()">
							<small id="pesan_password" class=""></small>
							<small class='text-danger' id="password-used" style='display:none'>* Username dan password tidak boleh sama!</small>
							<small class='text-success' id="password-available" style='display:none'>* Password bisa digunakan!</small>
						</div>
						<div class="form-group">
							<label class="control-label">Nama Operator*</label>
							<input type="text" class="form-control" name="nama_operator" value="<?= $profil->nama_operator ?>" required="">
						</div>
						<div class="form-group">
							<label class="control-label">Email*</label>
							<input type="text" class="form-control" name="email" value="<?= $profil->email ?>" required="">
						</div>
						<div class="form-group">
							<label>No. HP</label>
							<input type="text" class="form-control" name="no_hp" value="<?= $profil->no_hp ?>" required="">
						</div>
						<div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="file" class="form-control foto" placeholder="Foto" required="">
                            <p>Gambar JPG/PNG Max. 2Mb</p>
                        </div>
						<div class="form-footer">
							<button type="submit" class="btn btn-success mt-4 float-right" id="simpan2"><span id="textSlider">Simpan</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#logout').on('click', function () {
			var id =  $(this).data('id');
			swal({
				title: "Logout!",
				text: "Apakah anda yakin ingin logout?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((result) => {
				if (result) {
					window.location = "<?php echo base_url();?>logout";
				}
			})
		});
		$('#navbarDropdown3').on('click', function () {
			$('#a').remove();
			$('#b').remove();
			$('#c').remove();
		});
		$('#navbarDropdown4').on('click', function () {
			$('#a2').remove();
			$('#b2').remove();
			$('#c2').remove();
		});
		$('#notif').on('click', function () {
			var id =  '1';
			$.ajax({
				url:"<?php echo base_url(); ?>dashboard/notifNull",
				method:"POST",
				data:{id:id},
				success:function(data) {
					window.location = "<?php echo base_url();?>dashboard/databkk";
				}
			});
		});
		$('#notif1').on('click', function () {
			var id =  '1';
			$.ajax({
				url:"<?php echo base_url(); ?>dashboardBkk/notifNull",
				method:"POST",
				data:{id:id},
				success:function(data) {
					window.location = "<?php echo base_url();?>dashboardBkk/alumni_bkk";
				}
			});
		});
	});

	function cek_password(){
        var username = $("#username").val();
        var password = $("#password").val();

        if (username == password) {
            $("#password").css({ 'border-color': '#a94442'});
            $("#password-available").hide();
            $("#password-used").show();
            disableBtn1();
        } else {
            $("#password").css({ 'border-color': '#3c763d'});
            $("#password-used").hide();
            $("#password-available").show();
            enableBtn1();
        }
    }
</script>
<script type="text/javascript">
    $(".foto").change(function() {
        if (this.files && this.files[0] && this.files[0].name.match(/\.(jpg|png|jpeg|PNG|JPG|JPEG)$/) ) {
            if(this.files[0].size>2097152) {
                $('.foto').val('');
                alert('Batas Maximal Ukuran File 2MB !');
            }
            else {
                var reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
            }
        } else{
            $('.foto').val('');
            alert('Hanya File jpg/png Yang Diizinkan !');
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#textUpdate').html('Update');
        $('#profileForm').submit(function(e){
            e.preventDefault();
            $('#textUpdate').html('Mengupdate ...');
            $.ajax({  
                url:"<?php echo base_url(); ?>Daftar/updateProfile",   
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType: "json",
                success:function(res)  
                {  
                    $('#textUser').html('Simpan');
                    console.log(res.success);
                    if(res.success == true){  
                        swal({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });
                    }
                    else if(res.success == false){
                        swal({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error",
                        });
                    }
                    setTimeout(function(){
                        location.reload();
                    }, 1100);
                }  
            });
        });
    });
</script>