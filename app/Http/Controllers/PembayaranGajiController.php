<?php

namespace App\Http\Controllers;

use App\Models\BiodataMudhir;
use App\Models\Gaji;
use App\Models\KategoriGaji;
use App\Models\PembayaranGaji;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayarangaji = PembayaranGaji::all();
        return view('pembayaran_gaji.index', compact('pembayarangaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorigaji = KategoriGaji::all();
        $biodatamudhir = BiodataMudhir::all();
        $gaji = Gaji::all();
        $pembayarangaji = PembayaranGaji::all();
        return view('pembayaran_gaji.create', compact('gaji','biodatamudhir','pembayarangaji','kategorigaji'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pembayarangaji = new PembayaranGaji();
        $pembayarangaji->id_kategori_gaji = $request->input('id_kategori_gaji');
        $pembayarangaji->id_pembayaran_gaji = $request->input('id_pembayaran_gaji');
        $pembayarangaji->id_biodata_mudhir = $request->input('id_biodata_mudhir');
        $pembayarangaji->id_gaji = $request->input('id_gaji');
        $pembayarangaji->tanggal_pembayaran = $request->input('tanggal_pembayaran');
        $pembayarangaji->bulan = $request->input('bulan');
        $pembayarangaji->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/pembayaran_gaji');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembayaranGaji  $pembayaranGaji
     * @return \Illuminate\Http\Response
     */
    public function show(PembayaranGaji $pembayaranGaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembayaranGaji  $pembayaranGaji
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranGaji $request, $id_pembayaran_gaji)
    {
        $kategorigaji = KategoriGaji::all();
        $biodatamudhir = BiodataMudhir::all();
        $gaji = Gaji::all();
        $pembayarangaji = PembayaranGaji::where('id_pembayaran_gaji',$id_pembayaran_gaji)->first();
        return view('pembayaran_gaji.edit', compact('pembayarangaji','kategorigaji','biodatamudhir','gaji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembayaranGaji  $pembayaranGaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pembayaran_gaji)
    {
        $pembayarangaji = PembayaranGaji::find($id_pembayaran_gaji);
        $pembayarangaji->id_kategori_gaji = $request->input('id_kategori_gaji');
        $pembayarangaji->id_biodata_mudhir = $request->input('id_biodata_mudhir');
        $pembayarangaji->id_gaji = $request->input('id_gaji');
        $pembayarangaji->tanggal_pembayaran = $request->input('tanggal_pembayaran');
        $pembayarangaji->bulan = $request->input('bulan');
        $pembayarangaji->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/pembayaran_gaji');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembayaranGaji  $pembayaranGaji
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pembayaran_gaji)
    {
        $pembayarangaji = PembayaranGaji::find($id_pembayaran_gaji);
        $pembayarangaji-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/pembayaran_gaji');
    }
}
