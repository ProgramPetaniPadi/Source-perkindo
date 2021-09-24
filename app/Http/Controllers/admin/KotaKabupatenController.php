<?php

namespace App\Http\Controllers\admin;

use App\Models\Provinsi;

use Illuminate\Http\Request;
use App\Models\KotaKabupaten;
use App\Http\Controllers\Controller;

class KotaKabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::all();
        $items = KotaKabupaten::all();
        return view('pages.admin.kota_kabupaten.index', [
            'items' => $items,
            'provinsi' => $provinsi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('pages.admin.kota_kabupaten.create', [
            'provinsi' => $provinsi,
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

        $validated = $request->validate([
            'provinsi_id' => "required",
            'kota_kabupaten' => "required",

        ]);
        $kota_kabupaten = new KotaKabupaten();
        $kota_kabupaten->provinsi_id = $request->get('provinsi_id');
        $kota_kabupaten->kota_kabupaten = $request->get('kota_kabupaten');
        $kota_kabupaten->save();

        return redirect()->route('kota_kabupaten.index')->with('status', 'Created successfully!');
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
        $item = KotaKabupaten::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('pages.admin.kota_kabupaten.edit', [
            'provinsi' => $provinsi,
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
        $kota_kabupaten = KotaKabupaten::findOrFail($id);

        \Validator::make($request->all(), [
            "provinsi_id" => "required",
            "kota_kabupaten" => "required"

        ]);

        $kota_kabupaten->provinsi_id = $request->get('provinsi_id');
        $kota_kabupaten->kota_kabupaten = $request->get('kota_kabupaten');
        $kota_kabupaten->save();

        return redirect()->route('kota_kabupaten.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = KotaKabupaten::findOrfail($id);
        $item->delete();

        return redirect()->route('kota_kabupaten.index');
    }
}