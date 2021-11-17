@extends('layouts.master')

@section('title')
    Bayar Pembayaran Gaji
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Entri Pembayaran Gaji</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Entri Pembayaran Gaji
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pembayaran_gaji.store')}}">
                            @csrf
                            <div class="card-body">
                                <!-- <div class="form-group">
                                    <label>Nama Mudhir</label>
                                    <input type="text" name="kelas" class="form-control" required="" placeholder="">
                                </div> -->
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="id_kategori_gaji" id="jabatan" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($kategorigaji as $item)
                                            <option value="{{ $item->id_kategori_gaji}}">{{ $item->kategori_gaji}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <select name="id_biodata_mudhir" id="nama" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($biodatamudhir as $item)
                                            <option value="{{ $item->id_biodata_mudhir}}" data-chained="{{ $item->id_kategori_gaji }}">{{ $item->nama_mudhir}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gaji</label>
                                    <label name="id_kategori_gaji" id="gaji" class="form-control bg-light">  
                                        @foreach ($kategorigaji as $item)
                                            <option value="{{ $item->id_kategori_gaji}}" data-chained="{{ $item->id_kategori_gaji }}">{{ $item->nominal_gaji}}</option>
                                        @endforeach
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" name="tanggal_pembayaran" class="form-control" required="" placeholder="Masukkan Tanggal Pembayaran">
                                </div>
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select  name="bulan" class="form-control">
                                        <option >--Pilih--</option>
                                        <option>JANUARI</option>
                                        <option>FEBRUARI</option>
                                        <option>MARET</option>
                                        <option>APRIL</option>
                                        <option>MEI</option>
                                        <option>JUNI</option>
                                        <option>JULI</option>
                                        <option>AGUSTUS</option>
                                        <option>SEPTEMBER</option>
                                        <option>OKTOBER</option>
                                        <option>NOVEMBER</option>
                                        <option>DESEMBER</option>
                                    </select>
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