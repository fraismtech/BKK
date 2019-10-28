<!-- Notification -->
<div class="row">
    <div class="col-md-12">
        <?=$this->session->flashdata('notif')?>
    </div>
</div>
<!-- end row -->
<!-- begin row -->
<div class="row">
    <div class="col-sm-12">
        <div class="card card-statistics">
            <div class="row no-gutters">
                <div class="col-xxl-4 col-lg-4">
                    <div class="p-20">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total Alumni</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                        </div>
                        <div class="d-block d-sm-flex h-100 align-items-center">
                            <div class="apexchart-wrapper">
                                <div id="analytics7"></div>
                            </div>
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> 15,640</h3>
                                <p>Monthly visitor</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <div class="p-20">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total Loker</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                        </div>
                        <div class="d-block d-sm-flex h-100 align-items-center">
                            <div class="apexchart-wrapper">
                                <div id="analytics8"></div>
                            </div>
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> 16,656</h3>
                                <p>This month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <div class="p-20">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total Kegiatan</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                        </div>
                        <div class="d-block d-sm-flex h-100 align-items-center">
                            <div class="apexchart-wrapper">
                                <div id="analytics9"></div>
                            </div>
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>569</h3>
                                <p>Avg. Sales per day</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Kegiatan Terbaru</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="example" class="display compact table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Uraian</th>
                                <th>Foto Kegiatan</th>
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
<!-- end container-fluid -->
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
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="editForm" role="form"> 
                <div class="modal-body">
                    <input type="hidden" name="id_kegiatan" id="id">
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
                        <label>Uraian</label>
                        <textarea class="form-control" id="uraian" name="uraian" placeholder="Uraian Kegiatan"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="file" class="form-control foto" placeholder="Foto"><br>
                        <div class="portfolio-item">
                            <img id="foto" alt="gallery-img">
                        </div>
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
            "url": "<?php echo site_url('dashboardBkk/ajax_list_kegiatan')?>",
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
    $('#btn-reset').click(function(){
        table.ajax.reload();
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
        modal.find('#uraian').html(div.data('uraian'));
        modal.find('#foto').attr("src", "<?php echo base_url(); ?>assets/upload/image/" + div.data('foto'));
        modal.find('#roomNumber').text(div.data('foto'));
        modal.find('#image').attr("href", "<?php echo base_url(); ?>assets/upload/image/"+ div.data('foto1'));
        modal.find('#image').attr("href", "<?php echo base_url(); ?>assets/upload/image/"+ div.data('foto1'));
    });

    $('#example').on('click','.hapus-menabung', function () {
        var id =  $(this).data('id');
        swal({
            title: "Anda yakin?",
            text: "Saat dihapus, Anda tidak dapat mengembalikan data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "<?php echo base_url();?>dashboardBkk/hapusKegiatan/" + id,  
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
                    title: "Kegiatan tersimpan!",
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
    if (this.files && this.files[0] && this.files[0].name.match(/\.(jpg|png|jpeg|PNG)$/) ) {
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
    $('#editForm').on('submit', function(e){  
        e.preventDefault();  
       
        $.ajax({  
            url:"<?php echo base_url(); ?>dashboardBkk/editKegiatan",   
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
                    $('#edit-data').modal('close');
                    table.ajax.reload();
                }, 500);
            }  
        });  
    });  
});  
</script>