<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Tambah Alumni</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url(); ?>/dashboardBkk/addAlumni" id="mitraForm" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="id_sekolah" value="<?= $this->session->userdata('id_sekolah'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" name="nisn" class="form-control" placeholder="NISN">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="row col-lg-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="L">
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-Laki &nbsp;
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="P">
                                        <label class="form-check-label" for="gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div class='input-group date' id='datepicker-bottom-left'>
                                    <input class="form-control" type='text' name="tanggal_lahir" placeholder="Tanggal Lahir" />
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
                                <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. telp</label>
                                <input type="number" name="no_telp" class="form-control" placeholder="No. Telp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan">
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
                                    <input class="form-control" type="text" value="" placeholder="Tahun Lulus" name="tahun_lulus">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status">
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
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telp Perusahaan</label>
                                <input type="number" name="no_telp_perusahaan" id="no_telp_perusahaan" class="form-control" placeholder="No Telp Perusahaan">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="perusahaan2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Perusahaan</label>
                                <textarea class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" placeholder="Alamat Perusahaan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4" id="simpan"><span id="mitraText">Simpan</span></button>
                        <a href="javascript:history.back();">
                            <button type="button" class="btn btn-warning mt-4" id="simpan"><span id="mitraText">Batal</span></button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {            
    $('.form_year').datetimepicker({
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 4,
        minView: 4,
        forceParse: 0
    });

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
});
</script>
<!-- 
<script type="text/javascript">
$("#provinsi").show(function(){
    var prov = $(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_kota",
        method:"POST",
        data:{prov:prov},
        success:function(data) {
            $('#kota').append(data);
        }
    });

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_provinsi",
        method:"POST",
        data:{prov:prov},
        success:function(data) {
            $('#prov').val(data);
        }
    });
});

$("#provinsi").change(function(){
    var prov = $(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_kota",
        method:"POST",
        data:{prov:prov},
        success:function(data) {
            $('#kota').html(data);
        }
    });

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_provinsi",
        method:"POST",
        data:{prov:prov},
        success:function(data) {
            $('#prov').val(data);
        }
    });
});

$("#kota").show(function(){
    var kota = $(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_kec",
        method:"POST",
        data:{kota:kota},
        success:function(data) {
            $('#kecamatan').append(data);
        }
    });

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_kota",
        method:"POST",
        data:{kota:kota},
        success:function(data) {
            $('#kab').val(data);
        }
    });
});

$("#kota").change(function(){
    var kota = $(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_kec",
        method:"POST",
        data:{kota:kota},
        success:function(data) {
            $('#kecamatan').html(data);
        }
    });

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_kota",
        method:"POST",
        data:{kota:kota},
        success:function(data) {
            $('#kab').val(data);
        }
    });
});

$("#kecamatan").show(function(){
    var kec = $(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_kel",
        method:"POST",
        data:{kec:kec},
        success:function(data) {
            $('#kelurahan').append(data);
        }
    });

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_kec",
        method:"POST",
        data:{kec:kec},
        success:function(data) {
            $('#kec').val(data);
        }
    });
});

$("#kecamatan").change(function(){
    var kec = $(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_kel",
        method:"POST",
        data:{kec:kec},
        success:function(data) {
            $('#kelurahan').html(data);
        }
    });

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_kec",
        method:"POST",
        data:{kec:kec},
        success:function(data) {
            $('#kec').val(data);
        }
    });
});

$("#kelurahan").show(function(){
    var kel = $(this).val();

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_kel",
        method:"POST",
        data:{kel:kel},
        success:function(data) {
            $('#kel').val(data);
        }
    });
});

$("#kelurahan").change(function(){
    var kel = $(this).val();

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_kel",
        method:"POST",
        data:{kel:kel},
        success:function(data) {
            $('#kel').val(data);
        }
    });
});
</script> -->

