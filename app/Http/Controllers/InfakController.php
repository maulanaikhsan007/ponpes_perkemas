<?php

namespace App\Http\Controllers;

use App\Models\BiodataSiswa;
use App\Models\Infak;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InfakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infak = Infak::all();
        return view('infak.index', compact('infak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $biodatasiswa = BiodataSiswa::all();
        return view('infak.create', compact('biodatasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Infak::create([
        //     'id_infak' => $request->id_infak,
        //     'infak_bangunan' => $request->infak_bangunan,
        //     'infak_pendaftaran' => $request->infak_pendaftaran,
        //     'ekskul' => $request->ekskul,
        // ]);

        $infak = new Infak();
        $infak->id_infak = $request->input('id_infak');
        $infak->infak_bangunan = $request->input('infak_bangunan');
        $infak->infak_pendaftaran = $request->input('infak_pendaftaran');
        $infak->ekskul = $request->input('ekskul');
        $infak->save();

        return redirect('/infak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infak  $infak
     * @return \Illuminate\Http\Response
     */
    public function show(Infak $infak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infak  $infak
     * @return \Illuminate\Http\Response
     */
    public function edit(Infak $request, $id_infak)
    {
        $infak = Infak::where('id_infak',$id_infak)->first();
        return view('infak.edit', compact('infak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infak  $infak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $infak)
    {
        $infak = Infak::find($infak);
        $infak->infak_bangunan = $request->input('infak_bangunan');
        $infak->infak_pendaftaran = $request->input('infak_pendaftaran');
        $infak->ekskul = $request->input('ekskul');
        $infak->update();

        Alert::success('Data Infak', 'Berhasil Di Edit');
        return redirect('/infak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infak  $infak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_infak)
    {
        $infak = Infak::find($id_infak);
        $infak-> delete();
        return redirect('/infak');
    }
}
