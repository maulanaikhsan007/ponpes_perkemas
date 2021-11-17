<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::all();
        return view('spp.index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $spp_lama = Spp::orderBy('created_at', 'desc')->first();
        $spp = new Spp();
        $spp->id_spp = $request->input('id_spp');
        $spp->spp = $request->input('spp');
        $spp->start_date = Carbon::now();
        // $spp->end_date = $request->input('end_date');
        
        if(isset($spp_lama)) {
            $spp_lama->end_date = Carbon::now();
            $spp_lama->status = 0;
            $spp_lama->update();
        } 
        // else {
        //     $spp->end_date = Carbon::now();
        //     $spp->status = 0;
        // }
        $spp->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/spp');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit(Spp $request, $id_spp)
    {
        $spp = Spp::where('id_spp',$id_spp)->first();
        return view('spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_spp)
    {
        $spp = Spp::find($id_spp);
        $spp->spp = $request->input('spp');
        $spp->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah');
        return redirect('/spp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_spp)
    {
        $spp = Spp::find($id_spp);
        $spp-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/spp');
    }
}
