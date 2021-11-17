<?php

namespace App\Http\Controllers;

use App\Models\BiodataSiswa;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use RealRashid\SweetAlert\Facades\Alert;

class BiodataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $biodatasiswa = BiodataSiswa::all();
         return view('biodata_siswa.index', compact('biodatasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BiodataSiswa  $biodataSiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id_biodata_siswa)
    {
        $kelas = Kelas::all();
        $biodatasiswa = BiodataSiswa::find($id_biodata_siswa);
        return view('biodata_siswa.show', compact('biodatasiswa','kelas'));
    }
    
    public function detail()
    {
    	$id = FacadesAuth::user()->id;
    	$q1 = BiodataSiswa::where('user_id',$id)->first();
    	
    	$id_biodata_siswa = $q1->id_biodata_siswa;
        $biodatasiswa = BiodataSiswa::find($id_biodata_siswa);
        return view('biodata_siswa.detail', compact('biodatasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BiodataSiswa  $biodataSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(BiodataSiswa $request, $id_biodata_siswa)
    {   
        $kelas = Kelas::all();
        $biodatasiswa = BiodataSiswa::where('id_biodata_siswa',$id_biodata_siswa)->first();
        return view('biodata_siswa.edit', compact('biodatasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BiodataSiswa  $biodataSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_biodata_siswa)
    {
        $biodatasiswa = BiodataSiswa::find($id_biodata_siswa);
        $biodatasiswa->NIS = $request->input('NIS');
        $biodatasiswa->nisn = $request->input('nisn');
        $biodatasiswa->nama_siswa = $request->input('nama_siswa');
        $biodatasiswa->nama_samaran_siswa = $request->input('nama_samaran_siswa');
        $biodatasiswa->jenis_kelamin = $request->input('jenis_kelamin');
        $biodatasiswa->id_kelas = $request->input('id_kelas');
        $biodatasiswa->asal_sekolah = $request->input('asal_sekolah');
        $biodatasiswa->nama_ayah = $request->input('nama_ayah');
        $biodatasiswa->nama_ibu = $request->input('nama_ibu');
        $biodatasiswa->telp_orang_tua = $request->input('telp_orang_tua');
        $biodatasiswa->alamat_orang_tua = $request->input('alamat_orang_tua');
        $biodatasiswa->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/biodata_siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BiodataSiswa  $biodataSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_biodata_siswa)
    {
        $biodatasiswa = BiodataSiswa::find($id_biodata_siswa);
        $biodatasiswa-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/biodata_siswa');
    }
}
