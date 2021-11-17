@extends('layouts.master')

@section('title')
    Kelas Ajaran
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kelas Ajaran</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Kelas Ajaran
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{ route('kelas_ajaran.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_kelas_ajaran">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Kelas</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Nama Kelas Ajaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kelasajaran as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$data->biodatasiswa['NIS']}}</td>
                                            <td>{{$data->kelas['nama_kelas']}}</td>
                                            <td>{{$data->tahunajaran['tahun']}}</td>
                                            <td>{{$data->nama_kelas_ajaran}}</td>
                                            <td>
                                                <a href="{{route('kelas_ajaran.edit', $data->id_kelas_ajaran)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('kelas_ajaran.destroy', $data->id_kelas_ajaran)}}" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
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
            $('#table_kelas_ajaran').DataTable();
        } );
    </script>

@endpush
