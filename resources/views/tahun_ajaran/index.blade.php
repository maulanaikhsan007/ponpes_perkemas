@extends('layouts.master')

@section('title')
    Tahun Ajaran
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tahun Ajaran</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data Tahun Ajaran
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header"><br>
                            <a href="{{route('tahun_ajaran.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                            <form class="card-header-right col-md-6 col-12">
                                <div>
                                    <!-- <select name="id_tahun_ajaran" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($tahunajaran as $item)
                                            <option value="{{ $item->id_tahun_ajaran}}">{{ $item->tahun}}</option>
                                        @endforeach
                                    </select> -->
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_tahun_ajaran">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Semester</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tahunajaran as $tahunajaran)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$tahunajaran->tahun}}</td>
                                            <td>{{$tahunajaran->semester}}</td>
                                            <td>
                                                <span class="btn btn-success" class="label label-{{($tahunajaran->status == 'A' ? 'success':'danger')}}">{{($tahunajaran->status == 'A' ? 'Aktif':'Nonaktif')}}</span>
                                            </td>
                                            <td>
                                                @if($tahunajaran->status == 'A')
                                                <a href="{{route('tahun_ajaran.apply', $tahunajaran->id_tahun_ajaran)}}" class="btn btn-primary">Nonaktifkan</a>
                                                @else
                                                <a href="{{route('tahun_ajaran.apply', $tahunajaran->id_tahun_ajaran)}}" class="btn btn-success">Aktifkan</a>
                                                @endif
                                                <a href="{{route('tahun_ajaran.edit', $tahunajaran->id_tahun_ajaran)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('tahun_ajaran.destroy', $tahunajaran->id_tahun_ajaran)}}" class="btn btn-danger swal-confirm" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"><i class="fas fa-trash-alt"></i></a>
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
            $('#table_tahun_ajaran').DataTable();
        } );
    </script>

@endpush

