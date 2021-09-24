<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\DataPerusahaan;
use App\Models\SubNonKonstruksi;
use App\Http\Controllers\Controller;

class SubNonKonstruksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SubNonKonstruksi::all();
        $anggota = DataPerusahaan::get()->count();
        return view('pages.admin.sub_non_konstruksi.index', [
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
        $item = SubNonKonstruksi::all();
        return view('pages.admin.sub_non_konstruksi.create', [
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
        $sub_non_konstruksi = new SubNonKonstruksi();
        $sub_non_konstruksi->no_seri_formulir = $request->get('no_seri_formulir');
        $sub_non_konstruksi->anggota_id = $request->get('anggota_id');
        $sub_non_konstruksi->tanggal_dikeluarkan_sbu = $request->get('tanggal_dikeluarkan_sbu');
        $sub_non_konstruksi->berlaku_sampai = $request->get('berlaku_sampai');
        $sub_non_konstruksi->pj_operasional = $request->get('pj_operasional');
        if ($request->file('foto')) {
            if ($sub_non_konstruksi->foto && file_exists(storage_path('app/public/' . $sub_non_konstruksi->foto))) {
                \Storage::delete('public' . $sub_non_konstruksi->foto);
            }
            $image_file = $request->file('foto')->store('foto', 'public');
            $sub_non_konstruksi->foto = $image_file;
        }
        $sub_non_konstruksi->save();

        return redirect()->route('sub_non_konstruksi.index')->with('status', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = SubNonKonstruksi::findOrFail($id);
        return view('pages.admin.sub_non_konstruksi.show', [
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
        $item = SubNonKonstruksi::findOrFail($id);
        $anggota = DataPerusahaan::all();
        return view('pages.admin.sub_non_konstruksi.edit', [
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
        $sub_non_konstruksi = SubNonKonstruksi::findOrFail($id);

        \Validator::make($request->all(), [

        ]);

        $sub_non_konstruksi->no_seri_formulir = $request->get('no_seri_formulir');
        $sub_non_konstruksi->anggota_id = $request->get('anggota_id');
        $sub_non_konstruksi->tanggal_dikeluarkan_sbu = $request->get('tanggal_dikeluarkan_sbu');
        $sub_non_konstruksi->berlaku_sampai = $request->get('berlaku_sampai');
        $sub_non_konstruksi->pj_operasional = $request->get('pj_operasional');
        if ($request->file('foto')) {
            if ($sub_non_konstruksi->foto && file_exists(storage_path('app/public/' . $sub_non_konstruksi->foto))) {
                \Storage::delete('public' . $sub_non_konstruksi->foto);
            }
            $image_file = $request->file('foto')->store('foto', 'public');
            $sub_non_konstruksi->foto = $image_file;
        }
        $sub_non_konstruksi->save();

        return redirect()->route('sub_non_konstruksi.index')->with('status', 'Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SubNonKonstruksi::findOrFail($id);
        $item->delete();
        return redirect()->route('sub_non_konstruksi.index');
    }
}