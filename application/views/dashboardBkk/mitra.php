<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Data Mitra BKK</h4>
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
                                <th>Nama Perusahaan</th>
                                <th>Bidang Usaha</th>
                                <th>No. Telp </th>
                                <th>Email</th>
                                <th>Periode Kemitraan</th>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel-title">
                    <h4>Tambah Mitra BKK</h4>
                </div>
                <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <div class="modal-body">
                <form method="post" id="mitraForm" autocomplete="off" enctype="multipart/form-data">
                    <div class="panel-title">
                        <h5>Data Perusahaan</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bidang Usaha</label>
                                <input type="text" name="bidang_usaha" class="form-control" placeholder="Bidang Usaha">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Perusahaan</label>
                                <textarea class="form-control" name="alamat" placeholder="Alamat Perusahaan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select class="form-control" id="provinsi" name="provinsi">
                                    <option value="">Pilih Provinsi</option>
                                    <?php foreach ($provinsi as $prov) { ?>
                                        <option value="<?= $prov->id ?>"><?= $prov->name ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="prov" id="prov">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kota/Kabupaten</label>
                                <select class="form-control" id="kota" name="kota">
                                </select>
                                <input type="hidden" name="kab" id="kab">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control" id="kecamatan" name="kecamatan">
                                </select>
                                <input type="hidden" name="kec" id="kec">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select class="form-control" id="kelurahan" name="kelurahan">
                                </select>
                                <input type="hidden" name="kel" id="kel">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="number" name="kode_pos" class="form-control" placeholder="Kode Pos">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kemitraan</label>
                                <input type="text" name="jenis_kemitraan" class="form-control" placeholder="Jenis Kemitraan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telp Perusahaan</label>
                                <input type="number" name="no_telp" class="form-control" placeholder="No. Telp Perusahaan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Perusahaan</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Perusahaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama CP</label>
                                <input type="text" name="nama_cp" class="form-control" placeholder="Nama Contact Person">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan_cp" class="form-control" placeholder="Jabatan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telp CP</label>
                                <input type="number" name="no_telp_cp" class="form-control" placeholder="No Telp">
                            </div>
                        </div>
                    </div><hr>
                    <div class="panel-title">
                        <h5>Periode Kemitraan</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari</label>
                                <div class='input-group date' id='datepicker-top-left'>
                                    <input class="form-control" type='text' name="dari" placeholder="Dari" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai</label>
                                <div class='input-group date' id='datepicker-top-right'>
                                    <input class="form-control" type='text' name="sampai" placeholder="Sampai" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4" id="simpan"><span id="mitraText"></span></button>
                    </div>
                </form>
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
            "url": "<?php echo site_url('dashboardBkk/ajax_list_mitra')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 6 ], //first column / numbering column
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
$(document).ready(function() {
    $('#example').on('click','.hapus-mitra', function () {
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
                    url: "<?php echo base_url();?>dashboardBkk/hapusMitra/" + id,  
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
            } else {
                swal({
                    title: "Mitra tersimpan!",
                    icon: "info",
                    timer: 10000
                });
            }
            table.ajax.reload();
        })
    });
});
</script>
<script type="text/javascript">
$("#provinsi").change(function(){
    var prov = $(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_kota",
        method:"POST",
        data:{prov:prov},
        success:function(data) {
            $('#kota').html(data);
        }
    });

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_provinsi",
        method:"POST",
        data:{prov:prov},
        success:function(data) {
            $('#prov').val(data);
        }
    });
});

$("#kota").change(function(){
    var kota = $(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_kec",
        method:"POST",
        data:{kota:kota},
        success:function(data) {
            $('#kecamatan').html(data);
        }
    });

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_kota",
        method:"POST",
        data:{kota:kota},
        success:function(data) {
            $('#kab').val(data);
        }
    });
});

$("#kecamatan").change(function(){
    var kec = $(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_kel",
        method:"POST",
        data:{kec:kec},
        success:function(data) {
            $('#kelurahan').html(data);
        }
    });

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_kec",
        method:"POST",
        data:{kec:kec},
        success:function(data) {
            $('#kec').val(data);
        }
    });
});

$("#kelurahan").change(function(){
    var kel = $(this).val();

    $.ajax({
        url:"<?php echo base_url(); ?>dashboardBkk/get_nama_kel",
        method:"POST",
        data:{kel:kel},
        success:function(data) {
            $('#kel').val(data);
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#mitraText').html('Simpan');
    $('#mitraForm').submit(function(e){
        e.preventDefault();
        $('#mitraText').html('Menyimpan ...');
        var url = '<?php echo base_url(); ?>';
        var mitra = $('#mitraForm').serialize();
        var save = function(){

            $.ajax({
                type: 'POST',
                url: url + 'dashboardBkk/simpanMitra',
                dataType: 'json',
                data: mitra,
                success:function(res){
                    $('#mitraText').html('Simpan');
                    console.log(res.success);
                    if(res.success == true){  
                        swal({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success",
                        }); 
                        $('#mitraForm')[0].reset();
                        $('#modalAdd').modal('hide'); 
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
        table.ajax.reload();
    });
    $(document).on('click', '#clearMsg', function(){
        $('#responseDiv').hide();
    });
});
</script>
<?php if ($this->session->flashdata('notif1')): ?>
    <script type="text/javascript">
      $(document).ready(function() {
        swal({
          title: "Berhasil !",
          text: "<?php echo $this->session->flashdata('notif1'); ?>",
          icon: "success",
          timer: 10000
        });
      });
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('notif2')): ?>
    <script type="text/javascript">
      $(document).ready(function() {
        swal({
          title: "Maaf !",
          text: "<?php echo $this->session->flashdata('notif2'); ?>",
          icon: "error",
          timer: 10000
        });
      });
    </script>
<?php endif; ?>