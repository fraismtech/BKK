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
                    <div class="container-fluid p-5">
                        <div class="row justify-content-center">
                            <div class="d-flex align-items-center card col-lg-5">
                                <div class="login p-50">
                                    <h1 class="mb-2 text-center">Registrasi</h1>
                                    <p class="text-center">Selamat Datang Di Website Bursa Kerja Khusus Kota Depok, Silahkan Registrasi</p>
                                    <form action="#" class="mt-2 mt-sm-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">NPSN*</label>
                                                    <input type="text" class="form-control" placeholder="NPSN" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Sekolah*</label>
                                                    <input type="text" class="form-control" placeholder="Nama Sekolah" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Jurusan*</label>
                                                    <select class="form-control">
                                                        <option>Jurusan 1</option>
                                                        <option>Jurusan 2</option>
                                                        <option>Jurusan 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Alamat*</label>
                                                    <textarea class="form-control">Alamat Lengkap Sekolah</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Kecamatan*</label>
                                                    <select class="form-control">
                                                        <option>Kecamatan 1</option>
                                                        <option>Kecamatan 2</option>
                                                        <option>Kecamatan 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Kelurahan*</label>
                                                    <select class="form-control">
                                                        <option>Kelurahan 1</option>
                                                        <option>Kelurahan 2</option>
                                                        <option>Kelurahan 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Operator*</label>
                                                    <input type="text" class="form-control" placeholder="Nama Sekolah" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Alamat Email*</label>
                                                    <input type="email" class="form-control" placeholder="example@mail.com" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">No Hp*</label>
                                                    <input type="number" class="form-control" placeholder="No Handphone" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Username*</label>
                                                    <input type="text" class="form-control" placeholder="Username" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password*</label>
                                                    <input type="password" class="form-control" placeholder="*********" />
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3 text-center">
                                                <a href="<?php echo base_url(); ?>dashboard" class="btn btn-primary text-uppercase">Daftar</a>
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
    <!-- custom app -->
    <script src="<?php echo base_url(); ?>assets/dashboard/js/app.js"></script>
</body>
</html>