<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Laporan Mitra BKK</h4>
                </div>
                <!-- <div class="dropdown">
                    <a class="btn btn-round btn-inverse-primary btn-xs" href="#">Cetak</a>
                </div> -->
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
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan">
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Periode Kemitraan</label>
                                <div class="input-group" data-date="23/11/2018" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control range-from" name="from" id="dari">
                                    <span class="input-group-addon">Sampai</span>
                                    <input class="form-control range-to" type="text" name="to" id="sampai">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="datatable-wrapper table-responsive">
                    <table id="example" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat Perusahaan</th>
                                <th>No. Telp</th>
                                <th>Email</th>
                                <th>Bidang Usaha</th>
                                <th>Nama CP</th>
                                <th>Jabatan CP</th>
                                <th>No. Telp CP</th>
                                <th>Jenis Kemitraan</th>
                                <th>Periode Kemitraan</th>
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
            "url": "<?php echo site_url('dashboard/ajax_list_laporan_mitra')?>",
            "type": "POST",
            "data": function (data) {
                data.sekolah = $('#sekolah').val();
                data.dari = $('#dari').val();
                data.sampai = $('#sampai').val();
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

    $('#sekolah').change(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#dari').change(function(){
        table.ajax.reload();
    });
    $('#sampai').change(function(){
        table.ajax.reload();
    });
});
</script>