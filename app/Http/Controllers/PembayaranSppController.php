<?php

namespace App\Http\Controllers;

use App\Models\BiodataSiswa;
use App\Models\Kelas;
use App\Models\PembayaranSpp;
use App\Models\Spp;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranSppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaranspp = PembayaranSpp::all();
        return view('pembayaran_spp.index', compact('pembayaranspp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tahunajaran = TahunAjaran::all();
        $tahunajaran = DB::table('tahun_ajaran')->where('status','A')->get();
        $spp = Spp::all();
        $biodatasiswa = BiodataSiswa::all();
        $kelas = DB::table('biodata_siswa')
            ->select('biodata_siswa.id_kelas','kelas', 'id_biodata_siswa')
            ->join('kelas', 'biodata_siswa.id_kelas', '=', 'kelas.id_kelas')
            ->get();
        return view('pembayaran_spp.create',compact('biodatasiswa','spp','tahunajaran','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pembayaranspp = new PembayaranSpp();
        $pembayaranspp->id_pembayaran_spp = $request->input('id_pembayaran_spp');
        $pembayaranspp->id_biodata_siswa = $request->input('id_biodata_siswa');
        $pembayaranspp->id_kelas = $request->input('id_kelas');
        $pembayaranspp->id_spp = $request->input('id_spp');
        $pembayaranspp->id_tahun_ajaran = $request->input('id_tahun_ajaran');
        $pembayaranspp->tanggal_pembayaran = $request->input('tanggal_pembayaran');
        $pembayaranspp->bulan = $request->input('bulan');
        $pembayaranspp->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/pembayaran_spp');
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembayaranSpp  $pembayaranSpp
     * @return \Illuminate\Http\Response
     */
    public function show($id_pembayaran_spp)
    {
        
        $pembayaranspp = PembayaranSpp::find($id_pembayaran_spp);
        return view('pembayaran_spp.show', compact('pembayaranspp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembayaranSpp  $pembayaranSpp
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranSpp $request, $id_pembayaran_spp)
    {
        $tahunajaran = TahunAjaran::all();
        $kelas = Kelas::all();
        $spp = Spp::all();
        $biodatasiswa = BiodataSiswa::all();
        $pembayaranspp = PembayaranSpp::where('id_pembayaran_spp',$id_pembayaran_spp)->first();
    
        return view('pembayaran_spp.edit', compact('pembayaranspp','biodatasiswa','spp','tahunajaran','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembayaranSpp  $pembayaranSpp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pembayaran_spp)
    {
        $pembayaranspp = PembayaranSpp::find($id_pembayaran_spp);
        $pembayaranspp->id_biodata_siswa = $request->input('id_biodata_siswa');
        $pembayaranspp->id_spp = $request->input('id_spp');
        $pembayaranspp->id_tahun_ajaran = $request->input('id_tahun_ajaran');
        $pembayaranspp->tanggal_pembayaran = $request->input('tanggal_pembayaran');
        $pembayaranspp->bulan = $request->input('bulan');
        $pembayaranspp->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/pembayaran_spp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembayaranSpp  $pembayaranSpp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pembayaran_spp)
    {
        $pembayaranspp = PembayaranSpp::find($id_pembayaran_spp);
        $pembayaranspp-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/pembayaran_spp');
    }
}
