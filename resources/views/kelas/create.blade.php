@extends('layouts.master')

@section('title')
    Create Kelas
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tambah Kelas</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data Kelas
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('kelas.store')}}">
                            @csrf
                            <!-- <div class="card-header">
                                
                            </div> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="number" name="kelas" class="form-control" required="" placeholder="Masukkan Kelas">
                                </div>
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control" required="" placeholder="Masukkan Nama Kelas">
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