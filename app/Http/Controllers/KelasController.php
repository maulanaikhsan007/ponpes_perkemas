<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = new Kelas();
        $kelas->id_kelas = $request->input('id_kelas');
        $kelas->kelas = $request->input('kelas');
        $kelas->nama_kelas = $request->input('nama_kelas');
        $kelas->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $request, $id_kelas)
    {
        $kelas = Kelas::where('id_kelas',$id_kelas)->first();
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        $kelas->kelas = $request->input('kelas');
        $kelas->nama_kelas = $request->input('nama_kelas');
        $kelas->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        $kelas-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/kelas');
    }
}
