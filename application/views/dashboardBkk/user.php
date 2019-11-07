<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Data User</h4>
                </div>
                <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modalAdd">Tambah</button>
            </div>
            <div class="card-body">
                <!-- <div class="form-group">
                    <button id="btn-reset" class="btn btn-sm btn-info">Refresh Table</button>
                </div> -->
                <div class="datatable-wrapper table-responsive">
                    <table id="example" class="display compact table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Username</th>
                                <th>Nama Operator</th>
                                <th>Email</th>
                                <th>No. HP</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel-title">
                    <h4>Tambah User</h4>
                </div>
                <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <div class="modal-body">
                <form method="post" id="userForm" autocomplete="off" enctype="multipart/form-data">
                    <div class="pl-lg-1">
                        <input type="hidden" name="id_sekolah" value="<?= $this->session->userdata('id_sekolah'); ?>">
                        <input type="hidden" name="id_perijinan" value="<?= $this->session->userdata('id_perijinan'); ?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username1" class="form-control" placeholder="Username" required="" onkeyup='cek_username()'>
                            <small id="pesan_username1" class=""></small>
                            <small class='text-danger' id="username-used1" style='display:none'>* Username sudah digunakan!</small>
                            <small class='text-success' id="username-available1" style='display:none'>* Username tersedia!</small>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password1" class="form-control" placeholder="Password" required="" onkeyup="cek_password()">
                            <small id="pesan_password1" class=""></small>
                            <small class='text-danger' id="password-used1" style='display:none'>* Username dan password tidak boleh sama!</small>
                            <small class='text-success' id="password-available1" style='display:none'>* Password bisa digunakan!</small>
                        </div>
                        <div class="form-group">
                            <label>Nama Operator</label>
                            <input type="text" name="nama_operator" class="form-control" placeholder="Nama Operator" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <label>No. HP</label>
                            <input type="number" name="no_hp" class="form-control" placeholder="No. HP" required="">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="file" class="form-control foto" placeholder="Foto" required="">
                            <p>Gambar JPG/PNG Max. 2Mb</p>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4" id="simpan"><span id="textUser"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <div class="panel-title">
                <h4>Edit User</h4>
            </div>
            <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
        </div>
        <div class="portfolio-item">
            <center><img id="foto" alt="gallery-img" class="img-circle" style="width: 50%; height: 50%;"></center>
        </div><br/>
        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="editForm" role="form"> 
            <div class="modal-body">
                <input type="hidden" id="id_user" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
                <input type="hidden" id="id_sekolah" name="id_sekolah" value="<?= $this->session->userdata('id_sekolah'); ?>">
                <input type="hidden" id="id_perijinan" name="id_perijinan" value="<?= $this->session->userdata('id_perijinan'); ?>">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="" onkeyup="cek_username1()" onshow="cek_username1()">
                    <small id="pesan_username" class=""></small>
                    <small class='text-danger' id="username-used" style='display:none'>* Username sudah digunakan!</small>
                    <small class='text-success' id="username-available" style='display:none'>* Username tersedia!</small>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="******" required="" onshow="cek_password1()" onkeyup="cek_password1()">
                    <small id="pesan_password" class=""></small>
                    <small class='text-danger' id="password-used" style='display:none'>* Username dan password tidak boleh sama!</small>
                    <small class='text-success' id="password-available" style='display:none'>* Password bisa digunakan!</small>
                </div>
                <div class="form-group">
                    <label>Nama Operator</label>
                    <input type="text" name="nama_operator" id="nama" class="form-control" placeholder="Nama Operator" required="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>No. HP</label>
                    <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="No. HP" required="">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="file" class="form-control foto" placeholder="Foto" required="">
                    <p>Gambar JPG/PNG Max. 2Mb</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="submit" id="update"><span id="textUpdate"></span></button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
            </div>
        </form>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "paging"         : true,
        "lengthMenu"     : [10,25,50,100],
        "scrollY"        : "300px",
        "scrollCollapse" : true,
        "searching"      : true,
        "ordering"       : true,
        "info"           : true,
        "scrollX"        : true,
        "scrollCollapse" : true,
        "searching"      : true,
        "ordering"       : true,
        "info"           : true, //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('dashboardBkk/ajax_list_user')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 5 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        // { 
        //     "targets": [ 4 ], //first column / numbering column
        //     "orderable": false, //set not orderable
        // },
        ],
        "language": {         
          "info": "",
          "infoEmpty": "",       
          "infoFiltered": ""
      }
  });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){
        table.ajax.reload();
    });
});
</script>
<script type="text/javascript">
    function disableBtn() {
        document.getElementById("simpan").disabled = true;
    }

    function enableBtn() {
        document.getElementById("simpan").disabled = false;
    }
    function cek_username(){
        $("#pesan_username1").hide();

        var username = $("#username1").val();
        var password = $("#password1").val();

        if(username != ""){
            $.ajax({
                url: "<?php echo site_url('dashboardBkk/usernameList')?>",
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
<!-- Edit -->
<script type="text/javascript">
    function disableBtn1() {
        document.getElementById("update").disabled = true;
    }

    function enableBtn1() {
        document.getElementById("update").disabled = false;
    }
    function cek_username1(){
        $("#pesan_username").hide();

        var username = $("#username").val();
        var password = $("#password").val();

        if(username != ""){
            $.ajax({
                url: "<?php echo site_url('dashboardBkk/usernameList')?>",
                data: 'username='+username,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#username").css({ 'border-color': '#a94442'});
                        $("#username-available").hide();
                        $("#username-used").show();
                        // disableBtn();
                        error = 1;
                        if (username == password) {
                            $("#password").css({ 'border-color': '#a94442'});
                            $("#password-available").hide();
                            $("#password-used").show();
                            disableBtn();
                        } else {
                            $("#password").css({ 'border-color': '#3c763d'});
                            $("#password-used").hide();
                            $("#password-available").show();
                            enableBtn();
                        }
                    }else{
                        $("#username").css({ 'border-color': '#3c763d'});
                        $("#username-used").hide();
                        $("#username-available").show();
                        // enableBtn();
                        error = 0;
                        if (username == password) {
                            $("#password").css({ 'border-color': '#a94442'});
                            $("#password-available").hide();
                            $("#password-used").show();
                            disableBtn();
                        } else {
                            $("#password").css({ 'border-color': '#3c763d'});
                            $("#password-used").hide();
                            $("#password-available").show();
                            enableBtn();
                        }
                    }
                }
            });
        }  
    }
    function cek_password1(){
        var username = $("#username").val();
        var password = $("#password").val();

        if (username == password) {
            $("#password").css({ 'border-color': '#a94442'});
            $("#password-available").hide();
            $("#password-used").show();
            disableBtn1();
        } else {
            $("#password").css({ 'border-color': '#3c763d'});
            $("#password-used").hide();
            $("#password-available").show();
            enableBtn1();
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
<script>
    $(document).ready(function() {
    // Untuk sunting
    $('#edit-data').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field
        modal.find('#id_user').attr("value", div.data('id_user'));
        modal.find('#id_sekolah').attr("value", div.data('id_sekolah'));
        modal.find('#id_perijinan').attr("value", div.data('id_perijinan'));
        modal.find('#username').attr("value", div.data('username'));
        modal.find('#email').attr("value", div.data('email'));
        modal.find('#no_hp').attr("value", div.data('no_hp'));
        modal.find('#nama').attr("value", div.data('nama'));
        modal.find('#foto').attr("src", "<?php echo base_url(); ?>assets/upload/image/user/" + div.data('foto'));
        
    });

    $('#example').on('click','.hapus-menabung', function () {
        var id =  $(this).data('id_user');
        swal({
            title: "Anda yakin?",
            text: "Saat dihapus, Anda tidak dapat mengembalikan data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "<?php echo base_url();?>dashboardBkk/hapusUser/" + id,  
                    method: "GET",
                    beforeSend :function() {
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                              swal.showLoading()
                          }
                      })      
                    },
                    success:function(data){
                        swal({
                            title: "Berhasil!",
                            icon: "success",
                            text: "Data berhasil dihapus",
                            timer: 1000,
                            buttons: false,
                        });
                        setTimeout(function(){
                            location.reload();
                        }, 1100);
                    }
                });
            } else {
                swal({
                    title: "User tersimpan!",
                    icon: "info",
                    timer: 10000
                });
            }
        })
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#textUser').html('Simpan');
        $('#userForm').on('submit', function(e){  
            e.preventDefault();  
            $('#textUser').html('Menyimpan ...');

            $.ajax({  
                url:"<?php echo base_url(); ?>dashboardBkk/tambahUser",   
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType: "json",
                success:function(res)  
                {  
                    $('#textUser').html('Simpan');
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
        $('#textUpdate').html('Update');
        $('#editForm').submit(function(e){
            e.preventDefault();
            $('#textUpdate').html('Mengupdate ...');
            $.ajax({  
                url:"<?php echo base_url(); ?>dashboardBkk/editUser",   
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType: "json",
                success:function(res)  
                {  
                    $('#textUser').html('Simpan');
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