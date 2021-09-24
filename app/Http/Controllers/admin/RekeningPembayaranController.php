<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RekeningPembayaran;
use Illuminate\Http\Request;
use Validator;





class RekeningPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = RekeningPembayaran::all();
        return view('pages.admin.rekening.index', [
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
        return view('pages.admin.rekening.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama_bank' => "required", 'no_rek' => "required", 'atas_nama' => "required"
        ])->validate();

        $rekening = new RekeningPembayaran();
        $rekening->nama_bank = $request->get('nama_bank');
        $rekening->no_rek = $request->get('no_rek');
        $rekening->atas_nama = $request->get('atas_nama');
        $rekening->save();

        return redirect()->route('rekening.index')->with('status', 'Created successfully!');
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
        $item = RekeningPembayaran::findOrFail($id);

        return view('pages.admin.rekening.edit', ['item' => $item]);
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
        $rekening = RekeningPembayaran::findOrFail($id);

        Validator::make($request->all(), [
            'nama_bank' => "required", 'no_rek' => "required", 'atas_nama' => "required"
        ])->validate();

        $rekening->nama_bank = $request->get('nama_bank');
        $rekening->no_rek = $request->get('no_rek');
        $rekening->atas_nama = $request->get('atas_nama');

        $rekening->save();

        return redirect()->route('rekening.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = RekeningPembayaran::findOrfail($id);
        $item->delete();

        return redirect()->route('rekening.index');
    }
}