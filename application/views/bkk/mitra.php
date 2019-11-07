<?php $nameurl = $this->uri->segment(1); ?>
<section class="ftco-section mt-4">
 <div class="container">
  <br>
  <div class="row d-flex ftco-animate justify-content-center">
    <?php foreach ($dataMitra['mitra'] as $mitra) { ?>
      <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
        <div class="card text-center">
          <div class="card-body">
            <a href="#" data-toggle="modal" data-target="#myModal<?= $mitra->id_mitra ?>"><h5 class="text-info mb-0"><?= $mitra->nama_perusahaan ?></h5></a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <?php echo $dataMitra['pagination'] ?>
  <!-- <ul class="pagination text-center justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul> -->
</div>
</section>
<?php foreach($dataMitra['mitra'] as $mitra){ ?> 
  <!-- The Modal -->
  <div class="modal fade" id="myModal<?= $mitra->id_mitra ?>">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Mitra Bursa Kerja Khusus</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center">
          <img src="<?php echo base_url(); ?>assets/upload/image/<?= $mitra->logo_mitra ?>" class="img-fluid"><br/>
          <h4><br><?= $mitra->nama_perusahaan ?></h4>
          <span class="badge badge-info"><?= $mitra->bidang_usaha ?></span>
          <p><?= $mitra->alamat ?></p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <?php } ?>