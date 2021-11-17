<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JenisPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenispengeluaran = JenisPengeluaran::all();
        return view('jenis_pengeluaran.index', compact('jenispengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenispengeluaran = new JenisPengeluaran;
        $jenispengeluaran->id_jenis_pengeluaran = $request->input('id_jenis_pengeluaran');
        $jenispengeluaran->jenis_pengeluaran = $request->input('jenis_pengeluaran');
        $jenispengeluaran->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/jenis_pengeluaran');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPengeluaran $jenisPengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPengeluaran $request, $id_jenis_pengeluaran)
    {
        $jenispengeluaran = JenisPengeluaran::where('id_jenis_pengeluaran',$id_jenis_pengeluaran)->first();
        return view('jenis_pengeluaran.edit', compact('jenispengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jenis_pengeluaran)
    {
        $jenispengeluaran = JenisPengeluaran::find($id_jenis_pengeluaran);
        $jenispengeluaran->jenis_pengeluaran = $request->input('jenis_pengeluaran');
        $jenispengeluaran->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/jenis_pengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_pengeluaran)
    {
        $jenispengeluaran = JenisPengeluaran::find($id_jenis_pengeluaran);
        $jenispengeluaran-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/jenis_pengeluaran');
    }
}
