@extends('layouts.master')

@section('title')
    Update Pengeluaran Harian
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Pengeluaran Harian</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Pengeluaran Harian
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pengeluaran_harian.update', $pengeluaranharian->id_pengeluaran_harian)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group ">
                                    <label>Jenis Pengeluaran</label>
                                    <select name="id_jenis_pengeluaran" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($jenispengeluaran as $item)
                                            <option value="{{ $item->id_jenis_pengeluaran}}"
                                            @if($item->id_jenis_pengeluaran == $pengeluaranharian->id_jenis_pengeluaran)
                                                selected
                                            @endif
                                            >{{ $item->jenis_pengeluaran}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pengeluaran</label>
                                    <input type="date" value="{{$pengeluaranharian->tanggal_pengeluaran}}" name="tanggal_pengeluaran" class="form-control" required="" placeholder="Masukkan Tanggal">
                                </div>
                                <div class="form-group">
                                    <label>Biaya</label>
                                    <input type="text" value="{{$pengeluaranharian->biaya}}" name="biaya" class="form-control" required="" placeholder="Masukkan Biaya">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i> Ubah</button>
                                    <a class="btn btn-primary" href="/pengeluaran_harian"><i class="fas fa-times-circle"></i> Batal</a>
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