<?php

use App\Http\Controllers\BiodataMudhirController;
use App\Http\Controllers\BiodataSiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InfakController;
use App\Http\Controllers\JenisPengeluaranController;
use App\Http\Controllers\KategoriGajiController;
use App\Http\Controllers\KategoriKelasController;
use App\Http\Controllers\KelasAjaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PembayaranGajiController;
use App\Http\Controllers\PembayaranInfakController;
use App\Http\Controllers\PembayaranSppController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengeluaraHariannController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PengeluaranHarianController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\TahunAjaranController;
use App\Models\Donatur;
use App\Models\KategoriKelas;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return view('auth/login');
 });

Auth::routes();

// Route::view('/','pages.auth.login');
Route::get('/Auth.Login', [App\Http\Controllers\Auth\LoginController::class, '/']);

Route::middleware(['auth'])->group(function () {
 
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });
 
    Route::middleware(['bendahara'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });
    
    Route::middleware(['siswa'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        
        //Pembayaran SPP
        // Route::get('/pembayaran_spp/create', [PembayaranSppController::class, 'create'])->name('pembayaran_spp.create');
        // Route::post('/pembayaran_spp', [PembayaranSppController::class, 'store'])->name('pembayaran_spp.store');
        // Route::get('/pembayaran_spp/edit/{id_pembayaran_spp}', [PembayaranSppController::class, 'edit'])->name('pembayaran_spp.edit');
        // Route::put('/pembayaran_spp/update/{id_pembayaran_spp}', [PembayaranSppController::class, 'update'])->name('pembayaran_spp.update');
        // Route::get('/pembayaran_spp/destroy/{id_pembayaran_spp}', [PembayaranSppController::class, 'destroy'])->name('pembayaran_spp.destroy');
    });
    
    
    
});

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Data Pembayaran SPP Siswa
Route::get('/pembayaran_spp_siswa',[App\Http\Controllers\Siswa\PembayaranSppController::class, 'index']);
Route::get('/pembayaran_spp_siswa/show/{id_pembayaran_spp}',[App\Http\Controllers\Siswa\PembayaranSppController::class, 'show'])->name('pembayaran_spp_siswa.show');

//Biodata Mudhir
Route::get('/biodata_mudhir', [BiodataMudhirController::class, 'index']);
Route::get('/biodata_mudhir/create', [BiodataMudhirController::class, 'create'])->name('biodata_mudhir.create');
Route::post('/biodata_mudhir', [BiodataMudhirController::class, 'store'])->name('biodata_mudhir.store');
Route::get('/biodata_mudhir/show/{id_mudhir}', [BiodataMudhirController::class, 'show'])->name('biodata_mudhir.show');
Route::get('/biodata_mudhir/edit/{id_mudhir}', [BiodataMudhirController::class, 'edit'])->name('biodata_mudhir.edit');
Route::put('/biodata_mudhir/update/{id_mudhir}', [BiodataMudhirController::class, 'update'])->name('biodata_mudhir.update');
Route::get('/biodata_mudhir/destroy/{id_mudhir}', [BiodataMudhirController::class, 'destroy'])->name('biodata_mudhir.destroy');

//Biodata Siswa
Route::get('/biodata_siswa', [BiodataSiswaController::class, 'index']);
Route::get('/biodata_siswa/show/{id_biodata_siswa}', [BiodataSiswaController::class, 'show'])->name('biodata_siswa.show');
Route::get('/biodata_siswa/detail', [BiodataSiswaController::class, 'detail'])->name('biodata_siswa.detail');
Route::get('/biodata_siswa/edit/{id_biodata_siswa}', [BiodataSiswaController::class, 'edit'])->name('biodata_siswa.edit');
Route::put('/biodata_siswa/update/{id_biodata_siswa}', [BiodataSiswaController::class, 'update'])->name('biodata_siswa.update');
Route::get('/biodata_siswa/destroy/{id_biodata_siswa}', [BiodataSiswaController::class, 'destroy'])->name('biodata_siswa.destroy');

//Donatur
Route::get('/donatur', [DonaturController::class, 'index']);
Route::get('/donatur/create', [DonaturController::class, 'create'])->name('donatur.create');
Route::post('/donatur', [DonaturController::class, 'store'])->name('donatur.store');
Route::get('/donatur/edit/{id_donatur}', [DonaturController::class, 'edit'])->name('donatur.edit');
Route::put('/donatur/update/{id_donatur}', [DonaturController::class, 'update'])->name('donatur.update');
Route::get('/donatur/destroy/{id_donatur}', [DonaturController::class, 'destroy'])->name('donatur.destroy');

//Kelas Ajaran
Route::get('/kelas_ajaran', [KelasAjaranController::class, 'index']);
Route::get('/kelas_ajaran/create', [KelasAjaranController::class, 'create'])->name('kelas_ajaran.create');
Route::post('/kelas_ajaran', [KelasAjaranController::class, 'store'])->name('kelas_ajaran.store');
Route::get('/kelas_ajaran/edit/{id_kelas_ajaran}', [KelasAjaranController::class, 'edit'])->name('kelas_ajaran.edit');
Route::put('/kelas_ajaran/update/{id_kelas_ajaran}', [KelasAjaranController::class, 'update'])->name('kelas_ajaran.update');
Route::get('/kelas_ajaran/destroy/{id_kelas_ajaran}', [KelasAjaranController::class, 'destroy'])->name('kelas_ajaran.destroy');

//Kelas
Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
Route::get('/kelas/edit/{id_kelas}', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/kelas/update/{id_kelas}', [KelasController::class, 'update'])->name('kelas.update');
Route::get('/kelas/destroy/{id_kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');

//Tahun Ajaran
Route::get('/tahun_ajaran', [TahunAjaranController::class, 'index']);
Route::get('/tahun_ajaran/create', [TahunAjaranController::class, 'create'])->name('tahun_ajaran.create');
Route::post('/tahun_ajaran', [TahunAjaranController::class, 'store'])->name('tahun_ajaran.store');
Route::get('/tahun_ajaran/edit/{id_tahun_ajaran}', [TahunAjaranController::class, 'edit'])->name('tahun_ajaran.edit');
Route::put('/tahun_ajaran/update/{id_tahun_ajaran}', [TahunAjaranController::class, 'update'])->name('tahun_ajaran.update');
Route::get('/tahun_ajaran/destroy/{id_tahun_ajaran}', [TahunAjaranController::class, 'destroy'])->name('tahun_ajaran.destroy');
Route::get('/tahun_ajaran/apply/{id_tahun_ajaran}', [TahunAjaranController::class, 'apply'])->name('tahun_ajaran.apply');

//Kategori Gaji
Route::get('/kategori_gaji', [KategoriGajiController::class, 'index']);
Route::get('/kategori_gaji/create', [KategoriGajiController::class, 'create'])->name('kategori_gaji.create');
Route::post('/kategori_gaji', [KategoriGajiController::class, 'store'])->name('kategori_gaji.store');
Route::get('/kategori_gaji/edit/{id_kategori_gaji}', [KategoriGajiController::class, 'edit'])->name('kategori_gaji.edit');
Route::put('/kategori_gaji/update/{id_kategori_gaji}', [KategoriGajiController::class, 'update'])->name('kategori_gaji.update');
Route::get('/kategori_gaji/destroy/{id_kategori_gaji}', [KategoriGajiController::class, 'destroy'])->name('kategori_gaji.destroy');

//Master Admin
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id_user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id_user}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/destroy/{id_user}', [UserController::class, 'destroy'])->name('user.destroy');

//Pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

//Infak
Route::get('/infak', [InfakController::class, 'index']);
Route::get('/infak/create', [InfakController::class, 'create'])->name('infak.create');
Route::post('/infak', [InfakController::class, 'store'])->name('infak.store');
Route::get('/infak/edit/{id_infak}', [InfakController::class, 'edit'])->name('infak.edit');
Route::put('/infak/update/{id_infak}', [InfakController::class, 'update'])->name('infak.update');
Route::get('/infak/destroy/{id_infak}', [InfakController::class, 'destroy'])->name('infak.destroy');

//Pembayaran Infak
Route::get('/pembayaran_infak', [PembayaranInfakController::class, 'index']);
Route::get('/pembayaran_infak/create', [PembayaranInfakController::class, 'create'])->name('pembayaran_infak.create');
Route::post('/pembayaran_infak', [PembayaranInfakController::class, 'store'])->name('pembayaran_infak.store');
Route::get('/pembayaran_infak/edit/{id_pembayaran_infak}', [PembayaranInfakController::class, 'edit'])->name('pembayaran_infak.edit');
Route::put('/pembayaran_infak/update/{id_pembayaran_infak}', [PembayaranInfakController::class, 'update'])->name('pembayaran_infak.update');
Route::get('/pembayaran_infak/destroy/{id_pembayaran_infak}', [PembayaranInfakController::class, 'destroy'])->name('pembayaran_infak.destroy');

//Pembayaran SPP
Route::get('/pembayaran_spp', [PembayaranSppController::class, 'index']);
Route::get('/pembayaran_spp/show/{id_pembayaran_spp}', [PembayaranSppController::class, 'show'])->name('pembayaran_spp.show');
Route::get('/pembayaran_spp/create', [PembayaranSppController::class, 'create'])->name('pembayaran_spp.create');
Route::post('/pembayaran_spp', [PembayaranSppController::class, 'store'])->name('pembayaran_spp.store');
Route::get('/pembayaran_spp/edit/{id_pembayaran_spp}', [PembayaranSppController::class, 'edit'])->name('pembayaran_spp.edit');
Route::put('/pembayaran_spp/update/{id_pembayaran_spp}', [PembayaranSppController::class, 'update'])->name('pembayaran_spp.update');
Route::get('/pembayaran_spp/destroy/{id_pembayaran_spp}', [PembayaranSppController::class, 'destroy'])->name('pembayaran_spp.destroy');

//Pembayaran Gaji
Route::get('/pembayaran_gaji', [PembayaranGajiController::class, 'index']);
Route::get('/pembayaran_gaji/create', [PembayaranGajiController::class, 'create'])->name('pembayaran_gaji.create');
Route::post('/pembayaran_gaji', [PembayaranGajiController::class, 'store'])->name('pembayaran_gaji.store');
Route::get('/pembayaran_gaji/edit/{id_pembayaran_gaji}', [PembayaranGajiController::class, 'edit'])->name('pembayaran_gaji.edit');
Route::put('/pembayaran_gaji/update/{id_pembayaran_gaji}', [PembayaranGajiController::class, 'update'])->name('pembayaran_gaji.update');
Route::get('/pembayaran_gaji/destroy/{id_pembayaran_gaji}', [PembayaranGajiController::class, 'destroy'])->name('pembayaran_gaji.destroy');

//Pemasukan
Route::get('/pemasukan', [PemasukanController::class, 'index']);
Route::post('/pemasukan/tambah', [PemasukanController::class, 'tambah'])->name('pemasukan.tambah');
Route::get('/pemasukan/{id_pemasukan}/edit', [PemasukanController::class, 'edit'])->name('pemasukan.edit');
Route::put('/pemasukan/{id_pemasukan}/update', [PemasukanController::class, 'update'])->name('pemasukan.update');
Route::get('/pemasukan/{id_pemasukan}/destroy', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');

Route::post('/pemasukan/tambahkategori', [PemasukanController::class, 'tambahkategori'])->name('pemasukan.tambahkategori');
Route::get('/pemasukan/create', [PemasukanController::class, 'create'])->name('pemasukan.create');
Route::get('/pemasukan/{id_kategori}/deletekategori', [PemasukanController::class, 'deletekategori'])->name('pemasukan.deletekategori');

//Pengeluaran
Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
Route::post('/pengeluaran/tambah', [PengeluaranController::class, 'tambah'])->name('pengeluaran.tambah');
Route::get('/pengeluaran/{id_pengeluaran}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::put('/pengeluaran/{id_pengeluaran}/update', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
Route::get('/pengeluaran/{id_pengeluaran}/destroy', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');

Route::post('/pengeluaran/tambahkategori', [PengeluaranController::class, 'tambahkategori'])->name('pengeluaran.tambahkategori');
Route::get('/pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
Route::get('/pengeluaran/{id_kategori}/deletekategori', [PengeluaranController::class, 'deletekategori'])->name('pengeluaran.deletekategori');

//Pengeluaran Harian
Route::get('/pengeluaran_harian', [PengeluaranHarianController::class, 'index']);
Route::get('/pengeluaran_harian/create', [PengeluaranHarianController::class, 'create'])->name('pengeluaran_harian.create');
Route::post('/pengeluaran_harian', [PengeluaranHarianController::class, 'store'])->name('pengeluaran_harian.store');
Route::get('/pengeluaran_harian/edit/{id_pengeluaran_harian}', [PengeluaranHarianController::class, 'edit'])->name('pengeluaran_harian.edit');
Route::put('/pengeluaran_harian/update/{id_pengeluaran_harian}', [PengeluaranHarianController::class, 'update'])->name('pengeluaran_harian.update');
Route::get('/pengeluaran_harian/destroy/{id_pengeluaran_harian}', [PengeluaranHarianController::class, 'destroy'])->name('pengeluaran_harian.destroy');

//Jenis Pengeluaran
Route::get('/jenis_pengeluaran', [JenisPengeluaranController::class, 'index']);
Route::get('/jenis_pengeluaran/create', [JenisPengeluaranController::class, 'create'])->name('jenis_pengeluaran.create');
Route::post('/jenis_pengeluaran', [JenisPengeluaranController::class, 'store'])->name('jenis_pengeluaran.store');
Route::get('/jenis_pengeluaran/edit/{id_jenis_pengeluaran}', [JenisPengeluaranController::class, 'edit'])->name('jenis_pengeluaran.edit');
Route::put('/jenis_pengeluaran/update/{id_jenis_pengeluaran}', [JenisPengeluaranController::class, 'update'])->name('jenis_pengeluaran.update');
Route::get('/jenis_pengeluaran/destroy/{id_jenis_pengeluaran}', [JenisPengeluaranController::class, 'destroy'])->name('jenis_pengeluaran.destroy');

//SPP
Route::get('/spp', [SppController::class, 'index']);
Route::get('/spp/create', [SppController::class, 'create'])->name('spp.create');
Route::post('/spp', [SppController::class, 'store'])->name('spp.store');
Route::get('/spp/edit/{id_spp}', [SppController::class, 'edit'])->name('spp.edit');
Route::put('/spp/update/{id_spp}', [SppController::class, 'update'])->name('spp.update');
Route::get('/spp/destroy/{id_spp}', [SppController::class, 'destroy'])->name('spp.destroy');

//Gaji
Route::get('/gaji', [GajiController::class, 'index']);
Route::get('/gaji/create', [GajiController::class, 'create'])->name('gaji.create');
Route::post('/gaji', [GajiController::class, 'store'])->name('gaji.store');
Route::get('/gaji/edit/{id_gaji}', [GajiController::class, 'edit'])->name('gaji.edit');
Route::put('/gaji/update/{id_gaji}', [GajiController::class, 'update'])->name('gaji.update');
Route::get('/gaji/destroy/{id_gaji}', [GajiController::class, 'destroy'])->name('gaji.destroy');

//Laporan Keuangan
Route::get('/cetak_laporan/keuangan_ponpes', [LaporanController::class, 'tKeuanganPonpesIndex'])->name('cetak_laporan.keuangan_ponpes.index');
Route::post('/cetak_laporan/keuangan_ponpes/filterByKategori', [LaporanController::class, 'tKeuanganPonpesfilterByKategori'])->name('cetak_laporan.keuangan_ponpes.filterByKategori');
Route::post('/cetak_laporan/keuangan_ponpes/filterByTanggal', [LaporanController::class, 'tKeuanganPonpesfilterByTanggal'])->name('cetak_laporan.keuangan_ponpes.filterByTanggal');
Route::get('/cetak_laporan/keuangan_ponpes/DownloadExcel', [LaporanController::class, 'tKeuanganPonpesDownloadExcel'])->name('cetak_laporan.keuangan_ponpes.DownloadExcel');
Route::post('/cetak_laporan/keuangan_ponpes/cetak', [LaporanController::class, 'tKeuanganPonpesCetak'])->name('cetak_laporan.keuangan_ponpes.cetak');

//Laporan Pembayaran Gaji
Route::get('/cetak_laporan_p_gaji/pembayaran_gaji', [LaporanController::class, 'tPembayaranGajiIndex'])->name('cetak_laporan_p_gaji.pembayaran_gaji.index');
Route::post('/cetak_laporan_p_gaji/pembayaran_gaji/filterByKategori', [LaporanController::class, 'tPembayaranGajifilterByKategori'])->name('cetak_laporan_p_gaji.pembayaran_gaji.filterByKategori');
Route::post('/cetak_laporan_p_gaji/pembayaran_gaji/filterByTanggal', [LaporanController::class, 'tPembayaranGajifilterByTanggal'])->name('cetak_laporan_p_gaji.pembayaran_gaji.filterByTanggal');
Route::get('/cetak_laporan_p_gaji/pembayaran_gaji/DownloadExcel', [LaporanController::class, 'tPembayaranGajiDownloadExcel'])->name('cetak_laporan_p_gaji.pembayaran_gaji.DownloadExcel');
Route::post('/cetak_laporan_p_gaji/pembayaran_gaji/cetak', [LaporanController::class, 'tPembayaranGajiCetak'])->name('cetak_laporan_p_gaji.pembayaran_gaji.cetak');

//Laporan Pembayaran SPP
Route::get('/cetak_laporan_p_spp/pembayaran_spp', [LaporanController::class, 'tPembayaranSPPIndex'])->name('cetak_laporan_p_spp.pembayaran_spp.index');
Route::post('/cetak_laporan_p_spp/pembayaran_spp/filterByKategori', [LaporanController::class, 'tPembayaranSPPfilterByKategori'])->name('cetak_laporan_p_spp.pembayaran_spp.filterByKategori');
Route::post('/cetak_laporan_p_spp/pembayaran_spp/filterByTanggal', [LaporanController::class, 'tPembayaranSPPfilterByTanggal'])->name('cetak_laporan_p_spp.pembayaran_spp.filterByTanggal');
Route::get('/cetak_laporan_p_spp/pembayaran_spp/DownloadExcel', [LaporanController::class, 'tPembayaranSPPDownloadExcel'])->name('cetak_laporan_p_spp.pembayaran_spp.DownloadExcel');
Route::post('/cetak_laporan_p_spp/pembayaran_spp/cetak', [LaporanController::class, 'tPembayaranSPPCetak'])->name('cetak_laporan_p_spp.pembayaran_spp.cetak');
