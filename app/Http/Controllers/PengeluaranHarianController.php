<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use App\Models\PengeluaranHarian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaranharian= PengeluaranHarian::all();
        return view('pengeluaran_harian.index', compact('pengeluaranharian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenispengeluaran = JenisPengeluaran::all();
        return view('pengeluaran_harian.create', compact('jenispengeluaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pengeluaranharian = new PengeluaranHarian();
        // $pengeluaranharian->id_pengeluaran_harian = $request->input('id_pengeluaran_harian');
        // $pengeluaranharian->id_jenis_pengeluaran = $request->input('id_jenis_pengeluaran');
        // $pengeluaranharian->tanggal_pengeluaran = $request->input('tanggal_pengeluaran');
        // $pengeluaranharian->biaya = $request->input('biaya');
        // $pengeluaranharian->save();

        PengeluaranHarian::create([
            'id_pengeluaran_harian' => $request->id_pengeluaran_harian,
            'id_jenis_pengeluaran' => $request->id_jenis_pengeluaran,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
            'biaya' => $request->biaya,
        ]);

        // PengeluaranHarian::create($request->all());
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/pengeluaran_harian');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengeluaranHarian  $pengeluaranHarian
     * @return \Illuminate\Http\Response
     */
    public function show(PengeluaranHarian $pengeluaranHarian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengeluaranHarian  $pengeluaranHarian
     * @return \Illuminate\Http\Response
     */
    public function edit(PengeluaranHarian $request, $id_pengeluaran_harian)
    {
        $jenispengeluaran = JenisPengeluaran::all();
        $pengeluaranharian = PengeluaranHarian::where('id_pengeluaran_harian',$id_pengeluaran_harian)->first();
        return view('pengeluaran_harian.edit', compact('pengeluaranharian','jenispengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengeluaranHarian  $pengeluaranHarian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pengeluaran_harian)
    {
        $pengeluaranharian = PengeluaranHarian::find($id_pengeluaran_harian);
        $pengeluaranharian->id_jenis_pengeluaran = $request->input('id_jenis_pengeluaran');
        $pengeluaranharian->tanggal_pengeluaran = $request->input('tanggal_pengeluaran');
        $pengeluaranharian->biaya = $request->input('biaya');
        $pengeluaranharian->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/pengeluaran_harian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengeluaranHarian  $pengeluaranHarian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengeluaran_harian)
    {
        $pengeluaranharian = PengeluaranHarian::find($id_pengeluaran_harian);
        $pengeluaranharian-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/pengeluaran_harian');
    }
}
