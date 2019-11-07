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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Perusahaan</label>
                                <textarea class="form-control" name="alamat" placeholder="Alamat Perusahaan" required=""></textarea>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telp Perusahaan</label>
                                <input type="number" name="no_telp" class="form-control" placeholder="No. Telp Perusahaan" required="">
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Perusahaan</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Perusahaan" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bidang Usaha</label>
                                <input type="text" name="bidang_usaha" class="form-control" placeholder="Bidang Usaha" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama CP</label>
                                <input type="text" name="nama_cp" class="form-control" placeholder="Nama Contact Person" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan_cp" class="form-control" placeholder="Jabatan" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telp CP</label>
                                <input type="number" name="no_telp_cp" class="form-control" placeholder="No Telp" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kemitraan</label>
                                <select name="jenis_kemitraan" class="form-control" required="">
                                    <option value="">Pilih Jenis Kemitraan</option>
                                    <option value="Magang">Magang</option>
                                    <option value="Pelatihan">Pelatihan</option>
                                    <option value="Perekrutan">Perekrutan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <!-- <input type="text" name="jenis_kemitraan" class="form-control" placeholder="Jenis Kemitraan" required=""> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari</label>
                                <div class="input-group">
                                    <input type="text" name="dari" class="form-control" id="datepicker-autoclose3" placeholder="Dari" required="">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai</label>
                                <div class="input-group">
                                    <input type="text" name="sampai" class="form-control" id="datepicker-autoclose4" placeholder="Sampai" required="">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" name="file" class="form-control foto" placeholder="Foto" required="">
                                <p>Gambar JPG/PNG Max. 2Mb</p>
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

<!-- Modal Edit -->
<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel-title">
                    <h4>Edit Mitra BKK</h4>
                </div>
                <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <div class="modal-body">
                <div class="portfolio-item">
                    <center><img id="foto" alt="gallery-img" style="width: 50%; height: 50%;"></center>
                </div><br/>
                <form method="post" id="mitraEdit" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="id_mitra" id="id_mitra"><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" required="" id="nama_perusahaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Perusahaan</label>
                                <textarea class="form-control" name="alamat" placeholder="Alamat Perusahaan" required="" id="alamat"></textarea>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telp Perusahaan</label>
                                <input type="number" name="no_telp" class="form-control" placeholder="No. Telp Perusahaan" required="" id="no_telp">
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Perusahaan</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Perusahaan" required="" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bidang Usaha</label>
                                <input type="text" name="bidang_usaha" class="form-control" placeholder="Bidang Usaha" required="" id="bidang_usaha">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama CP</label>
                                <input type="text" name="nama_cp" class="form-control" placeholder="Nama Contact Person" required="" id="nama_cp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan_cp" class="form-control" placeholder="Jabatan" required="" id="jabatan_cp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telp CP</label>
                                <input type="number" name="no_telp_cp" class="form-control" placeholder="No Telp" required="" id="no_telp_cp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kemitraan</label>
                                <select name="jenis_kemitraan" class="form-control select2_single" required="" id="jenis_kemitraan">
                                    <option value="">Pilih Jenis Kemitraan</option>
                                    <option value="Magang">Magang</option>
                                    <option value="Pelatihan">Pelatihan</option>
                                    <option value="Perekrutan">Perekrutan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <!-- <input type="text" name="jenis_kemitraan" class="form-control" placeholder="Jenis Kemitraan" required=""> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari</label>
                                <div class="input-group">
                                    <input type="text" name="dari" class="form-control" id="datepicker-autoclose1" placeholder="Dari" required="">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai</label>
                                <div class="input-group">
                                    <input type="text" name="sampai" class="form-control" id="datepicker-autoclose2" placeholder="Sampai" required="">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" name="file" class="form-control foto" placeholder="Foto" required="" id="logo_mitra">
                                <p>Gambar JPG/PNG Max. 2Mb</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4" id="simpan"><span id="editText"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    /*datwpicker*/
    jQuery('.mydatepicker').datepicker();
    jQuery('#datepicker-autoclose1').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });

    jQuery('#datepicker-autoclose2').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });

    jQuery('#datepicker-autoclose3').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });

    jQuery('#datepicker-autoclose4').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
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
        $('#edit-data').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)
            var jenis_kemitraan = div.data('jenis_kemitraan');

            // Isi nilai pada field
            modal.find('#id_mitra').attr("value", div.data('id_mitra'));
            modal.find('#nama_perusahaan').attr("value", div.data('nama_perusahaan'));
            modal.find('#alamat').text(div.data('alamat'));
            modal.find('#no_telp').attr("value", div.data('no_telp'));
            modal.find('#email').attr("value", div.data('email'));
            modal.find('#bidang_usaha').attr("value", div.data('bidang_usaha'));
            modal.find('#nama_cp').attr("value", div.data('nama_cp'));
            modal.find('#jabatan_cp').attr("value", div.data('jabatan_cp'));
            modal.find('#no_telp_cp').attr("value", div.data('no_telp_cp'));
            $('.select2_single option[value="'+jenis_kemitraan+'"]').attr('selected','selected');
            modal.find('#datepicker-autoclose1').attr("value", div.data('periode_dari'));
            modal.find('#datepicker-autoclose2').attr("value", div.data('periode_sampai'));
            modal.find('#nama_perusahaan').attr("value", div.data('nama_perusahaan'));
            modal.find('#foto').attr("src", "<?php echo base_url(); ?>assets/upload/image/" + div.data('logo_mitra'));
            modal.find('#roomNumber').text(div.data('foto'));
            modal.find('#image').attr("href", "<?php echo base_url(); ?>assets/upload/image/"+ div.data('foto1'));
        });

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
                            });      
                        },
                        success:function(data){
                            swal({
                                title: "Terhapus!",
                                icon: "success",
                                text: "Data mitra berhasil dihapus",
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
                        title: "Mitra tersimpan!",
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
        $('#mitraText').html('Simpan');
        $('#mitraForm').on('submit', function(e){  
            e.preventDefault(); 
            $('#mitraText').html('Menyimpan ...'); 

            $.ajax({  
                url:"<?php echo base_url(); ?>dashboardBkk/simpanMitra",   
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType: "json",
                success:function(res)  
                {  
                    $('#mitraText').html('Simpan');
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
        $('#editText').html('Simpan');
        $('#mitraEdit').on('submit', function(e){  
            e.preventDefault(); 
            $('#editText').html('Menyimpan ...'); 

            $.ajax({  
                url:"<?php echo base_url(); ?>dashboardBkk/editMitra",   
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType: "json",
                success:function(res)  
                {  
                    $('#editText').html('Simpan');
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