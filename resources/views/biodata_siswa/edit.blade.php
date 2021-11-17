@extends('layouts.master')

@section('title')
    Update Biodata Siswa
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Biodata Siswa</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Biodata Siswa
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{ route('biodata_siswa.update', $biodatasiswa->id_biodata_siswa) }}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                    <div class="form-group">
                                        <label>NISN</label>
                                        <input type="number" value="{{$biodatasiswa->nisn}}" name="nisn" class="form-control" required="" placeholder="Masukkan NISN">
                                    </div>
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="number" value="{{$biodatasiswa->NIS}}" name="NIS" class="form-control" required="" placeholder="Masukkan NIS">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <input type="text" value="{{$biodatasiswa->nama_siswa}}" name="nama_siswa" class="form-control" required="" placeholder="Masukkan nama siswa">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Samaran Siswa</label>
                                        <input type="text" value="{{$biodatasiswa->nama_samaran_siswa}}" name="nama_samaran_siswa" class="form-control" required="" placeholder="Masukkan nama samaran siswa">
                                    </div>
                                    <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" value="{{$biodatasiswa->jenis_kelamin}}" class="form-control">
                                            
                                            <option value="laki-Laki" <?php if($biodatasiswa->jenis_kelamin=='laki-Laki'){ echo "selected"; } ?>>laki-Laki</option>
                                            <option value="perempuan" <?php if($biodatasiswa->jenis_kelamin=='perempuan'){ echo "selected"; } ?>>perempuan</option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" value="{{$biodatasiswa->kelas['kelas']}}" name="id_kelas" class="form-control" required="" placeholder="Masukkan kelas">
                                    </div> -->
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select name="id_kelas" class="form-control">
                                            @foreach ($kelas as $item)
                                                <option value="{{ $item->id_kelas}}" 
                                                @if($item->id_kelas == $biodatasiswa->id_kelas)
                                                    selected
                                                @endif
                                                >{{ $item->kelas}}
                                                </option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Asal Sekolah</label>
                                        <input type="text" value="{{$biodatasiswa->asal_sekolah}}" name="asal_sekolah" class="form-control" required="" placeholder="Masukkan asal sekolah">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ayah</label>
                                        <input type="text" value="{{$biodatasiswa->nama_ayah}}" name="nama_ayah" class="form-control" required="" placeholder="Masukkan nama ayah">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ibu</label>
                                        <input type="text" value="{{$biodatasiswa->nama_ibu}}" name="nama_ibu" class="form-control" required="" placeholder="Masukkan nama ibu">
                                    </div>
                                    <div class="form-group">
                                        <label>telp Orang Tua</label>
                                        <input type="text" value="{{$biodatasiswa->telp_orang_tua}}" name="telp_orang_tua" class="form-control" required="" placeholder="Masukkan no telepon">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Orang Tua</label>
                                        <textarea type="text" class="form-control" name="alamat_orang_tua">{{$biodatasiswa->alamat_orang_tua}}</textarea>
                                    </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i>  Ubah</button>
                                    <a class="btn btn-primary" href="/biodata_siswa"><i class="fas fa-times-circle"></i> Batal</a>
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