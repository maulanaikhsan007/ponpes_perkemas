@extends('layouts.master')

@section('title')
    Biodata Karyawan
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Biodata Karyawan</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Biodata Karyawan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">  
                            <a href="{{ route('biodata_mudhir.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_biodata_mudhir">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Karyawan</th>
                                            <th>Jabatan</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Pendidikan</th>
                                            <th>Bidang Ilmu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($biodatamudhir as $biodatamudhir)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{asset ($biodatamudhir->foto)}}" width="100" height="100">
                                            </td>
                                            <td>{{$biodatamudhir->nama_mudhir}}</td>
                                            <td>{{$biodatamudhir->kategorigaji['kategori_gaji']}}</td>
                                            <td>{{$biodatamudhir->alamat}}</td>
                                            <td>{{$biodatamudhir->no_telepon}}</td>
                                            <td>{{$biodatamudhir->jenis_kelamin}}</td>
                                            <td>{{$biodatamudhir->pendidikan}}</td>
                                            <td>{{$biodatamudhir->bidang_ilmu}}</td>
                                            <td>
                                                <a href="{{route('biodata_mudhir.show', $biodatamudhir->id_biodata_mudhir)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('biodata_mudhir.edit', $biodatamudhir->id_biodata_mudhir)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('biodata_mudhir.destroy', $biodatamudhir->id_biodata_mudhir)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
            $('#table_biodata_mudhir').DataTable();
        } );
    </script>

@endpush