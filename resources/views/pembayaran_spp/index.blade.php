@extends('layouts.master')

@section('title')
   Entri Pembayaran SPP
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Entri Pembayaran SPP</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Entri Pembayaran SPP
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{ route('pembayaran_spp.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_pembayaran_spp">
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pembayaranspp as $pembayaranspp)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$pembayaranspp->biodatasiswa['NIS']}}</td>
                                            <td>{{$pembayaranspp->kelas['kelas']}}</td>
                                            <td>Rp. {{number_format($pembayaranspp->spp['spp'])}}</td>
                                            <td>{{$pembayaranspp->tahunajaran['tahun']}}</td>
                                            <td>{{$pembayaranspp->tanggal_pembayaran}}</td>
                                            <td>{{$pembayaranspp->bulan}}</td>
                                            <td ><i class="btn btn-success">{{$pembayaranspp->status}}</i></td>
                                            <td>
                                                <a href="{{route('pembayaran_spp.show', $pembayaranspp->id_pembayaran_spp)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('pembayaran_spp.edit', $pembayaranspp->id_pembayaran_spp)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('pembayaran_spp.destroy', $pembayaranspp->id_pembayaran_spp)}}" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="12" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
            $('#table_pembayaran_spp').DataTable();
        } );
    </script>

@endpush