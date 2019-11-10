<!-- <!DOCTYPE html> -->
<!-- <html> -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan Alumni</title>
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
                        <h3 class="card-title">Laporan Alumni</h3>
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
                            <th rowspan="2">Bidang keahlian/jurusan</th>
                            <th rowspan="2">Jumlah alumni</th>
                            <th colspan="2">Jenis Kelamin</th>
                            <th colspan="4">Status</th>
                          </tr>
                          <tr>
                            <th>
                              <strong>Laki-Laki</strong>
                            </th>
                            <th>
                              <strong>Perempuan</strong>
                            </th>
                            <th>
                              <strong>Belum Bekerja</strong>
                            </th>
                            <th>
                              <strong>Bekerja</strong>
                            </th>
                            <th>
                              <strong>Kuliah</strong>
                            </th>
                            <th>
                              <strong>Wiraswasta</strong>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $total = [
                              'jurusan' => 0,
                              'laki' => 0,
                              'perempuan' => 0,
                              'belum_bekerja' => 0,
                              'bekerja' => 0,
                              'kuliah' => 0,
                              'wiraswasta' => 0
                            ];
                            foreach ($dataLaporan as $laporan) :
                            $total['jurusan'] += $laporan->total;
                            $total['laki'] += $laporan->laki;
                            $total['perempuan'] += $laporan->perempuan;
                            $total['belum_bekerja'] += $laporan->belum_bekerja;
                            $total['bekerja'] += $laporan->bekerja;
                            $total['kuliah'] += $laporan->kuliah;
                            $total['wiraswasta'] += $laporan->wiraswasta;
                          ?>
                            <tr>
                              <td><?= $laporan->jurusan ?></td>
                              <td><?= $laporan->total ?></td>
                              <td><?= $laporan->laki ?></td>
                              <td><?= $laporan->perempuan ?></td>
                              <td><?= $laporan->belum_bekerja ?></td>
                              <td><?= $laporan->bekerja ?></td>
                              <td><?= $laporan->kuliah ?></td>
                              <td><?= $laporan->wiraswasta ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                          <th> Total </th>
                          <th><?= $total['jurusan'] ?></th>
                          <th><?= $total['laki'] ?></th>
                          <th><?= $total['perempuan'] ?></th>
                          <th><?= $total['belum_bekerja'] ?></th>
                          <th><?= $total['bekerja'] ?></th>
                          <th><?= $total['kuliah'] ?></th>
                          <th><?= $total['wiraswasta'] ?></th>
                        </tfoot>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
</body>
</html>