<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KlasifikasiSBUKonstruksi;

class KlasifikasiSBUKonstruksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = KlasifikasiSBUKonstruksi::all();
        return view('pages.admin.Klasifikasi_SBU_Konstruksi.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.Klasifikasi_SBU_Konstruksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            "klasifikasi" => "required",

        ])->validate();
        $KlasifikasiSBUKonstruksi = new KlasifikasiSBUKonstruksi();
        $KlasifikasiSBUKonstruksi->klasifikasi = $request->get('klasifikasi');
        $KlasifikasiSBUKonstruksi->save();

        return redirect()->route('Klasifikasi_SBU_Konstruksi.index')->with('status', 'Created successfully!');
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
        $item = KlasifikasiSBUKonstruksi::findOrFail($id);

        return view('pages.admin.Klasifikasi_SBU_Konstruksi.edit', [
            'item' => $item]);
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
        $KlasifikasiSBUKonstruksi = KlasifikasiSBUKonstruksi::findOrFail($id);

        \Validator::make($request->all(), [
            "klasifikasi" => "required",

        ]);
        $KlasifikasiSBUKonstruksi->klasifikasi = $request->get('klasifikasi');


        // if ($request->file('carousel_image')) {
        //     if ($KlasifikasiSBUKonstruksi->carousel_image && file_exists(storage_path('app/public/' . $KlasifikasiSBUKonstruksi->carousel_image))) {
        //         \Storage::delete('public' . $KlasifikasiSBUKonstruksi->carousel_image);
        //     }
        //     $carousel_image_file = $request->file('carousel_image')->store('KlasifikasiSBUKonstruksi', 'public');
        //     $KlasifikasiSBUKonstruksi->carousel_image = $carousel_image_file;
        // }

        $KlasifikasiSBUKonstruksi->save();

        return redirect()->route('Klasifikasi_SBU_Konstruksi.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = KlasifikasiSBUKonstruksi::findOrfail($id);
        $item->delete();

        return redirect()->route('Klasifikasi_SBU_Konstruksi.index');
    }
}