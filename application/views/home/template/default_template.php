<!DOCTYPE html>
<!--[if IE 8]>         
<html class="no-js lt-ie9" lang="en">
<![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="en">
<!--<![endif]-->
<?php echo $page["head"]; ?>
<?php echo $page['main_js'];?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url();?>">BKK Kota Depok</a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto menusBar">
					<li class="nav-item"><a href="<?php echo base_url();?>" <?php if ($this->uri->segment(1) == '') { ?>
						class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Beranda</span></a></li>
					<!-- <li class="nav-item"><a href="<?php echo base_url();?>Home/tentang" <?php if ($this->uri->segment(2) == 'tentang') { ?>
						class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Tentang Kami</span></a></li>
					<li class="nav-item"><a href="<?php echo base_url();?>Home/sebaran" <?php if ($this->uri->segment(2) == 'sebaran') { ?>
						class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Sebaran</span></a></li> -->
					<li class="nav-item"><a href="<?php echo base_url();?>daftar" <?php if ($this->uri->segment(1) == 'daftar') { ?>
					class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Daftar</span></a></li>
					<li class="nav-item"><a href="<?php echo base_url();?>login" <?php if ($this->uri->segment(1) == 'login') { ?>
						class="nav-link nav-active" <?php }else{ ?> class="nav-link" <?php } ?>><span>Login</span></a></li>
					<li class="nav-item cta text-center openSearchbox"><button type="button" class="btn btn-info mt-2 w-100">Cari</button></li>
				</ul>
				<form action="<?php echo base_url(); ?>Home/pencarian" class="search-box">
					<button type="button" class="btn btn-sm float-right close-search-box"><i class="fas fa-times"></i></button> 
					<input type="text" name="cari" class="text search-input" placeholder="Type here to search..." />
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
						<form class="text-center justify-content-center" id="formHelp" method="POST" action="<?php echo base_url(); ?>Daftar/tanggapan">
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

<!-- <script type="text/javascript">
$(document).ready(function(){
    $('#heplText').html('Kirim');
    $('#formHelp').submit(function(e){
        e.preventDefault();
        $('#heplText').html('Mengirim ...');
        var url = '<?php echo base_url(); ?>';
        var mitra = $('#formHelp').serialize();
        var save = function(){

            $.ajax({
                type: 'POST',
                url: url + 'daftar/tanggapan',
                dataType: 'json',
                data: mitra,
                success:function(res){
                    $('#heplText').html('Kirim');
                    console.log(res.success);
                    if(res.success == true){  
                        swal({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success",
                        }); 
                        $('#formHelp')[0].reset();
                    }
                    else {
                        swal({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error",
                        });
                    }
                    // if(response.error){
                    //     swal({
                    //         title: "Maaf!",
                    //         text: "Data Gagal Disimpan!",
                    //         icon: "error",
                    //     });
                    // }
                    // else{
                    //     swal({
                    //         title: "Berhasil!",
                    //         text: "Data Berhasil Disimpan!",
                    //         icon: "success",
                    //     });
                        
                    // }
                }
            });
        };
        setTimeout(save, 1000);
        table.ajax.reload();
    });
    $(document).on('click', '#clearMsg', function(){
        $('#responseDiv').hide();
    });
});
</script> -->
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
