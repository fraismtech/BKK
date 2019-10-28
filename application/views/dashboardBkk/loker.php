<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Data Lowongan Kerja</h4>
                </div>
                <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modalAdd">Tambah</button>
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
                    <h4>Tambah Lowongan Pekerjaan</h4>
                </div>
                <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <div class="modal-body">
                <form method="post" id="lokerForm" autocomplete="off" enctype="multipart/form-data">
                    <div class="panel-title">
                        <h5>Informasi Lowongan</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Perusahaan Mitra</label>
                                <select class="form-control" id="mitra" name="mitra">
                                    <option value="" selected="">Pilih Mitra</option>
                                    <?php foreach ($mitra_bkk as $mitra) { ?>
                                        <option value="<?= $mitra->id_mitra ?>"><?= $mitra->nama_perusahaan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lowongan</label>
                                <input type="text" name="nama_lowongan" class="form-control" placeholder="Nama Lowongan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Berlaku</label>
                                <div class='input-group date' id='datepicker-bottom-left'>
                                    <input class="form-control" type='text' name="tanggal_berlaku" placeholder="Tanggal Berlaku" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Berakhir</label>
                                <div class='input-group date' id='datepicker-bottom-right'>
                                    <input class="form-control" type='text' name="tanggal_berakhir" placeholder="Tanggal Berakhir" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rincian Pekerjaan</label>
                                <textarea class="form-control" name="uraian_pekerjaan" placeholder="Rincian Pekerjaan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Uraian Tugas</label>
                                <textarea class="form-control" name="uraian_tugas" placeholder="Uraian Tugas"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lokasi Penempatan</label>
                                <input type="text" name="penempatan" class="form-control" placeholder="Lokasi Penempatan">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah Laki-Laki</label>
                                <input type="number" name="jml_pria" class="form-control" placeholder="Jumlah Laki-Laki">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah Perempuan</label>
                                <input type="number" name="jml_wanita" class="form-control" placeholder="Jumlah Perempuan">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel-title">
                        <h5>Persyaratan Jabatan</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Batas Umur</label>
                                <input type="number" name="batas_umur" class="form-control" placeholder="Batas Umur">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Minimal Pendidikan</label>
                                <select class="form-control" id="pendidikan" name="pendidikan">
                                    <option value="" selected="">Pilih Pendidikan</option>
                                    <?php foreach ($status_pendidikan as $status_pendidikan) { ?>
                                        <option value="<?= $status_pendidikan->id_status_pendidikan ?>"><?= $status_pendidikan->nama_status_pendidikan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Posisi Jabatan</label>
                                <select class="form-control" id="posisi_jabatan" name="posisi_jabatan">
                                    <option value="" selected="">Pilih Jabatan</option>
                                    <?php foreach ($posisi_jabatan as $jabatan) { ?>
                                        <option value="<?= $jabatan->id_posisi_jabatan ?>"><?= $jabatan->nama_posisi_jabatan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan">
                                    <option value="" selected="">Pilih Jurusan</option>
                                    <?php foreach ($jurusan as $jrs) { ?>
                                        <option value="<?= $jrs->id_jurusan ?>"><?= $jrs->nama_jurusan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <option value="" selected="">Pilih Kategori</option>
                                    <?php foreach ($jenis_lowongan as $kategori) { ?>
                                        <option value="<?= $kategori->id_jenis_lowongan ?>"><?= $kategori->nama_jenis_lowongan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Keahlian</label>
                                <select class="form-control" id="keahlian" name="keahlian">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pengalaman</label>
                                <textarea class="form-control" name="pengalaman" placeholder="Pengalaman Pekerjaan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Syarat Khusus</label>
                                <textarea class="form-control" name="syarat_khusus" placeholder="Syarat Khusus"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel-title">
                        <h5>Sistem Pengupahan</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Pengupahan</label>
                                <select class="form-control" id="jenis_pengupahan" name="jenis_pengupahan">
                                    <option value="" selected="">Pilih Jenis Pengupahan</option>
                                    <?php foreach ($jenis_pengupahan as $jenis_upah) { ?>
                                        <option value="<?= $jenis_upah->id_jenis_pengupahan ?>"><?= $jenis_upah->nama_jenis_pengupahan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gaji Perbulan</label>
                                <input type="number" name="gaji_per_bulan" class="form-control" placeholder="Gaji Perbulan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Hub. Kerja</label>
                                <select class="form-control" id="hub_kerja" name="hubungan_kerja">
                                    <option value="" selected="">Pilih Status Hubungan Kerja</option>
                                    <?php foreach ($hubungan_kerja as $hub_kerja) { ?>
                                        <option value="<?= $hub_kerja->id_status_hub_kerja ?>"><?= $hub_kerja->nama_status_hub_kerja ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Kerja/Minggu</label>
                                <input type="number" name="jam_kerja" class="form-control" placeholder="Jam Kerja Per Minggu">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4" id="simpan"><span id="lokerText"></span></button>
                    </div>
                </form>
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
                <h4>Edit Loker</h4>
              </div>
              <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="editForm" role="form"> 
                    <div class="panel-title">
                        <h5>Informasi Lowongan</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Perusahaan Mitra</label>
                                <select class="form-control" id="mitra" name="mitra">
                                    <option value="" selected="">Pilih Mitra</option>
                                    <?php foreach ($mitra_bkk as $mitra) { ?>
                                        <option value="<?= $mitra->id_mitra ?>"><?= $mitra->nama_perusahaan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lowongan</label>
                                <input type="text" name="nama_lowongan" class="form-control" placeholder="Nama Lowongan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Berlaku</label>
                                <div class='input-group date' id='datepicker-bottom-left'>
                                    <input class="form-control" type='text' name="tanggal_berlaku" placeholder="Tanggal Berlaku" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Berakhir</label>
                                <div class='input-group date' id='datepicker-bottom-right'>
                                    <input class="form-control" type='text' name="tanggal_berakhir" placeholder="Tanggal Berakhir" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rincian Pekerjaan</label>
                                <textarea class="form-control" name="uraian_pekerjaan" placeholder="Rincian Pekerjaan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Uraian Tugas</label>
                                <textarea class="form-control" name="uraian_tugas" placeholder="Uraian Tugas"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lokasi Penempatan</label>
                                <input type="text" name="penempatan" class="form-control" placeholder="Lokasi Penempatan">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah Laki-Laki</label>
                                <input type="number" name="jml_pria" class="form-control" placeholder="Jumlah Laki-Laki">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah Perempuan</label>
                                <input type="number" name="jml_wanita" class="form-control" placeholder="Jumlah Perempuan">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel-title">
                        <h5>Persyaratan Jabatan</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Batas Umur</label>
                                <input type="number" name="batas_umur" class="form-control" placeholder="Batas Umur">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Minimal Pendidikan</label>
                                <select class="form-control" id="pendidikan" name="pendidikan">
                                    <option value="" selected="">Pilih Pendidikan</option>
                                    <?php foreach ($status_pendidikan as $status_pendidikan) { ?>
                                        <option value="<?= $status_pendidikan->id_status_pendidikan ?>"><?= $status_pendidikan->nama_status_pendidikan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Posisi Jabatan</label>
                                <select class="form-control" id="posisi_jabatan" name="posisi_jabatan">
                                    <option value="" selected="">Pilih Jabatan</option>
                                    <?php foreach ($posisi_jabatan as $jabatan) { ?>
                                        <option value="<?= $jabatan->id_posisi_jabatan ?>"><?= $jabatan->nama_posisi_jabatan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan">
                                    <option value="" selected="">Pilih Jurusan</option>
                                    <?php foreach ($jurusan as $jrs) { ?>
                                        <option value="<?= $jrs->id_jurusan ?>"><?= $jrs->nama_jurusan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <option value="" selected="">Pilih Kategori</option>
                                    <?php foreach ($jenis_lowongan as $kategori) { ?>
                                        <option value="<?= $kategori->id_jenis_lowongan ?>"><?= $kategori->nama_jenis_lowongan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Keahlian</label>
                                <select class="form-control" id="keahlian" name="keahlian">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pengalaman</label>
                                <textarea class="form-control" name="pengalaman" placeholder="Pengalaman Pekerjaan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Syarat Khusus</label>
                                <textarea class="form-control" name="syarat_khusus" placeholder="Syarat Khusus"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel-title">
                        <h5>Sistem Pengupahan</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Pengupahan</label>
                                <select class="form-control" id="jenis_pengupahan" name="jenis_pengupahan">
                                    <option value="" selected="">Pilih Jenis Pengupahan</option>
                                    <?php foreach ($jenis_pengupahan as $jenis_upah) { ?>
                                        <option value="<?= $jenis_upah->id_jenis_pengupahan ?>"><?= $jenis_upah->nama_jenis_pengupahan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gaji Perbulan</label>
                                <input type="number" name="gaji_per_bulan" class="form-control" placeholder="Gaji Perbulan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Hub. Kerja</label>
                                <select class="form-control" id="hub_kerja" name="hubungan_kerja">
                                    <option value="" selected="">Pilih Status Hubungan Kerja</option>
                                    <?php foreach ($hubungan_kerja as $hub_kerja) { ?>
                                        <option value="<?= $hub_kerja->id_status_hub_kerja ?>"><?= $hub_kerja->nama_status_hub_kerja ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Kerja/Minggu</label>
                                <input type="number" name="jam_kerja" class="form-control" placeholder="Gaji Perbulan">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4" id="simpan"><span id="textEdit"></span></button>
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
            "url": "<?php echo site_url('dashboardBkk/ajax_list_loker')?>",
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
        },{ 
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
$(document).ready(function() {
    // Untuk sunting
    $('#editForm').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
        modal.find('#tanggal').attr("value", div.data('tanggal'));
        modal.find('#judul').attr("value", div.data('judul'));
        modal.find('#foto').attr("src", "<?php echo base_url(); ?>assets/upload/image/" + div.data('foto'));
        modal.find('#roomNumber').text(div.data('foto'));
        modal.find('#image').attr("href", "<?php echo base_url(); ?>assets/upload/image/"+ div.data('foto1'));
        modal.find('#image').attr("href", "<?php echo base_url(); ?>assets/upload/image/"+ div.data('foto1'));
    });

    $('#example').on('click','.hapus-loker', function () {
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
                    url: "<?php echo base_url();?>dashboardBkk/hapusLoker/" + id,  
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
                            buttons: false,
                        });
                    }
                });
            } else {
                swal({
                    title: "Lowongan tersimpan!",
                    icon: "info",
                    timer: 10000
                });
            }
        })
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
<script type="text/javascript">
$(document).ready(function(){
    $('#lokerText').html('Simpan');
    $('#lokerForm').submit(function(e){
        e.preventDefault();
        $('#lokerText').html('Menyimpan ...');
        var url = '<?php echo base_url(); ?>';
        var loker = $('#lokerForm').serialize();
        var save = function(){

            $.ajax({
                type: 'POST',
                url: url + 'dashboardBkk/simpanLoker',
                dataType: 'json',
                data: loker,
                success:function(res){
                    $('#lokerText').html('Simpan');
                    console.log(res.success);
                    if(res.success == true){  
                        swal({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success",
                        }); 
                        $('#lokerForm')[0].reset();
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
                url: url + 'dashboardBkk/simpanLoker',
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
        table.ajax.reload();
    });
    $(document).on('click', '#clearMsg', function(){
        $('#responseDiv').hide();
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