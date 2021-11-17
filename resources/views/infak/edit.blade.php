@extends('layouts.master')

@section('title')
    Update Infak
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Infak</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Infak
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('infak.update', $infak->id_infak)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Infak Bangunan</label>
                                    <input type="number" value="{{$infak->infak_bangunan}}" name="infak_bangunan" class="form-control" required="" placeholder="Masukkan Infak Bangunan">
                                </div>
                                <div class="form-group">
                                    <label>Infak Pendaftaran</label>
                                    <input type="number" value="{{$infak->infak_pendaftaran}}" name="infak_pendaftaran" class="form-control" required="" placeholder="Masukkan Infak Pendaftaran">
                                </div>
                                <div class="form-group">
                                    <label>Infak Ekskul</label>
                                    <input type="number" value="{{$infak->ekskul}}" name="ekskul" class="form-control" required="" placeholder="Masukkan Infak Ekskul">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning">Ubah</button>
                                    <a class="btn btn-primary" href="/infak">Batal</a>
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

@include('sweetalert::alert')