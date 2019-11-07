<script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Data Bursa Kerja Khusus</h4>
                </div>
                <!-- <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modalAdd">Tambah</button> -->
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="example" class="display compact table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>NPSN</th>
                                <th>Nama Sekolah</th>
                                <th>Alamat</th>
                                <th>No. Ijin</th>
                                <th>Tanggal Perijinan</th>
                                <th>Struktur</th>
                                <th>Dokumen</th>
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

<!-- Modal Edit -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <div class="panel-title">
                <h4>Edit BKK</h4>
            </div>
            <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="editForm" role="form" action="<?php echo base_url(); ?>dashboard/updateBKK"> 
                <div class="panel-title">
                    <h5>Profil Sekolah</h5>
                </div>
                <hr>
                <input type="hidden" name="id_s" id="id_sekolah" value="">
                <div class="form-group">
                    <label>NPSN</label>
                    <input type="text" class="form-control" id="npsn" name="npsn" value="" required="">
                </div>
                <div class="form-group">
                    <label>Nama Sekolah</label>
                    <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="" required="">
                </div>
                <div class="form-group">
                    <label>Alamat Sekolah</label>
                    <textarea class="form-control" id="alamat_sekolah" name="alamat_sekolah" required=""></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Kecamatan*</label>
                    <select class="form-control select2_single" id="kecamatan" name="kecamatan" required="">
                        <option id="kec" value=""></option>
                        <option value="">Pilih Kecamatan</option>
                        <?php foreach ($kecamatan as $kec) { ?>
                            <option value="<?= $kec->name ?>"><?= $kec->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Kelurahan*</label>
                    <select class="form-control select2_single1" id="kelurahan" name="kelurahan" required="">
                    </select>
                </div>
                <div class="form-group">
                    <label>Visi</label>
                    <textarea id="visi" class="form-control" name="visi" required=""></textarea>
                    <!-- <textarea class="form-control" name="visi"></textarea> -->
                </div>
                <div class="form-group">
                    <label>Misi</label>
                    <textarea class="form-control" id="misi" name="misi" required=""></textarea>
                </div>
                <hr>
                <div class="panel-title">
                    <h5>Data Perijinan</h5>
                </div>
                <hr>
                <input type="hidden" name="id_perijinan" id="id_perijinan" value="">
                <div class="form-group">
                    <label>Ijin BKK*</label>
                    <div class="row col-lg-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ijin_bkk" id="gridRadios1" required="" value="Ya">
                            <label class="form-check-label" for="gridRadios1">
                                YA &nbsp;
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ijin_bkk" id="gridRadios2" required="" value="Tidak">
                            <label class="form-check-label" for="gridRadios2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>No Ijin*</label>
                    <input type="text" class="form-control" name="no_ijin" value="" required="" placeholder="No. Ijin" id="no_ijin">
                </div>
                <div class="form-group">
                    <label class="control-label">Tanggal Perijinan*</label>
                    <div class="input-group">
                        <input type="text" name="tgl_perijinan" class="form-control" id="datepicker-autoclose1" placeholder="Tanggal Perijinan" required="" value="">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4" id="simpan"><span id="textEdit">Simpan</span></button>
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
        "order": [],
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
            "url": "<?php echo site_url('dashboard/ajax_list_bkk')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        // { 
        //     "targets": [ 4 ], //first column / numbering column
        //     "orderable": false, //set not orderable
        // },
        // { 
        //     "targets": [ 5 ], //first column / numbering column
        //     "orderable": false, //set not orderable
        // },
        { 
            "targets": [ 6 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 7 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 8 ], //first column / numbering column
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
    /*datwpicker*/
    jQuery('.mydatepicker').datepicker();
    jQuery('#datepicker-autoclose1').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('visi', {
      height: 150,
      baseFloatZIndex: 10005
  });
</script>
<script type="text/javascript">
    CKEDITOR.replace('misi', {
      height: 150,
      baseFloatZIndex: 10005
  });
</script>

<script>
    $(document).ready(function() {
    // Untuk sunting
    $('#edit-data').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        var kecamatan = div.data('kecamatan');
        var kelurahan = div.data('kelurahan');
        var ijin_bkk = div.data('ijin_bkk');        

        // Isi nilai pada field
        modal.find('#id_sekolah').attr("value", div.data('id_sekolah'));
        modal.find('#nama_sekolah').attr("value", div.data('nama_sekolah'));
        modal.find('#npsn').attr("value", div.data('npsn'));
        modal.find('#alamat_sekolah').text(div.data('alamat_sekolah'));
        $('#kec').val(kecamatan);
        $('#kec').attr("selected", true);
        $('#kec').text(kecamatan);
        var a = modal.find('#visi').val(div.data('visi'));
        CKEDITOR.instances['visi'].setData(a);
        var b = modal.find('#misi').val(div.data('misi'));
        CKEDITOR.instances['misi'].setData(b);
        modal.find('#id_perijinan').attr("value", div.data('id_perijinan'));
        $('input[name="ijin_bkk"]:checked').prop('checked', false);
        $('input[name="ijin_bkk"][value="'+ijin_bkk+'"]').prop('checked',true);
        modal.find('#no_ijin').attr("value", div.data('no_ijin'));
        modal.find('#datepicker-autoclose1').attr("value", div.data('tgl_perijinan'));

        var kec = $('#kecamatan').val();
        $.ajax({
            url:"<?php echo base_url(); ?>dashboard/get_kelurahan",
            method:"POST",
            data:{kec:kec},
            success:function(data) {
                $('#kelurahan').html('<option value="'+kelurahan+'" selected>'+kelurahan+'</option>');
                $('#kelurahan').append(data);
            }
        });

        $('#no_ijin').prop("disabled", true);
        $('#datepicker-autoclose1').prop("disabled", true);

        $('#gridRadios1').show(function(){
            if ($(this).is(':checked')) {
                $('#no_ijin').prop("disabled", false);
                $('#datepicker-autoclose1').prop("disabled", false);
            } else {
                $('#no_ijin').prop("disabled", true);
                $('#datepicker-autoclose1').prop("disabled", true);
            }
        });

        $('#gridRadios2').show(function(){
            if ($(this).is(':checked')) {
                $('#no_ijin').prop("disabled", true);
                $('#datepicker-autoclose1').prop("disabled", true);
            } else {
                $('#no_ijin').prop("disabled", false);
                $('#datepicker-autoclose1').prop("disabled", false);
            }
        });

        $('#gridRadios1').click(function(){
            var stat = $(this).val();
            if (stat == 'Ya') {
                $('#no_ijin').prop("disabled", false);
                $('#datepicker-autoclose1').prop("disabled", false);
            } else {
                $('#no_ijin').prop("disabled", true);
                $('#datepicker-autoclose1').prop("disabled", true);
            }
        });

        $('#gridRadios2').click(function(){
            var stat = $(this).val();
            if (stat == 'Tidak') {
                $('#no_ijin').prop("disabled", true);
                $('#datepicker-autoclose1').prop("disabled", true);
            } else {
                $('#no_ijin').prop("disabled", false);
                $('#datepicker-autoclose1').prop("disabled", false);
            }
        });
    });

    $('#example').on('click','.hapus-bkk', function () {
        var id_sekolah =  $(this).data('id_sekolah');
        var id_perijinan =  $(this).data('id_perijinan');
        swal({
            title: "Anda yakin?",
            text: "Saat dihapus, Anda tidak dapat mengembalikan data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "<?php echo base_url();?>dashboard/hapusBKK/" + id_sekolah+ "/"+ id_perijinan,  
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
                            buttons: false,
                            timer: 1000,
                        });
                        setTimeout(function(){
                            location.reload();
                        }, 1100);
                    }
                });
            } else {
                swal({
                    title: "BKK tersimpan!",
                    icon: "info",
                    timer: 10000
                });
            }
        })
    });
});
</script>
<script type="text/javascript">

    $("#kecamatan").change(function(){
        var kec = $(this).val();
        $.ajax({
            url:"<?php echo base_url(); ?>dashboard/get_kelurahan",
            method:"POST",
            data:{kec:kec},
            success:function(data) {
                $('#kelurahan').html(data);
            }
        });
    });
</script>
<script type="text/javascript">
    $("#kategori").change(function(){
        var keahlian = $(this).val();
        $.ajax({
            url:"<?php echo base_url(); ?>dashboardBkk/get_keahlian",
            method:"POST",
            data:{keahlian:keahlian},
            success:function(data) {
                $('#keahlian').html(data);
            }
        });
    });
</script>
<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('#textEdit').html('Simpan');
        $('#editForm').submit(function(e){
            e.preventDefault();
            $('#textEdit').html('Menyimpan ...');
            var url = '<?php echo base_url(); ?>';
            var loker = $('#editForm').serialize();
            var save = function(){

                $.ajax({
                    type: 'POST',
                    url: url + 'Dashboard/updateBKK',
                    dataType: 'json',
                    data: loker,
                    success:function(res){
                        $('#textEdit').html('Simpan');
                        console.log(res.success);
                        if(res.success == true){  
                            swal({
                                title: "Berhasil!",
                                text: res.msg,
                                icon: "success",
                            }); 
                            $('#editForm')[0].reset();
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
        });
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    });
</script> -->
<!-- <script type="text/javascript">
$(document).ready(function(){  
    $('#textEdit').html('Simpan');
    $('#editForm').on('submit', function(e){  
        e.preventDefault();  
        $('#textEdit').html('Menyimpan ...');
       
        $.ajax({  
            url:"<?php echo base_url(); ?>dashboard/updateBKK",   
            method:"POST",  
            data:new FormData(this),  
            contentType: false,  
            cache: false,  
            processData:false,  
            dataType: "json",
            success:function(res)  
            {  
                $('#textEdit').html('Simpan');
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
                // setTimeout(function(){
                //     location.reload();
                // }, 1100);
            }  
        });  
    });  
});  
</script> -->
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