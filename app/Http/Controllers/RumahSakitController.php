<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.rumah_sakit.index', [
            'title' => 'Data Rumah Sakit',
            'rumah_sakit' => RumahSakit::all()
        ]);
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
        $validatedData = $request->validate([
            'nama_rumah_sakit' => 'nullable',
            'alamat' => 'nullable',
            'email' => 'nullable',
            'telepon' => 'nullable',
        ]);

        // ddd($validatedData);

        RumahSakit::Create($validatedData);

        return redirect('/dashboard/rumah_sakit')->with('success', 'Berhasil menambah data baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RumahSakit  $rumahSakit
     * @return \Illuminate\Http\Response
     */
    public function show(RumahSakit $rumahSakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RumahSakit  $rumahSakit
     * @return \Illuminate\Http\Response
     */
    public function edit(RumahSakit $rumahSakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RumahSakit  $rumahSakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RumahSakit $rumahSakit)
    {
        $validatedData = $request->validate([
            'nama_rumah_sakit' => 'nullable',
            'alamat' => 'nullable',
            'email' => 'nullable',
            'telepon' => 'nullable',
        ]);

        RumahSakit::Where('id', $rumahSakit->id)->update($validatedData);

        return redirect('/dashboard/rumah_sakit')->with('success', 'Berhasil memperbarui data rumah sakit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RumahSakit  $rumahSakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(RumahSakit $rumahSakit)
    {
        RumahSakit::where('id', $rumahSakit->id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}
