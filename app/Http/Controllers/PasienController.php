<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pasien.index', [
            'title' => 'Data Pasien',
            'pasien' => Pasien::all(),
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
            'nama_pasien' => 'nullable',
            'alamat' => 'nullable',
            'no_telepon' => 'nullable',
            'rumah_sakit_id' => 'nullable',
        ]);

        // ddd($validatedData);

        Pasien::Create($validatedData);

        return redirect('/dashboard/pasien')->with('success', 'Berhasil menambah data baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $validatedData = $request->validate([
            'nama_pasien' => 'nullable',
            'alamat' => 'nullable',
            'no_telepon' => 'nullable',
            'rumah_sakit_id' => 'nullable',
        ]);

        Pasien::Where('id', $pasien->id)->update($validatedData);

        return redirect('/dashboard/pasien')->with('success', 'Berhasil memperbarui data pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::where('id', $pasien->id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}
