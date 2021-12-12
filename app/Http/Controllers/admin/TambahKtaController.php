<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kta;
use Illuminate\Http\Request;
use App\Models\DataPerusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class TambahKtaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $item = DataPerusahaan::findOrFail($id);
        $kta = Kta::findOrFail($id);
        return view('pages.admin.data_perusahaan.createkta', [
            'kta' => $kta,
            'item' => $item
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
        $kta = new Kta();

        $kta->kta_berlaku_sampai = $request->get('kta_berlaku_sampai');
        $kta->anggota_id = $id;


        if ($request->file('file_kta')) {
            if ($kta->file_kta && file_exists(storage_path('app/public/' . $kta->file_kta))) {
                \Storage::delete('public' . $kta->file_kta);
            }
            $image_file = $request->file('file_kta')->store('file_kta', 'public');
            $kta->file_kta = $image_file;
        }
        $kta->save();
        return redirect()->route('data_perusahaan.index')->with('status', 'KTA Created successfully!');
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