<?php

namespace App\Http\Controllers\admin;

use App\Models\FotoPengurus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FotoPengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = FotoPengurus::all();
        return view('pages.admin.foto-pengurus.index', [
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
        $item = FotoPengurus::findOrFail($id);

        return view('pages.admin.foto-pengurus.edit', ['item' => $item]);
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

        $fotopengurus = FotoPengurus::findOrFail($id);
        \Validator::make($request->all(), [


        ]);
        $fotopengurus->periode = $request->get('periode');


        if ($request->file('foto')) {
            if ($fotopengurus->foto && file_exists(storage_path('app/public/' . $fotopengurus->foto))) {
                \Storage::delete('public' . $fotopengurus->foto);
            }
            $image_file = $request->file('foto')->store('foto', 'public');
            $fotopengurus->foto = $image_file;
        }

        $fotopengurus->save();

        return redirect()->route('foto-pengurus.index')->with('status', 'Data successfully updated');
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