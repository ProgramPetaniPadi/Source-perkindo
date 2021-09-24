<?php

namespace App\Http\Controllers\admin;


use App\Models\Berita;
use App\Models\Beranda1;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Berita::all();
        return view('pages.admin.berita.index', [
            'item' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Berita::all();
        return view('pages.admin.berita.create', [
            'item' => $items
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
            'judul' => "required",
            'isi' => "required",
            'foto' => "required",


        ]);
        $berita = new Berita();
        $berita->judul = $request->get('judul');
        $berita['url'] = Str::slug($request->judul);
        $berita->isi = $request->get('isi');
        $berita->publish = $request->get('publish');


        if ($request->file('foto')) {
            if ($berita->foto && file_exists(storage_path('app/public/' . $berita->foto))) {
                \Storage::delete('public' . $berita->foto);
            }
            $image_file = $request->file('foto')->store('foto', 'public');
            $berita->foto = $image_file;
        }
        $berita->save();

        return redirect()->route('berita.index')->with('status', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Berita::findOrFail($id);
        return view('pages.admin.berita.show', [

            'item' => $item
        ]);
    }

    public function showdetail($id)
    {
        $item = Berita::findOrFail($id);
        $wa = Beranda1::latest()->first()->nomor_hp;
        return view('detail_berita', [
            'item' => $item, 'wa' => $wa
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
        $item = Berita::findOrFail($id);

        return view('pages.admin.berita.edit', [
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
        $berita = Berita::findOrFail($id);
        \Validator::make($request->all(), [
            'judul' => "required",
            'isi' => "required",
            'foto' => "required",


        ]);

        $berita->judul = $request->get('judul');
        $berita->isi = $request->get('isi');
        $berita->publish = $request->get('publish');


        if ($request->file('foto')) {
            if ($berita->foto && file_exists(storage_path('app/public/' . $berita->foto))) {
                \Storage::delete('public' . $berita->foto);
            }
            $image_file = $request->file('foto')->store('foto', 'public');
            $berita->foto = $image_file;
        }
        $berita->save();

        return redirect()->route('berita.index')->with('status', 'Created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Berita::findOrfail($id);
        $item->delete();

        return redirect()->route('berita.index');
    }
}