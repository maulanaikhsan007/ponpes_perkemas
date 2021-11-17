@extends('layouts.master')

@section('title')
    Entri Pembayaran SPP
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Entri Pembayaran SPP</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Entri Pembayaran SPP
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pembayaran_spp.store')}}">
                            @csrf
                            <div class="card-body">
                                <!-- <div class="form-group">
                                    <label>NIS</label>
                                    <input type="text" name="kelas" class="form-control" required="" placeholder="Masukkan NIS">
                                </div> -->
                                <div class="form-group">
                                    <label>NIS</label>
                                    <select name="id_biodata_siswa" id="biodata" onchange="getKelas(this.value)" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($biodatasiswa as $item)
                                            <option value="{{ $item->id_biodata_siswa}}">{{ $item->NIS}} - {{$item->nama_siswa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                   <!-- <input type="text" name="kelas" id="kelas" readonly />
                                    <input type="hidden" name="id_kelas" id="id_kelas" readonly />-->
                                   <select name="id_kelas" id="kelas" class="form-control" readonly>
                                        <option >--Pilih--</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id_kelas}}" data-chained="{{ $item->id_biodata_siswa }}">{{ $item->kelas}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label>SPP</label>
                                    <select name="id_spp" class="form-control" readonly>
                                        
                                        @foreach($spp as $item)
                                            @if($item == $spp[count($spp)-1])
                                                <option value="{{ $item->id_spp}}" selected >{{$item->spp }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <select name="id_tahun_ajaran" class="form-control" readonly>
                                        @foreach($tahunajaran as $item)
                                            <option value="{{ $item->id_tahun_ajaran}}">{{$item->tahun}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" name="tanggal_pembayaran" class="form-control" required="" placeholder="Masukkan Tanggal Pembayaran">
                                </div>
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select  name="bulan" class="form-control">
                                        <option value="" >--Pilih--</option>
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
                                <!-- <div class="form-group">
                                    <label>Status</label>
                                    <select  name="bulan" class="form-control">
                                        <option >--Pilih--</option>
                                        <option>Sudah Bayar</option>
                                        <option value="">Belum Bayar</option>
                                    </select>
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