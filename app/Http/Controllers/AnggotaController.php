<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPerusahaan;
use App\Http\Controllers\Controller;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = DataPerusahaan:: all();
        return view('keanggotaan1', [
           'anggota'=>$anggota
        ]);
    }
    
}