@extends('layouts.master')

@section('title')
    Infak
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Infak</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Infak 
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{route('infak.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_infak">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Nama Siswa</th> -->
                                            <th>Infak Bangunan</th>
                                            <th>Infak Pendaftaran</th>
                                            <th>Infak Ekstrakulikuler</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($infak as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <!-- <td>{{$data->id_pendaftaran}}</td> -->
                                            <td>{{$data->infak_bangunan}}</td>
                                            <td>{{$data->infak_pendaftaran}}</td>
                                            <td>{{$data->ekskul}}</td>
                                            <td>
                                                <a href="{{route('infak.edit', $data->id_infak)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('infak.destroy', $data->id_infak)}}" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"><i class="fas fa-trash-alt"></i></a>
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
            $('#table_infak').DataTable();
        } );
    </script>

@endpush