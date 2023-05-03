<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
    $creadentials = $request->validate([
        "name" => 'required',
        "password" => 'required'
    ]);
    if (Auth::attempt($creadentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }
        return redirect()->back()->withErrors("Login Gagal, Silahkan Coba Kembali");
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
