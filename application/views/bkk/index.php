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
        <br>
        <div class="ftco-counter-wrap">
          <div class="row no-gutters d-md-flex align-items-center justify-content-center align-items-stretch">
            <div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
              <a href="#">
                <div class="block-18">
                  <div class="text">
                    <div class="icon d-flex justify-content-center align-items-center">
                      <h1><i class="fas fa-home"></i></h1>
                    </div>
                    <span>Portal BKK Dinas</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
              <a href="https://bkk.ditpsmk.net/" target="_blank">
                <div class="block-18">
                  <div class="text">
                    <div class="icon d-flex justify-content-center align-items-center">
                      <h1><i class="fas fa-cubes"></i></h1>
                    </div>
                    <span>BKKDITPSMK</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
              <a href="https://psmk.kemdikbud.go.id/" target="_blank">
                <div class="block-18">
                  <div class="text">
                    <div class="icon d-flex justify-content-center align-items-center">
                      <h1><i class="fas fa-heart"></i></h1>
                    </div>
                    <span>DITPSMK</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
              <a href="https://psmk.kemdikbud.go.id/halo" target="_blank">
                <div class="block-18">
                  <div class="text">
                    <div class="icon d-flex justify-content-center align-items-center">
                      <h1><i class="fas fa-user"></i></h1>
                    </div>
                    <span>PSMK</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
              <a href="http://bkol.depok.go.id/" target="_blank">
                <div class="block-18">
                  <div class="text">
                    <div class="icon d-flex justify-content-center align-items-center">
                      <h1><i class="fas fa-cogs"></i></h1>
                    </div>
                    <span>BKOLDEPOK</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
 <div class="container">
  <h2 class="text-center ftco-animate">Kegiatan</h2>
  <br>
  <div class="row d-flex ftco-animate">
    <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
      <div class="blog-entry justify-content-end w-100">
        <a href="<?php echo base_url(); ?>Bkk/kegiatanDetail" class="block-20" style="background-image: url('<?php echo base_url(); ?>assets/home/images/bg_2.jpg');">
        </a>
        <div class="text mt-3 mb-3 float-right d-block">
          <h3 class="heading"><a href="<?php echo base_url(); ?>Bkk/kegiatanDetail">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h3>
          <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="<?php echo base_url(); ?>Bkk/kegiatanDetail" class="btn btn-info float-right">Selengkapnya</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
      <div class="blog-entry justify-content-end w-100">
        <a href="<?php echo base_url(); ?>Bkk/kegiatanDetail" class="block-20" style="background-image: url('<?php echo base_url(); ?>assets/home/images/bg_2.jpg');">
        </a>
        <div class="text mt-3 mb-3 float-right d-block">
          <h3 class="heading"><a href="<?php echo base_url(); ?>Bkk/kegiatanDetail">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h3>
          <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="<?php echo base_url(); ?>Bkk/kegiatanDetail" class="btn btn-info float-right">Selengkapnya</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
      <div class="blog-entry justify-content-end w-100">
        <a href="<?php echo base_url(); ?>Bkk/kegiatanDetail" class="block-20" style="background-image: url('<?php echo base_url(); ?>assets/home/images/bg_2.jpg');">
        </a>
        <div class="text mt-3 mb-3 float-right d-block">
          <h3 class="heading"><a href="<?php echo base_url(); ?>Bkk/kegiatanDetail">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h3>
          <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="<?php echo base_url(); ?>Bkk/kegiatanDetail" class="btn btn-info float-right">Selengkapnya</a>
        </div>
      </div>
    </div>
  </div>
</div>
<h2 class="text-center"><a class="btn btn-danger" href="<?php echo base_url(); ?>Bkk/kegiatan">Lihat Semua Kegiatan</a></h2>
</section>

<section class="ftco-section bg-info">
  <div class="container">
    <div class="row text-center d-block">
      <div class="col-md-12">
        <h2 class="text-center text-light ftco-animate"><b>Info Lowongan Kerja</b></h2>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card">
              <div class="card-body">
                <a href="<?php echo base_url(); ?>Bkk/lowonganDetail"><h5 class="text-info">Programmer</h5></a>
                <span class="badge badge-success">CV. Frais Mediatech</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
                <a href="<?php echo base_url(); ?>Bkk/lowonganDetail" class="btn btn-info float-right">Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card">
              <div class="card-body">
                <a href="<?php echo base_url(); ?>Bkk/lowonganDetail"><h5 class="text-info">Programmer</h5></a>
                <span class="badge badge-success">CV. Frais Mediatech</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
                <a href="<?php echo base_url(); ?>Bkk/lowonganDetail" class="btn btn-info float-right">Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card">
              <div class="card-body">
                <a href="<?php echo base_url(); ?>Bkk/lowonganDetail"><h5 class="text-info">Programmer</h5></a>
                <span class="badge badge-success">CV. Frais Mediatech</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
                <a href="<?php echo base_url(); ?>Bkk/lowonganDetail" class="btn btn-info float-right">Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card">
              <div class="card-body">
                <a href="<?php echo base_url(); ?>Bkk/lowonganDetail"><h5 class="text-info">Programmer</h5></a>
                <span class="badge badge-success">CV. Frais Mediatech</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
                <a href="<?php echo base_url(); ?>Bkk/lowonganDetail" class="btn btn-info float-right">Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card">
              <div class="card-body">
                <a href="<?php echo base_url(); ?>Bkk/lowonganDetail"><h5 class="text-info">Programmer</h5></a>
                <span class="badge badge-success">CV. Frais Mediatech</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
                <a href="<?php echo base_url(); ?>Bkk/lowonganDetail" class="btn btn-info float-right">Selengkapnya</a>
              </div>
            </div>
          </div>
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

<!-- <section class="ftco-section">
  <div class="container">
    <div class="row d-block">
      <div class="col-md-12">
        <h2 class="text-center text-info ftco-animate"><b>Form Alumni</b></h2>
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="" class="form-control" placeholder="Nama Lengkap Anda">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="" class="form-control">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control"></textarea>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Kecamatan</label>
              <select class="form-control">
                <option>Kecamatan 1</option>
                <option>Kecamatan 2</option>
                <option>Kecamatan 3</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Kelurahan</label>
              <select class="form-control">
                <option>Kelurahan 1</option>
                <option>Kelurahan 2</option>
                <option>Kelurahan 3</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>No Handphone</label>
              <input type="number" name="" class="form-control" placeholder="No Handphone ">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Tahun Masuk</label>
              <select class="form-control">
                <option>2019</option>
                <option>2018</option>
                <option>2017</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Tahun Lulus</label>
              <select class="form-control">
                <option>2019</option>
                <option>2018</option>
                <option>2017</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Alamat Email</label>
              <input type="email" name="" class="form-control" placeholder="example@mail.com">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Status</label>
              <select class="form-control">
                <option>Wirausaha</option>
                <option>Bekerja</option>
                <option>Belum</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Pengalaman Kerja</label>
               <input type="text" name="" class="form-control" placeholder="Pengalaman Kerja Anda">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Keterampilan</label>
               <input type="text" name="" class="form-control" placeholder="Keterampilan Anda">
            </div>
          </div>
        </div>
        <div class="text-center">
        <button class="btn btn-success">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</section> -->