<script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
<?php foreach ($profile as $profil) { ?>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card card-statistics widget-social-box1 px-2">
                <div class="card-body pb-3 pt-4">
                    <div class="text-center">
                        <div class="pt-1 bg-img m-auto">
                            <!-- <img class="img-fluid" src="<?php echo base_url(); ?>assets/dashboard/img/avtar/01.jpg" alt="socialwidget-img"> -->
                        </div>
                        <div class="mt-3">
                            <h2 class="mb-1"><?= $profil->nama_sekolah ?></h2>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Profil Sekolah</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data" id="sekolahForm" role="form">
                                        <input type="hidden" name="id_sekolah" value="<?= $profil->id_sekolah ?>">
                                        <div class="form-group">
                                            <label>NPSN</label>
                                            <input type="text" class="form-control" name="npsn" value="<?= $profil->npsn ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Sekolah</label>
                                            <input type="text" class="form-control" name="nama_sekolah" value="<?= $profil->nama_sekolah ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Sekolah</label>
                                            <textarea class="form-control" name="alamat_sekolah" required=""><?= $profil->alamat_sekolah ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Kecamatan*</label>
                                            <select class="form-control" id="kecamatan" name="kecamatan" required="">
                                                <option value="">Pilih Kecamatan</option>
                                                <option value="<?= $profil->kecamatan ?>" selected=""><?= $profil->kecamatan ?></option>
                                                <?php foreach ($kecamatan as $kec) { ?>
                                                    <option value="<?= $kec->name ?>"><?= $kec->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Kelurahan*</label>
                                            <select class="form-control" id="kelurahan" name="kelurahan" required="">
                                                <option value="<?= $profil->kelurahan ?>" selected=""><?= $profil->kelurahan ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Visi</label>
                                            <textarea id="visi" class="form-control" name="visi" required=""><?= $profil->visi ?></textarea>
                                            <!-- <textarea class="form-control" name="visi"></textarea> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Misi</label>
                                            <textarea class="form-control" name="misi" required=""><?= $profil->misi ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Struktur BKK</label>
                                            <input type="file" name="file" class="form-control foto" placeholder="Foto" required="">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Gambar JPG/PNG Max. 2Mb</p><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-footer">
                                            <div class="row">
                                                <div class="col col-md-6">
                                                    <?php if ($profil->struktur == NULL) { ?>

                                                    <?php } else { ?>
                                                        <a href="<?php echo base_url(); ?>assets/upload/struktur_bkk/<?= $profil->struktur; ?>" class="">
                                                            <button type="button" class="btn btn-info mt-4 fa fa-download" title="Download Struktur BKK"><span> Download</span></button>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                                <div class="col col-md-6">
                                                    <button type="submit" class="btn btn-success mt-4 float-right" id="simpan"><span id="textSlider">Simpan</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>  
                                </div>
                            </div>
                        </div>
                        <div class="row col-lg-6 col-md-12">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Data Perijinan BKK</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" id="perijinanForm" enctype="multipart/form-data">
                                            <input type="hidden" name="id_perijinan" value="<?= $profil->id_user ?>">
                                            <div class="form-group">
                                                <label>Ijin BKK*</label>
                                                <div class="row col-lg-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ijin_bkk" id="gridRadios1" required="" value="Ya"  <?= $profil->ijin_bkk == 'Ya' ? ' checked="checked"' : '';?>>
                                                        <label class="form-check-label" for="gridRadios1">
                                                            YA &nbsp;
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ijin_bkk" id="gridRadios2" required="" value="Tidak" <?= $profil->ijin_bkk == 'Tidak' ? ' checked="checked"' : '';?>>
                                                        <label class="form-check-label" for="gridRadios2">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>No Ijin*</label>
                                                <input type="text" class="form-control" name="no_ijin" value="<?= $profil->no_ijin ?>" required="" placeholder="No. Ijin" id="no_ijin">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Tanggal Perijinan*</label>
                                                <div class="input-group">
                                                    <input type="text" name="tgl_perijinan" class="form-control" id="datepicker-autoclose1" placeholder="Tanggal Perijinan" required="" value="<?= date('Y-m-d', strtotime($profil->tgl_perijinan)) ?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Dokumen Perijinan*</label>
                                                <input type="file" name="file" class="form-control dokumen" placeholder="Foto" required="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>File PDF Max. 10Mb</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-footer">
                                                <div class="row">
                                                    <div class="col col-md-6">
                                                        <?php if ($profil->dokumen == NULL) { ?>

                                                        <?php } else { ?>
                                                            <a href="<?php echo base_url(); ?>assets/upload/file/<?= $profil->dokumen; ?>" class="">
                                                                <button type="button" class="btn btn-info mt-4 fa fa-download" title="Download Dokumen Perijinan"><span> Download</span></button>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col col-md-6">
                                                        <button type="submit" class="btn btn-success mt-4 float-right" id="simpan"><span id="textSlider">Simpan</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Profil User</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" id="profilForm" enctype="multipart/form-data">
                                            <input type="hidden" name="id_user" value="<?= $profil->id_user ?>">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" id="usernamev" name="username" value="<?= $profil->username ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" value="" id="passwordv" required="" placeholder="******" onkeyup="cek_passwordv()">
                                                <small id="pesan_passwordv" class=""></small>
                                                <small class='text-danger' id="password-usedv" style='display:none'>* Username dan password tidak boleh sama!</small>
                                                <small class='text-success' id="password-availablev" style='display:none'>* Password bisa digunakan!</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Nama Operator*</label>
                                                <input type="text" class="form-control" name="nama_operator" value="<?= $profil->nama_operator ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email*</label>
                                                <input type="text" class="form-control" name="email" value="<?= $profil->email ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>No. HP</label>
                                                <input type="text" class="form-control" name="no_hp" value="<?= $profil->no_hp ?>" required="">
                                            </div>
                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-success mt-4 float-right simpan2" id="simpan2"><span id="textSlider">Simpan</span></button>
                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script type="text/javascript">
    function disableBtn() {
        document.getElementById("simpan2").disabled = true;
    }

    function enableBtn() {
        document.getElementById("simpan2").disabled = false;
    }
    function cek_passwordv(){
        var username = $("#usernamev").val();
        var password = $("#passwordv").val();

        if (username == password) {
            $("#passwordv").css({ 'border-color': '#a94442'});
            $("#password-availablev").hide();
            $("#password-usedv").show();
            $(".simpan2").prop("disabled", true);
        } else {
            $("#passwordv").css({ 'border-color': '#3c763d'});
            $("#password-usedv").hide();
            $("#password-availablev").show();
            $(".simpan2").prop("disabled", false);
        }
    }
</script>
<script type="text/javascript">
    $(".foto").change(function() {
        if (this.files && this.files[0] && this.files[0].name.match(/\.(jpg|png|jpeg|PNG|JPG|JPEG)$/) ) {
            if(this.files[0].size>2097152) {
                $('.foto').val('');
                alert('Batas Maximal Ukuran File 2MB !');
            }
            else {
                var reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
            }
        } else{
            $('.foto').val('');
            alert('Hanya File jpg/png Yang Diizinkan !');
        }
    });
</script>
<script type="text/javascript">
    $(".dokumen").change(function() {
        if (this.files && this.files[0] && this.files[0].name.match(/\.(pdf)$/) ) {
            if(this.files[0].size>10485760) {
                $('.dokumen').val('');
                alert('Batas Maximal Ukuran File 10MB !');
            }
            else {
                var reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
            }
        } else{
            $('.dokumen').val('');
            alert('Hanya File pdf Yang Diizinkan !');
        }
    });
</script>
<script>
    /*datwpicker*/
    jQuery('.mydatepicker').datepicker();
    jQuery('#datepicker-autoclose1').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('visi', {
      height: 150,
  });
</script>
<script type="text/javascript">
    CKEDITOR.replace('misi', {
      height: 150,
  });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#kecamatan').select2();
    });

    $(document).ready(function() {
        $('#kelurahan').select2();
    });

    $("#kecamatan").show(function(){
        var kec = $(this).val();
        $.ajax({
            url:"<?php echo base_url(); ?>Daftar/get_kelurahan",
            method:"POST",
            data:{kec:kec},
            success:function(data) {
                $('#kelurahan').append(data);
            }
        });
    });

    $("#kecamatan").change(function(){
        var kec = $(this).val();
        $.ajax({
            url:"<?php echo base_url(); ?>Daftar/get_kelurahan",
            method:"POST",
            data:{kec:kec},
            success:function(data) {
                $('#kelurahan').html(data);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){  
        $('#sekolahForm').on('submit', function(e){  
            e.preventDefault();  

            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            $.ajax({  
                url:"<?php echo base_url(); ?>dashboardBkk/updateProfilSekolah",   
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType: "json",
                success:function(res)  
                {  
                    console.log(res.success);
                    if(res.success == true){  
                        swal({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });  
                    }
                    else if(res.success == false){
                        swal({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error",
                        });
                    }
                    setTimeout(function(){
                        location.reload();
                    }, 1100);
                }  
            });  
        });  
    });  
</script>
<script type="text/javascript">
    $(document).ready(function(){  
        $('#perijinanForm').on('submit', function(e){  
            e.preventDefault();  

            $.ajax({  
                url:"<?php echo base_url(); ?>dashboardBkk/updatePerijinan",   
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType: "json",
                success:function(res)  
                {  
                    console.log(res.success);
                    if(res.success == true){  
                        swal({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });  
                    }
                    else if(res.success == false){
                        swal({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error",
                        });
                    }
                    setTimeout(function(){
                        location.reload();
                    }, 1100);
                }  
            });  
        });  
    });  
</script>
<script type="text/javascript">
    $(document).ready(function(){  
        $('#profilForm').on('submit', function(e){  
            e.preventDefault();  

            $.ajax({  
                url:"<?php echo base_url(); ?>dashboardBkk/updateProfilUser",   
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType: "json",
                success:function(res)  
                {  
                    console.log(res.success);
                    if(res.success == true){  
                        swal({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });  
                    }
                    else if(res.success == false){
                        swal({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error",
                        });
                    }
                    $('#password').val('');
                    setTimeout(function(){
                        window.location = "<?php echo base_url();?>logout"
                    }, 1100);
                // setTimeout(function(){
                //     $('#edit-data').modal('close');
                //     table.ajax.reload();
                // }, 500);
            }  
        });  
        });  
    });  
</script>