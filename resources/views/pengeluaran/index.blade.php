@extends('layouts.master')

@section('title')
    Pengeluaran
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Pengeluaran</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Pengeluaran
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <h4 class="card-body"></h4>
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-primary">
                                            <h6 class="card-header p-3"> TAMBAH PENGELUARAN</h6>
                                            <div class="card-body">
                                                <form action="{{route('pengeluaran.tambah')}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-group row">
                                                        <label for="id_kategori">Pilih Kategori</label>
                                                        <select name="id_kategori" id="id_kategori" class="form-control" required oninvalid="this.setCustomValidity('Belum ada data yang dipilih !')" oninput="setCustomValidity('')">
                                                            <option value="">-- Pilih Kategori Pengeluaran --</option>
                                                            @foreach($data_kategori as $ktgr)
                                                                <option value="{{$ktgr->id_kategori}}">{{$ktgr->nama_kategori}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input type="date" name="tanggal" class="form-control" id="tanggal" required="" placeholder="Masukkan Tanggal">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jumlah">Jumlah</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp.</span>
                                                            </div>
                                                            <input value="{{old('jumlah')}}" name="jumlah" type="number" class="form-control" id="jumlah" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="keterangan">Keterangan</label>
                                                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="Keterangan" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">{{old('keterangan')}}</textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Tambah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item"><a class="nav-link active btn-sm" href="#pengeluaran" data-toggle="tab"><i class="fas fa-money-bill"></i> Rekap Data Pengeluaran</a></li>
                                                    <li class="nav-item"><a class="nav-link btn-sm" href="#kategori" data-toggle="tab"><i class="fas fa-layer-group"></i> Kategori Pengeluaran</a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div class="active tab-pane" id="pengeluaran">
                                                        <div class="row">
                                                            <div class="table-responsive">
                                                                <div class="col-12">
                                                                    <table class="table table-striped" id='tabelAgendaMasuk'>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No.</th>
                                                                                <th>Tanggal</th>
                                                                                <th>Jumlah</th>
                                                                                <th>Kategori</th>
                                                                                <th>Keterangan</th>
                                                                                <th>Aksi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $no = 0; ?>
                                                                            @foreach($data_pengeluaran as $pengeluaran)
                                                                            <?php $no++; ?>
                                                                            <tr>
                                                                                <td>{{$no}}</td>
                                                                                <td>{{$pengeluaran->tanggal}}</td>
                                                                                <td>Rp. {{number_format($pengeluaran->jumlah)}}</td>
                                                                                <td>{{$pengeluaran->kategori['nama_kategori']}}</td>
                                                                                <td>{{$pengeluaran->keterangan}}</td>
                                                                                <td>
                                                                                    <a href="{{route('pengeluaran.edit', $pengeluaran->id_pengeluaran)}}" class="btn btn-warning btn-sm my-1 mr-sm-1"><i class="nav-icon fas fa-pencil-alt"></i> </a>
                                                                                    
                                                                                    <a href="{{route('pengeluaran.destroy', $pengeluaran->id_pengeluaran)}}" class="btn btn-danger btn-sm my-1 mr-sm-1" onclick="return confirm('Hapus Data ?')"><i class="nav-icon fas fa-trash"></i>
                                                                                    </a>
                                                                                    
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="kategori">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                
                                                                    
                                                                        <div>
                                                                            <div class="col-12">
                                                                                <br>
                                                                                <a href="{{ route('pengeluaran.create')}}" class="btn btn-success btn-sm my-1 mr-sm-1"><i class="fas fa-plus"></i> Tambah Kategori</a>
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-striped" id='tabelAgendaKeluar'>
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No.</th>
                                                                                            <th>Nama Kategori</th>
                                                                                            
                                                                                            <th>Aksi</th>
                                                                                            
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php $no = 0; ?>
                                                                                        @foreach($data_kategori as $kategorikeluar)
                                                                                        <?php $no++; ?>
                                                                                        <tr>
                                                                                            <td>{{$no}}</td>
                                                                                            <td>{{$kategorikeluar->nama_kategori}}</td>
                                                                                            
                                                                                            <td>
                                                                                                <a href="{{route('pengeluaran.deletekategori', $kategorikeluar->id_kategori)}}" class="btn btn-danger btn-sm my-1 mr-sm-1" onclick="return confirm('Hapus Data ?')"><i class="nav-icon fas fa-trash"></i></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.nav-tabs-custom -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- Modal Tambah -->
                                    
                                </div><!-- /.container-fluid -->
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelAgendaMasuk').DataTable();
            $('#tabelAgendaKeluar').DataTable();
        } );
    </script>

@endpush