<section class="hero-wrap hero-wrap-2 margin-section-top">
  <div id="demo" class="carousel slide" data-ride="carousel">
    <!-- The slideshow -->
    <div class="carousel-inner">
      <?php 
      $no = 1;
      foreach ($slider as $slide) { ?>
      <div class="carousel-item <?php if($no <= 1){echo 'active';}?>">
        <img src="<?php echo base_url(); ?>assets/upload/image/<?= $slide->foto_slider; ?>" alt="Slider1" class="carousel-obj">
        <div class="carousel-caption">
          <h3 class="text-white"><?= $slide->judul_slider; ?></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button class="btn btn-info" type="button">Selengkapnya</button>
        </div>
      </div> 
      <?php 
        $no++;
      } ?>
      
      <!-- <div class="carousel-item">
        <img src="<?php echo base_url(); ?>assets/home/images/bg_2.jpg" alt="Slider2" class="carousel-obj">
        <div class="carousel-caption">
          <h3 class="text-white">Bursa Kerja Khusus Kota Depok</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button class="btn btn-info" type="button">Selengkapnya</button>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url(); ?>assets/home/images/bg_3.jpg" alt="Slider3" class="carousel-obj">
        <div class="carousel-caption">
          <h3 class="text-white">Bursa Kerja Khusus Kota Depok</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button class="btn btn-info" type="button">Selengkapnya</button>
        </div>
      </div> -->
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

  </div>
</section>

<section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img" id="section-counter">
  <div class="container">
    <div class="row d-md-flex align-items-center justify-content-end">
      <div class="col-lg-12">
        <div class="ftco-counter-wrap">
          <div class="row no-gutters d-md-flex align-items-center align-items-stretch">
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
              <div class="block-18">
                <div class="text">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <h1 class="text-white"><i class="fas fa-home"></i></h1>
                  </div>
                  <strong class="number" data-number="<?= $total_bkk; ?>"><?= $total_bkk; ?></strong>
                  <span>BKK</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
              <div class="block-18">
                <div class="text">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <h1><i class="fas fa-cubes"></i></h1>
                  </div>
                  <strong class="number" data-number="<?= $total_alumni; ?>"><?= $total_alumni; ?></strong>
                  <span>Alumni</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
              <div class="block-18">
                <div class="text">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <h1 class="text-white"><i class="fas fa-heart"></i></h1>
                  </div>
                  <strong class="number" data-number="<?= $total_mitra; ?>"><?= $total_mitra; ?></strong>
                  <span>Mitra Kerja</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
              <div class="block-18">
                <div class="text">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <h1><i class="fas fa-user"></i></h1>
                  </div>
                  <strong class="number" data-number="<?= $total_loker; ?>"><?= $total_loker; ?></strong>
                  <span>Lowongan Kerja</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <section class="ftco-section mt-4">
 <div class="container">
  <h2 class="text-center text-info ftco-animate"><b>Informasi BKK</b></h2>
  <div class="row d-flex ftco-animate justify-content-center">
    <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
      <div class="card w-100 p-2">
        <h6 class="text-center">Per Kecamantan</h6>
        <table class="table table-striped table-hover text-center">
          <thead class="bg-info text-white">
           <tr>
             <th>No</th>
             <th>Nama</th>
             <th>Total</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td>1</td>
             <td>Cilodong</td>
             <td>123</td>
           </tr>
           <tr>
             <td>1</td>
             <td>Cilodong</td>
             <td>123</td>
           </tr>
           <tr>
             <td>1</td>
             <td>Cilodong</td>
             <td>123</td>
           </tr>
           <tr>
             <td>1</td>
             <td>Cilodong</td>
             <td>123</td>
           </tr>
           <tr>
             <td>1</td>
             <td>Cilodong</td>
             <td>123</td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
   <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
    <div class="card w-100 p-2">
      <h6 class="text-center">Per Jurusan</h6>
      <table class="table table-striped table-hover text-center">
       <thead class="bg-info text-white">
         <tr>
           <th>No</th>
           <th>Nama</th>
           <th>2017</th>
           <th>2018</th>
           <th>Total</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <td>1</td>
           <td>RPL</td>
           <td>123</td>
           <td>123</td>
           <td>123</td>
         </tr>
         <tr>
           <td>1</td>
           <td>RPL</td>
           <td>123</td>
           <td>123</td>
           <td>123</td>
         </tr>
         <tr>
           <td>1</td>
           <td>RPL</td>
           <td>123</td>
           <td>123</td>
           <td>123</td>
         </tr>
         <tr>
           <td>1</td>
           <td>RPL</td>
           <td>123</td>
           <td>123</td>
           <td>123</td>
         </tr>
         <tr>
           <td>1</td>
           <td>RPL</td>
           <td>123</td>
           <td>123</td>
           <td>123</td>
         </tr>
       </tbody>
     </table>
   </div>
 </div>
 <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
  <div class="card w-100 p-2">
    <h6 class="text-center">BKK Lowongan</h6>
    <table class="table table-striped table-hover text-center">
     <thead class="bg-info text-white">
       <tr>
         <th>No</th>
         <th>Nama</th>
         <th>2017</th>
         <th>2018</th>
         <th>Total</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <td>1</td>
         <td>RPL</td>
         <td>123</td>
         <td>123</td>
         <td>123</td>
       </tr>
       <tr>
         <td>1</td>
         <td>RPL</td>
         <td>123</td>
         <td>123</td>
         <td>123</td>
       </tr>
       <tr>
         <td>1</td>
         <td>RPL</td>
         <td>123</td>
         <td>123</td>
         <td>123</td>
       </tr>
       <tr>
         <td>1</td>
         <td>RPL</td>
         <td>123</td>
         <td>123</td>
         <td>123</td>
       </tr>
       <tr>
         <td>1</td>
         <td>RPL</td>
         <td>123</td>
         <td>123</td>
         <td>123</td>
       </tr>
     </tbody>
   </table>
 </div>
</div>
</div>
</div>
</section> -->
<section class="ftco-section">
 <div class="container">
  <h2 class="text-center ftco-animate">Kegiatan</h2>
  <br>
  <div class="row d-flex ftco-animate">
    <?php foreach($berita as $kegiatan){ ?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3 d-flex ftco-animate fadeInUp ftco-animated">
      <div class="blog-entry justify-content-end w-100">
        <a href="<?php echo base_url(); ?>Home/beritaDetail/<?= $kegiatan->id_kegiatan?>" class="block-20" style="background-image: url('<?php echo base_url(); ?>assets/home/images/bg_2.jpg');">
        </a>
        <div class="text mt-3 mb-3 float-right d-block">
          <h3 class="heading"><a href="<?php echo base_url(); ?>Home/beritaDetail/<?= $kegiatan->id_kegiatan?>"><?= $kegiatan->judul_kegiatan ?></a></h3>
          <p class="text-justify">
            <?= word_limiter($kegiatan->uraian_kegiatan, 25)?> 
          </p>
          <a href="<?php echo base_url(); ?>Home/beritaDetail/<?= $kegiatan->id_kegiatan?>" class="btn btn-info float-right">Selengkapnya</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<h2 class="text-center"><a class="btn btn-danger" href="<?php echo base_url(); ?>Home/berita">Lihat Semua Kegiatan</a></h2>
</section>

<section class="ftco-section bg-info">
  <div class="container">
    <div class="row text-center d-block">
      <div class="col-md-12">
        <h2 class="text-center text-light ftco-animate"><b>Info Lowongan Kerja</b></h2>
        <div class="row justify-content-center">
          <?php foreach ($lowongan as $loker) { ?>
          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card">
              <div class="card-body"><h5 class="text-info"><?= $loker->nama_lowongan ?></h5>
                <span class="badge badge-success"><?= $loker->nama_perusahaan ?></span>
                <p><?= $loker->uraian_pekerjaan ?></p>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal<?= $loker->id_lowongan ?>"><button type="button" class="btn btn-info float-right">Selengkapnya</button></a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <br>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <a href="<?php echo base_url();?>Home/lowongan" class="btn btn-danger w-100 ftco-animate mb-1">Lihat Semua Lowongan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php foreach($lowongan as $loker): 
  $id_lowongan = $loker->id_lowongan; ?> 
<!-- The Modal -->
<div class="modal" id="myModal<?= $id_lowongan; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Lowongan Pekerjaan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body text-center">
        <!-- <img src="<?php echo base_url(); ?>assets/home/images/bg_2.jpg" class="img-fluid"> -->
        <h4><?= $loker->nama_lowongan ?></h4>
        <br><br>
        <div class="col-md-12 text-left">
          <form class="form-horizontal">
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Posisi Jabatan</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->nama_posisi_jabatan?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Nama Perusahaan</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->nama_perusahaan?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Alamat Perusahaan</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->alamat_lengkap ?>, <?= $loker->kelurahan ?>, <?= $loker->kecamatan ?>, <?= $loker->kota ?>, <?= $loker->provinsi ?> - <?= $loker->kode_pos ?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Pendidikan Minimal</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->nama_status_pendidikan?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Jumlah Pria Dibutuhkan</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->jml_pria?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Jumlah Wanita Dibutuhkan</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->jml_wanita?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Batas Umur</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->batas_umur?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Syarat Khusus</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->syarat_khusus?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Jam Kerja Perminggu</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->jam_kerja?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Gaji Perbulan</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->nama_posisi_jabatan?></p>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4" style="color: #000;"><b>Lokasi Penempatan</b></label>
              <div class="col-md-8">
                <p style="color: #000;"><?= $loker->penempatan?></p>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<?php endforeach; ?>