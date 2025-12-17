<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblStandardQualityPeriode;

class TblStandardQualityPeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TblStandardQualityPeriode::all();
        return view('dashboard.SurfaceWater.TblStandardQuality.index', [
            'data' => $data,
            'tittle' => 'Standard Quality Periode',
            'breadcrumb' => 'Standard Quality Periode'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.SurfaceWater.TblStandardQuality.createandupdate', [
            'tittle' => 'Standard Quality Periode',
            'breadcrumb' => 'Standard Quality Periode',
            'data'   => new TblStandardQualityPeriode()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'tss_standard'          => 'required',
            'ph_min_standard'       => 'required',
            'ph_max_standard'       => 'required',
            'do_standard'           => 'required',
            'redox_standard'        => 'required',
            'conductivity_standard' => 'required',
            'temperatur_standard'   => 'required',
        ]);

        // 2. Simpan ke Database
        TblStandardQualityPeriode::create($validatedData);

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('standard-quality.index')
            ->with('success', 'New Standard Quality data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.SurfaceWater.TblStandardQuality.createandupdate', [
            'tittle' => 'Standard Quality Periode',
            'data'   => TblStandardQualityPeriode::findOrFail($id)
        ]);
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
        // 1. Cari data berdasarkan ID
        $standard = TblStandardQualityPeriode::findOrFail($id);

        // 2. Validasi Input
        $validatedData = $request->validate([
            'tss_standard'          => 'required|numeric',
            'ph_min_standard'       => 'required|numeric',
            'ph_max_standard'       => 'required|numeric',
            'do_standard'           => 'required|numeric',
            'redox_standard'        => 'required|numeric',
            'conductivity_standard' => 'required|numeric',
            'temperatur_standard'   => 'required|numeric',
        ]);

        // 3. Update data di database
        $standard->update($validatedData);

        // 4. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('standard-quality.index')
            ->with('success', 'Standard Quality data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $standard = TblStandardQualityPeriode::findOrFail($id);
        $standard->delete();

        return redirect()->route('standard-quality.index')
            ->with('success', 'Standard Quality data has been deleted!');
    }
}
