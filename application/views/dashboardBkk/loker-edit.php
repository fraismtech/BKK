<script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
<?php foreach ($get_lowongan as $loker) { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-heading">
                        <h4 class="card-title">Edit Lowongan Pekerjaan</h4>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($loker->foto == NULL) { ?>
                    
                    <?php } else { ?>
                        <center>
                            <img src="<?php echo base_url(); ?>assets/upload/image/loker/<?= $loker->foto; ?>" alt="gallery-img" class="img-circle" style="width: 50%; height: 50%;">
                        </center>
                        <br/>
                        <hr>
                    <?php } ?>
                    <form method="post" action="<?php echo base_url(); ?>/dashboardBkk/editLoker" id="mitraForm" autocomplete="off" enctype="multipart/form-data">
                        <div class="panel-title">
                            <h5>Informasi Lowongan</h5>
                        </div>
                        <hr>
                        <input type="hidden" name="id_lowongan" value="<?= $loker->id_lowongan; ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Perusahaan Mitra</label>
                                    <select class="form-control" id="mitra" name="mitra">
                                        <option value="" selected="">Pilih Mitra</option>
                                        <?php 
                                        foreach ($mitra_bkk as $mitra) { 
                                            if ($mitra->id_mitra == $loker->id_mitra) { ?>
                                                <option value="<?= $mitra->id_mitra ?>" selected><?= $mitra->nama_perusahaan ?></option>
                                                <?php 
                                            } else { ?>
                                                <option value="<?= $mitra->id_mitra ?>"><?= $mitra->nama_perusahaan ?></option>
                                                <?php 
                                            }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lowongan</label>
                                    <input type="text" name="nama_lowongan" class="form-control" placeholder="Nama Lowongan" value="<?= $loker->nama_lowongan; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Berlaku</label>
                                    <div class='input-group date' id='datepicker-bottom-left'>
                                        <input class="form-control" type='text' name="tanggal_berlaku" placeholder="Tanggal Berlaku" value="<?= date('m/d/Y', strtotime($loker->tanggal_berlaku)) ?>" />
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Berakhir</label>
                                    <div class='input-group date' id='datepicker-bottom-right'>
                                        <input class="form-control" type='text' name="tanggal_berakhir" placeholder="Tanggal Berakhir" value="<?= date('m/d/Y', strtotime($loker->tanggal_berakhir)) ?>" />
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
                                    <label>Rincian Pekerjaan</label>
                                    <textarea class="form-control" name="uraian_pekerjaan" placeholder="Rincian Pekerjaan"><?= $loker->uraian_pekerjaan ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Uraian Tugas</label>
                                    <textarea class="form-control" name="uraian_tugas" placeholder="Uraian Tugas"><?= $loker->uraian_tugas ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lokasi Penempatan</label>
                                    <input type="text" name="penempatan" class="form-control" placeholder="Lokasi Penempatan" value="<?= $loker->penempatan ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jumlah Laki-Laki</label>
                                    <input type="number" name="jml_pria" class="form-control" placeholder="Jumlah Laki-Laki" value="<?= $loker->jml_pria ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jumlah Perempuan</label>
                                    <input type="number" name="jml_wanita" class="form-control" placeholder="Jumlah Perempuan" value="<?= $loker->jml_wanita ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="panel-title">
                            <h5>Persyaratan Jabatan</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Batas Umur</label>
                                    <input type="number" name="batas_umur" class="form-control" placeholder="Batas Umur" value="<?= $loker->batas_umur ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Minimal Pendidikan</label>
                                    <select class="form-control" id="pendidikan" name="pendidikan">
                                        <option value="" selected="">Pilih Pendidikan</option>
                                        <?php
                                        foreach ($status_pendidikan as $pendidikan)
                                        {
                                            if ($loker->id_status_pendidikan == $pendidikan->id_status_pendidikan)
                                            {
                                                echo "<option value='".$pendidikan->id_status_pendidikan."' selected=\"selected\">".$pendidikan->nama_status_pendidikan."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$pendidikan->id_status_pendidikan."'>".$pendidikan->nama_status_pendidikan."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Posisi Jabatan</label>
                                    <select class="form-control" id="posisi_jabatan" name="posisi_jabatan">
                                        <option value="" selected="">Pilih Jabatan</option>
                                        <?php
                                        foreach ($posisi_jabatan as $jabatan)
                                        {
                                            if ($loker->id_posisi_jabatan == $jabatan->id_posisi_jabatan)
                                            {
                                                echo "<option value='".$jabatan->id_posisi_jabatan."' selected=\"selected\">".$jabatan->nama_posisi_jabatan."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$jabatan->id_posisi_jabatan."'>".$jabatan->nama_posisi_jabatan."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <select class="form-control" id="jurusan" name="jurusan">
                                        <option value="" selected="">Pilih Jurusan</option>
                                        <?php
                                        foreach ($jurusan as $jrs)
                                        {
                                            if ($loker->jurusan == $jrs->id_jurusan)
                                            {
                                                echo "<option value='".$jrs->id_jurusan."' selected=\"selected\">".$jrs->nama_jurusan."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$jrs->id_jurusan."'>".$jrs->nama_jurusan."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori">
                                        <option value="" selected="">Pilih Kategori</option>
                                        <?php
                                        foreach ($jenis_lowongan as $kategori)
                                        {
                                            if ($loker->id_jenis_lowongan == $kategori->id_jenis_lowongan)
                                            {
                                                echo "<option value='".$kategori->id_jenis_lowongan."' selected=\"selected\">".$kategori->nama_jenis_lowongan."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$kategori->id_jenis_lowongan."'>".$kategori->nama_jenis_lowongan."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Keahlian</label>
                                    <select class="form-control" id="keahlian" name="keahlian">
                                        <option value="">Pilih Keahlian</option>
                                        <?php
                                        foreach ($data_keahlian as $keahlian)
                                        {
                                            if ($loker->id_keahlian == $keahlian->id_keahlian)
                                            {
                                                echo "<option value='".$keahlian->id_keahlian."' selected=\"selected\">".$keahlian->nama_keahlian."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$keahlian->id_keahlian."'>".$keahlian->nama_keahlian."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pengalaman</label>
                                    <textarea class="form-control" name="pengalaman" placeholder="Pengalaman Pekerjaan"><?= $loker->pengalaman ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Syarat Khusus</label>
                                    <textarea class="form-control" name="syarat_khusus" placeholder="Syarat Khusus"><?= $loker->syarat_khusus ?></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="panel-title">
                            <h5>Sistem Pengupahan</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Pengupahan</label>
                                    <select class="form-control" id="jenis_pengupahan" name="jenis_pengupahan">
                                        <?php
                                        foreach ($jenis_pengupahan as $jenis_upah)
                                        {
                                            if ($loker->id_jenis_pengupahan == $jenis_upah->id_jenis_pengupahan)
                                            {
                                                echo "<option value='".$jenis_upah->id_jenis_pengupahan."' selected=\"selected\">".$jenis_upah->nama_jenis_pengupahan."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$jenis_upah->id_jenis_pengupahan."'>".$jenis_upah->nama_jenis_pengupahan."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gaji Perbulan</label>
                                    <input type="number" name="gaji_per_bulan" class="form-control" placeholder="Gaji Perbulan" value="<?= $loker->gaji_per_bulan ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status Hub. Kerja</label>
                                    <select class="form-control" id="hub_kerja" name="hubungan_kerja">
                                        <?php
                                        foreach ($hubungan_kerja as $hub_kerja)
                                        {
                                            if ($loker->id_status_hub_kerja == $hub_kerja->id_status_hub_kerja)
                                            {
                                                echo "<option value='".$hub_kerja->id_status_hub_kerja."' selected=\"selected\">".$hub_kerja->nama_status_hub_kerja."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$hub_kerja->id_status_hub_kerja."'>".$hub_kerja->nama_status_hub_kerja."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jam Kerja/Minggu</label>
                                    <input type="number" name="jam_kerja" class="form-control" placeholder="Jam Kerja Per Minggu" value="<?= $loker->jam_kerja ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="panel-title">
                            <h5>Gambar</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Foto</label>
                                <input type="file" name="file" class="form-control foto" placeholder="Foto">
                                <p>Gambar JPG/PNG Max. 2Mb</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4" id="simpan"><span id="lokerText">Simpan</span></button>
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
        CKEDITOR.replace('uraian_pekerjaan', {
          height: 150,
      });
  </script>
  <script type="text/javascript">
    CKEDITOR.replace('uraian_tugas', {
      height: 150,
  });
</script>
<script type="text/javascript">
    CKEDITOR.replace('pengalaman', {
      height: 150,
  });
</script>
<script type="text/javascript">
    CKEDITOR.replace('syarat_khusus', {
      height: 150,
  });
</script>
<script type="text/javascript">
    $("#kategori").change(function(){
        var keahlian = $(this).val();
        $.ajax({
            url:"<?php echo base_url(); ?>dashboardBkk/get_keahlian",
            method:"POST",
            data:{keahlian:keahlian},
            success:function(data) {
                $('#keahlian').html(data);
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
<?php } ?>
