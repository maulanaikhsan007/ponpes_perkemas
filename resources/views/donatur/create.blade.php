@extends('layouts.master')

@section('title')
   Create Donatur
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tambah Donatur</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data Donatur
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('donatur.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Donatur</label>
                                    <input type="text" name="nama_donatur" class="form-control" required="" placeholder="Masukkan nama donatur">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Donasi</label>
                                    <select  name="jenis_donatur" class="form-control">
                                        <option >--Pilih--</option>
                                        <option name="Tunai">Tunai</option>
                                        <option name="Barang">Barang</option>
                                     </select>
                                </div>
                                <div class="form-group">
                                    <label>Nominal</label>
                                    <input type="number" name="nominal" class="form-control" required="" placeholder="Masukkan nominal">
                                    <label for="">*isi dengan tanda ( - ) jika tidak ingin diisi</label>
                                </div>
                                <div class="form-group">
                                    <label>Barang</label>
                                    <input name="barang" type="text" class="form-control" required="" placeholder="Masukkan barang">
                                    <label for="">*isi dengan tanda ( - ) jika tidak ingin diisi</label>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea type="text" name="keterangan" class="form-control" required="" placeholder="Masukkan keterangan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Donatur</label>
                                    <input type="date" name="tanggal_donatur" class="form-control" required="" placeholder="Masukkan tanggal donatur">
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