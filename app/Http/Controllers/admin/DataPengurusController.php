<?php

namespace App\Http\Controllers\admin;

use App\Models\Agama;


use App\Models\Jabatan;
use App\Models\DataPengurus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;




class DataPengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DataPengurus::all();
        return view('pages.admin.data_pengurus.index', [
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

        $agama = Agama::all();
        $jabatan = Jabatan::all();
        return view('pages.admin.data_pengurus.create', [
            'agama' => $agama,
            'jabatan' => $jabatan,
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
            'nik' => "required",
            'nama' => "required",
            'no_ktp' => "required",
            'tempat_lahir' => "required",
            'tanggal_lahir' => "required",
            'jenis_kelamin' => "required",
            'agama_id' => "required",

            'jabatan_id' => "required",

        ]);


        $data_pengurus = new DataPengurus();
        $data_pengurus->nik = $request->get('nik');
        $data_pengurus->nama = $request->get('nama');
        $data_pengurus->no_ktp = $request->get('no_ktp');
        $data_pengurus->tempat_lahir = $request->get('tempat_lahir');
        $data_pengurus->tanggal_lahir = $request->get('tanggal_lahir');
        $data_pengurus->jenis_kelamin = $request->get('jenis_kelamin');
        $data_pengurus->agama_id = $request->get('agama_id');
        $data_pengurus->alamat = $request->get('alamat');
        $data_pengurus->no_hp_1 = $request->get('no_hp_1');
        $data_pengurus->no_hp_2 = $request->get('no_hp_2');
        $data_pengurus->jabatan_id = $request->get('jabatan_id');
        $data_pengurus->email = $request->get('email');
        $data_pengurus->password = Hash::make("perkindo123");

        if ($request->file('foto')) {
            if ($data_pengurus->foto && file_exists(storage_path('app/public/' . $data_pengurus->foto))) {
                \Storage::delete('public' . $data_pengurus->foto);
            }
            $image_file = $request->file('foto')->store('foto', 'public');
            $data_pengurus->foto = $image_file;
        }

        $data_pengurus->save();

        return redirect()->route('data_pengurus.index')->with('status', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DataPengurus::findOrFail($id);
        $agama = Agama::all();
        $jabatan = Jabatan::all();
        return view('pages.admin.data_pengurus.show', [
            'agama' => $agama,
            'jabatan' => $jabatan,
            'agama_id' => $item
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
        $item = DataPengurus::findOrFail($id);
        $agama = Agama::all();
        $jabatan = Jabatan::all();
        return view('pages.admin.data_pengurus.edit', [
            'agama' => $agama,
            'jabatan' => $jabatan,
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
        $data_pengurus = DataPengurus::findOrFail($id);

        \Validator::make($request->all(), [
            'nik' => "required",
            'nama' => "required",
            'no_ktp' => "required",
            'tempat_lahir' => "required",
            'tanggal_lahir' => "required",
            'jenis_kelamin' => "required",
            'agama_id' => "required",
            'jabatan_id' => "required",

        ]);

        $data_pengurus->nik = $request->get('nik');
        $data_pengurus->nama = $request->get('nama');
        $data_pengurus->no_ktp = $request->get('no_ktp');
        $data_pengurus->tempat_lahir = $request->get('tempat_lahir');
        $data_pengurus->tanggal_lahir = $request->get('tanggal_lahir');
        $data_pengurus->jenis_kelamin = $request->get('jenis_kelamin');
        $data_pengurus->agama_id = $request->get('agama_id');
        $data_pengurus->alamat = $request->get('alamat');
        $data_pengurus->no_hp_1 = $request->get('no_hp_1');
        $data_pengurus->no_hp_2 = $request->get('no_hp_2');
        $data_pengurus->jabatan_id = $request->get('jabatan_id');
        $data_pengurus->email = $request->get('email');
        $data_pengurus->password = Hash::make("perkindo123");

        if ($request->file('foto')) {
            if ($data_pengurus->foto && file_exists(storage_path('app/public/' . $data_pengurus->foto))) {
                \Storage::delete('public' . $data_pengurus->foto);
            }
            $image_file = $request->file('foto')->store('foto', 'public');
            $data_pengurus->foto = $image_file;
        }
        $data_pengurus->save();

        return redirect()->route('data_pengurus.index')->with('status', 'Created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DataPengurus::findOrfail($id);
        $item->delete();

        return redirect()->route('data_pengurus.index');
    }
}