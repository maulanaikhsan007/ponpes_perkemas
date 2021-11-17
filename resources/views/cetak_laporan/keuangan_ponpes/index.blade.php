@extends('layouts.master')

@section('title')
    Laporan Keuangan
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Laporan Keuangan</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Laporan Keuangan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <h6 class="card-header text-primary">Filter Data</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form method="POST" action="{{route('cetak_laporan.keuangan_ponpes.filterByTanggal')}}">
                                        {{csrf_field()}}
                                        <h6 class="text-dark">Berdasarkan Rentang Tanggal</h6>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" />
                                            </div>
                                            <div class="col-md-1 text-center">
                                                s/d
                                            </div>
                                            <div class="col-md-5">
                                                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" onchange="this.form.submit();" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form method="POST" action="{{route('cetak_laporan.keuangan_ponpes.filterByKategori')}}">
                                        {{csrf_field()}}
                                        <h6 class="text-dark">Berdasarkan Kategori</h6>
                                        <select name="filterKategori" id="id_kategori" class="form-control select2bs4 my-1 mr-sm-1" onchange="this.form.submit();">
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach($daftar_kategori as $list_kategori)
                                            <option value="{{ $list_kategori->id_kategori }}">{{$list_kategori->nama_kategori}}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{ route('cetak_laporan.keuangan_ponpes.cetak')}}" target="_blank">
                        {{csrf_field()}}
                        @if ($data_id_kategori == null)   
                            <input name="id_kategori" type="text" class="d-none" id="id_kategori" value="{{ $data_id_kategori }}">                         
                        @else
                            @foreach($data_id_kategori as $id_kategori)
                            <input name="id_kategori" type="text" class="d-none" id="id_kategori" value="{{$id_kategori->id_kategori}}">
                            @endforeach                            
                        @endif

                        <input name="tgl_awal" type="text" class="d-none" id="tgl_awal" value="{{$tgl_awal}}">
                        <input name="tgl_akhir" type="text" class="d-none" id="tgl_akhir" value="{{$tgl_akhir}}">
                        <button type="submit" class="btn btn-primary btn-sm my-2 mr-sm-2 float-right"><i class="fas fa-print"></i> Cetak</button>
                    </form>
                    <!-- <a class="btn btn-primary btn-sm my-2 mr-sm-2 float-right" href="{{route('cetak_laporan.keuangan_ponpes.DownloadExcel')}}" role="button"><i class="fas fa-file-excel"></i> Download Excel</a> -->
                    <a class="btn btn-success btn-sm my-2 mr-sm-2 float-right" href="{{route('cetak_laporan.keuangan_ponpes.index')}}" role="button"><i class="fas fa-sync-alt"></i> Refresh</a>
                </div>
            </div>
            
            <div class="card card-primary">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active btn-sm" href="#pemasukan" data-toggle="tab"><i class="fas fa-money-bill-alt nav-icon"></i> Laporan Pemasukan Ponpes</a></li>
                        <li class="nav-item"><a class="nav-link btn-sm" href="#pengeluaran" data-toggle="tab"><i class="fas fa-money-bill-alt nav-icon"></i> Laporan Pengeluaran Ponpes</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="pemasukan">
                            <div class="row">
                                <div class="table-responsive">
                                    <div class="col-12">
                                        <table class="table table-striped" id='masuk'>
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kategori</th>
                                                    <th>Tanggal Pemasukan</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0; ?>
                                                @foreach($data_pemasukan as $pemasukan)
                                                <?php $no++; ?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$pemasukan->kategori->nama_kategori}}</td>
                                                    <td>{{$pemasukan->tanggal}}</td>
                                                    <td>Rp. {{number_format($pemasukan->jumlah)}}</td>
                                                    <td>{{$pemasukan->keterangan}}</td>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="pengeluaran">
                            <div class="row">
                                <div class="table-responsive">
                                    <div class="col-12">
                                        <table class="table table-striped" id='keluar'>
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kategori</th>
                                                    <th>Tanggal Pemasukan</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0; ?>
                                                @foreach($data_pengeluaran as $pengeluaran)
                                                <?php $no++; ?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$pengeluaran->kategori->nama_kategori}}</td>
                                                    <td>{{$pengeluaran->tanggal}}</td>
                                                    <td>Rp. {{number_format($pengeluaran->jumlah)}}</td>
                                                    <td>{{$pengeluaran->keterangan}}</td>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#masuk').DataTable();
            $('#keluar').DataTable();
        } );
    </script>

@endpush