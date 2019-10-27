<?php $nameurl = $this->uri->segment(1); ?>
<?php foreach($detailProfil as $profil) {?>
	<section class="hero-wrap js-fullheight" style="background: #00c6ff;
	background: -webkit-linear-gradient(to right, #00c6ff, #0072ff);
	background: linear-gradient(to right, #00c6ff, #0072ff);" data-section="home">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
			<div class="ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
				<img src="<?php echo base_url(); ?>assets/home/images/icon.png" class="col-lg-2 mb-3 col-4">
				<h2 class="m2-4 text-white text-center" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?= $profil->nama_sekolah ?></h2>
				<!-- <p class="" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Bersihkan harta dengan zakat yang mudah dan cepat, kapan saja ke lembaga dan program zakat terpercaya via Kitabisa.</p> -->
			</div>
		</div>
	</div>
</section>
<section class="ftco-section">
	<div class="container">
		<h2 class="text-center ftco-animate">Visi Dan Misi</h2>
		<br>
		<div class="row d-flex ftco-animate">
			<div class="col-lg-12">
				<div class="alert alert-inverse-info text-center">
					<p class="mb-0" style="color: #000;"><?= $profil->visi ?></p>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="alert alert-inverse-success text-center">
					<pre><?= $profil->misi ?></pre>
	  					<!-- <ul>
	  						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
	  						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
	  						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
	  						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
	  					</ul> -->
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </section>

	  <section class="ftco-section bg-light">
	  	<div class="container">
	  		<div class="row justify-content-center ftco-animate">
	  			<div class="col-lg-12">
	  				<h2 class="text-center ftco-animate"><b>Struktur BKK</b></h2>
	  			</div>
	  			<div class="col-lg-8">
	  				<img src="<?php echo base_url(); ?>assets/upload/struktur_bkk/<?= $profil->struktur?>" class="img-fluid">
	  			</div>
	  		</div>
	  	</div>
	  </section>
	<?php } ?>

	
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center ftco-animate">
				<div class="col-lg-12">
					<h2 class="text-center ftco-animate"><b>Mitra BKK</b></h2>
				</div>
				<?php foreach($mitra_bkk as $mitra){ ?>	
					<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
						<div class="card text-center">
							<div class="card-body">
								<a href="#" data-toggle="modal" data-target="#myModal<?= $mitra->id_mitra ?>"><h5 class="text-info mb-0"><?= $mitra->nama_perusahaan ?></h5></a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<?php foreach($mitra_bkk as $mitra){ ?>	
		<!-- The Modal -->
		<div class="modal" id="myModal<?= $mitra->id_mitra ?>">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Mitra Bursa Kerja Khusus</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body text-center">
						<!-- <img src="<?php echo base_url(); ?>assets/home/images/bg_2.jpg" class="img-fluid"> -->
						<h4><?= $mitra->nama_perusahaan ?></h4>
						<span class="badge badge-info"><?= $mitra->bidang_usaha ?></span>
						<p><?= $mitra->alamat_lengkap ?>, <?= $mitra->kelurahan ?>, <?= $mitra->kecamatan ?>, <?= $mitra->kota ?>, <?= $mitra->provinsi ?>, <?= $mitra->kode_pos ?></p>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div>
		<?php } ?>