@extends('layouts.master')

@section('title', 'Detail Karyawan')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title text-uppercase" style="color: black;">Detail Karyawan — {{ $biodatamudhir->nama_mudhir }} </h2>
                    <hr>
                    <p class="card-text"> Berikut adalah detail karyawan dari karyawan yang bernama {{$biodatamudhir->nama_mudhir}}. Detail
                        meliputi Nama Karyawan, Alamat, No Telepon, Jenis Kelamin, Pendidikan, Bidang.
                    </p>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title"> Pondok Pesantren Perkemas</h2>
                <p class="section-lead">
                Halaman Detail Karyawan
                </p>
                <div class="row">
                    <div class="col-12 ">
                        <div class="card card-primary">
                        <div class="col-md-12 text-center">
                            <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                                Detail Data Karyawan</p>
                            <p style="line-height:-30px;margin-top:-20px;">Berikut adalah data karyawan dari {{ $biodatamudhir->nama_mudhir }} </p>
                            <hr>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="form-group col-md-12">
                                        <p style="text-align:center;">
                                            @if($biodatamudhir->foto)
                                                <img style="height:300px; width:300px; object-fit:cover; object-position:center;" class="card-img-top rounded-circle mr-1" src="{{ $biodatamudhir->foto }}"> <br>
                                            @else
                                                <img alt="image" src="{{ asset('/assets/img/avatar/avatar-1.png') }}" style="height:300px; width:300px; object-fit:cover; object-position:center;"  class="card-img-top rounded-circle mr-1">
                                            @endif
                                        </p>
                                    </div>
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Nama Karyawan</th>
                                                <td>{{ $biodatamudhir->nama_mudhir }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $biodatamudhir->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <th>No Telepon</th>
                                                <td>{{ $biodatamudhir->no_telepon }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>{{ $biodatamudhir->jenis_kelamin }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pendidikan</th>
                                                <td>{{ $biodatamudhir->pendidikan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Bidang</th>
                                                <td>{{ $biodatamudhir->bidang_ilmu }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{url('/biodata_mudhir')}}" class="btn btn-primary">Kembali </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
@endsection