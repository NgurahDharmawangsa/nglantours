<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // dd(Auth::check());
            $user = Auth::user()->role_id;
            if($user == 1){
                return redirect()->intended('/dashboard');
            }elseif($user == 2){
                return redirect()->intended('/');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Email Or Password Wrong');

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
