<?php $nameurl = $this->uri->segment(1); ?>
<section class="ftco-section mt-4">
 <div class="container">
  <br>
  <div class="row d-flex ftco-animate justify-content-center">
    <?php foreach ($keg['kegiatan'] as $kegiatan) { ?>
    <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
      <div class="blog-entry justify-content-end w-100">
        <a href="<?php echo base_url(); ?><?php echo $nameurl; ?>/kegiatandetail/<?= $kegiatan->id_kegiatan ?>" class="block-20" style="background-image: url('<?php echo base_url(); ?>assets/upload/image/kegiatan/<?= $kegiatan->foto_kegiatan ?>');">
        </a>
        <div class="text mt-3 mb-3 float-right d-block">
          <h3 class="heading"><a href="<?php echo base_url(); ?><?php echo $nameurl; ?>/kegiatandetail/<?= $kegiatan->id_kegiatan ?>"><?= $kegiatan->judul_kegiatan ?></a></h3>
          <p class="text-justify"><?= word_limiter($kegiatan->uraian_kegiatan, 25)?></em> </p>
          <a href="<?php echo base_url(); ?><?php echo $nameurl; ?>/kegiatandetail/<?= $kegiatan->id_kegiatan ?>" class="btn btn-info float-right">Selengkapnya</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <?php echo $keg['pagination'] ?>
  <!-- <ul class="pagination text-center justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul> -->
</div>
</section>