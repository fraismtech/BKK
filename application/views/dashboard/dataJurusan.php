<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Data Jurusan SMK</h4>
                </div>
                <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modalAdd">Tambah</button>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="example" class="display compact table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Jurusan</th>
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
                    <h4>Tambah Jurusan</h4>
                </div>
                <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <div class="modal-body">
                <form method="post" id="sliderForm" autocomplete="off" enctype="multipart/form-data">
                    <div class="pl-lg-1">
                        <div class="form-group">
                            <label>Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" class="form-control" placeholder="Nama Jurusan" required="">
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
                <h4>Edit Jurusan</h4>
            </div>
            <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
        </div>
        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="editForm" role="form" autocomplete="false"> 
            <div class="modal-body">
                <input type="hidden" name="id_jurusan" id="id">
                <div class="form-group">
                    <label>Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" id="jurusan" class="form-control" placeholder="Nama Jurusan" required="">
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
    $(document).ready(function() {
        var table = $('#example').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('dashboard/ajax_list_jurusan')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 2 ], //first column / numbering column
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
<script>
    $(document).ready(function() {
    // Untuk sunting
    $('#edit-data').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        var id_sekolah = div.data('id_sekolah');

        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
        modal.find('#jurusan').attr("value", div.data('jurusan'));
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
                    url: "<?php echo base_url();?>dashboard/hapusJurusan/" + id,  
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
                    title: "Jurusan tersimpan!",
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
        $('#sliderForm').on('submit', function(e){  
            e.preventDefault();  

            $.ajax({  
                url:"<?php echo base_url(); ?>dashboard/tambahJurusan",   
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
                        setTimeout(function(){
                            location.reload();
                        }, 1100);
                    }
                    else if(res.success == false){
                        swal({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error",
                            timer: 1000,
                            buttons: false,
                        });
                    }
                    
                }  
            });  
        });  
    });  
</script>
<script type="text/javascript">
    $(document).ready(function(){  
        $('#editForm').on('submit', function(e){  
            e.preventDefault();  

            $.ajax({  
                url:"<?php echo base_url(); ?>dashboard/editJurusan",   
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
                            timer: 1000,
                            buttons: false,
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