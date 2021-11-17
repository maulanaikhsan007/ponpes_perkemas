@extends('layouts.master')

@section('title')
    Update SPP
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit SPP</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data SPP
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('spp.update', $spp->id_spp)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nominal SPP</label>
                                    <input type="number" value="{{$spp->spp}}" name="spp" class="form-control" required="" placeholder="Nominal SPP">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" value="{{$spp->start_date}}" class="form-control" required="" placeholder="Tanggal Mulai">
                                </div>
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" name="end_date" value="{{$spp->end_date}}" class="form-control" required="" placeholder="Tanggal Berakhir">
                                </div> -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i> Ubah</button>
                                    <a class="btn btn-primary" href="/spp"><i class="fas fa-times-circle"></i> Batal</a>
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