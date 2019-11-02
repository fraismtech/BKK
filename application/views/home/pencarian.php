<section class="ftco-section mt-4">
  <div class="container">
    <h2 class="text-center ftco-animate">Hasil pencarian:  <?= $this->input->GET('cari', TRUE); ?></h2>
    <br>
    <?php if (empty($lowongan) && empty($berita)) {
      echo'<br> <h2 class="text-center text-danger ftco-animate"> Pencarian Tidak Ditemukan </h2>'; 
    }?>
    <div class="row d-flex ftco-animate justify-content-center">
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

  <div class="container">
    <br>
    <div class="row d-flex ftco-animate">
      <?php foreach($berita as $kegiatan){ ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3 d-flex ftco-animate fadeInUp ftco-animated">
          <div class="blog-entry justify-content-end w-100">
            <a href="<?php echo base_url(); ?>Home/beritaDetail/<?= $kegiatan->id_kegiatan?>" class="block-20" style="background-image: url('<?php echo base_url(); ?>assets/upload/image/<?= $kegiatan->foto_kegiatan ?>');">
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
</section>

<?php foreach($lowongan as $loker){ ?> 
  <!-- The Modal -->
  <div class="modal fade" id="myModal<?= $loker->id_lowongan ?>">
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
                  <p style="color: #000;"><?= number_format($loker->gaji_per_bulan,0,',','.') ?></p>
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
  <?php } ?>