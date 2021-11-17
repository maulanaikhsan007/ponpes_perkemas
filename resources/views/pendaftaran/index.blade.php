@extends('layouts.master')

@section('title')
    Pendaftaran Siswa
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Biodata Siswa</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Biodata Siswa Ponpes Perkemas</h2>
            
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Nama Samaran Siswa</th>
                                        <th>Asal Sekolah </th>
                                        <th>Nama Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Telp Orang Tua</th>
                                        <th>Alamat Orang Tua</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @forelse ($pendaftaran as $pendaftaran)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$pendaftaran->nama_siswa}}</td>
                                        <td>{{$pendaftaran->nama_samaran_siswa}}</td>
                                        <td>{{$pendaftaran->asal_sekolah}}</td>
                                        <td>{{$pendaftaran->nama_ayah}}</td>
                                        <td>{{$pendaftaran->nama_ibu}}</td>
                                        <td>{{$pendaftaran->telp_orang_tua}}</td>
                                        <td>{{$pendaftaran->alamat_orang_tua}}</td>
                                        <td>
                                            <a href="" class="btn btn-warning">Edit</a>
                                            <a href="" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="12" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
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