<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Laporan Data Alumni</h4>
                </div>
                <!-- <a href="<?php echo base_url(); ?>dashboardBkk/tambahAlumni"><button class="btn btn-sm btn-primary pull-right">Tambah</button></a> -->
            </div>
            <div class="card-body">
                <form id="searchForm" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Sekolah</label>
                                <select class="form-control" id="sekolah" name="sekolah">
                                    <option value="" selected="">Pilih Sekolah</option>
                                    <?php foreach ($sekolah as $bkk) { ?>
                                        <option value="<?= $bkk->id_sekolah ?>"><?= $bkk->nama_sekolah ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tahun Lulus</label>
                                <div class="input-group date form_year" data-date-format="yyyy" data-link-field="dtp_input4">
                                    <input class="form-control" type="text" value="" placeholder="Tahun Lulus" name="tahun_lulus" id="tahun_lulus">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="datatable-wrapper table-responsive">
                    <table id="example" class="display compact table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>NISN</th>
                                <th>Nama Lengkap</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Jurusan</th>
                                <th>No. Telp</th>
                                <th>Tahun Lulus</th>
                                <th>Nama Sekolah</th>
                                <th>Status</th>
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
<script type="text/javascript">
$(document).ready(function(){
    $('.form_year').datetimepicker({
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 4,
        minView: 4,
        forceParse: 0
    });
    $("#sekolah").change(function(){
        var skl = $(this).val();
        $.ajax({
            url:"<?php echo base_url(); ?>dashboard/get_jurusan",
            method:"POST",
            data:{skl:skl},
            success:function(data) {
                $('#jurusan').html(data);
            }
        });
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable({ 
        "dom": 'Bfrtip',
        "buttons": [
            'excel', 'pdf'
        ],
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
            "url": "<?php echo site_url('dashboard/ajax_list_alumni_pusat')?>",
            "type": "POST",
            "data": function (data) {
                data.sekolah = $('#sekolah').val();
                data.jurusan = $('#jurusan').val();
                data.tahun_lulus = $('#tahun_lulus').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        // { 
        //     "targets": [ 6 ], //first column / numbering column
        //     "orderable": false, //set not orderable
        // },
        // { 
        //     "targets": [ 4 ], //first column / numbering column
        //     "orderable": false, //set not orderable
        // },
        ],
        "language": {         
          "info": "",
          "infoEmpty": "",       
          "infoFiltered": ""
        },

    });

    $('#sekolah').change(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#jurusan').change(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#tahun_lulus').on("change keyup", function(){
        table.ajax.reload();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').on('click','.hapus-alumni', function () {
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
                    url: "<?php echo base_url();?>dashboardBkk/hapusAlumni/" + id,  
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
                    title: "Data Alumni Tersimpan!",
                    icon: "info",
                    timer: 10000
                });
            }
            table.ajax.reload();
        })
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