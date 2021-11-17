@extends('layouts.master')

@section('title')
    Update Pembayaran SPP
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Pembayaran SPP</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Pembayaran SPP
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pembayaran_spp.update', $pembayaranspp->id_pembayaran_spp)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>NIS</label>
                                    <select name="id_biodata_siswa" class="form-control">
                                        @foreach ($biodatasiswa as $item)
                                            <option value="{{ $item->id_biodata_siswa}}"
                                            @if($item->id_biodata_siswa == $pembayaranspp->id_biodata_siswa)
                                                selected
                                            @endif
                                            >{{ $item->NIS}} - {{$item->nama_siswa}}
                                            </option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="id_kelas" id="id_kelas" class="form-control" readonly>
                                        @foreach ($kelas as $item)
                                             <option value="{{ $item->id_kelas}}"
                                            @if($item->id_kelas == $pembayaranspp->id_kelas)
                                                selected
                                            @endif
                                            >{{$item->kelas}}
                                            </option>
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
                                            @if($item == $tahunajaran[count($tahunajaran)-1])
                                                <option value="{{ $item->id_tahun_ajaran}}" selected >{{$item->tahun }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembayaran </label>
                                    <?php
                                        $tgl = $time = strtotime($pembayaranspp->tanggal_pembayaran);
                                        $newformat = date('Y-m-d',$time);
                                    ?>
                                    <input type="date" name="tanggal_pembayaran" value="{{$newformat}}" class="form-control" required="" placeholder="">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select  name="bulan" class="form-control">
                                        <option value="" readonly>--Pilih--</option>
                                        <option value="{{$pembayaranspp->bulan}}" selected>{{$pembayaranspp->bulan}}</option>
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
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i>  Ubah</button>
                                    <a class="btn btn-primary" href="/pembayaran_spp"><i class="fas fa-times-circle"></i> Batal</a>
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