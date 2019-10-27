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
                <form id="searchForm">
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
                        <!-- <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" name="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" name="" class="form-control">
                            </div>
                        </div> -->
                    </div>
                </form>
                <div class="datatable-wrapper table-responsive">
                    <table id="example" class="display compact table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>NPSN</th>
                                <th>Nama Sekolah</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>No. Ijin</th>
                                <th>Tanggal Perijinan</th>
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
            'excel', 'pdf'
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