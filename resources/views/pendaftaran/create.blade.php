@extends('layouts.master')

@section('title')
    Pendaftaran siswa
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pendaftaran</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Pendaftaran Siswa
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pendaftaran.store')}}">
                            @csrf
                            <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <input type="text" name="nama_siswa" class="form-control" required="" placeholder="Masukkan nama siswa">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Samaran Siswa</label>
                                        <input type="text" name="nama_samaran_siswa" class="form-control" required="" placeholder="Masukkan nama samaran siswa">
                                    </div>
                                    <div class="form-group">
                                        <label>Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" class="form-control" required="" placeholder="Masukkan asal sekolah">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ayah</label>
                                        <input type="text" name="nama_ayah" class="form-control" required="" placeholder="Masukkan nama ayah">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ibu</label>
                                        <input type="text" name="nama_ibu" class="form-control" required="" placeholder="Masukkan nama ibu">
                                    </div>
                                    <div class="form-group">
                                        <label>Telp Orang Tua</label>
                                        <input type="text" name="telp_orang_tua" class="form-control" required="" placeholder="Masukkan no telepon">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Alamat Orang Tua</label>
                                        <textarea type="text"  class="form-control" name="alamat_orang_tua"></textarea>
                                    </div>  
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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