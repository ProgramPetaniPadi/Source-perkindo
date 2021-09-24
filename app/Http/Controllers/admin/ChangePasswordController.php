<?php



namespace App\Http\Controllers\admin;


use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{
    /**
     * Change the current password
     * @param Request $request
     * @return Renderable
     */

    public function index($id)
    {
        $item = User::findOrFail($id);

        return view('pages.admin.ubah_password.index', [
            'item' => $item,

        ]);
    }

    public function store(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $userPassword = $user->password;

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['ubah_password' => 'password lama anda tidak sesuai']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('status', 'password successfully updated');
    }
}