@extends('layouts.master')

@section('title')
    Jabatan
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Jabatan</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Jabatan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{ route('kategori_gaji.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_kategori_gaji">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jabatan</th>
                                            <th>Nominal Gaji</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kategorigaji as $kategorigaji)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$kategorigaji->kategori_gaji}}</td>
                                            <td>{{$kategorigaji->nominal_gaji}}</td>
                                            <td>
                                                <a href="{{route('kategori_gaji.edit', $kategorigaji->id_kategori_gaji)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('kategori_gaji.destroy', $kategorigaji->id_kategori_gaji)}}" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus ?')" ><i class="fas fa-trash-alt"></i></a>
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

@include('sweetalert::alert')

@endsection

@push('scripts')
    
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_kategori_gaji').DataTable();
        } );
    </script>

@endpush
