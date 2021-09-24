<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\KategoriDownload;
use Illuminate\Http\Request;


class DownloadController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Download::all();
        return view('pages.admin.download.index', [
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
        $kategori_download = KategoriDownload::all();
        return view('pages.admin.download.create', [
            'kategori_download' => $kategori_download
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
            "kategori_download_id" => "required",
            "dokumen" => "required",
            "judul" => "required"

        ]);
        $download = new Download();
        $download->kategori_download_id = $request->get('kategori_download_id');

        if ($request->file('dokumen')) {
            if ($download->dokumen && file_exists(storage_path('app/public/' . $download->dokumen))) {
                \Storage::delete('public' . $download->dokumen);
            }
            $dokumen_file = $request->file('dokumen')->store('download', 'public');
            $download->dokumen = $dokumen_file;
        }
        $download->judul = $request->get('judul');
        $download->save();

        return redirect()->route('download.index')->with('status', 'Created successfully!');
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
        $item = Download::findOrFail($id);
        $kategori_download = KategoriDownload::all();

        return view('pages.admin.download.edit', [
            'kategori_download' => $kategori_download,
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
        $download = Download::findOrFail($id);

        \Validator::make($request->all(), [


        ]);

        $download->kategori_download_id = $request->get('kategori_download_id');

        if ($request->file('dokumen')) {
            if ($download->dokumen && file_exists(storage_path('app/public/' . $download->dokumen))) {
                \Storage::delete('public' . $download->dokumen);
            }
            $dokumen_file = $request->file('dokumen')->store('download', 'public');
            $download->dokumen = $dokumen_file;
        }
        $download->judul = $request->get('judul');
        $download->save();

        return redirect()->route('download.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Download::findOrfail($id);
        $item->delete();

        return redirect()->route('download.index');
    }
}