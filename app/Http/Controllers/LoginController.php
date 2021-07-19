<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function authenticate(Request $request){

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password, 'status' => 1])) {
            // Jika berhasil login

		    return redirect('/');
            //return redirect()->intended('/details');
        }

		return redirect('/login_w')->with('status','User Tidak Aktif, Silahkan Hubungi Admin !');
    }

    public function logout(Request $request)
    {
       Auth::logout();
       return redirect('login')->withSuccess('Terimakasih, selamat datang kembali!');
    }
}
