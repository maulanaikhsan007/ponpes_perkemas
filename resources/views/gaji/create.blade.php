@extends('layouts.master')

@section('title')
    Create Gaji
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tambah Gaji</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data Gaji
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('gaji.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group ">
                                    <label>Kategori Gaji</label>
                                    <select name="id_kategori_gaji" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($kategorigaji as $item)
                                            <option value="{{ $item->id_kategori_gaji}}">{{ $item->kategori_gaji}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gaji</label>
                                    <input type="number" name="gaji" class="form-control" required="" placeholder="Masukkan Gaji">
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