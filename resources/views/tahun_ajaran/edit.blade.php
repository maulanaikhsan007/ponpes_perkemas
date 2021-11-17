@extends('layouts.master')

@section('title')
    Update Tahun Ajaran
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Tahun Ajaran</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Tahun Ajaran
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <form method="post" action="{{route('tahun_ajaran.update', $tahunajaran->id_tahun_ajaran)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" value="{{$tahunajaran->tahun}}" name="tahun" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Semester</label>
                                    <input type="text" value="{{$tahunajaran->semester}}" name="semester" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i> Ubah</button>
                                    <a class="btn btn-primary" href="/tahun_ajaran"><i class="fas fa-times-circle"></i> Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('sweetalert::alert')

@endsection