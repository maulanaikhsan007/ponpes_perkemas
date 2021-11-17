<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pengeluaran = Pengeluaran::orderByRaw('created_at DESC')->get();
        $data_kategori = Kategori::where('jenis_kategori', 2)->orderByRaw('nama_kategori ASC')->get();
        return view('pengeluaran.index', compact('data_pengeluaran', 'data_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        $pengeluaran = new Pengeluaran();
        $pengeluaran->id_kategori      = $request->input('id_kategori');
        $pengeluaran->tanggal          = $request->input('tanggal');
        $pengeluaran->jumlah           = $request->input('jumlah');
        $pengeluaran->keterangan       = $request->input('keterangan');
        $pengeluaran->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('pengeluaran');
    }

    public function tambahkategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'min:5',
        ]);
        $kategori = new Kategori();
        $kategori->jenis_kategori   = 2;
        $kategori->nama_kategori    = $request->input('nama_kategori');
        $kategori->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('pengeluaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pengeluaran)
    {
        $pengeluaran = Pengeluaran::find($id_pengeluaran);
        $data_kategori = Kategori::where('jenis_kategori', 2)->get();
        return view('pengeluaran.edit', compact('pengeluaran', 'data_kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pengeluaran)
    {
        $request->validate([
            'jumlah' => 'numeric',
            'keterangan' => 'min:10',
        ]);
        $pengeluaran = Pengeluaran::find($id_pengeluaran);
        $pengeluaran->update($request->all());
        $pengeluaran->save();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('pengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengeluaran)
    {
        $pengeluaran = Pengeluaran::find($id_pengeluaran);
        $pengeluaran-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('pengeluaran');
    }

    public function deletekategori($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        $kategori->delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/pengeluaran');
    }
}
