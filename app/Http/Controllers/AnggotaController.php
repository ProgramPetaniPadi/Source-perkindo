<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataPerusahaan;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller

{
    public function index()
    {
        $anggota = DataPerusahaan::all();
        return view('keanggotaan1', [
            'anggota' => $anggota,

        ]);
    }
}