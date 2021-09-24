<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\Beranda1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TentangKami;

class BerandaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $items = Beranda1::all();
        $berita = Berita::where('publish', 1)->get();
        $footer = Beranda1::all();
        $wa = Beranda1::latest()->first()->nomor_hp;
        return view('layouts.main', [
            'items' => $items,    'berita' => $berita,'footer'=>$footer,
            'wa'=>$wa

           

        ]);
    }

 



}

 