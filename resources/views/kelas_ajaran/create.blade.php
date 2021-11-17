@extends('layouts.master')

@section('title')
    Create Kelas Ajaran
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kelas Ajaran</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data Kelas Ajaran
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('kelas_ajaran.store')}}">
                            @csrf
                            <!-- <div class="card-header">
                                
                            </div> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>NIS</label>
                                    <select name="NIS" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($biodatasiswa as $item)
                                            <option name="{{ $item->NIS}}">{{ $item->NIS}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="id_kelas" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($kelas as $item)
                                            <option name="{{ $item->id_kelas}}">{{ $item->nama_kelas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <select name="id_tahun_ajaran" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($tahunajaran as $item)
                                            <option name="{{ $item->id_tahun_ajaran}}">{{ $item->tahun}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection