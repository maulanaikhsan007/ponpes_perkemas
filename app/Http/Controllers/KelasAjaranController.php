<?php

namespace App\Http\Controllers;

use App\Models\BiodataSiswa;
use App\Models\Kelas;
use App\Models\KelasAjaran;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class KelasAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $kelasajaran = KelasAjaran::all();
         return view('kelas_ajaran.index', compact('kelasajaran'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $biodatasiswa = BiodataSiswa::all();
        $kelas = Kelas::all();
        $tahunajaran = TahunAjaran::all();
        return view('kelas_ajaran.create', compact('biodatasiswa','kelas','tahunajaran'));
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
     * @param  \App\Models\KelasAjaran  $kelasAjaran
     * @return \Illuminate\Http\Response
     */
    public function show(KelasAjaran $kelasAjaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelasAjaran  $kelasAjaran
     * @return \Illuminate\Http\Response
     */
    public function edit(KelasAjaran $kelasAjaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KelasAjaran  $kelasAjaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KelasAjaran $kelasAjaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelasAjaran  $kelasAjaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(KelasAjaran $kelasAjaran)
    {
        //
    }
}
