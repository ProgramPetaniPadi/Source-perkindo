<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = StrukturOrganisasi::all();
        return view('pages.admin.struktur-organisasi.index', [
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
        $item = StrukturOrganisasi::findOrFail($id);

        return view('pages.admin.struktur-organisasi.edit', ['item' => $item]);
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

        $organisasi = StrukturOrganisasi::findOrFail($id);
        \Validator::make($request->all(), [


        ]);

        $organisasi->periode = $request->get('periode');


        if ($request->file('gambar')) {
            if ($organisasi->gambar && file_exists(storage_path('app/public/' . $organisasi->gambar))) {
                \Storage::delete('public' . $organisasi->gambar);
            }
            $image_file = $request->file('gambar')->store('gambar', 'public');
            $organisasi->gambar = $image_file;
        }

        $organisasi->save();

        return redirect()->route('struktur-organisasi.index')->with('status', 'Data successfully updated');
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