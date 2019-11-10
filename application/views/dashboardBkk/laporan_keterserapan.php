<!-- <!DOCTYPE html> -->
<!-- <html> -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan Keterserapan</title>
  <style>
    table{
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      border: 1px solid #ddd;
    }

    .table-condensed td{
      padding: 13px 15px;
      border-top : 1px solid #999999;
    }

    .table-condensed thead tr th {
      border: 1px solid #999999;
      padding: 10px;
    }
    .table-condensed tfoot tr th {
      border: 1px solid #999999;
      padding: 10px;
      text-align: left;
    }

    .table-condensed tbody tr:nth-child(even) {
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
                        <h3 class="card-title">Laporan Keterserapan</h3>
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
                            <th rowspan="2">Kecamatan</th>
                            <th rowspan="2">Jumlah Alumni</th>
                            <th colspan="4">Status</th>
                          </tr>
                          <tr>
                            <th>
                              <strong>Magang</strong>
                            </th>
                            <th>
                              <strong>Pelatihan</strong>
                            </th>
                            <th>
                              <strong>Perekrutan</strong>
                            </th>
                            <th>
                              <strong>Lainnya</strong>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($dataLaporan as $laporan) :
                          ?>
                            <tr>
                              <td><?= $laporan->kecamatan; ?></td>
                              <td><?= $laporan->total; ?></td>
                              <td><?= $laporan->belum_bekerja; ?></td>
                              <td><?= $laporan->bekerja; ?></td>
                              <td><?= $laporan->kuliah; ?></td>
                              <td><?= $laporan->wiraswasta; ?></td>
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