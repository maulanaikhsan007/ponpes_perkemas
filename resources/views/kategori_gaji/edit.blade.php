@extends('layouts.master')

@section('title')
    Update Jabatan
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Jabatan</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Jabatan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('kategori_gaji.update', $kategorigaji->id_kategori_gaji)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kategori Gaji</label>
                                    <input type="text" value="{{$kategorigaji->kategori_gaji}}" name="kategori_gaji" class="form-control" required="" placeholder="Masukkan Kategori">
                                </div>
                                <div class="form-group">
                                    <label>Nominal Gaji</label>
                                    <input type="number" name="nominal_gaji" value="{{$kategorigaji->nominal_gaji}}" class="form-control" required="" placeholder="Masukkan Gaji">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i> Ubah</button>
                                    <a class="btn btn-primary" href="/kategori_gaji"><i class="fas fa-times-circle"></i> Batal</a>
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