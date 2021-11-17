@extends('layouts.master')

@section('title')
   Update Biodata Karyawan
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Biodata Karyawan</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Biodata Karyawan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{ route('biodata_mudhir.update', $biodatamudhir->id_biodata_mudhir) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Mudhir</label>
                                    <input type="text" name="nama_mudhir" value="{{$biodatamudhir->nama_mudhir}}" class="form-control" required="" placeholder="Masukkan nama">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="id_kategori_gaji" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach($kategorigaji as $item)
                                            <option value="{{ $item->id_kategori_gaji}}" 
                                            @if($item->id_kategori_gaji == $biodatamudhir->id_kategori_gaji)
                                                selected
                                            @endif
                                            >{{$item->kategori_gaji}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" value="{{$biodatamudhir->alamat}}" class="form-control" required="" placeholder="Masukkan Alamat">
                                </div>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input name="no_telepon" value="{{$biodatamudhir->no_telepon}}" type="number" class="form-control" required="" placeholder="Masukkan No Telp">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" value="{{$biodatamudhir->jenis_kelamin}}" class="form-control">
                                        <option >--Pilih--</option>
                                        <option value="laki-laki" <?php if($biodatamudhir->jenis_kelamin=='laki-laki'){ echo "selected"; } ?>>Laki-Laki</option>
                                        <option value="perempuan" <?php if($biodatamudhir->jenis_kelamin=='perempuan'){ echo "selected"; } ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan</label>
                                    <input type="text" name="pendidikan" value="{{$biodatamudhir->pendidikan}}" class="form-control" required="" placeholder="Masukkan Pendidikan">
                                </div>
                                <div class="form-group">
                                    <label>Bidang Ilmu</label>
                                    <input type="text" name="bidang_ilmu" value="{{$biodatamudhir->bidang_ilmu}}" class="form-control" required="" placeholder="Masukkan Bidang Ilmu">
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="foto" class="form-control" onchange="loadPhoto(event)">
                                </div>
                                <div class="form group">
                                    <img id="photo" width="100" height="100" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i>  Ubah</button>
                                    <a class="btn btn-primary" href="/biodata_mudhir"><i class="fas fa-times-circle"></i> Batal</a>
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