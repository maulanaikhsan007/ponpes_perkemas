@extends('layouts.master')

@section('title')
    Laporan Pembayaran Gaji
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Laporan Pembayaran Gaji</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Laporan Pembayaran Gaji
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <h6 class="card-header text-primary">Filter Data</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form method="POST" action="{{route('cetak_laporan_p_gaji.pembayaran_gaji.filterByTanggal')}}">
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
                                    <form method="POST" action="{{route('cetak_laporan_p_gaji.pembayaran_gaji.filterByKategori')}}">
                                        {{csrf_field()}}
                                        <h6 class="text-dark">Berdasarkan Kategori</h6>
                                        <select name="filterkategori_gaji" id="id_kategori_gaji" class="form-control select2bs4 my-1 mr-sm-1" onchange="this.form.submit();">
                                            <option>-- Pilih Jabatan --</option>
                                            @foreach($daftar_kategori_gaji as $list_kategorigaji)
                                            <option value="{{ $list_kategorigaji->id_kategori_gaji }}">{{$list_kategorigaji->kategori_gaji}}</option>
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
                    <form method="post" action="{{route('cetak_laporan_p_gaji.pembayaran_gaji.cetak')}}" target="_blank">
                        {{csrf_field()}}
                        @if ($data_id_kategori_gaji == null)
                            <input name="id_kategori_gaji" type="text" class="d-none" id="id_kategori" value="">
                        @else
                            @foreach($data_id_kategori_gaji as $id_kategori_gaji)
                            <input name="id_kategori_gaji" type="text" class="d-none" id="id_kategori" value="{{$id_kategori_gaji->id_kategori_gaji}}">
                            @endforeach                            
                        @endif

                        <input name="tgl_awal" type="text" class="d-none" id="tgl_awal" value="{{$tgl_awal}}">
                        <input name="tgl_akhir" type="text" class="d-none" id="tgl_akhir" value="{{$tgl_akhir}}">
                        <button type="submit" class="btn btn-primary btn-sm my-2 mr-sm-2 float-right"><i class="fas fa-print"></i> Cetak</button>
                    </form>
                    <!-- <a class="btn btn-primary btn-sm my-2 mr-sm-2 float-right" href="{{route('cetak_laporan.keuangan_ponpes.DownloadExcel')}}" role="button"><i class="fas fa-file-excel"></i> Download Excel</a> -->
                    <a class="btn btn-success btn-sm my-2 mr-sm-2 float-right" href="{{route('cetak_laporan_p_gaji.pembayaran_gaji.index')}}" role="button"><i class="fas fa-sync-alt"></i> Refresh</a>
                </div>
            </div>
            
            <div class="card card-primary">
                    <h6 class="card-header text-primary">Data Pembayaran Gaji</h6>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane">
                                <div class="row">
                                    <div class="table-responsive">
                                        <div class="col-12">
                                            <table class="table table-striped" id='gaji'>
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Jabatan</th>
                                                        <th>Gaji</th>
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Bulan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 0; ?>
                                                    @foreach($data_pembayaran_gaji as $pembayarangaji)
                                                    <?php $no++; ?>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{$pembayarangaji->biodatamudhir['nama_mudhir']}}</td>
                                                        <td>{{$pembayarangaji->kategorigaji['kategori_gaji']}}</td>
                                                        <td>Rp. {{number_format($pembayarangaji->kategorigaji['nominal_gaji'])}}</td>
                                                        <td>{{$pembayarangaji->tanggal_pembayaran}}</td>
                                                        <td>{{$pembayarangaji->bulan}}</td>
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
            $('#gaji').DataTable();
        } );
    </script>

@endpush