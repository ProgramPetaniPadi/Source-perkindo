<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    protected $redirectTo = '/anggota/home';
    public function __construct()
    {
        $this->middleware('guest:anggota')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.login.anggota');
    }
    public function username()
    {
        return 'nama_perusahaan';
    }
    protected function guard()
    {
        return Auth::guard('anggota');
    }
}