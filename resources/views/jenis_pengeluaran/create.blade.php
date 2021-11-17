@extends('layouts.master')

@section('title')
    Create Jenis Pengeluaran
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tambah Jenis Pengeluaran</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data Jenis Pengeluaran
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('jenis_pengeluaran.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jenis Pengeluaran</label>
                                    <input type="text" name="jenis_pengeluaran" class="form-control" required="" placeholder="Jenis Pengeluaran">
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