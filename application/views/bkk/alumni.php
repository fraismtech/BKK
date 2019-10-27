<?php $nameurl = $this->uri->segment(1); ?>
<section class="ftco-section">
 <div class="container">
  <br>
  <div class="row mt-4 ftco-animate justify-content-center">
    <div class="col-md-6 col-lg-3 ftco-animate">
      <div class="staff card pt-3">
        <div class="img-wrap d-flex align-items-stretch">
          <div class="img align-self-stretch" style="background-image: url(<?php echo base_url();?>assets/home/images/bg_1.jpg);"></div>
        </div>
        <div class="text d-flex align-items-center pt-3 text-center">
          <div>
            <h3 class="mb-2">Lloyd Wilson</h3>
            <span class="position mb-4">CEO, Founder</span>
            <div class="faded">
              <ul class="ftco-social text-center">
                <li class="ftco-animate"><a href="#"><span class="fab fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-google-plus"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 ftco-animate">
      <div class="staff card pt-3">
        <div class="img-wrap d-flex align-items-stretch">
          <div class="img align-self-stretch" style="background-image: url(<?php echo base_url();?>assets/home/images/bg_2.jpg);"></div>
        </div>
        <div class="text d-flex align-items-center pt-3 text-center">
          <div>
            <h3 class="mb-2">Rachel Parker</h3>
            <span class="position mb-4">Business Lawyer</span>
            <div class="faded">
              <ul class="ftco-social text-center">
                <li class="ftco-animate"><a href="#"><span class="fab fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-google-plus"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 ftco-animate">
      <div class="staff card pt-3">
        <div class="img-wrap d-flex align-items-stretch">
          <div class="img align-self-stretch" style="background-image: url(<?php echo base_url();?>assets/home/images/bg_3.jpg);"></div>
        </div>
        <div class="text d-flex align-items-center pt-3 text-center">
          <div>
            <h3 class="mb-2">Ian Smith</h3>
            <span class="position mb-4">Insurance Lawyer</span>
            <div class="faded">
              <ul class="ftco-social text-center">
                <li class="ftco-animate"><a href="#"><span class="fab fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-google-plus"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 ftco-animate">
      <div class="staff card pt-3">
        <div class="img-wrap d-flex align-items-stretch">
          <div class="img align-self-stretch" style="background-image: url(<?php echo base_url();?>assets/home/images/bg_1.jpg);"></div>
        </div>
        <div class="text d-flex align-items-center pt-3 text-center">
          <div>
            <h3 class="mb-2">Alicia Henderson</h3>
            <span class="position mb-4">Criminal Law</span>
            <div class="faded">
              <ul class="ftco-social text-center">
                <li class="ftco-animate"><a href="#"><span class="fab fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-google-plus"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <ul class="pagination text-center justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row d-block">
      <div class="col-md-12">
        <h2 class="text-center text-info ftco-animate"><b>Form Alumni</b></h2>
        <form method="post" action="<?php echo base_url(); ?>
        <input type="hidden" name="id_sekolah" value="<?= $id_sekolah ?>">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>NISN</label>
              <input type="text" name="nisn" class="form-control" placeholder="NISN" required="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>NIK</label>
              <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan" required="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama" required="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <div class="row col-lg-12">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="L" required="">
                  <label class="form-check-label" for="gridRadios1">&nbsp;&nbsp;&nbsp;&nbsp;Laki-Laki &nbsp; </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="P" required="">
                  <label class="form-check-label" for="gridRadios2">&nbsp;&nbsp;&nbsp;&nbsp;Perempuan</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <div class='input-group date' id='datepicker-bottom-left'>
                <input class="form-control" type='text' name="tanggal_lahir" placeholder="Tanggal Lahir" required="" />
                <span class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" placeholder="Alamat" required=""></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>No. telp</label>
              <input type="number" name="no_telp" class="form-control" placeholder="No. Telp" required="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Jurusan</label>
              <select class="form-control" id="jurusan" name="jurusan" required="">
                <option value="" selected="">Pilih Jurusan</option>
                <?php foreach ($jurusan as $jrs) { ?>
                  <option value="<?= $jrs->nama_jurusan ?>"><?= $jrs->nama_jurusan ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tahun Lulus</label>
              <div class="input-group date form_year" data-date-format="yyyy" data-link-field="dtp_input4">
                <input class="form-control" type="text" value="" placeholder="Tahun Lulus" name="tahun_lulus" required="">
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" id="status" name="status" required="">
                <option value="" selected="">Pilih Status</option>
                <option value="Bekerja">Bekerja</option>
                <option value="Kuliah">Kuliah</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Belum Bekerja">Belum/Tidak Bekerja</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row" id="perusahaan">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Perusahaan</label>
              <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" required="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>No. Telp Perusahaan</label>
              <input type="number" name="no_telp_perusahaan" id="no_telp_perusahaan" class="form-control" placeholder="No Telp Perusahaan" required="">
            </div>
          </div>
        </div>
        <div class="row" id="perusahaan2">
          <div class="col-md-12">
            <div class="form-group">
              <label>Alamat Perusahaan</label>
              <textarea class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" placeholder="Alamat Perusahaan" required=""></textarea>
            </div>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-success mt-4" id="simpan"><span id="mitraText">Simpan</span></button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<script type="text/javascript">
  $(document).ready(function () {            
    $('#perusahaan').hide();
    $('#perusahaan2').hide();

    $('#nama_perusahaan').prop("disabled", false);
    $('#no_telp_perusahaan').prop("disabled", false);
    $('#alamat_perusahaan').prop("disabled", false);
    $('#status').change(function(){
      var stat = $(this).val();
      if (stat == 'Bekerja') {
        $('#perusahaan').show();
        $('#perusahaan2').show();
        $('#nama_perusahaan').prop("disabled", false);
        $('#no_telp_perusahaan').prop("disabled", false);
        $('#alamat_perusahaan').prop("disabled", false);
      } else {
        $('#perusahaan').hide();
        $('#perusahaan2').hide();
        $('#nama_perusahaan').prop("disabled", true);
        $('#no_telp_perusahaan').prop("disabled", true);
        $('#alamat_perusahaan').prop("disabled", true);
      }
    });

    $('.form_year').datetimepicker({
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 4,
      minView: 4,
      forceParse: 0
    });
  });
</script>
<!-- <script type="text/javascript">
$(document).ready(function(){
  $('#mitraText').html('Simpan');
  $('#simpan').attr('disabled', false);
  $('#mitraForm').submit(function(e){
    e.preventDefault();
    $('#mitraText').html('Menyimpan ...');
    $('#simpan').attr('disabled', true);
    var url = '<?php echo base_url(); ?>/<?= $nameurl ?>/';
    var user = $('#mitraForm').serialize();
    var save = function(){
      $.ajax({
        type: 'POST',
        url: url + 'addAlumni',
        dataType: 'json',
        data: user,
        success:function(response){
          $('#message').html(response.message);
          $('#mitraText').html('Simpan');
          $('#simpan').attr('disabled', false);
          if(response.error){
            swal({
              title: "Gagal Menyimpan!",
              text: "Silahkan isi data dengan benar!",
              icon: "error",
            });
          }
          else{
            swal({
              title: "Berhasil!",
              text: "Data Berhasil Disimpan!",
              icon: "success",
            });
            $('#mitraForm')[0].reset();
          }
        }
      });
      $('#mitraForm')[0].reset();
    }
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