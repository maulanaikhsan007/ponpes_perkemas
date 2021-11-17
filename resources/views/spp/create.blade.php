@extends('layouts.master')

@section('title')
    Create SPP
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tambah SPP</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data SPP
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <form method="post" action="{{route('spp.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nominal SPP</label>
                                    <input type="number" name="spp" class="form-control" required="" placeholder="Masukkan Nominal SPP">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" class="form-control" required="" placeholder="Masukkan Tanggal Mulai">
                                </div>
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date"  name="end_date" class="form-control" placeholder="Masukkan Tanggal Berakhir">
                                </div>
                                <div class="form-group">
                                <div class="form-label">Status</div>
                                <label class="custom-switch">
                                <input type="checkbox" name="is_active" value="1" class="custom-switch-input" {{ isset($periode) ? ($periode->is_active ? 'checked' : '') : '' }}>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Aktif</span>
                                </label>
                            </div> -->
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