@extends('layouts.master')

@section('title')
    Pengeluaran Harian
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Pengeluaran Harian</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Pengeluaran Harian
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{ route('pengeluaran_harian.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_pengeluaran_harian">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Pengeluaran</th>
                                            <th>Tanggal Pengeluaran</th>
                                            <th>Biaya</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengeluaranharian as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$data->jenispengeluaran['jenis_pengeluaran']}}</td>
                                            <td>{{$data->tanggal_pengeluaran}}</td>
                                            <td>Rp. {{number_format($data->biaya)}}</td>
                                            <td>
                                                <a href="{{route('pengeluaran_harian.edit', $data->id_pengeluaran_harian)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('pengeluaran_harian.destroy', $data->id_pengeluaran_harian)}}" class="btn btn-danger swal-confirm" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            $('#table_pengeluaran_harian').DataTable();
        } );
    </script>

@endpush