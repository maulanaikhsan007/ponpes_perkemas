<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donatur = Donatur::all();
        return view('donatur.index', compact('donatur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donatur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donatur = new Donatur;
        $donatur->id_donatur = $request->input('id_donatur');
        $donatur->nama_donatur = $request->input('nama_donatur');
        $donatur->jenis_donatur = $request->input('jenis_donatur');
        $donatur->nominal = $request->input('nominal'); 
        $donatur->barang = $request->input('barang'); 
        $donatur->keterangan = $request->input('keterangan'); 
        $donatur->tanggal_donatur = $request->input('tanggal_donatur'); 
        $donatur->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/donatur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function show(Donatur $donatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function edit(Donatur $request, $id_donatur)
    {
        $donatur = Donatur::where('id_donatur',$id_donatur)->first();
        return view('donatur.edit', compact('donatur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_donatur)
    {
        $donatur = Donatur::find($id_donatur);
        $donatur->nama_donatur = $request->input('nama_donatur');
        $donatur->jenis_donatur = $request->input('jenis_donatur');
        $donatur->nominal = $request->input('nominal'); 
        $donatur->barang = $request->input('barang'); 
        $donatur->keterangan = $request->input('keterangan'); 
        $donatur->tanggal_donatur = $request->input('tanggal_donatur');
        
        $donatur->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/donatur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_donatur)
    {
        $donatur = Donatur::find($id_donatur);
        $donatur-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/donatur');
    }
}
