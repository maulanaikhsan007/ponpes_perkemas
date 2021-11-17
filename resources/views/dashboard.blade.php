@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Dashboard</h2>
        </div>
        <div class="row">
            @if(Auth::user()->role == 'admin')
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                        {{ DB::table('users')->where('role', 'admin')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Muslimin</h4>
                        </div>
                        <div class="card-body">
                        {{ DB::table('biodata_siswa')->where('jenis_kelamin','laki-laki')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Muslimat</h4>
                  </div>
                  <div class="card-body">
                  {{ DB::table('biodata_siswa')->where('jenis_kelamin','perempuan')->count() }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Entri Pembayaran SPP</h4>
                  </div>
                  <div class="card-body">
                  {{ DB::table('pembayaran_spp')->count() }}
                  </div>
                </div>
              </div>
            </div>
            @if(Auth::user()->role == 'admin')
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-money-bill-alt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pemasukan</h4>
                  </div>
                  <div class="card-body">
                  <?php
                  
                    $jumlah_pengeluaran = DB::table('pengeluaran')
                    ->sum('pengeluaran.jumlah');
                    $jumlah_pemasukan = DB::table('pemasukan')
                    ->sum('pemasukan.jumlah');
                    ?>
                  Rp. {{ number_format($jumlah_pemasukan),00 }}
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if(Auth::user()->role == 'admin')
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-money-bill"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengeluaran</h4>
                  </div>
                  <div class="card-body">
                  <?php
                    $jumlah_pengeluaran = DB::table('pengeluaran')
                      ->sum('pengeluaran.jumlah');
                    $jumlah_pemasukan = DB::table('pemasukan')
                      ->sum('pemasukan.jumlah');
                  ?>
                  Rp. {{ number_format($jumlah_pengeluaran),00 }}
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if(Auth::user()->role == 'bendahara')
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-money-bill-alt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pemasukan</h4>
                  </div>
                  <div class="card-body">
                  <?php
                  
                    $jumlah_pengeluaran = DB::table('pengeluaran')
                    ->sum('pengeluaran.jumlah');
                    $jumlah_pemasukan = DB::table('pemasukan')
                    ->sum('pemasukan.jumlah');
                    ?>
                  Rp. {{ number_format($jumlah_pemasukan),00 }}
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if(Auth::user()->role == 'bendahara')
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-money-bill"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengeluaran</h4>
                  </div>
                  <div class="card-body">
                  <?php
                    $jumlah_pengeluaran = DB::table('pengeluaran')
                      ->sum('pengeluaran.jumlah');
                    $jumlah_pemasukan = DB::table('pemasukan')
                      ->sum('pemasukan.jumlah');
                  ?>
                  Rp. {{ number_format($jumlah_pengeluaran),00 }}
                  </div>
                </div>
              </div>
            </div>
            @endif
        </div>
        <div class="row mb-4">
          <div class="col-md-6">
              <div class="card card-primary">
                  <div class="card-header">
                      <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
                  </div>
                  @if(Auth::user()->role == 'admin')
                    <div class="card-body">
                        <p>Jika anda ingin segera melakukan entri pembayaran SPP silahkan klik dibawah ini</p>
                        <a href="{{route('pembayaran_spp.create')}}" class="btn btn-primary btn-pill">Entri Pembayaran SPP →</a>
                    </div>
                  @elseif(Auth::user()->role == 'bendahara')
                    <div class="card-body">
                        <p>Jika anda ingin segera melakukan entri pembayaran SPP silahkan klik dibawah ini</p>
                        <a href="{{route('pembayaran_spp.create')}}" class="btn btn-primary btn-pill">Entri Pembayaran SPP →</a>
                    </div>
                  @endif
              </div>
          </div>
        </div>
    </section>
</div>

@endsection