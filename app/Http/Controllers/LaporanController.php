<?php

namespace App\Http\Controllers;

use App\Models\BiodataMudhir;
use App\Models\BiodataSiswa;
use App\Models\Kategori;
use App\Models\KategoriGaji;
use App\Models\Kelas;
use App\Models\Pemasukan;
use App\Models\PembayaranGaji;
use App\Models\PembayaranSpp;
use App\Models\Pengeluaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    //-----------------------------------------------------------------------------Keuangan Ponpes-------------------------------------------------------//
    public function tKeuanganPonpesIndex()
    {
        $daftar_kategori = Kategori::orderByRaw('nama_kategori ASC')->get();

        // $data_id_kategori = Kategori::all();
        $data_id_kategori = null;
        $tgl_1 = Pemasukan::first();
        $tgl_awal = null;
        $tgl_akhir = null;


        $data_pemasukan = Pemasukan::orderByRaw('created_at DESC')->get();
        $total_pemasukan = Pemasukan::all()->sum('jumlah');

        $data_pengeluaran = Pengeluaran::orderByRaw('created_at DESC')->get();
        $total_pengeluaran = Pengeluaran::all()->sum('jumlah');

        // return $data_id_kategori;
        return view('/cetak_laporan.keuangan_ponpes.index', compact('daftar_kategori', 'data_id_kategori', 'tgl_awal', 'tgl_akhir', 'data_pemasukan', 'total_pemasukan', 'data_pengeluaran', 'total_pengeluaran'));
    }
    
    public function tKeuanganPonpesfilterByKategori(Request $request)
    {
        $id_kategori = $request->input('filterKategori');
		
        $data_id_kategori = Kategori::select('id_kategori')->where('id_kategori', $id_kategori)->get();
        $tgl_1 = Pemasukan::first();
        $tgl_awal = null;
        $tgl_akhir = null;


        $daftar_kategori = Kategori::orderByRaw('nama_kategori ASC')->get();

        $data_pemasukan = Pemasukan::where('id_kategori', $id_kategori)->orderByRaw('created_at DESC')->get();
        $total_pemasukan = Pemasukan::where('id_kategori', $id_kategori)->sum('jumlah');

        $data_pengeluaran = Pengeluaran::where('id_kategori', $id_kategori)->orderByRaw('created_at DESC')->get();
        $total_pengeluaran = Pengeluaran::where('id_kategori', $id_kategori)->sum('jumlah');

        return view('/cetak_laporan.keuangan_ponpes.index', compact('daftar_kategori', 'data_id_kategori', 'tgl_awal', 'tgl_akhir', 'data_pemasukan', 'total_pemasukan', 'data_pengeluaran', 'total_pengeluaran'));
    }

    public function tKeuanganPonpesfilterByTanggal(Request $request)
    {
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $data_id_kategori = null;

        $daftar_kategori = Kategori::orderByRaw('nama_kategori ASC')->get();

        $data_pemasukan = Pemasukan::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->orderByRaw('created_at DESC')->get();
        $total_pemasukan = Pemasukan::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->sum('jumlah');

        $data_pengeluaran = Pengeluaran::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->orderByRaw('created_at DESC')->get();
        $total_pengeluaran = Pengeluaran::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->sum('jumlah');

        return view('/cetak_laporan.keuangan_ponpes.index', compact('daftar_kategori', 'data_id_kategori', 'tgl_awal', 'tgl_akhir', 'data_pemasukan', 'total_pemasukan', 'data_pengeluaran', 'total_pengeluaran'));
    }

    public function tKeuanganPonpesCetak(Request $request)
    {
        
        $data_id_kategori = $request->id_kategori;
       
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');

        if ($data_id_kategori == null && $tgl_awal != null) {
            $data_pemasukan = Pemasukan::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->get();
            $total_pemasukan = Pemasukan::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->sum('jumlah');
    
            $data_pengeluaran = Pengeluaran::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->get();
            $total_pengeluaran = Pengeluaran::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->sum('jumlah');
        }
        elseif($data_id_kategori != null && $tgl_awal == null){
            $data_pemasukan = Pemasukan::where('id_kategori', $data_id_kategori)->get();
            $total_pemasukan = Pemasukan::where('id_kategori', $data_id_kategori)->sum('jumlah');
            		
            $data_pengeluaran = Pengeluaran::where('id_kategori', $data_id_kategori)->get();
            $total_pengeluaran = Pengeluaran::where('id_kategori', $data_id_kategori)->sum('jumlah');
        }
        elseif($data_id_kategori == null && $tgl_awal == null){
            $data_pemasukan = Pemasukan::all();
            $total_pemasukan = Pemasukan::all()->sum('jumlah');
    
            $data_pengeluaran = Pengeluaran::all();
            $total_pengeluaran = Pengeluaran::all()->sum('jumlah');
        }elseif($data_id_kategori != null && $tgl_awal!= null){
            $data_pemasukan = Pemasukan::where('id_kategori', $data_id_kategori)->whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->get();
            $total_pemasukan = Pemasukan::where('id_kategori', $data_id_kategori)->whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->sum('jumlah');
    
            $data_pengeluaran = Pengeluaran::where('id_kategori', $data_id_kategori)->whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->get();
            $total_pengeluaran = Pengeluaran::where('id_kategori', $data_id_kategori)->whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->sum('jumlah');
        }
        
        // return $request;
        return view('/cetak_laporan.keuangan_ponpes.cetak', compact( 'tgl_awal', 'tgl_akhir', 'data_pemasukan', 'total_pemasukan', 'data_pengeluaran', 'total_pengeluaran'));
    }

    public function tKeuanganPonpesDownloadExcel()
    {
        $namafile = 'Laporan_keuangan_sekolah_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new KeuanganSekolahExport, $namafile);
    }


    //----------------------------------------------------------------------Pembayaran Gaji----------------------------------------------------//
    public function tPembayaranGajiIndex()
    {
        $daftar_kategori_gaji = KategoriGaji::orderByRaw('kategori_gaji ASC')->get();

        $biodatamudhir = BiodataMudhir::all();
        $data_id_kategori_gaji = null;
        $tgl_1 = PembayaranGaji::first();
        $tgl_awal = null;
        $tgl_akhir = null;


        $data_pembayaran_gaji = PembayaranGaji::orderByRaw('created_at DESC')->get();
        $total_pembayaran_gaji = PembayaranGaji::all()->sum('jumlah');

        return view('/cetak_laporan_p_gaji.pembayaran_gaji.index', compact('daftar_kategori_gaji', 'data_id_kategori_gaji', 'tgl_awal', 'tgl_akhir', 'data_pembayaran_gaji','biodatamudhir'));
    }

    public function tPembayaranGajifilterByKategori(Request $request)
    {
        $id_kategori_gaji = $request->input('filterkategori_gaji');

        $data_id_kategori_gaji = KategoriGaji::select('id_kategori_gaji')->where('id_kategori_gaji', $id_kategori_gaji)->get();
        $tgl_1 = PembayaranGaji::first();
        $tgl_awal = null;
        $tgl_akhir = null;


        $daftar_kategori_gaji = KategoriGaji::orderByRaw('kategori_gaji ASC')->get();

        $data_pembayaran_gaji = PembayaranGaji::where('id_kategori_gaji', $id_kategori_gaji)->orderByRaw('created_at DESC')->get();
        $total_pembayaran_gaji = PembayaranGaji::where('id_kategori_gaji', $id_kategori_gaji);

        return view('/cetak_laporan_p_gaji.pembayaran_gaji.index', compact('daftar_kategori_gaji', 'data_id_kategori_gaji', 'tgl_awal', 'tgl_akhir', 'data_pembayaran_gaji', 'total_pembayaran_gaji', ));
    }

    public function tPembayaranGajifilterByTanggal(Request $request)
    {
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $data_id_kategori_gaji = null;

        $daftar_kategori_gaji = KategoriGaji::orderByRaw('kategori_gaji ASC')->get();

        $data_pembayaran_gaji = PembayaranGaji::whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir])->orderByRaw('created_at DESC')->get();
        $total_pembayaran_gaji = PembayaranGaji::whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir]);

        return view('/cetak_laporan_p_gaji.pembayaran_gaji.index', compact('daftar_kategori_gaji', 'data_id_kategori_gaji', 'tgl_awal', 'tgl_akhir', 'data_pembayaran_gaji', 'total_pembayaran_gaji'));
    }

    public function tPembayaranGajiCetak(Request $request)
    {
        $pembayarangaji = PembayaranGaji::all();
        $data_id_kategori_gaji = $request->input('id_kategori_gaji');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');

    
        // if(!isset($request->id_kategori_gaji)) {
        //     $data_pembayaran_gaji = PembayaranGaji::whereBetween('created_at', [$tgl_awal, $tgl_akhir])->get();
        //     $total_pembayaran_gaji = PembayaranGaji::whereBetween('created_at', [$tgl_awal, $tgl_akhir]);
        // }
        // if($request->id_kategori_gaji) {
            // $data_pembayaran_gaji = PembayaranGaji::where('id_kategori_gaji', $data_id_kategori_gaji)->whereBetween('created_at', [$tgl_awal, $tgl_akhir])->get();
            // $total_pembayaran_gaji = PembayaranGaji::where('id_kategori_gaji', $data_id_kategori_gaji)->whereBetween('created_at', [$tgl_awal, $tgl_akhir]);
        // }
        
        if ($data_id_kategori_gaji == null && $tgl_awal != null && $tgl_akhir != null) {
            $data_pembayaran_gaji = PembayaranGaji::whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir])->get();
            $total_pembayaran_gaji = PembayaranGaji::whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir]);
            
        }
        elseif($data_id_kategori_gaji != null && $tgl_awal == null && $tgl_akhir == null){
            $data_pembayaran_gaji = PembayaranGaji::where('id_kategori_gaji', $data_id_kategori_gaji)->get();
            $total_pembayaran_gaji = PembayaranGaji::where('id_kategori_gaji', $data_id_kategori_gaji);
        }
        elseif($data_id_kategori_gaji != null && $tgl_awal != null && $tgl_akhir != null){
            $data_pembayaran_gaji = PembayaranGaji::where('id_kategori_gaji', $data_id_kategori_gaji)->whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir])->get();
            $total_pembayaran_gaji = PembayaranGaji::where('id_kategori_gaji', $data_id_kategori_gaji)->whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir]);
        } else {
            $data_pembayaran_gaji = PembayaranGaji::all();
            $total_pembayaran_gaji = PembayaranGaji::all();
        }
       
        // return $request;
        return view('/cetak_laporan_p_gaji.pembayaran_gaji.cetak', compact( 'pembayarangaji','tgl_awal', 'tgl_akhir', 'data_pembayaran_gaji', 'total_pembayaran_gaji'));

    }
    

    //-----------------------------------------------------------------Pembayaran SPP------------------------------------------------//
    public function tPembayaranSPPIndex()
    {
        $daftar_kategori_kelas = Kelas::orderByRaw('kelas ASC')->get();

        $biodatasiswa = BiodataSiswa::all();
        $data_id_kategori_kelas = null;
        $tgl_1 = PembayaranSpp::first();
        $tgl_awal = null;
        $tgl_akhir = null;


        $data_pembayaran_spp = PembayaranSpp::orderByRaw('created_at DESC')->get();
        $total_pembayaran_spp = PembayaranSpp::all()->sum('jumlah');

        return view('/cetak_laporan_p_spp.pembayaran_spp.index', compact('daftar_kategori_kelas', 'data_id_kategori_kelas', 'tgl_awal', 'tgl_akhir', 'data_pembayaran_spp','biodatasiswa'));
    }

    public function tPembayaranSPPfilterByKategori(Request $request)
    {
        $id_kategori_kelas = $request->input('filterkategori_kelas');
        $data_id_kategori_kelas = Kelas::select('id_kelas')->where('id_kelas', $id_kategori_kelas)->get();
        $tgl_1 = PembayaranSpp::first();
        $tgl_awal = null;
        $tgl_akhir = null;


        $daftar_kategori_kelas = Kelas::orderByRaw('kelas ASC')->get();

        $data_pembayaran_spp = PembayaranSpp::where('id_kelas', $id_kategori_kelas)->orderByRaw('created_at DESC')->get();
        $total_pembayaran_spp = PembayaranSpp::where('id_kelas', $id_kategori_kelas);

        return view('/cetak_laporan_p_spp.pembayaran_spp.index', compact('daftar_kategori_kelas', 'data_id_kategori_kelas', 'tgl_awal', 'tgl_akhir', 'data_pembayaran_spp', 'total_pembayaran_spp', ));
    }

    public function tPembayaranSPPfilterByTanggal(Request $request)
    {
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $data_id_kategori_kelas = null;

        $daftar_kategori_kelas = Kelas::orderByRaw('kelas ASC')->get();

        $data_pembayaran_spp = PembayaranSpp::whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir])->orderByRaw('tanggal_pembayaran DESC')->get();
        $total_pembayaran_spp = PembayaranSpp::whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir]);

        return view('/cetak_laporan_p_spp.pembayaran_spp.index', compact('daftar_kategori_kelas', 'data_id_kategori_kelas', 'tgl_awal', 'tgl_akhir', 'data_pembayaran_spp', 'total_pembayaran_spp'));
    }

    public function tPembayaranSPPCetak(Request $request)
    {
        $pembayaranspp = PembayaranSpp::all();
        $data_id_kategori_kelas = $request->id_kelas;
       
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
		
        $data_pembayaran_spp = PembayaranSpp::where('id_kelas', $data_id_kategori_kelas)->whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir])->get();
        $total_pembayaran_spp = PembayaranSpp::where('id_kelas', $data_id_kategori_kelas)->whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir]);


        if ($data_id_kategori_kelas == null && $tgl_awal != null && $tgl_akhir != null) {
            $data_pembayaran_spp = PembayaranSpp::whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir])->get();
            $total_pembayaran_spp = PembayaranSpp::whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir]);
        }
        elseif($data_id_kategori_kelas != null && $tgl_awal == null && $tgl_akhir == null){
            $data_pembayaran_spp = PembayaranSpp::where('id_kelas', $data_id_kategori_kelas)->get();
            $total_pembayaran_spp = PembayaranSpp::where('id_kelas', $data_id_kategori_kelas);
            
        }
        elseif($data_id_kategori_kelas != null && $tgl_awal != null && $tgl_akhir != null){
            $data_pembayaran_spp = PembayaranSpp::where('id_kelas', $data_id_kategori_kelas)->whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir])->get();
            $total_pembayaran_spp = PembayaranSpp::where('id_kelas', $data_id_kategori_kelas)->whereBetween('tanggal_pembayaran', [$tgl_awal, $tgl_akhir]);
        } else {
            $data_pembayaran_spp = PembayaranSpp::all();
            $total_pembayaran_spp = PembayaranSpp::all();
        }
		
        return view('/cetak_laporan_p_spp.pembayaran_spp.cetak', compact( 'pembayaranspp','tgl_awal', 'tgl_akhir', 'data_pembayaran_spp', 'total_pembayaran_spp'));

    }
}
