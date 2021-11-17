@extends('layouts.master')

@section('title')
    Create Jabatan
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tambah Jabatan</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data Jabatan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('kategori_gaji.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" name="kategori_gaji" class="form-control" required="" placeholder="Masukkan Jabatan">
                                </div>
                                <div class="form-group">
                                    <label>Nominal Gaji</label>
                                    <input type="number" name="nominal_gaji" class="form-control" required="" placeholder="Masukkan Gaji">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambah</button>
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