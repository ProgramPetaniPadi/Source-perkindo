<?php

namespace App\Http\Controllers\admin;

use App\Models\Kta;
use App\Models\Agama;
use App\Models\Jabatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Models\KotaKabupaten;
use App\Models\DataPerusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DataPerusahaanController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DataPerusahaan::all();
        return view('pages.admin.data_perusahaan.index', [
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

        $kta = Kta::all();
        $provinsi = Provinsi::all();
        $kota_kabupaten = KotaKabupaten::all();
        return view('pages.admin.data_perusahaan.create', [
            'kta' => $kta,
            'provinsi' => $provinsi,
            'kota_kabupaten' => $kota_kabupaten,
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
            'nomor_keanggotaan' => "required",
            'nama_perusahaan' => "required",
            'nama_penanggung_jawab' => "required",
            'alamat_perusahaan' => "required",
            'provinsi_id' => "required",
            'kota_kabupaten_id' => "required",
            'telepon_telex_fax' => "required",
            'no_hp_1' => "required",
            'no_hp_2' => "required",
            'password' => "required",
            'email' => "required",
            'logo' => "required",
        ]);


        $data_perusahaan = new DataPerusahaan();

        $data_perusahaan->nomor_keanggotaan = $request->get('nomor_keanggotaan');
        $data_perusahaan->nama_perusahaan = $request->get('nama_perusahaan');
        $data_perusahaan->nama_penanggung_jawab = $request->get('nama_penanggung_jawab');
        $data_perusahaan->alamat_perusahaan = $request->get('alamat_perusahaan');
        $data_perusahaan->provinsi_id = $request->get('provinsi_id');
        $data_perusahaan->kota_kabupaten_id = $request->get('kota_kabupaten_id');
        $data_perusahaan->telepon_telex_fax = $request->get('telepon_telex_fax');
        $data_perusahaan->no_hp_1 = $request->get('no_hp_1');
        $data_perusahaan->no_hp_2 = $request->get('no_hp_2');
        $data_perusahaan->email = $request->get('email');
        $data_perusahaan->password = Hash::make($request->get('password'));




        if ($request->file('logo')) {
            if ($data_perusahaan->logo && file_exists(storage_path('app/public/' . $data_perusahaan->logo))) {
                \Storage::delete('public' . $data_perusahaan->logo);
            }
            $image_file = $request->file('logo')->store('logo', 'public');
            $data_perusahaan->logo = $image_file;
        }

        $data_perusahaan->save();
        $data_perusahaan_id = $data_perusahaan->id;
        $kta = new Kta();

        $kta->kta_berlaku_sampai = $request->get('kta_berlaku_sampai');
        $kta->anggota_id = $data_perusahaan_id;


        if ($request->file('file_kta')) {
            if ($kta->file_kta && file_exists(storage_path('app/public/' . $kta->file_kta))) {
                \Storage::delete('public' . $kta->file_kta);
            }
            $image_file = $request->file('file_kta')->store('file_kta', 'public');
            $kta->file_kta = $image_file;
        }
        $kta->save();
        return redirect()->route('data_perusahaan.index')->with('status', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DataPerusahaan::findOrFail($id);
        $kta = Kta::findOrFail($id);
        $provinsi = Provinsi::all();
        $kota_kabupaten = KotaKabupaten::all();
        return view('pages.admin.data_perusahaan.show', [
            'kta' => $kta,
            'provinsi' => $provinsi,
            'kota_kabupaten' => $kota_kabupaten,
            'item' => $item
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
        $item = DataPerusahaan::findOrFail($id);
        $provinsi = Provinsi::all();
        $kota_kabupaten = KotaKabupaten::all();
        return view('pages.admin.data_perusahaan.edit', [
            'provinsi' => $provinsi,
            'kota_kabupaten' => $kota_kabupaten,
            'item' => $item,

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
        $data_perusahaan = DataPerusahaan::findOrFail($id);

        \Validator::make($request->all(), [
            'nomor_keanggotaan' => "required",
            'nama_perusahaan' => "required",
            'nama_penanggung_jawab' => "required",
            'alamat_perusahaan' => "required",
            'provinsi_id' => "required",
            'kota_kabupaten_id' => "required",
            'telepon_telex_fax' => "required",
            'no_hp_1' => "required",
            'no_hp_2' => "required",
            'password' => "required",
            'email' => "required",
            'logo' => "required",

        ]);

        $data_perusahaan->nomor_keanggotaan = $request->get('nomor_keanggotaan');
        $data_perusahaan->nama_perusahaan = $request->get('nama_perusahaan');
        $data_perusahaan->nama_penanggung_jawab = $request->get('nama_penanggung_jawab');
        $data_perusahaan->alamat_perusahaan = $request->get('alamat_perusahaan');
        $data_perusahaan->provinsi_id = $request->get('provinsi_id');
        $data_perusahaan->kota_kabupaten_id = $request->get('kota_kabupaten_id');
        $data_perusahaan->telepon_telex_fax = $request->get('telepon_telex_fax');
        $data_perusahaan->no_hp_1 = $request->get('no_hp_1');
        $data_perusahaan->no_hp_2 = $request->get('no_hp_2');
        $data_perusahaan->password = $request->get('password');
        $data_perusahaan->email = $request->get('email');

        if ($request->file('logo')) {
            if ($data_perusahaan->logo && file_exists(storage_path('app/public/' . $data_perusahaan->logo))) {
                \Storage::delete('public' . $data_perusahaan->logo);
            }
            $image_file = $request->file('logo')->store('logo', 'public');
            $data_perusahaan->logo = $image_file;
        }

        $data_perusahaan->save();



        return redirect()->route('data_perusahaan.index')->with('status', 'Update successfully!');
    }

    public function editkta($id)
    {
        $item = Kta::findOrFail($id);

        return view('pages.admin.data_perusahaan.editkta', [
            'item' => $item,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatekta(Request $request, $id)
    {
        $kta = Kta::findOrFail($id);

        \Validator::make($request->all(), [
            'kta_berlaku_sampai' => "required",

        ]);
        $kta->kta_berlaku_sampai = $request->get('kta_berlaku_sampai');

        if ($request->file('file_kta')) {
            if ($kta->file_kta && file_exists(storage_path('app/public/' . $kta->file_kta))) {
                \Storage::delete('public' . $kta->file_kta);
            }
            $image_file = $request->file('file_kta')->store('file_kta', 'public');
            $kta->file_kta = $image_file;
        }

        $kta->save();



        return redirect()->route('data_perusahaan.index')->with('status', 'update successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DataPerusahaan::findOrfail($id);
        $item->delete();

        return redirect()->route('data_perusahaan.index');
    }
}