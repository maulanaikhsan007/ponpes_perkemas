@extends('layouts.master')

@section('title')
    Update Pengeluaran
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Pengeluaran</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Pengeluaran
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <form method="post" action="{{route('pengeluaran.update', $pengeluaran->id_pengeluaran)}}">
                            @csrf
                            @method('put')
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <select name="id_kategori" class="form-control" id="id_kategori"  oninput="setCustomValidity('')">
                                        <option value="{{$pengeluaran->id_kategori}}">{{$pengeluaran->kategori['nama_kategori']}}</option>
                                        @foreach($data_kategori as $kategori)
                                        <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" name="tanggal" value="{{$pengeluaran->tanggal}}" class="form-control" required="" placeholder="Masukkan Tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input value="{{$pengeluaran->jumlah}}" name="jumlah" type="number" class="form-control" id="jumlah" placeholder="Jumlah" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="Keterangan" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">{{$pengeluaran->keterangan}}</textarea>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i> Ubah</button>
                                    <a class="btn btn-primary" href="/pengeluaran"><i class="fas fa-times-circle"></i> Batal</a>
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