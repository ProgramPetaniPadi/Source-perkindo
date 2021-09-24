<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubKlasifikasiSBUKonstruksi;
use App\Models\KlasifikasiSBUKonstruksi;

class Sub_Klasifikasi_SBU_KonstruksiController extends Controller
{ /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
    public function index()
    {
        $items = SubKlasifikasiSBUKonstruksi::all();
        return view('pages.admin.Sub_Klasifikasi_SBU_Konstruksi.index', [
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
        $klasifikasi = KlasifikasiSBUKonstruksi::all();
        return view('pages.admin.Sub_Klasifikasi_SBU_Konstruksi.create', [
            'klasifikasi' => $klasifikasi,
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
        $validation = \Validator::make($request->all(), [
          
          



        ])->validate();
        $SubKlasifikasiSBUKonstruksi = new SubKlasifikasiSBUKonstruksi();
        $SubKlasifikasiSBUKonstruksi->klasifikasi_sbu_konstruksi_id = $request->get('klasifikasi_sbu_konstruksi_id');
        $SubKlasifikasiSBUKonstruksi->kode = $request->get('kode');
        $SubKlasifikasiSBUKonstruksi->sub_klasifikasi = $request->get('sub_klasifikasi');
        $SubKlasifikasiSBUKonstruksi->lingkup_pekerjaan = $request->get('lingkup_pekerjaan');
        $SubKlasifikasiSBUKonstruksi->keterangan = $request->get('keterangan');

        $SubKlasifikasiSBUKonstruksi->save();

        return redirect()->route('Sub_Klasifikasi_SBU_Konstruksi.index')->with('status', 'Created successfully!');
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
        $item = SubKlasifikasiSBUKonstruksi::findOrFail($id);
        $klasifikasi = KlasifikasiSBUKonstruksi::all();
        return view('pages.admin.Sub_Klasifikasi_SBU_Konstruksi.edit', [
            'item' => $item,
            'klasifikasi' => $klasifikasi,
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
        $SubKlasifikasiSBUKonstruksi = SubKlasifikasiSBUKonstruksi::findOrFail($id);

        \Validator::make($request->all(), [

        ]);
        $SubKlasifikasiSBUKonstruksi->klasifikasi_sbu_konstruksi_id = $request->get('klasifikasi_sbu_konstruksi_id');
        $SubKlasifikasiSBUKonstruksi->kode = $request->get('kode');
        $SubKlasifikasiSBUKonstruksi->sub_klasifikasi = $request->get('sub_klasifikasi');
        $SubKlasifikasiSBUKonstruksi->lingkup_pekerjaan = $request->get('lingkup_pekerjaan');
        $SubKlasifikasiSBUKonstruksi->keterangan = $request->get('keterangan');

        $SubKlasifikasiSBUKonstruksi->save();

        return redirect()->route('Sub_Klasifikasi_SBU_Konstruksi.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SubKlasifikasiSBUKonstruksi::findOrfail($id);
        $item->delete();

        return redirect()->route('Sub_Klasifikasi_SBU_Konstruksi.index');
    }
}