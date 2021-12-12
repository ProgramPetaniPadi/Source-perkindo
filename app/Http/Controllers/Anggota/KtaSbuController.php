<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPerusahaan;
use App\Models\LoginAnggota;
use App\Models\Kta;
use Illuminate\Support\Facades\Auth;

class KtaSbuController extends Controller
{
    /**
     * Change the current password
     * @param Request $request
     * @return Renderable
     */
    public function index()
    {
        $anggota = ['LoggedUserInfo' => LoginAnggota::where('id', '=', session('LoggedUser'))->first()];
        $anggota = LoginAnggota::where('id', '=', session('LoggedUser'))->first();


        // dd($anggota);
        $kta = kta::all();

        return view('pages.anggota.kta_sbu.index', $anggota, ['kta' => $kta]);
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