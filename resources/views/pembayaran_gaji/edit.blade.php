@extends('layouts.master')

@section('title')
    Update Pembayaran Gaji
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Pembayaran Gaji</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Pembayaran Gaji
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pembayaran_gaji.update', $pembayarangaji->id_pembayaran_gaji)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="id_kategori_gaji" id="jabatan" class="form-control">
                                        
                                        @foreach($kategorigaji as $item)
                                            <option value="{{ $item->id_kategori_gaji}}" 
                                            @if($item->id_kategori_gaji == $pembayarangaji->id_kategori_gaji)
                                                selected
                                            @endif
                                            >{{$item->kategori_gaji}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <select name="id_biodata_mudhir" id="nama" class="form-control">
                                        
                                        @foreach($biodatamudhir as $item)
                                            <option value="{{ $item->id_biodata_mudhir}}" data-chained="{{ $item->id_kategori_gaji }}"
                                            @if($item->id_biodata_mudhir == $pembayarangaji->id_biodata_mudhir)
                                                selected
                                            @endif
                                            >{{$item->nama_mudhir}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gaji</label>
                                    <select name="id_kategori_gaji" id="gaji" class="form-control">
                                        
                                        @foreach($kategorigaji as $item)
                                            <option value="{{ $item->id_kategori_gaji}}" data-chained="{{ $item->id_kategori_gaji }}"
                                            @if($item->id_kategori_gaji == $pembayarangaji->id_kategori_gaji)
                                                selected
                                            @endif
                                            >{{$item->nominal_gaji}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <?php
                                        $tgl = $time = strtotime($pembayarangaji->tanggal_pembayaran);
                                        $newformat = date('Y-m-d',$time);
                                    ?>
                                    <input type="date" value="{{$newformat}}" name="tanggal_pembayaran" class="form-control" placeholder="Masukkan gaji">
                                </div>
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select name="bulan" class="form-control" >
                                        <option >--Pilih--</option>
                                        <option value="{{$pembayarangaji->bulan}}" selected>{{$pembayarangaji->bulan}}</option>
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
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i> Ubah</button>
                                    <a class="btn btn-primary" href="/pembayaran_gaji"><i class="fas fa-times-circle"></i> Batal</a>
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