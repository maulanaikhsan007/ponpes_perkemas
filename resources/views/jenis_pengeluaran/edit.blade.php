@extends('layouts.master')

@section('title')
    Update Jenis Pengeluaran
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Jenis Pengeluaran</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Jenis Pengeluaran
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('jenis_pengeluaran.update', $jenispengeluaran->id_jenis_pengeluaran)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jenis Pengeluaran</label>
                                    <input type="text" value="{{$jenispengeluaran->jenis_pengeluaran}}" name="jenis_pengeluaran" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i>  Ubah</button>
                                    <a class="btn btn-primary" href="/jenis_pengeluaran"><i class="fas fa-times-circle"></i> Batal</a>
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