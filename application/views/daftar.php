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
                                    <form action="<?php echo base_url(); ?>Registrasi" class="mt-2 mt-sm-4" method="POST" id="regForm" autocomplete="off" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">NPSN*</label>
                                                    <input type="text" class="form-control" placeholder="NPSN" name="npsn" required="" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Sekolah*</label>
                                                    <input type="text" class="form-control" placeholder="Nama Sekolah" name="nama_sekolah" required="" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label" required="">Alamat*</label>
                                                    <textarea class="form-control" name="alamat_sekolah" placeholder="Alamat Lengkap Sekolah"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Kecamatan*</label>
                                                    <select class="form-control" id="kecamatan" name="kecamatan" required="">
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
                                                    <select class="form-control" id="kelurahan" name="kelurahan" required="">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Operator*</label>
                                                    <input type="text" class="form-control" placeholder="Nama Operator" name="nama_operator" required="" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Alamat Email*</label>
                                                    <input type="email" class="form-control" placeholder="example@email.com" name="alamat_email"  required=""/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">No Hp*</label>
                                                    <input type="number" class="form-control" placeholder="No Handphone" name="no_hp" required="" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" id="username1" class="form-control" placeholder="Username" required="" onkeyup='cek_username()'>
                                                    <small id="pesan_username1" class=""></small>
                                                    <small class='text-danger' id="username-used1" style='display:none'>* Username sudah digunakan!</small>
                                                    <small class='text-success' id="username-available1" style='display:none'>* Username tersedia!</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" id="password1" class="form-control" placeholder="Password" required="" onkeyup="cek_password()">
                                                    <small id="pesan_password1" class=""></small>
                                                    <small class='text-danger' id="password-used1" style='display:none'>* Username dan password tidak boleh sama!</small>
                                                    <small class='text-success' id="password-available1" style='display:none'>* Password bisa digunakan!</small>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Ijin BKK*</label><br>
                                                    <div class="col-3"></div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <input type="radio" name="ijin" value="Ya" id="ya" required="">
                                                            <label> Ya</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="radio" name="ijin" value="Tidak" id="tidak" required="">
                                                            <label> Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">No Ijin*</label>
                                                    <input type="text" class="form-control" placeholder="Nomor Ijin" name="no_ijin" id="no_ijin" required="" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Tanggal Perijinan*</label>
                                                    <div class='input-group date' id='datepicker-bottom-left'>
                                                        <input class="form-control" type='text' name="tanggal_ijin" placeholder="Tanggal Perijinan" id="tanggal_ijin" required="" />
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Upload Dokumen*</label>
                                                    <input type="file" class="form-control dokumen" placeholder="No Handphone" name="file" id="dokumen"  required=""/>
                                                    <p>Dokumen PDF Max. 10Mb</p>
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
            function disableBtn() {
                document.getElementById("daftar").disabled = true;
            }

            function enableBtn() {
                document.getElementById("daftar").disabled = false;
            }
            function cek_username(){
                $("#pesan_username1").hide();

                var username = $("#username1").val();
                var password = $("#password1").val();

                if(username != ""){
                    $.ajax({
                        url: "<?php echo site_url('Daftar/usernameList')?>",
                        data: 'username='+username,
                        type: "POST",
                        success: function(msg){
                            if(msg==1){
                                $("#username1").css({ 'border-color': '#a94442'});
                                $("#username-available1").hide();
                                $("#username-used1").show();
                        // disableBtn();
                        error = 1;
                        if (username == password) {
                            $("#password1").css({ 'border-color': '#a94442'});
                            $("#password-available1").hide();
                            $("#password-used1").show();
                            disableBtn();
                        } else {
                            $("#password1").css({ 'border-color': '#3c763d'});
                            $("#password-used1").hide();
                            $("#password-available1").show();
                            enableBtn();
                        }
                    }else{
                        $("#username1").css({ 'border-color': '#3c763d'});
                        $("#username-used1").hide();
                        $("#username-available1").show();
                        // enableBtn();
                        error = 0;
                        if (username == password) {
                            $("#password1").css({ 'border-color': '#a94442'});
                            $("#password-available1").hide();
                            $("#password-used1").show();
                            disableBtn();
                        } else {
                            $("#password1").css({ 'border-color': '#3c763d'});
                            $("#password-used1").hide();
                            $("#password-available1").show();
                            enableBtn();
                        }
                    }
                }
            });
                }  
            }
            function cek_password(){
                var username = $("#username1").val();
                var password = $("#password1").val();

                if (username == password) {
                    $("#password1").css({ 'border-color': '#a94442'});
                    $("#password-available1").hide();
                    $("#password-used1").show();
                    disableBtn();
                } else {
                    $("#password1").css({ 'border-color': '#3c763d'});
                    $("#password-used1").hide();
                    $("#password-available1").show();
                    enableBtn();
                }
            }
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
        <script type="text/javascript">
            $(document).ready(function () {
                $('#no_ijin').prop("disabled", true);
                $('#tanggal_ijin').prop("disabled", true);
                $('#dokumen').prop("disabled", true);
                $('#ya').click(function(){
                    var stat = $(this).val();
                    if (stat == 'Ya') {
                        $('#no_ijin').prop("disabled", false);
                        $('#tanggal_ijin').prop("disabled", false);
                        $('#dokumen').prop("disabled", false);
                    } else {
                        $('#no_ijin').prop("disabled", true);
                        $('#tanggal_ijin').prop("disabled", true);
                        $('#dokumen').prop("disabled", true);
                    }
                });

                $('#tidak').click(function(){
                    var stat = $(this).val();
                    if (stat == 'Tidak') {
                        $('#no_ijin').prop("disabled", true);
                        $('#tanggal_ijin').prop("disabled", true);
                        $('#dokumen').prop("disabled", true);
                    } else {
                        $('#no_ijin').prop("disabled", false);
                        $('#tanggal_ijin').prop("disabled", false);
                        $('#dokumen').prop("disabled", false);
                    }
                });
            });
        </script>
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
                $('#regForm').on('submit', function(e){  
                    e.preventDefault();  
                    $('#regText').html('Mendaftar ...');
                    $('#daftar').attr('disabled', true);
                    $.ajax({  
                        url:"<?php echo base_url(); ?>Daftar/registrasi_user",   
                        method:"POST",  
                        data:new FormData(this),  
                        contentType: false,  
                        cache: false,  
                        processData:false,  
                        dataType: "json",
                        success:function(res) {
                            $('#regText').html('Daftar');
                            $('#daftar').attr('disabled', false);  
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
                    //     location.reload(); 
                    // }, 1000);
                }  
            });  
                });
        // $('#regForm').submit(function(e){
        //     e.preventDefault();
        //     $('#regText').html('Mendaftar ...');
        //     $('#daftar').attr('disabled', true);
        //     var url = '<?php echo base_url(); ?>';
        //     var user = $('#regForm').serialize();
        //     var save = function(){
        //         $.ajax({  
        //             url:"<?php echo base_url(); ?>Daftar/registrasi_user",   
        //             method:"POST",  
        //             data:new FormData(this),  
        //             contentType: false,  
        //             cache: false,  
        //             processData:false,  
        //             dataType: "json",
        //             success:function(res)  
        //             {  
        //                 $('#message').html(response.message);
        //                 $('#regText').html('Daftar');
        //                 $('#daftar').attr('disabled', false);
        //                 console.log(res.success);
        //                 if(res.success == true){  
        //                     swal({
        //                         title: "Berhasil!",
        //                         text: res.msg,
        //                         icon: "success",
        //                     });
        //                 }
        //                 else if(res.success == false){
        //                     swal({
        //                         title: "Gagal!",
        //                         text: res.msg,
        //                         icon: "error",
        //                     });
        //                 }
        //                 table.ajax.reload();
        //                 // setTimeout(function(){
        //                 //     location.reload(); 
        //                 // }, 1000);
        //             }  
        //         });
        //         $.ajax({
        //             type: 'POST',
        //             url: url + 'Daftar/registrasi_user',
        //             dataType: 'json',
        //             data: user,
        //             success:function(response){
        //                 $('#message').html(response.message);
        //                 $('#regText').html('Daftar');
        //                 $('#daftar').attr('disabled', false);
        //                 if(response.error){
        //                     swal({
        //                         title: "Gagal Mendaftar!",
        //                         text: "Silahkan isi data dengan benar!",
        //                         icon: "error",
        //                     });
        //                 }
        //                 else{
        //                     swal({
        //                         title: "Berhasil Mendaftar!",
        //                         text: "Silahkan cek email untuk verifikasi data!",
        //                         icon: "success",
        //                     });
        //                     $('#regForm')[0].reset();
        //                 }
        //             }
        //         });
        //         $('#regForm')[0].reset();
        //     }
        // });

        // $(document).on('click', '#clearMsg', function(){
        //     $('#responseDiv').hide();
        // });
    });
</script>
</body>
</html>