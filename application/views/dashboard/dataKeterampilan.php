<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Data Keterampilan</h4>
                </div>
                <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modalAdd">Tambah</button>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="example" class="display compact table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Keterampilan</th>
                                <th>Nama Posisi Lowongan Kerja</th>
                                <th>Nama Keterampilan</th>
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
                    <h4>Tambah Keterampilan</h4>
                </div>
                <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <div class="modal-body">
                <form method="post" id="sliderForm" autocomplete="off" enctype="multipart/form-data">
                    <div class="pl-lg-1">
                        <div class="form-group">
                            <label>ID Keterampilan</label>
                            <input type="text" name="id_keahlian" class="form-control" placeholder="ID Keterampilan">
                        </div>
                        <div class="form-group">
                            <label>Nama Posisi Lowongan Kerja</label>
                            <select class="form-control" id="posisi" name="id_jenis_lowongan">
                                <option value="" selected="">Pilih Posisi Lowongan Kerja</option>
                                <?php foreach ($p_loker as $posisi) { ?>
                                    <option value="<?= $posisi->id_jenis_lowongan ?>"><?= $posisi->nama_jenis_lowongan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Keterampilan</label>
                            <input type="text" name="nama_keahlian" class="form-control" placeholder="Nama Keterampilan">
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
                <h4>Edit Keterampilan</h4>
              </div>
              <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="editForm" role="form" autocomplete="false"> 
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Keterampilan</label>
                        <input type="text" name="id_keahlian" id="id" class="form-control" placeholder="ID Keterampilan" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <select class="form-control select2_single" id="id_posisi" name="id_jenis_lowongan">
                            <option value="" selected="">Pilih Posisi Lowongan Kerja</option>
                            <?php foreach ($p_loker as $posisi) { ?>
                                <option value="<?= $posisi->id_jenis_lowongan ?>"><?= $posisi->nama_jenis_lowongan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Keterampilan</label>
                        <input type="text" name="nama_keahlian" id="nama_keahlian" class="form-control" placeholder="Nama Keterampilan">
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
            "url": "<?php echo site_url('dashboard/ajax_list_keterampilan')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 4 ], //first column / numbering column
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
        var id_posisi = div.data('id_posisi');

        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
        $('.select2_single option[value="'+id_posisi+'"]').attr('selected','selected');
        modal.find('#nama_keahlian').attr("value", div.data('nama_keahlian'));
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
                    url: "<?php echo base_url();?>dashboard/hapusKeterampilan/" + id,  
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
                            title: "Deleted!",
                            icon: "success",
                            text: data.msg,
                            buttons: true,
                        });
                        location.reload();
                    }
                });
                table.ajax.reload();
                setTimeout(function(){
                    location.reload();
                }, 600);
            } else {
                swal({
                    title: "Keterampilan tersimpan!",
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
            url:"<?php echo base_url(); ?>dashboard/tambahKeterampilan",   
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
                    location.reload();
                }
                else if(res.success == false){
                    swal({
                        title: "Gagal!",
                        text: res.msg,
                        icon: "error",
                    });
                }
                table.ajax.reload();
                // setTimeout(function(){
                //     location.reload(); 
                // }, 1000);
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
            url:"<?php echo base_url(); ?>dashboard/editKeterampilan",   
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
                        button: false
                    });  
                    location.reload();
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