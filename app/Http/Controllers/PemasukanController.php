<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pemasukan = Pemasukan::orderByRaw('created_at DESC')->get();
        $data_kategori = Kategori::where('jenis_kategori', 1)->where('id_kategori', '!=', 1)->orderByRaw('nama_kategori ASC')->get();
        return view('pemasukan.index', compact('data_pemasukan', 'data_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasukan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        $pemasukan = new Pemasukan();
        $pemasukan->id_kategori      = $request->input('id_kategori');
        $pemasukan->tanggal          = $request->input('tanggal');
        $pemasukan->jumlah           = $request->input('jumlah');
        $pemasukan->keterangan       = $request->input('keterangan');
        $pemasukan->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('pemasukan');
    }

    public function tambahkategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'min:5',
        ]);
        $kategori = new Kategori();
        $kategori->jenis_kategori   = 1;
        $kategori->nama_kategori    = $request->input('nama_kategori');
        $kategori->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('pemasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pemasukan)
    {
        $pemasukan = Pemasukan::find($id_pemasukan);
        $data_kategori = Kategori::where('jenis_kategori', 2)->get();
        return view('pemasukan.edit', compact('pemasukan', 'data_kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pemasukan)
    {
        $request->validate([
            'jumlah' => 'numeric',
            'keterangan' => 'min:10',
        ]);
        $pemasukan = Pemasukan::find($id_pemasukan);
        $pemasukan->update($request->all());
        $pemasukan->save();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/pemasukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pemasukan)
    {
        $pemasukan = Pemasukan::find($id_pemasukan);
        $pemasukan-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/pemasukan');
    }

    public function deletekategori($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        $kategori->delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/pemasukan');
    }
}
