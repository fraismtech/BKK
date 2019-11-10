<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Laporan BKK Perkecamatan</h4>
                </div>
                <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modalExport">Export</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display compact table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Kecamatan</th>
                                <th>Jumlah BKK</th>
                                <th>BKK Terdaftar</th>
                                <th>BKK Belum Terdaftar</th>
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
<!-- Modal Export -->
<div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel-title">
                    <h4>Export Laporan</h4>
                </div>
                <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <div class="modal-body">
                <form method="post" id="sliderForm" autocomplete="off" enctype="multipart/form-data">
                    <div class="pl-lg-1">
                        <div class="form-group">
                            <label>Dari</label>
                            <div class="input-group">
                                <input type="text" name="tgl_awal" class="form-control" id="datepicker-autoclose3" placeholder="Dari" required="">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sampai</label>
                            <div class="input-group">
                                <input type="text" name="tgl_akhir" class="form-control" id="datepicker-autoclose4" placeholder="Sampai" required="">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info mt-4" id="simpan" formaction="<?= base_url('dashboard/laporan_bkk_pdf') ?>"><span id="mitraText">Export to PDF</span></button>
                            <button type="submit" class="btn btn-success mt-4" id="simpan" formaction="<?= base_url('dashboard/laporan_bkk_xls') ?>"><span id="mitraText">Export to XLS</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    /*datwpicker*/
    jQuery('.mydatepicker').datepicker();

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
    $(document).ready(function() {
        var table = $('#example').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [],
        "pageLength": 50,
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
        // "dom": 'Bfrtip',
        // "buttons": [
        // 'excel', 'pdf'
        // ],

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('dashboard/ajax_list_laporan_bkk')?>",
            "type": "POST",
            "data": function (data) {
                data.kecamatan = $('#kecamatan').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 1 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 2 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 3 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        // { 
        //     "targets": [ 7 ], //first column / numbering column
        //     "orderable": false, //set not orderable
        // },
        // { 
        //     "targets": [ 8 ], //first column / numbering column
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
      }
  });

    $('#kecamatan').change(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){
        table.ajax.reload();
    });
});
</script>