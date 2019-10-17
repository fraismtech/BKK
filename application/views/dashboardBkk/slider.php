<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Data Slider</h4>
                </div>
                <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modalAdd">Tambah</button>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="example" class="display compact table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>tanggal</th>
                                <th>Judul</th>
                                <th>Foto</th>
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
                    <h4>Tambah Slider</h4>
                </div>
                <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <div class="modal-body">
                <form method="post" id="sliderForm" autocomplete="off" enctype="multipart/form-data">
                    <div class="pl-lg-1">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class='input-group date' id='datepicker-bottom-left'>
                                <input class="form-control" type='text' name="tanggal" placeholder="Tanggal Slider" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="file" class="form-control foto" placeholder="Foto">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4" id="simpan"><span id="textSlider">Simpan</span></button>
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
                <h4>Edit Slider</h4>
              </div>
              <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <form class="form-horizontal" action="<?php echo base_url();?>Home/edit_Tabungan" method="post" enctype="multipart/form-data" role="form"> 
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class='input-group date' id='datepicker-action'>
                            <input class="form-control" type='text' name="tanggal" placeholder="Tanggal Slider" id="tanggal" />
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul" id="judul">
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="file" class="form-control foto" placeholder="Foto">
                        <a href="<?php echo base_url('assets/upload/image/');?>" id="foto" class="text-danger"> File : </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit"> Update&nbsp;</button>
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
            "url": "<?php echo site_url('dashboardBkk/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 3 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 4 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
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
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });
});
</script>
<script>
$(document).ready(function() {
    // Untuk sunting
    $('#edit-data').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
        modal.find('#tanggal').attr("value", div.data('tanggal'));
        modal.find('#judul').attr("value", div.data('judul'));
        modal.find('#foto').attr("value", div.data('foto'));
    });

    $('#example').on('click','.hapus-menabung', function () {
        var id =  $(this).data('id');
        var celengan =  $(this).data('celengan');
        var jumlah =  $(this).data('jumlah');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this savings!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                window.location.href = "<?php echo base_url();?>Home/hapus_Tabungan/" + id + "/" + celengan + "/" + jumlah;
            } else {
                swal({
                    title: "Saved savings!",
                    icon: "info",
                    timer: 10000
                });
            }
        })
    });
});
</script>
<script type="text/javascript">
$(".foto").change(function() {
    if (this.files && this.files[0] && this.files[0].name.match(/\.(jpg|png)$/) ) {
        if(this.files[0].size>10485760) {
            $('.foto').val('');
            alert('Batas Maximal Ukuran File 8MB !');
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
$(document).ready(function(){  
    $('#sliderForm').on('submit', function(e){  
        e.preventDefault();  
       
        $.ajax({  
            url:"<?php echo base_url(); ?>dashboardBkk/tambahSlider",   
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
                setTimeout(function(){
                    location.reload(); 
                }, 1000);
            }  
        });  
    });  
});  
</script>
