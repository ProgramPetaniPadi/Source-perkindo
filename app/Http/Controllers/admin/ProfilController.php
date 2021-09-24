<?php

namespace App\Http\Controllers\admin;

use App\Models\TentangKami;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TentangKami::all();
        return view('pages.admin.tentang_kami.index', [
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
        return view('pages.admin.tentang_kami.create');
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
            "deskripsi" => "required", "visi" => "required", "misi" => "required",
            "sejarah" => "required", "nomor_hp" => "required", "email1" => "required",
            "email2" => "required", "map" => "required", "instagram" => "required"

        ])->validate();
        $tentang_kami = new TentangKami();
        $tentang_kami->deskripsi = $request->get('deskripsi');
        $tentang_kami->visi = $request->get('visi');
        $tentang_kami->misi = $request->get('misi');
        $tentang_kami->sejarah = $request->get('sejarah');
        $tentang_kami->nomor_hp = $request->get('nomor_hp');
        $tentang_kami->email1 = $request->get('email1');
        $tentang_kami->email2 = $request->get('email2');
        $tentang_kami->map = $request->get('map');
        $tentang_kami->instagram = $request->get('instagram');
        $tentang_kami->facebook = $request->get('facebook');
        $tentang_kami->save();

        return redirect()->route('tentang_kami.index')->with('status', 'Created successfully!');
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
        $item = TentangKami::findOrFail($id);

        return view('pages.admin.tentang_kami.edit', [
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

        $tentang_kami = TentangKami::findOrFail($id);
        \Validator::make($request->all(), [


        ]);

        $tentang_kami->deskripsi = $request->get('deskripsi');
        $tentang_kami->visi = $request->get('visi');
        $tentang_kami->misi = $request->get('misi');
        $tentang_kami->sejarah = $request->get('sejarah');
        $tentang_kami->nomor_hp = $request->get('nomor_hp');
        $tentang_kami->email1 = $request->get('email1');
        $tentang_kami->email2 = $request->get('email2');
        $tentang_kami->alamat = $request->get('alamat');
        $tentang_kami->map = $request->get('map');
        $tentang_kami->instagram = $request->get('instagram');
        $tentang_kami->facebook = $request->get('facebook');
        $tentang_kami->save();

        return redirect()->route('tentang_kami.index')->with('status', 'Created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TentangKami::findOrfail($id);
        $item->delete();

        return redirect()->route('tentang_kami.index');
    }
}