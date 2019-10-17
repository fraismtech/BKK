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
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h1 class="mb-2">Silahkan Masuk</h1>
                                        <p>Selamat Datang Di Website Bursa Kerja Khusus Kota Depok, Silahkan Masukan Akun Anda.</p><br>

                                        <?=$this->session->flashdata('notif')?>
                                        <form method="POST" action="<?php echo base_url();?>auth_login"  id="logForm" class="mt-3 mt-sm-5">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">User Name*</label>
                                                        <input type="text" class="form-control" placeholder="Username" name="username" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password*</label>
                                                        <input type="password" class="form-control" placeholder="Password" name="password" />
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="submit" name="login" id="login" class="btn btn-primary text-uppercase"><span id="logText">masuk</span></button>
                                                </div>
                                                <div class="col-12  mt-3">
                                                    <p>Tidak Punya Akun ?<a href="<?php echo base_url(); ?>daftar"> Register</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2 media-hide">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/dashboard/img/bg/login.svg" alt="">
                                    </div>
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
    <!-- custom app -->
    <script src="<?php echo base_url(); ?>assets/dashboard/js/app.js"></script>
    <!-- <script type="text/javascript">
    $(document).ready(function(){
        $('#logText').html('masuk');
        $('#logForm').submit(function(e){
            e.preventDefault();
            $('#logText').html('Memproses ...');
            var url = '';
            var user = $('#logForm').serialize();
            var login = function(){
                $.ajax({
                    type: 'POST',
                    url: url + 'Dashboard/auth_login',
                    dataType: 'json',
                    data: user,
                    success:function(response){
                        $('#message').html(response.message);
                        $('#logText').html('masuk');
                        if(response.error){
                            $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                        }
                        else{
                            $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                            $('#logForm')[0].reset();
                            setTimeout(function(){
                                location.reload();
                            }, 2000);
                        }   
                    }
                });
            };
        setTimeout(login, 1000);
        });

        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    });
    </script> -->
</body>
</html>