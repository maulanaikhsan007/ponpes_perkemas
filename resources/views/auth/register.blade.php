@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pendaftaran Siswa</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="number" name="nisn" class="form-control" required="" autocomplete="off" placeholder="Masukkan NISN siswa" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" name="name" class="form-control" required="" autocomplete="off" placeholder="Masukkan nama siswa" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Samaran Siswa</label>
                                <input type="text" name="nama_samaran_siswa" class="form-control" required="" autocomplete="off" placeholder="Masukkan nama samaran siswa">
                            </div>
                            <div class="form-group">
                            <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option >--Pilih--</option>
                                    <option name="laki-laki">Laki-Laki</option>
                                    <option name="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="id_kelas" class="form-control">
                                <option >--Pilih--</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id_kelas}}">{{ $item->kelas}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control" required="" autocomplete="off" placeholder="Masukkan asal sekolah">
                            </div>
                            <div class="form-group">
                                <label>Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control" required="" autocomplete="off" placeholder="Masukkan nama ayah">
                            </div>
                            <div class="form-group">
                                <label>Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control" required="" autocomplete="off" placeholder="Masukkan nama ibu">
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
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required="" autocomplete="off" placeholder="Masukkan email siswa" required>
                            </div>
                            <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="file" name="foto" class="form-control" required="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



