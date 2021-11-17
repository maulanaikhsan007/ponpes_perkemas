<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LAPORAN KEUANGAN PONPES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome Icons -->
  
</head>

<body>
  <div class="wrapper">
    <!-- Main content -->
    <table class="table">
      <thead>
        <tr>
          <td colspan="5" align="center">
            <h6><b>LAPORAN KEUANGAN PONPES</b></h6>
          </td>
        </tr>
      </thead>
    </table>

    <!-- Table row -->
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <td colspan="5" align="center">
              <h6><b>DATA PEMASUKAN PONPES</b></h6>
            </td>
          </tr>
        </thead>
      </table>
      <div class="col-6">
        <table class="table table-bordered table-head-fixed bg-white">
          <thead>
            <tr>
              <th><b>No.</b></th>
              <th><b>Kategori</b></th>
              <th><b>Tanggal</b></th>
              <th><b>Jumlah</b></th>
              <th><b>Keterangan</b></th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0; ?>
            @foreach($data_pemasukan as $pemasukan)
            <?php $no++; ?>
            <tr>
              <td>{{$no}}</td>
              <td>{{$pemasukan->kategori->nama_kategori}}</td>
              <td>{{$pemasukan->created_at}}</td>
              <td>{{$pemasukan->jumlah}}</td>
              <td>{{$pemasukan->keterangan}}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" align="center"><b>Total Pemasukan</b></td>
              <td colspan="2" align="left">
                <b>@currency($total_pemasukan),00</b>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>

      <table class="table">
        <thead>
          <tr>
            <td colspan="5" align="center">
              <h6><b>DATA PENGELUARAN PONPES</b></h6>
            </td>
          </tr>
        </thead>
      </table>
      <div class="col-6">
        <table class="table table-bordered table-head-fixed bg-white">
          <thead>
            <tr>
              <th><b>No.</b></th>
              <th><b>Kategori</b></th>
              <th><b>Tanggal</b></th>
              <th><b>Jumlah</b></th>
              <th><b>Keterangan</b></th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0; ?>
            @foreach($data_pengeluaran as $pengeluaran)
            <?php $no++; ?>
            <tr>
              <td>{{$no}}</td>
              <td>{{$pengeluaran->kategori->nama_kategori}}</td>
              <td>{{$pengeluaran->created_at}}</td>
              <td>{{$pengeluaran->jumlah}}</td>
              <td>{{$pengeluaran->keterangan}}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" align="center"><b>Total Pengeluaran</b></td>
              <td colspan="2" align="left">
                <b>@currency($total_pengeluaran),00</b>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>

      <table class="table">
        <thead>
          <tr>
            <td colspan="3" align="center"><b>SISA SALDO</b></td>
            <td colspan="2" align="left">
              <b>@currency($total_pemasukan-$total_pengeluaran),00</b>
            </td>
          </tr>
        </thead>
      </table>
    </div>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
</body>

</html>

