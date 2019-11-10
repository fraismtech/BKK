<?php $nameurl = $this->uri->segment(1); ?>
<section class="ftco-section bg-light mt-5 mt-5-nomedia padding-ftco">
 <div class="container">
   <div class="row mt-3">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ftco-animate">
      <?php foreach($detailKegiatan as $kegiatan) { ?>
      <img src="<?php echo base_url(); ?>assets/upload/image/kegiatan/<?= $kegiatan->foto_kegiatan ?>" class="img-fluid mb-3 w-100">
      <?php } ?>
    </div>
  </div>
</div>
</section>

<section class="ftco-section">
  <div class="container">
    <!-- Tab panes -->
    <div class="row mt-4">
      <?php foreach($detailKegiatan as $kegiatan) { ?>
      <div class="col-lg-8 col-md-7 col-sm-12 col-12">
        <h3><b><?= $kegiatan->judul_kegiatan ?></b></h3>
        <small><?= date('d M Y', strtotime($kegiatan->tanggal_kegiatan)) ?></small>
        <p class="text-justify"><?= $kegiatan->uraian_kegiatan ?></p>
      </div>
      <?php } ?>
      <div class="col-lg-4 col-md-5 col-sm-12 col-12">
        <ul class="nav nav-tabs nav-justified">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#kegiatan">Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#lowongan">Lowongan</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane container active" id="kegiatan">
            <?php foreach($listKegiatan as $list) { ?>
            <div class="row mt-4">
              <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                <img src="<?php echo base_url(); ?>assets/upload/image/kegiatan/<?= $list->foto_kegiatan ?>" class="img-donatur2">
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                <h6 class="mb-0"><b><a href="<?php echo base_url(); ?><?php echo $nameurl; ?>/kegiatandetail/<?= $list->id_kegiatan ?>"><?= $list->judul_kegiatan ?></a></b></h6>
                <small><?= date('d M Y', strtotime($list->tanggal_kegiatan)) ?></small>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="tab-pane container fade" id="lowongan">
            <?php foreach($listLowongan as $list) { ?>
            <div class="row mt-4">
              <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                <img src="<?php echo base_url(); ?>assets/upload/image/mitra/<?= $list->logo_mitra ?>" class="img-donatur2">
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                <h5 class="mb-0"><b><a href="#" data-toggle="modal" data-target="#myModal<?= $list->id_lowongan ?>"><?= $list->nama_lowongan ?></a></b></h5>
                <h6 class="mb-0"><b><?= $list->nama_perusahaan ?></b></h6>
                <small><?= date('d M Y', strtotime($list->register_date)) ?></small>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php foreach($listLowongan as $loker){ ?> 
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
                <p style="color: #000;"><?= $loker->alamat ?></p>
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