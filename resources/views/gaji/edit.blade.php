@extends('layouts.master')

@section('title')
    Update Gaji
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Gaji</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Gaji
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <form method="post" action="{{route('gaji.update', $gaji->id_gaji)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kategori Gaji</label>
                                    <select name="id_kategori_gaji" class="form-control">
                                        
                                        @foreach($kategorigaji as $item)
                                            <option value="{{ $item->id_kategori_gaji}}" 
                                            @if($item->id_kategori_gaji == $gaji->id_kategori_gaji)
                                                selected
                                            @endif
                                            >{{$item->kategori_gaji}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gaji</label>
                                    <input type="text" value="{{$gaji->gaji}}" name="gaji" class="form-control" required="" placeholder="Masukkan gaji">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i> Ubah</button>
                                    <a class="btn btn-primary" href="/gaji"><i class="fas fa-times-circle"></i> Batal</a>
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