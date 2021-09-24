<?php

namespace App\Http\Controllers\admin;

use App\Models\Berita;
use App\Models\DataPengurus;
use Illuminate\Http\Request;
use App\Models\KotaKabupaten;
use App\Models\DataPerusahaan;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = DataPerusahaan::get()->count();
        $pengurus = DataPengurus::get()->count();
        $kota_kabupaten = KotaKabupaten::get()->count();
        $berita = Berita::get()->count();
        return view('pages.admin.dashboard', [
            'anggota' => $anggota, 'pengurus' => $pengurus,
            'kota_kabupaten' => $kota_kabupaten, 'berita' => $berita


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
    //
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