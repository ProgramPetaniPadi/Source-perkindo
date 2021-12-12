<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LAnggota;
use Illuminate\Support\Facades\Hash;
class LoginAnggotaController extends Controller
{
    public function index()
    {
        return view('pages.anggota.LoginAnggota');
    }
    public function cekLogin(Request $request)
    {


        $login = LAnggota::where('nama_perusahaan', '=', $request->nama_perusahaan)->first();
        if (!$login) {
            return back()->with('tes');
        }
        else {
            if (Hash::check($request->password, $login->password)) {
                $request->session()->put('LoggedUser', '$login->id');
                return redirect()->route('pages.anggota.dashboard');
            // return view('pages.anggota.dashboard');
            }
            else {
                return back()->with('tes');
            }
        }
    }
}