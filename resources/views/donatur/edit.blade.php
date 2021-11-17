@extends('layouts.master')

@section('title')
    Update Donatur
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Donatur</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Donatur
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{ route('donatur.update', $donatur->id_donatur) }}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Donatur</label>
                                    <input type="text" value="{{$donatur->nama_donatur}}" name="nama_donatur" class="form-control" required="" placeholder="Masukkan nama donatur">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Donatur</label>
                                    <select name="jenis_donatur" class="form-control">

                                        <option value="Tunai" <?php if($donatur->jenis_donatur=='Tunai'){ echo "selected"; } ?>>Tunai</option>
                                        <option value="Barang" <?php if($donatur->jenis_donatur=='Barang'){ echo "selected"; } ?>>Barang</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nominal</label>
                                    <input type="number" value="{{$donatur->nominal}}" name="nominal" class="form-control" required="" placeholder="Masukkan nominal">
                                </div>
                                <div class="form-group">
                                    <label>Barang</label>
                                    <input value="{{$donatur->barang}}" name="barang" type="text" class="form-control" required="" placeholder="Masukkan barang">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea type="text" name="keterangan" class="form-control" required="" placeholder="Masukkan keterangan">{{$donatur->keterangan}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Donatur</label>
                                    <input value="{{$donatur->tanggal_donatur}}" type="date" name="tanggal_donatur" class="form-control" required="" placeholder="Masukkan tanggal donatur">
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i>  Ubah</button>
                                    <a class="btn btn-primary" href="/donatur"><i class="fas fa-times-circle"></i> Batal</a>
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