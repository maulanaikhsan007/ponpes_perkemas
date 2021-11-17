<?php

namespace App\Http\Controllers;

use App\Models\BiodataMudhir;
use App\Models\KategoriGaji;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BiodataMudhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorigaji = KategoriGaji::all();
        $biodatamudhir = BiodataMudhir::all();
        return view('biodata_mudhir.index', compact('biodatamudhir','kategorigaji'));
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
        return view('biodata_mudhir.create', compact('biodatamudhir','kategorigaji'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $biodatamudhir = new BiodataMudhir;
        $biodatamudhir->id_biodata_mudhir = $request->input('id_biodata_mudhir');
        $biodatamudhir->id_kategori_gaji = $request->input('id_kategori_gaji');
        $biodatamudhir->nama_mudhir = $request->input('nama_mudhir');
        $biodatamudhir->alamat = $request->input('alamat');
        $biodatamudhir->no_telepon = $request->input('no_telepon');
        $biodatamudhir->jenis_kelamin = $request->input('jenis_kelamin');
        $biodatamudhir->pendidikan = $request->input('pendidikan');
        $biodatamudhir->bidang_ilmu = $request->input('bidang_ilmu');
        $biodatamudhir->foto = $request->input('foto');
        if($biodatamudhir->save()){
            $photo = $request->file('image');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000, 50000).'.'.$ext;
                if($ext == 'jpg'|| $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $biodatamudhir = BiodataMudhir::find($biodatamudhir->id_biodata_mudhir);
                        $biodatamudhir->foto = url('/').'/'.$fileName;
                        $biodatamudhir->save();
                    }
                }
            }
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
            return redirect('/biodata_mudhir');
        }
        return redirect()->back();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BiodataMudhir  $biodataMudhir
     * @return \Illuminate\Http\Response
     */
    public function show($id_biodata_mudhir)
    {
        $biodatamudhir = BiodataMudhir::find($id_biodata_mudhir);
        return view('biodata_mudhir.show', compact('biodatamudhir'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BiodataMudhir  $biodataMudhir
     * @return \Illuminate\Http\Response
     */
    public function edit(BiodataMudhir $request, $id_biodata_mudhir)
    {
        $kategorigaji = KategoriGaji::all();
        $biodatamudhir = BiodataMudhir::where('id_biodata_mudhir',$id_biodata_mudhir)->first();
        return view('biodata_mudhir.edit', compact('biodatamudhir','kategorigaji'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BiodataMudhir  $biodataMudhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_biodata_mudhir)
    {
        $biodatamudhir = BiodataMudhir::find($id_biodata_mudhir);
        $biodatamudhir->id_kategori_gaji = $request->input('id_kategori_gaji');
        $biodatamudhir->nama_mudhir = $request->input('nama_mudhir');
        $biodatamudhir->alamat = $request->input('alamat');
        $biodatamudhir->no_telepon = $request->input('no_telepon');
        $biodatamudhir->jenis_kelamin = $request->input('jenis_kelamin');
        $biodatamudhir->pendidikan = $request->input('pendidikan');
        $biodatamudhir->bidang_ilmu = $request->input('bidang_ilmu');
        $biodatamudhir->foto = $request->input('foto');
        if($biodatamudhir->save()){
            $photo = $request->file('foto');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000, 50000).'.'.$ext;
                if($ext == 'jpg'|| $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $biodatamudhir = BiodataMudhir::find($biodatamudhir->id_biodata_mudhir);
                        $biodatamudhir->foto = url('/').'/'.$fileName;
                        $biodatamudhir->update();
                    }
                }
            }
            Alert::success('Diperbarui', 'Data Berhasil Diubah ');
            return redirect('/biodata_mudhir');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BiodataMudhir  $biodataMudhir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_biodata_mudhir)
    {
        $biodatamudhir = BiodataMudhir::find($id_biodata_mudhir);
        $biodatamudhir-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/biodata_mudhir');
    }
}
