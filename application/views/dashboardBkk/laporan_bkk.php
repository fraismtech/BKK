<!-- <!DOCTYPE html> -->
<!-- <html> -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan BKK</title>
  <style>
    table{
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      border: 1px solid #ddd;
    }

    .table-condensed td{
      border-top : 1px solid #999999;
      padding: 13px 15px;
    }

    .table-condensed tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-heading" style="text-align:center;">
                        <h3 class="card-title">Laporan BKK</h3>
                    </div>
                </div>
                <div class="card-body">
                  <div class="datatable-wrapper table-responsive" style="margin-top:20px; margin-bottom:30px;">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <td><strong>Periode : </strong></td>
                            <td>
                              <strong>
                                <?php if (!empty($tgl_awal)) {
                                  echo $tgl_awal;
                                }?>
                              </strong>
                            </td>
                            <td><strong>Sampai : </strong></td>
                            <td>
                              <strong>
                                <?php if (!empty($tgl_akhir)) {
                                  echo $tgl_akhir;
                                }?>
                              <strong
                            ></td>
                          </tr>
                      </table>
                    </div>
                    <!-- <div class="form-group">
                        <button id="btn-reset" class="btn btn-sm btn-info">Refresh Table</button>
                    </div> -->
                    <div class="datatable-wrapper table-responsive">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <td>
                              <strostrong>Kecamatan</strostrong>
                            </td>
                            <td>
                              <strostrong> Jumlah BKK </strostrong>
                            </td>
                            <td>
                              <strostrong> BKK Terdaftar </strostrong>
                            </td>
                            <td>
                              <strostrong> BKK Tidak Terdaftar </strostrong>
                            </td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($dataLaporan as $laporan) :?>
                            <tr>
                              <td><?= $laporan->kecamatan ?> </td>
                              <td><?= $laporan->total_bkk ?></td>  
                              <td><?= $laporan->terdaftar ?></td>
                              <td><?= $laporan->tidak_terdaftar ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>

                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
</body>
</html>