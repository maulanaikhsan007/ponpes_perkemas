@extends('layouts.master')

@section('title')
    Donatur
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Donatur</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Donatur
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{route('donatur.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_donatur">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Donatur</th>
                                            <th>Jenis Donasi</th>
                                            <th>Nominal</th>
                                            <th>Barang</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Donasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($donatur as $donatur)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$donatur->nama_donatur}}</td>
                                            <td>{{$donatur->jenis_donatur}}</td>
                                            <td>Rp. {{number_format ($donatur->nominal)}}</td>
                                            <td>{{$donatur->barang}}</td>
                                            <td>{{$donatur->keterangan}}</td>
                                            <td>{{$donatur->tanggal_donatur}}</td>
                                            <td>
                                                <a href="{{route('donatur.edit', $donatur->id_donatur)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('donatur.destroy', $donatur->id_donatur)}}" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"><i class="fas fa-trash-alt"></i></a>
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
            $('#table_donatur').DataTable();
        } );
    </script>

@endpush