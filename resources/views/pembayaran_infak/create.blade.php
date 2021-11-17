@extends('layouts.master')

@section('title')
    Entri Pembayaran Infak
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Entri Pembayaran Infak</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Entri Pembayaran Infak
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pembayaran_infak.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>NIS</label>
                                    <select name="id_biodata_siswa" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($biodatasiswa as $item)
                                            <option value="{{ $item->id_biodata_siswa}}">{{ $item->NIS}} - {{$item->nama_siswa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Infak Bangunan</label>
                                    <input type="text" name="infak_bangunan" class="form-control" required="" placeholder="Infak Bangunan">
                                </div>
                                <div class="form-group">
                                    <label>Infak Pendaftaran</label>
                                    <input type="text" name="infak_pendaftaran" class="form-control" required="" placeholder="Infak Pendaftaran">
                                </div>
                                <div class="form-group">
                                    <label>Infak Ekskul</label>
                                    <input type="text" name="infak_ekskul" class="form-control" required="" placeholder="Infak Ekskul">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" name="tanggal_pembayaran" class="form-control" required="" placeholder="Masukkan Tanggal Pembayaran">
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