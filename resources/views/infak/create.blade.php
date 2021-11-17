@extends('layouts.master')

@section('title')
    Create Infak
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Infak</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data Infak
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('infak.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Infak Bangunan</label>
                                    <input type="number" name="infak_bangunan" class="form-control" required="" placeholder="Masukkan ">
                                </div>
                                <div class="form-group">
                                    <label>Infak Pendaftaran</label>
                                    <input type="number" name="infak_pendaftaran" class="form-control" required="" placeholder="Masukkan ">
                                </div>
                                <div class="form-group">
                                    <label>Infak Ekskul</label>
                                    <input type="number" name="ekskul" class="form-control" required="" placeholder="Masukkan ">
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