<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataPerusahaan;
use App\Models\SubKonstruksi;
use Illuminate\Http\Request;

class SubKonstruksiController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SubKonstruksi::all();
        $anggota = DataPerusahaan::get()->count();
        return view('pages.admin.sub_konstruksi.index', [
            'items' => $items, 'anggota' => $anggota
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota = DataPerusahaan::all();
        $item = SubKonstruksi::all();
        return view('pages.admin.sub_konstruksi.create', [
            'anggota' => $anggota,
            'item' => $item,
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
        $sub_konstruksi = new SubKonstruksi();
        $sub_konstruksi->no_seri_formulir = $request->get('no_seri_formulir');
        $sub_konstruksi->anggota_id = $request->get('anggota_id');
        $sub_konstruksi->tanggal_masuk = $request->get('tanggal_masuk');
        $sub_konstruksi->berlaku_sampai = $request->get('berlaku_sampai');
        $sub_konstruksi->registrasi_tahun_ke_2 = $request->get('registrasi_tahun_ke_2');
        $sub_konstruksi->registrasi_tahun_ke_3 = $request->get('registrasi_tahun_ke_3');
        $sub_konstruksi->tenaga_ahli = $request->get('tenaga_ahli');
        if ($request->file('foto')) {
            if ($sub_konstruksi->foto && file_exists(storage_path('app/public/' . $sub_konstruksi->foto))) {
                \Storage::delete('public' . $sub_konstruksi->foto);
            }
            $image_file = $request->file('foto')->store('foto', 'public');
            $sub_konstruksi->foto = $image_file;
        }
        $sub_konstruksi->save();

        return redirect()->route('sub_konstruksi.index')->with('status', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = SubKonstruksi::findOrFail($id);
        return view('pages.admin.sub_konstruksi.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = SubKonstruksi::findOrFail($id);
        $anggota = DataPerusahaan::all();
        return view('pages.admin.sub_konstruksi.edit', [
            'anggota' => $anggota,
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
        $sub_konstruksi = SubKonstruksi::findOrFail($id);

        \Validator::make($request->all(), [

        ]);

        $sub_konstruksi->no_seri_formulir = $request->get('no_seri_formulir');
        $sub_konstruksi->anggota_id = $request->get('anggota_id');
        $sub_konstruksi->tanggal_masuk = $request->get('tanggal_masuk');
        $sub_konstruksi->berlaku_sampai = $request->get('berlaku_sampai');
        $sub_konstruksi->registrasi_tahun_ke_2 = $request->get('registrasi_tahun_ke_2');
        $sub_konstruksi->registrasi_tahun_ke_3 = $request->get('registrasi_tahun_ke_3');
        $sub_konstruksi->tenaga_ahli = $request->get('tenaga_ahli');
        if ($request->file('foto')) {
            if ($sub_konstruksi->foto && file_exists(storage_path('app/public/' . $sub_konstruksi->foto))) {
                \Storage::delete('public' . $sub_konstruksi->foto);
            }
            $image_file = $request->file('foto')->store('foto', 'public');
            $sub_konstruksi->foto = $image_file;
        }
        $sub_konstruksi->save();

        return redirect()->route('sub_konstruksi.index')->with('status', 'Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SubKonstruksi::findOrFail($id);
        $item->delete();
        return redirect()->route('sub_konstruksi.index');
    }
}