<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="<?php echo $title; ?>" />
    <meta name="author" content="Frais Mediatech" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dashboard/img/logo-icon.png">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/style.css" />
    <link href="<?php echo base_url(); ?>assets/vendor/select2/dist/select2.min.css" rel="stylesheet" />
</head>
<style type="text/css">
@media(max-width: 767px){
    .media-hide{
        display: none !important;
    }
}
</style>
<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="<?php echo base_url(); ?>assets/dashboard/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-5">
                        <div class="row justify-content-center">
                            <div class="d-flex align-items-center card col-lg-5">
                                <div class="login p-50">
                                    <h1 class="mb-2 text-center">Registrasi</h1>
                                    <p class="text-center">Selamat Datang Di Website Bursa Kerja Khusus Kota Depok, Silahkan Registrasi</p>
                                    <form action="<?php echo base_url(); ?>Registrasi" class="mt-2 mt-sm-4" method="POST" id="regForm" >
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">NPSN*</label>
                                                    <input type="text" class="form-control" placeholder="NPSN" name="npsn" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Sekolah*</label>
                                                    <input type="text" class="form-control" placeholder="Nama Sekolah" name="nama_sekolah" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Jurusan*</label>
                                                    <select class="form-control" name="jurusan" id="jurusan">
                                                        <option value="Jurusan 1">Jurusan 1</option>
                                                        <option value="Jurusan 2">Jurusan 2</option>
                                                        <option value="Jurusan 3">Jurusan 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Alamat*</label>
                                                    <textarea class="form-control" name="alamat_sekolah" placeholder="Alamat Lengkap Sekolah"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Kecamatan*</label>
                                                    <select class="form-control" id="kecamatan" name="kecamatan">
                                                        <option value="" selected="">Pilih Kecamatan</option>
                                                        <?php foreach ($kecamatan as $kec) { ?>
                                                            <option value="<?= $kec->name ?>"><?= $kec->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Kelurahan*</label>
                                                    <select class="form-control" id="kelurahan" name="kelurahan">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Operator*</label>
                                                    <input type="text" class="form-control" placeholder="Nama Operator" name="nama_operator" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Alamat Email*</label>
                                                    <input type="email" class="form-control" placeholder="example@email.com" name="alamat_email" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">No Hp*</label>
                                                    <input type="number" class="form-control" placeholder="No Handphone" name="no_hp" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Username*</label>
                                                    <input type="text" class="form-control" placeholder="Username" name="username" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password*</label>
                                                    <input type="password" class="form-control" placeholder="*********" name="password" />
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3 text-center">
                                                <button type="submit" name="daftar" id="daftar" class="btn btn-primary text-uppercase"><span id="regText"></span></a>
                                            </div>
                                            <div class="col-12 mt-3 text-center">
                                                <p>Sudah Punya Akun ?<a href="<?php echo base_url(); ?>login"> Login</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <!-- plugins -->
    <script src="<?php echo base_url(); ?>assets/dashboard/js/vendors.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/select2/dist/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- custom app -->
    <script src="<?php echo base_url(); ?>assets/dashboard/js/app.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#jurusan').select2();
    });

    $(document).ready(function() {
        $('#kecamatan').select2();
    });

    $(document).ready(function() {
        $('#kelurahan').select2();
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

    $(document).ready(function(){
        $('#regText').html('Daftar');
        $('#daftar').attr('disabled', false);
        $('#regForm').submit(function(e){
            e.preventDefault();
            $('#regText').html('Mendaftar ...');
            $('#daftar').attr('disabled', true);
            var url = '<?php echo base_url(); ?>';
            var user = $('#regForm').serialize();
            var save = function(){
                $.ajax({
                    type: 'POST',
                    url: url + 'Daftar/registrasi_user',
                    dataType: 'json',
                    data: user,
                    success:function(response){
                        $('#message').html(response.message);
                        $('#regText').html('Daftar');
                        $('#daftar').attr('disabled', false);
                        if(response.error){
                            swal({
                                title: "Gagal Mendaftar!",
                                text: "Silahkan isi data dengan benar!",
                                icon: "error",
                            });
                        }
                        else{
                            swal({
                                title: "Berhasil Mendaftar!",
                                text: "Silahkan cek email untuk verifikasi data!",
                                icon: "success",
                            });
                            $('#regForm')[0].reset();
                        }
                    }
                });
                $('#regForm')[0].reset();
            };
            setTimeout(save, 1000);
        });

        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    });
    </script>
</body>
</html>