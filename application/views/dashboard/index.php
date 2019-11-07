<!-- Notification -->
<div class="row">
    <div class="col-md-12">
        <?=$this->session->userdata('notif')?>
    </div>
</div>
<!-- end row -->
<!-- begin row -->
<div class="row">
    <div class="col-sm-12">
        <div class="card card-statistics">
            <div class="row no-gutters">
                <div class="col-xxl-4 col-lg-4">
                    <div class="p-20">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total BKK</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                        </div>
                        <div class="d-block h-100 align-items-center">
                            <!-- div class="apexchart-wrapper">
                                <div id="analytics4"></div>
                            </div> -->
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-left text-sm-left">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> <?= $total_bkk ?></h3>
                                <!-- <p>BKK</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <div class="p-20">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total Loker</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                        </div>
                        <div class="d-block h-100 align-items-center">
                            <!-- <div class="apexchart-wrapper">
                                <div id="analytics8"></div>
                            </div> -->
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-left text-sm-left">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> <?= $total_loker ?></h3>
                                <!-- <p>Lowongan Kerja</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <div class="p-20">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total Kegiatan</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                        </div>
                        <div class="d-block h-100 align-items-center">
                            <!-- <div class="apexchart-wrapper">
                                <div id="analytics8"></div>
                            </div> -->
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-left text-sm-left">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> <?= $total_kegiatan ?></h3>
                                <!-- <p>Kegiatan</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Lowongan Terbaru</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="example" class="display compact table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Pekerjaan</th>
                                <th>Nama Perusahaan</th>
                                <th>Tgl Berlaku</th>
                                <th>Tgl Berakhir</th>
                                <th>Status</th>
                                <th>Pria</th>
                                <th>Wanita</th>
                                <th>Ket</th>
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
<!-- end container-fluid -->
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('dashboard/ajax_list_loker')?>",
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
        { 
            "targets": [ 5 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
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
        { 
            "targets": [ 9 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
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