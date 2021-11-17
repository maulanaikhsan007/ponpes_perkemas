@extends('layouts.master')

@section('title')
    Create Kategori Pemasukan
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tambah Kategori Pemasukan</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data Kategori Pemasukan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pemasukan.tambahkategori')}}">
                            @csrf
                            <!-- <div class="card-header">
                                
                            </div> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input value="{{old('nama_kategori')}}" type="text" name="nama_kategori" class="form-control" required="" placeholder="Masukkan Nama Kategori">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Tambah</button>
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