@extends('layouts.master')

@section('title')
   Create Biodata Karyawan
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tambah Biodata Karyawan</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Tambah Data Biodata Karyawan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('biodata_mudhir.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Karyawan</label>
                                    <input type="text" name="nama_mudhir" class="form-control" required="" placeholder="Masukkan nama">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="id_kategori_gaji" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach($kategorigaji as $item)
                                            <option value="{{ $item->id_kategori_gaji}}">{{$item->kategori_gaji}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" required="" placeholder="Masukkan Alamat">
                                </div>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input name="no_telepon" type="number" class="form-control" required="" placeholder="Masukkan No Telp">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select  name="jenis_kelamin" class="form-control">
                                        <option >--Pilih--</option>
                                        <option name="laki-laki">Laki-Laki</option>
                                        <option name="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan</label>
                                    <input type="text" name="pendidikan" class="form-control" placeholder="Masukkan Pendidikan">
                                </div>
                                <div class="form-group">
                                    <label>Bidang Ilmu</label>
                                    <input type="text" name="bidang_ilmu" class="form-control" placeholder="Masukkan Bidang Ilmu">
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="image" class="form-control" onchange="loadPhoto(event)">
                                </div>
                                <div class="form group">
                                    <img id="photo" width="100" height="100" >
                                </div>
                                <br>
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
<script>
    function loadPhoto(event){
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('photo');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>