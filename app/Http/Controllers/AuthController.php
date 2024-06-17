<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect('/home');
        } else {
            return redirect('/')->with([
                'info' => 'Akun Gagal Login!',
                'warna' => 'danger'
            ]);
        }
    }

    public function registrasi(Request $req)
    {
        if ($req->password1 == $req->password2) {
            User::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password1)
            ]);
            return redirect('/')->with([
                'info' => 'Akun Berhasil Dibuat!',
                'warna' => 'success'
            ]);;
        } else {
        }
    }

    public function repass(Request $req)
    {

        if ($req->password1 == $req->password2) {
            $user = Auth::user();

            $user->password = bcrypt($req->password1);

            $user->save();

            return redirect("/profil")->with('info', 'Password Berhasil Diubah');
        } else {
            return redirect("/profil")->with('info', 'Password Gagal Diubah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/')->with([
            'info' => 'Berhasil Logout!',
            'warna' => 'success'
        ]);
    }
}
