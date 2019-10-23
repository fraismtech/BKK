<section class="ftco-section mt-4">
  <div class="container">
    <br>
    <div class="row d-flex ftco-animate justify-content-center">
      <?php foreach ($model['lowongan'] as $loker) { ?>
      <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
        <div class="card">
          <div class="card-body">
            <a href="<?php echo base_url(); ?>Home/lowonganDetail/<?= $loker->id_lowongan ?>"><h5 class="text-info"><?= $loker->nama_lowongan ?></h5></a>
            <span class="badge badge-success"><?= $loker->nama_perusahaan ?></span>
            <p><?= $loker->uraian_pekerjaan ?></p>
            <a href="<?php echo base_url(); ?>Home/lowonganDetail/<?= $loker->id_lowongan ?>" class="btn btn-info float-right">Selengkapnya</a>
          </div>
        </div>
      </div>
      <?php } ?>
  
    </div>
    <?php echo $model['pagination']; ?>
    <!-- <ul class="pagination text-center justify-content-center">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item active"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul> -->
  </div>
</section>