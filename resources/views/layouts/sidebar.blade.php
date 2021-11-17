<div class="main-sidebar">
    <aside id="sidebar-wrapper">
          <br>
          <br>
          <div class="sidebar-brand">
            <a href="index.html"><h6 class="text-dark">Keuangan Ponpes Perkemas</h6></a>
          </div>
          <br>
          <br>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KPP</a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="btn btn-primary" class="menu-header">Selamat Datang {{ Auth::user()->name }}</li>
            <li class="btn btn-primary" class="menu-header">Anda Login Sebagai : {{ Auth::user()->role }}</li> -->
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
              <a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
			      @if(Auth::user()->role == 'admin')
            <li class="menu-header">Kelola Data</li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'user' ? 'active' : '' }}">
              <a class="nav-link" href="/user"><i class="fas fa-users"></i> <span>Pengguna</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'kategori_gaji' ? 'active' : '' }}">
              <a class="nav-link" href="/kategori_gaji"><i class="fas fa-user-tie"></i> <span>Jabatan</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'kelas' ? 'active' : '' }}">
              <a class="nav-link" href="/kelas"><i class="fas fa-columns"></i> <span>Kelas</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'tahun_ajaran' ? 'active' : '' }}">
              <a class="nav-link" href="/tahun_ajaran"><i class="fas fa-calendar-alt"></i> <span>Tahun Ajaran</span></a>
            </li>

            <!--<li class=""><a class="nav-link" href="/pendaftaran/create"><i class="fas fa-user-plus"></i> <span>Pendaftaran</span></a></li>-->
            <!-- <li class=""><a class="nav-link" href="#"><i class="fas fa-user-alt"></i> <span>Pengguna</span></a></li> -->
            <!-- <li class=""><a class="nav-link" href="/donatur"><i class="fas fa-user-tie"></i> <span>Donatur</span></a></li> -->
            
              <li class="nav-item dropdown {{ Request::segment(1) === 'biodata_mudhir' ? 'active' : '' }} {{ Request::segment(1) === 'biodata_siswa' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Biodata</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-item dropdown {{ Request::segment(1) === 'biodata_mudhir' ? 'active' : '' }}">
                    <a class="nav-link" href="/biodata_mudhir">Biodata Karyawan</a>
                  </li>
                  <li class="nav-item dropdown {{ Request::segment(1) === 'biodata_siswa' ? 'active' : '' }}">
                    <a class="nav-link" href="/biodata_siswa">Biodata Siswa</a>
                  </li>
                </ul>
              </li>
              <li class="menu-header">Manajemen Keuangan</li>
              <li class="nav-item dropdown">
                <!-- <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-level-down-alt"></i> <span>Pengeluaran</span></a> -->
                <!-- <ul class="dropdown-menu"> -->
                <li class="nav-item dropdown {{ Request::segment(1) === 'pemasukan' ? 'active' : '' }}">
                  <a class="nav-link" href="/pemasukan"><i class="fas fa-dollar-sign"></i> <span>Pemasukan</span></a>
                </li>
                <li class="nav-item dropdown {{ Request::segment(1) === 'pengeluaran' ? 'active' : '' }}">
                  <a class="nav-link" href="/pengeluaran"><i class="fas fa-dollar-sign"></i> <span>Pengeluaran</span></a>
                </li>
                <!-- <li><a class="nav-link" href="/pengeluaran_harian">Pengeluaran Harian</a></li>
                <li><a class="nav-link" href="/jenis_pengeluaran">Jenis Pengeluaran</a></li> -->
                <!-- </ul> -->
              </li>

            <li class="menu-header">SPP</li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'spp' ? 'active' : '' }}">
              <a class="nav-link" href="/spp"><i class="fas fa-money-bill-wave"></i> <span>SPP</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'pembayaran_spp' ? 'active' : '' }}">
              <a class="nav-link" href="/pembayaran_spp"><i class="fas fa-money-bill-wave"></i> <span>Entri Pembayaran SPP</span></a>
            </li>

            <li class="menu-header">Gaji</li>
            <!-- <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-folder-open"></i> <span>Kategori</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="/kategori_gaji">Kategori Gaji</a></li>
                </ul>
            </li> -->
            <!-- <li class=""><a class="nav-link" href="/gaji"><i class="fas fa-hand-holding-usd"></i> <span>Gaji</span></a></li> -->
            <li class="nav-item dropdown {{ Request::segment(1) === 'pembayaran_gaji' ? 'active' : '' }}">
              <a class="nav-link" href="/pembayaran_gaji"><i class="fas fa-hand-holding-usd"></i> <span>Entri Pembayaran Gaji</span></a>
            </li>

            <!-- <li class="menu-header">Infak</li> -->
            <!-- <li class=""><a class="nav-link" href="/infak"><i class="fas fa-donate"></i> <span>Infak</span></a></li> -->
            <!-- <li class=""><a class="nav-link" href="/pembayaran_infak"><i class="fas fa-donate"></i> <span>Entri Pembayaran Infak</span></a></li> -->

            <li class="menu-header">Cetak Laporan</li>
            <!-- <li class=""><a class="nav-link" href="/infak"><i class="fas fa-donate"></i> <span>Infak</span></a></li> -->
            <li class="nav-item dropdown {{ Request::segment(1) === 'cetak_laporan' ? 'active' : '' }}">
              <a class="nav-link" href="/cetak_laporan/keuangan_ponpes"><i class="fas fa-file-alt"></i> <span>Keuangan Ponpes</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'cetak_laporan_p_spp' ? 'active' : '' }}">
              <a class="nav-link" href="/cetak_laporan_p_spp/pembayaran_spp"><i class="fas fa-file-alt"></i> <span>Pembayaran SPP</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'cetak_laporan_p_gaji' ? 'active' : '' }}">
              <a class="nav-link" href="/cetak_laporan_p_gaji/pembayaran_gaji"><i class="fas fa-file-alt"></i> <span>Pembayaran Gaji</span></a>
            </li>
            @endif

            @if(Auth::user()->role == 'bendahara')
            <li class="menu-header">Kelola Data</li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'kategori_gaji' ? 'active' : '' }}">
              <a class="nav-link" href="/kategori_gaji"><i class="fas fa-user-tie"></i> <span>Jabatan</span></a>
            </li>

            <!--<li class=""><a class="nav-link" href="/pendaftaran/create"><i class="fas fa-user-plus"></i> <span>Pendaftaran</span></a></li>-->
            <!-- <li class=""><a class="nav-link" href="#"><i class="fas fa-user-alt"></i> <span>Pengguna</span></a></li> -->
            <!-- <li class=""><a class="nav-link" href="/donatur"><i class="fas fa-user-tie"></i> <span>Donatur</span></a></li> -->
            <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kelas</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="/kelas">Kelas</a></li> -->
                  <!-- <li><a class="nav-link" href="/kelas_ajaran">Kelas Ajaran</a></li> -->
                  <!-- <li><a class="nav-link" href="/tahun_ajaran">Tahun Ajaran</a></li>
                </ul>
              </li> -->
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Biodata</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="/biodata_mudhir">Biodata Mudhir</a></li>
                  <li><a class="nav-link" href="/biodata_siswa">Biodata Siswa</a></li>
                </ul>
              </li> -->
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-level-down-alt"></i> <span>Pengeluaran</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="#">Pengeluaran</a></li>
                  <li><a class="nav-link" href="/pengeluaran_harian">Pengeluaran Harian</a></li>
                  <li><a class="nav-link" href="/jenis_pengeluaran">Jenis Pengeluaran</a></li>
                </ul>
              </li> -->
              <li class="nav-item dropdown {{ Request::segment(1) === 'biodata_mudhir' ? 'active' : '' }} {{ Request::segment(1) === 'biodata_siswa' ? 'active' : '' }}"">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Biodata</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-item dropdown {{ Request::segment(1) === 'biodata_mudhir' ? 'active' : '' }}">
                    <a class="nav-link" href="/biodata_mudhir">Biodata Karyawan</a>
                  </li>
                  <li class="nav-item dropdown {{ Request::segment(1) === 'biodata_siswa' ? 'active' : '' }}">
                    <a class="nav-link" href="/biodata_siswa">Biodata Siswa</a>
                  </li>
                </ul>
              </li>
              <li class="menu-header">Manajemen Keuangan</li>
              <li class="nav-item dropdown">
                <!-- <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-level-down-alt"></i> <span>Pengeluaran</span></a> -->
                <!-- <ul class="dropdown-menu"> -->
                <li class="nav-item dropdown {{ Request::segment(1) === 'pemasukan' ? 'active' : '' }}">
                  <a class="nav-link" href="/pemasukan"><i class="fas fa-dollar-sign"></i> <span>Pemasukan</span></a>
                </li>
                <li class="nav-item dropdown {{ Request::segment(1) === 'pengeluaran' ? 'active' : '' }}">
                  <a class="nav-link" href="/pengeluaran"><i class="fas fa-dollar-sign"></i> <span>Pengeluaran</span></a>
                </li>
                <!-- <li><a class="nav-link" href="/pengeluaran_harian">Pengeluaran Harian</a></li>
                <li><a class="nav-link" href="/jenis_pengeluaran">Jenis Pengeluaran</a></li> -->
                <!-- </ul> -->
              </li>

            <li class="menu-header">SPP</li>
            <li lass="nav-item dropdown {{ Request::segment(1) === 'spp' ? 'active' : '' }}">
              <a class="nav-link" href="/spp"><i class="fas fa-money-bill-wave"></i> <span>SPP</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'pembayaran_spp' ? 'active' : '' }}">
              <a class="nav-link" href="/pembayaran_spp"><i class="fas fa-money-bill-wave"></i> <span>Entri Pembayaran SPP</span></a>
            </li>

            <li class="menu-header">Gaji</li>
            <!-- <li class=""><a class="nav-link" href="/gaji"><i class="fas fa-hand-holding-usd"></i> <span>Gaji</span></a></li> -->
            <li class="nav-item dropdown {{ Request::segment(1) === 'pembayaran_gaji' ? 'active' : '' }}">
              <a class="nav-link" href="/pembayaran_gaji"><i class="fas fa-hand-holding-usd"></i> <span>Entri Pembayaran Gaji</span></a>
            </li>

            <!-- <li class="menu-header">Infak</li> -->
            <!-- <li class=""><a class="nav-link" href="/infak"><i class="fas fa-donate"></i> <span>Infak</span></a></li> -->
            <!-- <li class=""><a class="nav-link" href="/pembayaran_infak"><i class="fas fa-donate"></i> <span>Entri Pembayaran Infak</span></a></li> -->
            <li class="menu-header">Cetak Laporan</li>
            <!-- <li class=""><a class="nav-link" href="/infak"><i class="fas fa-donate"></i> <span>Infak</span></a></li> -->
            <li class="nav-item dropdown {{ Request::segment(1) === 'cetak_laporan' ? 'active' : '' }}">
              <a class="nav-link" href="/cetak_laporan/keuangan_ponpes"><i class="fas fa-file-alt"></i> <span>Keuangan Ponpes</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'cetak_laporan_p_spp' ? 'active' : '' }}">
              <a class="nav-link" href="/cetak_laporan_p_spp/pembayaran_spp"><i class="fas fa-file-alt"></i> <span>Pembayaran SPP</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'cetak_laporan_p_gaji' ? 'active' : '' }}">
              <a class="nav-link" href="/cetak_laporan_p_gaji/pembayaran_gaji"><i class="fas fa-file-alt"></i> <span>Pembayaran Gaji</span></a>
            </li>
            @endif

            @if(Auth::user()->role == 'siswa')
            <li class="menu-header">Siswa</li>
              <li class="nav-item dropdown {{ Request::segment(1) === 'biodata_siswa' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Biodata</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-item dropdown {{ Request::segment(1) === 'biodata_siswa' ? 'active' : '' }}">
                    <a class="nav-link" href="/biodata_siswa/detail">Biodata Siswa</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown {{ Request::segment(1) === 'pembayaran_spp_siswa' ? 'active' : '' }}">
                <a class="nav-link" href="/pembayaran_spp_siswa"><i class="fas fa-money-bill-wave"></i> <span>History SPP</span></a>
              </li>
            @endif
            <!-- <li class="nav-item">
              <a class="nav-link" href="{{route('logout')}}"
              onclick="
              event.preventDefault();
              document.getElementById('formLogout').submit();"
              > 
              <span>Infak</span></a></li>
              <form id="formLogout" action="{{ route('logout')}}" method="POST">@csrf</form> -->
             
          </ul>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="{{ route('logout') }}" class="btn btn-primary btn-lg btn-block btn-icon-split"
              onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                {{csrf_field()}}
              </form>
          </div>
    </aside>
</div>