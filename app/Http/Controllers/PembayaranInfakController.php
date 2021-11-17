<?php

namespace App\Http\Controllers;

use App\Models\BiodataSiswa;
use App\Models\Infak;
use App\Models\PembayaranInfak;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranInfakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaraninfak = PembayaranInfak::all();
        return view('pembayaran_infak.index', compact('pembayaraninfak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infak = Infak::all();
        $biodatasiswa = BiodataSiswa::all();
        return view('pembayaran_infak.create', compact('infak', 'biodatasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pembayaraninfak = new PembayaranInfak();
        $pembayaraninfak->id_pembayaran_infak = $request->input('id_pembayaran_infak');
        $pembayaraninfak->id_biodata_siswa = $request->input('id_biodata_siswa');
        $pembayaraninfak->infak_bangunan = $request->input('infak_bangunan');
        $pembayaraninfak->infak_pendaftaran = $request->input('infak_pendaftaran');
        $pembayaraninfak->infak_ekskul = $request->input('infak_ekskul');
        $pembayaraninfak->tanggal_pembayaran = $request->input('tanggal_pembayaran');
        $pembayaraninfak->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/pembayaran_infak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembayaranInfak  $pembayaranInfak
     * @return \Illuminate\Http\Response
     */
    public function show(PembayaranInfak $pembayaranInfak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembayaranInfak  $pembayaranInfak
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranInfak $request, $id_pembayaran_infak)
    {
        $biodatasiswa = BiodataSiswa::all();
        $pembayaraninfak = PembayaranInfak::where('id_pembayaran_infak',$id_pembayaran_infak)->first();
        return view('pembayaran_infak.edit', compact('pembayaraninfak','biodatasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembayaranInfak  $pembayaranInfak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pembayaran_infak)
    {
        $pembayaraninfak = PembayaranInfak::find($id_pembayaran_infak);
        $pembayaraninfak->id_biodata_siswa = $request->input('id_biodata_siswa');
        $pembayaraninfak->infak_bangunan = $request->input('infak_bangunan');
        $pembayaraninfak->infak_pendaftaran = $request->input('infak_pendaftaran');
        $pembayaraninfak->infak_ekskul = $request->input('infak_ekskul');
        $pembayaraninfak->tanggal_pembayaran = $request->input('tanggal_pembayaran');
        $pembayaraninfak->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/pembayaran_infak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembayaranInfak  $pembayaranInfak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pembayaran_infak)
    {
        $pembayaraninfak = PembayaranInfak::find($id_pembayaran_infak);
        $pembayaraninfak-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/pembayaran_infak');
    }
}
