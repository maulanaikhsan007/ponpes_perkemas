@extends('layouts.master')

@section('title')
    Biodata Siswa
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Biodata Siswa</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title"> Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Biodata Siswa
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_biodata_siswa">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Nama Samaran Siswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Kelas</th>
                                            <th>Asal Sekolah </th>
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Telp Orang Tua</th>
                                            <th>Alamat Orang Tua</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($biodatasiswa as $biodatasiswa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="siswa/{{$biodatasiswa->foto}}" width="100px"> </td>
                                            <td>{{$biodatasiswa->nisn}}</td>
                                            <td>{{$biodatasiswa->NIS}}</td>
                                            <td>{{$biodatasiswa->nama_siswa}}</td>
                                            <td>{{$biodatasiswa->nama_samaran_siswa}}</td>
                                            <td>{{$biodatasiswa->jenis_kelamin}}</td>
                                            <td>{{$biodatasiswa->kelas->kelas}}</td>
                                            <td>{{$biodatasiswa->asal_sekolah}}</td>
                                            <td>{{$biodatasiswa->nama_ayah}}</td>
                                            <td>{{$biodatasiswa->nama_ibu}}</td>
                                            <td>{{$biodatasiswa->telp_orang_tua}}</td>
                                            <td>{{$biodatasiswa->alamat_orang_tua}}</td>
                                            <td>
                                                <a href="{{route('biodata_siswa.show', $biodatasiswa->id_biodata_siswa)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('biodata_siswa.edit', $biodatasiswa->id_biodata_siswa)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('biodata_siswa.destroy', $biodatasiswa->id_biodata_siswa)}}" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus ?')" ><i class="fas fa-trash-alt"></i></a>
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
            $('#table_biodata_siswa').DataTable();
        } );
    </script>

@endpush