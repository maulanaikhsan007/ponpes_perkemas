<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\KategoriGaji;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::all();
        return view('gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorigaji = KategoriGaji::all();
        return view('gaji.create', compact('kategorigaji'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gaji::create([
            'id_gaji' => $request->id_gaji,
            'id_kategori_gaji' => $request->id_kategori_gaji,
            'gaji' => $request->gaji,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/gaji');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaji $request, $id_gaji)
    {
        $kategorigaji = KategoriGaji::all();
        $gaji = Gaji::where('id_gaji',$id_gaji)->first();
        return view('gaji.edit', compact('gaji','kategorigaji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_gaji)
    {
        $gaji = Gaji::find($id_gaji);
        $gaji->id_kategori_gaji = $request->input('id_kategori_gaji');
        $gaji->gaji = $request->input('gaji');
        $gaji->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/gaji');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_gaji)
    {
        $gaji = Gaji::find($id_gaji);
        $gaji-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/gaji');
    }
}
