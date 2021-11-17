<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\BiodataSiswa;
use App\Models\PembayaranSpp;
use App\Models\Spp;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PembayaranSppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$id = Auth::user()->id;
        $pembayaranspp = DB::table('pembayaran_spp')
            ->join('biodata_siswa', 'pembayaran_spp.id_biodata_siswa', '=', 'biodata_siswa.id_biodata_siswa')
            ->join('users', 'users.id', '=', 'biodata_siswa.user_id')
            ->join('spp', 'spp.id_spp', '=', 'pembayaran_spp.id_spp')
            ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran', '=', 'pembayaran_spp.id_tahun_ajaran')
            ->where('users.id',$id)
            ->get();
        return view('page.siswa.pembayaran_spp.index', compact('pembayaranspp'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pembayaran_spp)
    {
        
        $pembayaranspp = PembayaranSpp::find( $id_pembayaran_spp);
        return view('page.siswa.pembayaran_spp.show',compact('pembayaranspp'));

        

        // $id = BiodataSiswa::all();
    	// $q1 = PembayaranSpp::where('id_biodata_siswa',$id_pembayaran_spp)->first();
    	
    	// $id_pembayaran_spp = $q1->id_pembayaran_spp;
        // $pembayaranspp = PembayaranSpp::find($id_pembayaran_spp);
        // return view('biodata_siswa.detail', compact('biodatasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
