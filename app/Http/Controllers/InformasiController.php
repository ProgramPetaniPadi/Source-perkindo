<?php

namespace App\Http\Controllers;


use App\Models\StrukturOrganisasi;
use App\Http\Controllers\Controller;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gambar = StrukturOrganisasi::all();
        return view('informasi', [
            'gambar' => $gambar
        ]);
    }

}