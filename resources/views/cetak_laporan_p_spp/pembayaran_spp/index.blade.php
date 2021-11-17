@extends('layouts.master')

@section('title')
    Laporan Pembayaran SPP
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Laporan Pembayaran SPP</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Laporan Pembayaran SPP
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <h6 class="card-header text-primary">Filter Data</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form method="POST" action="{{route('cetak_laporan_p_spp.pembayaran_spp.filterByTanggal')}}">
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
                                    <form method="POST" action="{{route('cetak_laporan_p_spp.pembayaran_spp.filterByKategori')}}">
                                        {{csrf_field()}}
                                        <h6 class="text-dark">Berdasarkan Kategori</h6>
                                        <select name="filterkategori_kelas" id="id_kelas" class="form-control select2bs4 my-1 mr-sm-1" onchange="this.form.submit();">
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach($daftar_kategori_kelas as $list_kategorikelas)
                                            <option value="{{ $list_kategorikelas->id_kelas }}">{{$list_kategorikelas->kelas}}</option>
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
                    <form method="post" action="{{route('cetak_laporan_p_spp.pembayaran_spp.cetak')}}" target="_blank">
                        {{csrf_field()}}
                        @if ($data_id_kategori_kelas == null)
                        <input name="id_kelas" type="text" class="d-none" id="id_kelas" value="{{$data_id_kategori_kelas}}">
                        @else
                        @foreach($data_id_kategori_kelas as $id_kelas)
                        <input name="id_kelas" type="text" class="d-none" id="id_kelas" value="{{$id_kelas->id_kelas}}">
                        @endforeach                            
                        @endif

                        <input name="tgl_awal" type="text" class="d-none" id="tgl_awal" value="{{$tgl_awal}}">
                        <input name="tgl_akhir" type="text" class="d-none" id="tgl_akhir" value="{{$tgl_akhir}}">
                        <button type="submit" class="btn btn-primary btn-sm my-2 mr-sm-2 float-right"><i class="fas fa-print"></i> Cetak</button>
                    </form>
                    <!-- <a class="btn btn-primary btn-sm my-2 mr-sm-2 float-right" href="{{route('cetak_laporan.keuangan_ponpes.DownloadExcel')}}" role="button"><i class="fas fa-file-excel"></i> Download Excel</a> -->
                    <a class="btn btn-success btn-sm my-2 mr-sm-2 float-right" href="{{route('cetak_laporan_p_spp.pembayaran_spp.index')}}" role="button"><i class="fas fa-sync-alt"></i> Refresh</a>
                </div>
            </div>
            
            <div class="card card-primary">
                    <h6 class="card-header text-primary">Data Pembayaran SPP</h6>
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
                                                        <th>NIS</th>
                                                        <th>Kelas</th>
                                                        <th>SPP</th>
                                                        <th>Tahun Ajaran</th>
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Bulan</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 0; ?>
                                                    @foreach($data_pembayaran_spp as $pembayaranspp)
                                                    <?php $no++; ?>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{$pembayaranspp->biodatasiswa['NIS']}}</td>
                                                        <td>{{$pembayaranspp->kelas['kelas']}}</td>
                                                        <td>Rp. {{number_format($pembayaranspp->spp['spp'])}}</td>
                                                        <td>{{$pembayaranspp->tahunajaran['tahun']}}</td>
                                                        <td>{{$pembayaranspp->tanggal_pembayaran}}</td>
                                                        <td>{{$pembayaranspp->bulan}}</td>
                                                        <td>{{$pembayaranspp->status}}</td>
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