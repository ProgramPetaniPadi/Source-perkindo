<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KlasifikasiSBUNonKonstruksi;
use App\Models\SubKlasifikasiSBUNonKonstruksi;


class Sub_Klasifikasi_SBU_Non_KonstruksiController extends Controller
{ /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
    public function index()
    {
        $items = SubKlasifikasiSBUNonKonstruksi::all();
        return view('pages.admin.SubKlasifikasiSBUNon_Konstruksi.index', [
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
        $klasifikasi = KlasifikasiSBUNonKonstruksi::all();
        return view('pages.admin.SubKlasifikasiSBUNon_Konstruksi.create', [
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
        $SubKlasifikasiSBUNonKonstruksi = new SubKlasifikasiSBUNonKonstruksi();
        $SubKlasifikasiSBUNonKonstruksi->klasifikasi_sbu_non_konstruksi_id = $request->get('klasifikasi_sbu_non_konstruksi_id');
        $SubKlasifikasiSBUNonKonstruksi->kode = $request->get('kode');
        $SubKlasifikasiSBUNonKonstruksi->sub_klasifikasi = $request->get('sub_klasifikasi');
        $SubKlasifikasiSBUNonKonstruksi->lingkup_pekerjaan = $request->get('lingkup_pekerjaan');
        $SubKlasifikasiSBUNonKonstruksi->keterangan = $request->get('keterangan');

        $SubKlasifikasiSBUNonKonstruksi->save();

        return redirect()->route('SubKlasifikasiSBUNon_Konstruksi.index')->with('status', 'Created successfully!');
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
        $item = SubKlasifikasiSBUNonKonstruksi::findOrFail($id);
        $klasifikasi = KlasifikasiSBUNonKonstruksi::all();
        return view('pages.admin.SubKlasifikasiSBUNon_Konstruksi.edit', [
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
        $SubKlasifikasiSBUNonKonstruksi = SubKlasifikasiSBUNonKonstruksi::findOrFail($id);

        \Validator::make($request->all(), [

        ]);
        $SubKlasifikasiSBUNonKonstruksi->klasifikasi_sbu_non_konstruksi_id = $request->get('klasifikasi_sbu_non_konstruksi_id ');
        $SubKlasifikasiSBUNonKonstruksi->kode = $request->get('kode');
        $SubKlasifikasiSBUNonKonstruksi->sub_klasifikasi = $request->get('sub_klasifikasi');
        $SubKlasifikasiSBUNonKonstruksi->lingkup_pekerjaan = $request->get('lingkup_pekerjaan');
        $SubKlasifikasiSBUNonKonstruksi->keterangan = $request->get('keterangan');

        $SubKlasifikasiSBUNonKonstruksi->save();

        return redirect()->route('SubKlasifikasiSBUNon_Konstruksi.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SubKlasifikasiSBUNonKonstruksi::findOrfail($id);
        $item->delete();

        return redirect()->route('SubKlasifikasiSBUNon_Konstruksi.index');
    }
}