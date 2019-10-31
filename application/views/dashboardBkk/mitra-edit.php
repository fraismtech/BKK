<?php foreach($data as $mitra){ ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Edit Mitra BKK</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url(); ?>/dashboardBkk/editMitra" id="mitraForm" autocomplete="off" enctype="multipart/form-data">
                    <div class="panel-title">
                        <h5>Data Perusahaan</h5>
                    </div>
                    <hr>
                    <input type="hidden" name="id_mitra" value="<?= $mitra->id_mitra ?>">
                    <input type="hidden" name="id_alamat" value="<?= $mitra->id_alamat ?>">
                    <input type="hidden" name="id_cp_mitra" value="<?= $mitra->id_cp_mitra ?>">
                    <input type="hidden" name="id_periode" value="<?= $mitra->id_periode ?>">
                    <input type="hidden" name="id_sekolah" value="<?= $mitra->id_sekolah ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" value="<?= $mitra->nama_perusahaan ?>" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bidang Usaha</label>
                                <input type="text" name="bidang_usaha" class="form-control" placeholder="Bidang Usaha" value="<?= $mitra->bidang_usaha ?>" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Perusahaan</label>
                                <textarea class="form-control" name="alamat" placeholder="Alamat Perusahaan" required=""><?= $mitra->alamat_lengkap ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select class="form-control" id="provinsi" name="provinsi" required="">
                                    <option value="<?= $mitra->id_prov ?>" selected><?= $mitra->provinsi ?></option>
                                    <?php foreach ($provinsi as $prov) { ?>
                                        <option value="<?= $prov->id ?>"><?= $prov->name ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="prov" id="prov" value="<?= $mitra->name ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kota/Kabupaten</label>
                                <select class="form-control" id="kota" name="kota" required="">
                                    <option value="<?= $mitra->id_kota ?>" selected><?= $mitra->kota ?></option>
                                </select>
                                <input type="hidden" name="kab" id="kab">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control" id="kecamatan" name="kecamatan" required="">
                                    <option value="<?= $mitra->id_kec ?>" selected><?= $mitra->kecamatan ?></option>
                                </select>
                                <input type="hidden" name="kec" id="kec">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select class="form-control" id="kelurahan" name="kelurahan" required="">
                                    <option value="<?= $mitra->id_kel ?>" selected><?= $mitra->kelurahan ?></option>
                                </select>
                                <input type="hidden" name="kel" id="kel">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="number" name="kode_pos" class="form-control" placeholder="Kode Pos" value="<?= $mitra->kode_pos ?>" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kemitraan</label>
                                <input type="text" name="jenis_kemitraan" class="form-control" placeholder="Jenis Kemitraan" value="<?= $mitra->jenis_kemitraan ?>" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telp Perusahaan</label>
                                <input type="number" name="no_telp" class="form-control" placeholder="No. Telp Perusahaan" value="<?= $mitra->no_telp ?>" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Perusahaan</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Perusahaan" value="<?= $mitra->email ?>" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama CP</label>
                                <input type="text" name="nama_cp" class="form-control" placeholder="Nama Contact Person" value="<?= $mitra->nama_cp ?>" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan_cp" class="form-control" placeholder="Jabatan" value="<?= $mitra->jabatan_cp ?>" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telp CP</label>
                                <input type="number" name="no_telp_cp" class="form-control" placeholder="No Telp" value="<?= $mitra->no_telp_cp ?>" required="">
                            </div>
                        </div>
                    </div><hr>
                    <div class="panel-title">
                        <h5>Periode Kemitraan</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari</label>
                                <div class='input-group date' id='datepicker-top-left'>
                                    <input class="form-control" type='text' name="dari" placeholder="Dari" value="<?= date('m/d/Y', strtotime($mitra->dari)) ?>" required="" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai</label>
                                <div class='input-group date' id='datepicker-top-right'>
                                    <input class="form-control" type='text' name="sampai" placeholder="Sampai" value="<?= date('m/d/Y', strtotime($mitra->sampai)) ?>" required="" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
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
            $('#kecamatan').html('<option></option>');
            $('#kelurahan').html('<option></option>');
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
            $('#kelurahan').html('<option></option>');
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
</script>
<?php } ?>
