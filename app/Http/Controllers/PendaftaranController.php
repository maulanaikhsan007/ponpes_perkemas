<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\BiodataSiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    public function index_biodata_siswa()
    {
        $pendaftaran = Pendaftaran::all();
        return view('biodata_siswa.index', compact('pendaftaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pendaftaran = new Pendaftaran;
        $pendaftaran->id_pendaftaran = $request->input('id_pendaftaran');
        $pendaftaran->nama_siswa = $request->input('nama_siswa'); 
        $pendaftaran->nama_samaran_siswa = $request->input('nama_samaran_siswa'); 
        $pendaftaran->asal_sekolah = $request->input('asal_sekolah'); 
        $pendaftaran->nama_ayah = $request->input('nama_ayah'); 
        $pendaftaran->nama_ibu = $request->input('nama_ibu'); 
        $pendaftaran->telp_orang_tua = $request->input('telp_orang_tua'); 
        $pendaftaran->alamat_orang_tua = $request->input('alamat_orang_tua');
        $pendaftaran->save();
        
        $biodatasiswa = new BiodataSiswa;
        $biodatasiswa->id_biodata_siswa = $request->input('id_biodata_siswa');
        $biodatasiswa->NIS = $request->input('NIS');
        $biodatasiswa->nama_siswa = $request->input('nama_siswa'); 
        $biodatasiswa->nama_samaran_siswa = $request->input('nama_samaran_siswa'); 
        $biodatasiswa->asal_sekolah = $request->input('asal_sekolah'); 
        $biodatasiswa->nama_ayah = $request->input('nama_ayah'); 
        $biodatasiswa->nama_ibu = $request->input('nama_ibu'); 
        $biodatasiswa->telp_orang_tua = $request->input('telp_orang_tua'); 
        $biodatasiswa->alamat_orang_tua = $request->input('alamat_orang_tua');
        $biodatasiswa->save();
        
        return redirect('/biodata_siswa');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $id_biodata_siswa)
    {
        // $pendaftaran = Pendaftaran::where('id_biodata_siswa',$id_biodata_siswa)->first();
        // return view('biodata_siswa.edit', compact('biodatasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_biodata_siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_biodata_siswa)
    {
        //
    }
}
