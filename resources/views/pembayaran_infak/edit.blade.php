@extends('layouts.master')

@section('title')
    Update Pembayaran Infak
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Pembayaran Infak</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Pembayaran Infak
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pembayaran_infak.update', $pembayaraninfak->id_pembayaran_infak)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>NIS</label>
                                    <select name="id_biodata_siswa" class="form-control">
                                        
                                        @foreach($biodatasiswa as $item)
                                            <option value="{{ $item->id_biodata_siswa}}" 
                                            @if($item->id_biodata_siswa == $pembayaraninfak->id_biodata_siswa)
                                                selected
                                            @endif
                                            >{{$item->NIS}} - {{$item->nama_siswa}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Infak Bangunan</label>
                                    <input type="text" value="{{$pembayaraninfak->infak_bangunan}}" name="infak_bangunan" class="form-control" required="" placeholder="Masukkan Infak Bangunan">
                                </div>
                                <div class="form-group">
                                    <label>Infak Pendaftaran</label>
                                    <input type="text" value="{{$pembayaraninfak->infak_pendaftaran}}" name="infak_pendaftaran" class="form-control" required="" placeholder="Masukkan Infak Pendaftaran">
                                </div>
                                <div class="form-group">
                                    <label>Infak Ekskul</label>
                                    <input type="text" value="{{$pembayaraninfak->infak_ekskul}}" name="infak_ekskul" class="form-control" required="" placeholder="Masukkan Infak Ekskul">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" value="{{$pembayaraninfak->tanggal_pembayaran}}" name="tanggal_pembayaran" class="form-control" required="" placeholder="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i> Ubah</button>
                                    <a class="btn btn-primary" href="/pembayaran_infak"><i class="fas fa-times-circle"></i> Batal</a>
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