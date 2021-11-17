@extends('layouts.master')

@section('title')
    SPP
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">SPP</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Data SPP
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{route('spp.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_spp">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nominal SPP</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <!-- <th>Status</th> -->
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($spp as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>Rp. {{number_format($data->spp)}}</td>
                                            <td>{{$data->start_date}}</td>
                                           
                                         @if ($data->status == 1)
                                         <td> - </td>
                                         @else
                                           <td>{{$data->end_date}} </td>
                                        @endif
                                           
                                           
                                           
                                            <td>
                                                <a href="{{route('spp.edit', $data->id_spp)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('spp.destroy', $data->id_spp)}}" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"><i class="fas fa-trash-alt"></i></a>
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
            $('#table_spp').DataTable();
        } );
    </script>

@endpush