<?php

namespace App\Http\Controllers;


use App\Models\KategoriGaji;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorigaji = KategoriGaji::all();
        return view('kategori_gaji.index', compact('kategorigaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorigaji = KategoriGaji::all();
        return view('kategori_gaji.create', compact('kategorigaji'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategorigaji = new KategoriGaji;
        $kategorigaji->id_kategori_gaji = $request->input('id_kategori_gaji');
        $kategorigaji->kategori_gaji = $request->input('kategori_gaji');
        $kategorigaji->nominal_gaji = $request->input('nominal_gaji');
        $kategorigaji->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/kategori_gaji');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriGaji  $kategoriGaji
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriGaji $kategoriGaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriGaji  $kategoriGaji
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriGaji $request, $id_kategori_gaji)
    {
        $kategorigaji = KategoriGaji::where('id_kategori_gaji',$id_kategori_gaji)->first();
        return view('kategori_gaji.edit', compact('kategorigaji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriGaji  $kategoriGaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori_gaji)
    {
        $kategorigaji = KategoriGaji::find($id_kategori_gaji);
        $kategorigaji->kategori_gaji = $request->input('kategori_gaji');
        $kategorigaji->nominal_gaji = $request->input('nominal_gaji');
        $kategorigaji->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/kategori_gaji');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriGaji  $kategoriGaji
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori_gaji)
    {
        $kategorigaji = KategoriGaji::find($id_kategori_gaji);
        $kategorigaji-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/kategori_gaji');
    }
}
