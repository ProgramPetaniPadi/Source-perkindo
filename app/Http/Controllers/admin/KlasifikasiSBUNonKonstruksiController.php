<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KlasifikasiSBUNonKonstruksi;

class KlasifikasiSBUNonKonstruksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = KlasifikasiSBUNonKonstruksi::all();
        return view('pages.admin.Klasifikasi_SBU_Non_Konstruksi.index', [
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
        return view('pages.admin.Klasifikasi_SBU_Non_Konstruksi.create');
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
        $KlasifikasiSBUNonKonstruksi = new KlasifikasiSBUNonKonstruksi();
        $KlasifikasiSBUNonKonstruksi->klasifikasi = $request->get('klasifikasi');
        $KlasifikasiSBUNonKonstruksi->save();

        return redirect()->route('Klasifikasi_SBU_Non_Konstruksi.index')->with('status', 'Created successfully!');
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
        $item = KlasifikasiSBUNonKonstruksi::findOrFail($id);

        return view('pages.admin.Klasifikasi_SBU_Non_Konstruksi.edit', [
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
        $KlasifikasiSBUNonKonstruksi = KlasifikasiSBUNonKonstruksi::findOrFail($id);

        \Validator::make($request->all(), [
            "klasifikasi" => "required",

        ]);
        $KlasifikasiSBUNonKonstruksi->klasifikasi = $request->get('klasifikasi');


        // if ($request->file('carousel_image')) {
        //     if ($KlasifikasiSBUKonstruksi->carousel_image && file_exists(storage_path('app/public/' . $KlasifikasiSBUKonstruksi->carousel_image))) {
        //         \Storage::delete('public' . $KlasifikasiSBUKonstruksi->carousel_image);
        //     }
        //     $carousel_image_file = $request->file('carousel_image')->store('KlasifikasiSBUKonstruksi', 'public');
        //     $KlasifikasiSBUKonstruksi->carousel_image = $carousel_image_file;
        // }

        $KlasifikasiSBUNonKonstruksi->save();

        return redirect()->route('Klasifikasi_SBU_Non_Konstruksi.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = KlasifikasiSBUNonKonstruksi::findOrfail($id);
        $item->delete();

        return redirect()->route('Klasifikasi_SBU_Non_Konstruksi.index');
    }
}