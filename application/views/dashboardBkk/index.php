<script type="text/javascript" src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
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
                <div class="col-xxl-3 col-lg-3">
                    <div class="p-20">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total Alumni</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                        </div>
                        <div class="d-block h-100 align-items-center">
                            <!-- div class="apexchart-wrapper">
                                <div id="analytics4"></div>
                            </div> -->
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-left text-sm-left">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> <?= $total_alumni ?></h3>
                                <!-- <p>BKK</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-3">
                    <div class="p-20">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total Loker</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                        </div>
                        <div class="d-block h-100 align-items-center">
                            <!-- <div class="apexchart-wrapper">
                                <div id="analytics8"></div>
                            </div> -->
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-left text-sm-left">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> <?= $total_loker ?></h3>
                                <!-- <p>Lowongan Kerja</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-3">
                    <div class="p-20">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total Mitra</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                        </div>
                        <div class="d-block h-100 align-items-center">
                            <!-- <div class="apexchart-wrapper">
                                <div id="analytics8"></div>
                            </div> -->
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-left text-sm-left">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> <?= $total_mitra ?></h3>
                                <!-- <p>Lowongan Kerja</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-3">
                    <div class="p-20">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total Kegiatan</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                        </div>
                        <div class="d-block h-100 align-items-center">
                            <!-- <div class="apexchart-wrapper">
                                <div id="analytics8"></div>
                            </div> -->
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-left text-sm-left">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> <?= $total_kegiatan ?></h3>
                                <!-- <p>Kegiatan</p> -->
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
                    <table id="example" class="display compact table table-striped" width="100%">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel-title">
                    <h4>Edit Kegiatan</h4>
                </div>
                <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="editForm" role="form"> 
                <div class="modal-body">
                    <input type="hidden" name="id_kegiatan" id="id">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class='input-group date' id='datepicker-action'>
                            <input class="form-control" type='text' name="tanggal" placeholder="Tanggal Slider" id="tanggal" required="" />
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul" id="judul" required="">
                    </div>
                    <div class="form-group">
                        <label>Uraian</label>
                        <textarea id="uraian" name="uraian" class="form-control" required=""></textarea>
                        <!-- <textarea class="form-control" id="" name="uraian" placeholder="Uraian Kegiatan"></textarea> -->
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="file" class="form-control foto" placeholder="Foto" required="">
                        <p>Gambar JPG/PNG Max. 2Mb</p><br>
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
<script type="text/javascript">
    CKEDITOR.replace('uraian', {
      height: 150,
      baseFloatZIndex: 10005
  });
</script>

<script type="text/javascript">
    CKEDITOR.replace('uraian1', {
      height: 150,
      baseFloatZIndex: 10005
  });
</script>
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
        var b = modal.find('#uraian').val(div.data('uraian'));
        CKEDITOR.instances['uraian'].setData(b);
        modal.find('#foto').attr("src", "<?php echo base_url(); ?>assets/upload/image/kegiatan/" + div.data('foto'));
        modal.find('#roomNumber').text(div.data('foto'));
        modal.find('#image').attr("href", "<?php echo base_url(); ?>assets/upload/image/kegiatan/"+ div.data('foto1'));
        modal.find('#image').attr("href", "<?php echo base_url(); ?>assets/upload/image/kegiatan/"+ div.data('foto1'));
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

            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

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
                    }, 1300);
                }  
            });  
        });  
    });  
</script>