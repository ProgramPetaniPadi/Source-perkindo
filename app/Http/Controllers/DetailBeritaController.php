<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Beranda1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Faker\Provider\Lorem;

class DetailBeritaController extends Controller
{ public function index()
    {
   
        $berita = Berita::where('publish', 1)->get();
        $wa = Beranda1::latest()->first()->nomor_hp;
        return view('detail_berita', [
              'berita' => $berita, 'wa' => $wa

           

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
}