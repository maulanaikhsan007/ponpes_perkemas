@extends('layouts.master')

@section('title')
    Tambah Pengeluaran Harian
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tambah Pengeluaran Harian</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data Pengeluaran Harian
            </p>
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pengeluaran_harian.store')}}">
                            @csrf
                            <div class="card-body">
                                <!-- <div class="row"> -->
                                    <div class="form-group ">
                                        <label>Jenis Pengeluaran</label>
                                        <select name="id_jenis_pengeluaran" class="form-control">
                                            <option >--Pilih--</option>
                                            @foreach ($jenispengeluaran as $item)
                                                <option value="{{ $item->id_jenis_pengeluaran}}">{{ $item->jenis_pengeluaran}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label>Biaya</label>
                                        <input type="number" name="biaya" class="form-control" required="" placeholder="Masukkan Biaya">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pengeluaran</label>
                                        <input type="date" name="tanggal_pengeluaran" class="form-control" required="" placeholder="Masukkan Nama Kelas">
                                    </div>
                                   
                                <!-- </div> -->
                            
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                             <h4>Catatan</h4>
                        </div>
                        <div class="card-body">
                            pengeluaran
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection