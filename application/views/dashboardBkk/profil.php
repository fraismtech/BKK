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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Profil Sekolah</h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="sekolahForm" role="form">
                                    <input type="hidden" name="id_sekolah" value="<?= $profil->id_sekolah ?>">
                                    <div class="form-group">
                                        <label>NPSN</label>
                                        <input type="text" class="form-control" name="npsn" value="<?= $profil->npsn ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Sekolah</label>
                                        <input type="text" class="form-control" name="nama_sekolah" value="<?= $profil->nama_sekolah ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Sekolah</label>
                                        <textarea class="form-control" name="alamat_sekolah"><?= $profil->alamat_sekolah ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Kecamatan*</label>
                                        <select class="form-control" id="kecamatan" name="kecamatan">
                                            <option value="">Pilih Kecamatan</option>
                                            <option value="<?= $profil->kecamatan ?>" selected=""><?= $profil->kecamatan ?></option>
                                            <?php foreach ($kecamatan as $kec) { ?>
                                                <option value="<?= $kec->name ?>"><?= $kec->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Kelurahan*</label>
                                        <select class="form-control" id="kelurahan" name="kelurahan">
                                            <option value="<?= $profil->kelurahan ?>" selected=""><?= $profil->kelurahan ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Visi</label>
                                        <textarea class="form-control" name="visi"><?= $profil->visi ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Misi</label>
                                        <textarea class="form-control" name="misi"><?= $profil->misi ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Struktur BKK</label>
                                        <input type="file" name="file" class="form-control foto" placeholder="Foto" required="">
                                        <span class="text-danger">
                                            File: 
                                            <?php if ($profil->struktur == NULL) { ?>
                                                File Not Found
                                            <?php } else { ?>
                                                <a href="<?php echo base_url(); ?>/assets/upload/struktur_bkk/<?= $profil->struktur; ?>"><?= $profil->struktur; ?></a>
                                            <?php } ?>
                                        </span>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-success mt-4 float-right" id="simpan"><span id="textSlider">Simpan</span></button>
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Profil User</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="profilForm" enctype="multipart/form-data">
                                    <input type="hidden" name="id_user" value="<?= $profil->id_user ?>">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="<?= $profil->username ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" value="" required="" placeholder="******">
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
                                        <button type="submit" class="btn btn-success mt-4 float-right" id="simpan"><span id="textSlider">Simpan</span></button>
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
<?php } ?>
<script type="text/javascript">
$(".foto").change(function() {
    if (this.files && this.files[0] && this.files[0].name.match(/\.(jpg|png|jpeg|PNG|doc|docx|pdf)$/) ) {
        if(this.files[0].size>10485760) {
            $('.foto').val('');
            alert('Batas Maximal Ukuran File 10MB !');
        }
        else {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
        }
    } else{
        $('.foto').val('');
        alert('Hanya File jpg, png, doc, pdf Yang Diizinkan !');
    }
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
                    });  
                }
                else if(res.success == false){
                    swal({
                        title: "Gagal!",
                        text: res.msg,
                        icon: "error",
                    });
                }
                // setTimeout(function(){
                //     $('#edit-data').modal('close');
                //     table.ajax.reload();
                // }, 500);
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
                    });  
                }
                else if(res.success == false){
                    swal({
                        title: "Gagal!",
                        text: res.msg,
                        icon: "error",
                    });
                }
                // setTimeout(function(){
                //     $('#edit-data').modal('close');
                //     table.ajax.reload();
                // }, 500);
            }  
        });  
    });  
});  
</script>