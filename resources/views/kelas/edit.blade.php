@extends('layouts.master')

@section('title')
    Update Kelas
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Kelas</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Kelas
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <form method="post" action="{{route('kelas.update', $kelas->id_kelas)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="text" value="{{$kelas->kelas}}" name="kelas" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <input type="text" value="{{$kelas->nama_kelas}}" name="nama_kelas" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i>  Ubah</button>
                                    <a class="btn btn-primary" href="/kelas"><i class="fas fa-times-circle"></i> Batal</a>
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