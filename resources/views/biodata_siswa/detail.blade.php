@extends('layouts.master')

@section('title', 'Detail Siswa')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title text-uppercase" style="color: black;">Detail Siswa — {{ $biodatasiswa->nama_siswa }} </h2>
                    <hr>
                    <p class="card-text"> Berikut adalah detail siswa dari siswa yang bernama {{$biodatasiswa->nama_siswa}}. Detail
                        meliputi NIS, Nama Siswa, Nama Samaran Siswa, Asal Sekolah, Nama Ayah, Nama Ibu, Telepon Orang Tua, Alamat Orang Tua.
                    </p>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title"> Pondok Pesantren Perkemas</h2>
                <p class="section-lead">
                Halaman Detail Siswa
                </p>
                <div class="row">
                    <div class="col-12 ">
                        <div class="card card-primary">
                        <div class="col-md-12 text-center">
                            <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                                Detail Data Siswa</p>
                            <p style="line-height:-30px;margin-top:-20px;">Berikut adalah data siswa dari {{ $biodatasiswa->nama_siswa }} </p>
                            <hr>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="form-group col-md-12">
                                        <p style="text-align:center;">
                                            @if($biodatasiswa->foto)
                                                <img style="height:300px; width:300px; object-fit:cover; object-position:center;" class="card-img-top rounded-circle mr-1" src="../siswa/{{$biodatasiswa->foto}}"> <br>
                                            @else
                                                <img alt="image" src="{{ asset('/assets/img/avatar/avatar-1.png') }}" style="height:300px; width:300px; object-fit:cover; object-position:center;"  class="card-img-top rounded-circle mr-1">
                                            @endif
                                        </p>
                                    </div>
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th>NISN</th>
                                                <td>{{ $biodatasiswa->nisn }}</td>
                                            </tr>
                                            <tr>
                                                <th>NIS</th>
                                                <td>{{ $biodatasiswa->NIS }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Siswa</th>
                                                <td>{{ $biodatasiswa->nama_siswa }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Samaran Siswa</th>
                                                <td>{{ $biodatasiswa->nama_samaran_siswa }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kelas</th>
                                                <td>{{ $biodatasiswa->kelas['kelas'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Asal Sekolah</th>
                                                <td>{{ $biodatasiswa->asal_sekolah }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Ayah</th>
                                                <td>{{ $biodatasiswa->nama_ayah }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Ibu</th>
                                                <td>{{ $biodatasiswa->nama_ibu }}</td>
                                            </tr>
                                            <tr>
                                                <th>Telepon Orang Tua</th>
                                                <td>{{ $biodatasiswa->telp_orang_tua }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat Orang Tua</th>
                                                <td>{{ $biodatasiswa->alamat_orang_tua }}</td>
                                            </tr>
                                            
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