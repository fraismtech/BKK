<!DOCTYPE html>
<!--[if IE 8]>         
<html class="no-js lt-ie9" lang="en">
<![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="en">
<!--<![endif]-->
<?php echo $page["head"]; ?>
<?php echo $page['main_js'];?>
<?php $nameurl = $this->uri->segment(1); ?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url();?><?php echo $nameurl; ?>">BKK <?php echo $detailSekolah[0]['nama_sekolah']; ?></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span> Menu
			</button>
			<?php $nameurl = $this->uri->segment(1); ?>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto menusBar">
					<li class="nav-item"><a href="<?php echo base_url();?><?php echo $nameurl; ?>" <?php if ($this->uri->segment(1) == $nameurl && $this->uri->segment(2) == '') { ?>
						class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Beranda</span></a></li>
						<li class="nav-item"><a href="<?php echo base_url();?><?php echo $nameurl; ?>/profil" <?php if ($this->uri->segment(1) == $nameurl && $this->uri->segment(2) == 'profil') { ?>
							class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Profil</span></a></li>
							<li class="nav-item"><a href="<?php echo base_url();?><?php echo $nameurl; ?>/kegiatan" <?php if ($this->uri->segment(1) == $nameurl && $this->uri->segment(2) == 'kegiatan' || $this->uri->segment(1) == $nameurl && $this->uri->segment(2) == 'kegiatandetail') { ?>
								class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Kegiatan</span></a></li>
					<!-- <li class="nav-item"><a href="<?php echo base_url();?><?php echo $nameurl; ?>/kontak" <?php if ($this->uri->segment(1) == $nameurl && $this->uri->segment(2) == 'kontak') { ?>
						class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Kontak</span></a></li> -->
						<li class="nav-item"><a href="<?php echo base_url();?><?php echo $nameurl; ?>/loker" <?php if ($this->uri->segment(1) == $nameurl && $this->uri->segment(2) == 'loker') { ?>
							class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Loker</span></a></li>
							<li class="nav-item"><a href="<?php echo base_url();?><?php echo $nameurl; ?>/mitra" <?php if ($this->uri->segment(1) == $nameurl && $this->uri->segment(2) == 'mitra') { ?>
								class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Mitra BKK</span></a></li>
								<li class="nav-item"><a href="<?php echo base_url();?><?php echo $nameurl; ?>/alumni" <?php if ($this->uri->segment(1) == $nameurl && $this->uri->segment(2) == 'alumni') { ?>
									class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Alumni</span></a></li>
					<!-- <li class="nav-item"><a href="<?php echo base_url();?>login" <?php if ($this->uri->segment(1) == 'login') { ?>
						class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Login</span></a></li>
						<li class="nav-item cta text-center openSearchbox"><button type="button" class="btn btn-info mt-2 w-100">Cari</button></li> -->
					</ul>
					<form action="" class="search-box">
						<button type="button" class="btn btn-sm float-right close-search-box"><i class="fas fa-times"></i></button> 
						<input type="text" class="text search-input" placeholder="Type here to search..." />
					</form>
				</div>
			</div>
		</nav>

		<?php echo $content;?>

		<footer class="ftco-footer ftco-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="ftco-footer-widget mb-4">
							<h2 class="ftco-heading-2">Disnaker <span class="text-info">Kota Depok</span></h2>
							<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<div class="rounded-social-buttons">
								<a class="social-button facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
								<a class="social-button twitter" href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
								<a class="social-button linkedin" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
								<a class="social-button youtube" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
								<a class="social-button instagram" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="ftco-footer-widget mb-4">
							<h2 class="ftco-heading-2">Hubungi Kami</h2>
							<ul class="" style="list-style: none;">
								<li><i class="fas fa-envelope"></i> Email : <a href="mailto:disnakerkotadepok@gmail.com" class="text-info" target="_blank">disnakerkotadepok@gmail.com</a></li>
								<li><i class="fas fa-phone"></i> Phone : <a href="#" class="text-info" target="_blank">disnakerkotadepok@gmail.com</a></li>
								<li><i class="fas fa-map-marker"></i> Alamat : <a href="#" class="text-info" target="_blank">Jl. Margonda Raya No.54, Depok, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16431</a></li>
							</ul>
							
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="ftco-footer-widget mb-4">
							<h2 class="ftco-heading-2">Link Site</h2>
							<ul class=""style="list-style: none;">
								<li><a href="<?php echo base_url();?>Home">Portal BKK Dinas</a></li>
								<li><a href="https://bkk.ditpsmk.net/">BKKDITPSMK</a></li>
								<li><a href="https://psmk.kemdikbud.go.id/">DITPSMK</a></li>
								<li><a href="https://psmk.kemdikbud.go.id/halo">PSMK</a></li>
								<li><a href="http://bkol.depok.go.id/">BKOLDEPOK</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="ftco-footer-widget mb-4">
							<h2 class="ftco-heading-2">Helpdesk</h2>
							<form class="text-center justify-content-center" id="formHelp" method="POST" action="<?php echo base_url(); ?><?php echo $nameurl; ?>/masukan">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="example@mail.com" required="">
								</div>
								<div class="form-group">
									<label>Masukan</label>
									<textarea class="form-control" placeholder="Isi masukan anda disini" name="masukan"></textarea>									
								</div>
								<button type="submit" class="btn btn-success float-right"><span id="heplText">Kirim</span></button>
								<!-- <button type="button" class="btn btn-info float-right mr-1"><i class="fab fa-whatsapp"></i> Hubungi Kami Melalui Whatsapp</button> -->
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="https://fraismediatech.com" target="_blank"><span class="text-info">Frais Mediatech</span></a>
						</p>
					</div>
				</div>
			</div>
		</footer>

		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
	</body>
	<script src="<?php echo base_url();?>assets/home/js/aos.js"></script>
	<script src="<?php echo base_url();?>assets/home/js/main.js"></script>

	</html>

<?php if ($this->session->flashdata('notif1')): ?>
    <script type="text/javascript">
      $(document).ready(function() {
        swal({
          title: "Berhasil !",
          text: "<?php echo $this->session->flashdata('notif1'); ?>",
          icon: "success",
          timer: 10000
        });
      });
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('notif2')): ?>
    <script type="text/javascript">
      $(document).ready(function() {
        swal({
          title: "Maaf !",
          text: "<?php echo $this->session->flashdata('notif2'); ?>",
          icon: "error",
          timer: 10000
        });
      });
    </script>
<?php endif; ?>
