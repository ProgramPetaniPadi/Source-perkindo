<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriDownload;
use Illuminate\Http\Request;

class KategoriDownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = KategoriDownload::all();
        return view('pages.admin.kategori_download.index', [
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
        return view('pages.admin.kategori_download.create');
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
            "kategori_download" => "required",

        ])->validate();
        $KategoriDownload = new KategoriDownload();
        $KategoriDownload->kategori_download = $request->get('kategori_download');
        $KategoriDownload->save();

        return redirect()->route('kategori_download.index')->with('status', 'Created successfully!');
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
        $item = KategoriDownload::findOrFail($id);

        return view('pages.admin.kategori_download.edit', [
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
        $KategoriDownload = KategoriDownload::findOrFail($id);

        \Validator::make($request->all(), [
            "kategori_download" => "required",

        ]);
        $KategoriDownload->kategori_download = $request->get('kategori_download');


        // if ($request->file('carousel_image')) {
        //     if ($agama->carousel_image && file_exists(storage_path('app/public/' . $agama->carousel_image))) {
        //         \Storage::delete('public' . $agama->carousel_image);
        //     }
        //     $carousel_image_file = $request->file('carousel_image')->store('agama', 'public');
        //     $agama->carousel_image = $carousel_image_file;
        // }

        $KategoriDownload->save();

        return redirect()->route('kategori_download.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = KategoriDownload::findOrfail($id);
        $item->delete();

        return redirect()->route('kategori_download.index');
    }
}