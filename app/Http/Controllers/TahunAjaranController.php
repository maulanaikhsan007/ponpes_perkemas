<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunajaran = TahunAjaran::all();
        return view('tahun_ajaran.index', compact('tahunajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tahun_ajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tahunajaran = new TahunAjaran();
        $tahunajaran->id_tahun_ajaran = $request->input('id_tahun_ajaran');
        $tahunajaran->semester = $request->input('semester');
        $tahunajaran->tahun = $request->input('tahun');
        $tahunajaran->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/tahun_ajaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function show(TahunAjaran $tahunAjaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function edit(TahunAjaran $request, $id_tahun_ajaran)
    {
        $tahunajaran = TahunAjaran::where('id_tahun_ajaran',$id_tahun_ajaran)->first();
        return view('tahun_ajaran.edit', compact('tahunajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tahun_ajaran)
    {
        $tahunajaran = TahunAjaran::find($id_tahun_ajaran);
        $tahunajaran->semester = $request->input('semester');
        $tahunajaran->tahun = $request->input('tahun');
        $tahunajaran->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/tahun_ajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tahun_ajaran)
    {
        $tahunajaran = TahunAjaran::find($id_tahun_ajaran);
        $tahunajaran-> delete();
        
        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/tahun_ajaran');
    }

    public function apply($id_tahun_ajaran)
    {
        $status = TahunAjaran::where('id_tahun_ajaran',$id_tahun_ajaran)->firstOrFail();
        $st = ($status->status == 'A') ? 'N' : 'A'; 
        
        TahunAjaran::where('status','A')->update(['status' => 'N']);
        TahunAjaran::where('id_tahun_ajaran',$id_tahun_ajaran)->update(['status' => $st]);
        return redirect('/tahun_ajaran');
    }

}
