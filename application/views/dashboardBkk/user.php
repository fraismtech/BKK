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
                <div class="form-group">
                    <button id="btn-reset" class="btn btn-sm btn-info">Refresh Table</button>
                </div>
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
                            <input type="text" name="username" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
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
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="editForm" role="form"> 
                <div class="modal-body">
                    <input type="hidden" id="id_user" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
                    <input type="hidden" id="id_sekolah" name="id_sekolah" value="<?= $this->session->userdata('id_sekolah'); ?>">
                    <input type="hidden" id="id_perijinan" name="id_perijinan" value="<?= $this->session->userdata('id_perijinan'); ?>">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="******" required="">
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
            </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit"><span id="textUpdate"></span></button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" style="margin-top: 150px ">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Ooopss..</h4>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
          </div>
          <div class="modal-body">
              <h4>You dont have any available moneybox,<br>create a new one by clicking button below</h4>
          </div>
          <div class="modal-footer">
            <a class="btn btn-info" href="<?= base_url('Home/celengan'); ?>">Create</a>
          </div>
      </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

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
    function refresh()
    {
        table.ajax.reload();
    }
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
                            title: "Terhapus!",
                            icon: "success",
                            text: data.msg,
                            buttons: true,
                        });
                    }
                });
                table.ajax.reload();
                setTimeout(function(){
                    location.reload();
                }, 600);
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
    $('#userForm').submit(function(e){
        e.preventDefault();
        $('#textUser').html('Menyimpan ...');
        var url = '<?php echo base_url(); ?>';
        var mitra = $('#userForm').serialize();
        var save = function(){

            $.ajax({
                type: 'POST',
                url: url + 'dashboardBkk/tambahUser',
                dataType: 'json',
                data: mitra,
                success:function(res){
                    $('#textUser').html('Simpan');
                    console.log(res.success);
                    if(res.success == true){  
                        swal({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success",
                        }); 
                        $('#userForm')[0].reset();
                        $('#modalAdd').modal('hide'); 
                        refresh();
                    }
                    else {
                        swal({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error",
                        });
                    }
                    // if(response.error){
                    //     swal({
                    //         title: "Maaf!",
                    //         text: "Data Gagal Disimpan!",
                    //         icon: "error",
                    //     });
                    // }
                    // else{
                    //     swal({
                    //         title: "Berhasil!",
                    //         text: "Data Berhasil Disimpan!",
                    //         icon: "success",
                    //     });
                        
                    // }
                }
            });
        };
        setTimeout(save, 1000);
    });
    $(document).on('click', '#clearMsg', function(){
        $('#responseDiv').hide();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#textUpdate').html('Update');
    $('#editForm').submit(function(e){
        e.preventDefault();
        $('#textUpdate').html('Mengupdate ...');
        var url = '<?php echo base_url(); ?>';
        var mitra = $('#editForm').serialize();
        var save = function(){

            $.ajax({
                type: 'POST',
                url: url + 'dashboardBkk/editUser',
                dataType: 'json',
                data: mitra,
                success:function(res){
                    $('#textUpdate').html('Update');
                    console.log(res.success);
                    if(res.success == true){  
                        swal({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success",
                        }); 
                        $('#editForm')[0].reset();
                        $('#edit-data').modal('hide'); 
                        refresh();
                    }
                    else {
                        swal({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error",
                        });
                    }
                    // if(response.error){
                    //     swal({
                    //         title: "Maaf!",
                    //         text: "Data Gagal Disimpan!",
                    //         icon: "error",
                    //     });
                    // }
                    // else{
                    //     swal({
                    //         title: "Berhasil!",
                    //         text: "Data Berhasil Disimpan!",
                    //         icon: "success",
                    //     });
                        
                    // }
                }
            });
        };
        setTimeout(save, 1000);
    });
    $(document).on('click', '#clearMsg', function(){
        $('#responseDiv').hide();
    });
});
</script>