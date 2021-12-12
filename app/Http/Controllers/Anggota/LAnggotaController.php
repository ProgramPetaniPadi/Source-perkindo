<?php



namespace App\Http\Controllers\LAnggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LAnggota;
use Illuminate\Support\Facades\Auth;
class LAnggotaController extends Controller
{

    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'nama_perusahaan' => 'required|nama_perusahaan|exists:anggota,nama_perusahaan',
            'password' => 'required|min:5|max:30'
        ], [
            'nama_perusahaan.exists' => 'This nama_perusahaan is not exists in anggota table'
        ]);

        $creds = $request->only('nama_perusahaan', 'password');

        if (Auth::guard('anggota')->attempt($creds)) {
            return redirect()->route('pages.anggota.dashboard');
        }
        else {
            return redirect()->route('pages.anggota.LoginAnggota')->with('fail', 'Incorrect credentials');
        }
    }

// function logout()
// {
//     Auth::guard('anggota')->logout();
//     return redirect('/');
// }
}