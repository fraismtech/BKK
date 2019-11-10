<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Laporan BKK Perkecamatan</h4>
                </div>
                <!-- <div class="dropdown">
                    <a class="btn btn-round btn-inverse-primary btn-xs" href="#">Cetak</a>
                </div> -->
            </div>
            <div class="card-body">
                <form id="searchForm" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control" id="kecamatan" name="kecamatan">
                                    <option value="" selected="">Pilih Kecamatan</option>
                                    <?php foreach($kecamatan as $kec){ ?>
                                        <option value="<?= $kec->name ?>"><?= $kec->name ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <label>Periode BKK</label>
                                <div class="input-group" data-date="23/11/2018" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control range-from" name="tgl_awal" id="dari">
                                    <span class="input-group-addon">Sampai</span>
                                    <input class="form-control range-to" type="text" name="tgl_akhir" id="sampai">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-centere">
                        <button type="submit" class="btn btn-info mt-4" id="simpan" formaction="<?= base_url('dashboard/laporan_bkk_pdf') ?>"><span id="mitraText">Export to PDF</span></button>
                        <button type="submit" class="btn btn-success mt-4" id="simpan" formaction="<?= base_url('dashboard/laporan_bkk_xls') ?>"><span id="mitraText">Export to XLS</span></button>
                    </div>
                </form>
                <div class="datatable-wrapper table-responsive">
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
        "dom": 'Bfrtip',
        "buttons": [
            // 'excel', 'pdf'
        ],

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('dashboard/ajax_list_laporan_bkk')?>",
            "type": "POST",
            "data": function (data) {
                data.kecamatan = $('#kecamatan').val();
            }
        },

        //Set column definition initialisation properties.
        columns: [
        { data: "kecamatan", className: "dt-head-center" },
        { data: "total_bkk", className: "dt-head-center dt-body-right" },
        { data: "terdaftar", className: "dt-head-center dt-body-right" },
        { data: "tidak_terdaftar", className: "dt-head-center dt-body-right" }],
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