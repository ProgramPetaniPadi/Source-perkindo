<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agama;



class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Agama::all();
        return view('pages.admin.agama.index', [
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
        return view('pages.admin.agama.create');
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
            "agama" => "required",

        ])->validate();
        $agama = new Agama();
        $agama->agama = $request->get('agama');
        $agama->save();

        return redirect()->route('agama.index')->with('status', 'Created successfully!');
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
        $item = Agama::findOrFail($id);

        return view('pages.admin.agama.edit', [
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
        $agama = Agama::findOrFail($id);

        \Validator::make($request->all(), [
            "agama" => "required",

        ]);
        $agama->agama = $request->get('agama');


        // if ($request->file('carousel_image')) {
        //     if ($agama->carousel_image && file_exists(storage_path('app/public/' . $agama->carousel_image))) {
        //         \Storage::delete('public' . $agama->carousel_image);
        //     }
        //     $carousel_image_file = $request->file('carousel_image')->store('agama', 'public');
        //     $agama->carousel_image = $carousel_image_file;
        // }

        $agama->save();

        return redirect()->route('agama.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Agama::findOrfail($id);
        $item->delete();

        return redirect()->route('agama.index');
    }



}