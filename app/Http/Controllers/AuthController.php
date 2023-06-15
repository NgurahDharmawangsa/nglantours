<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 2
        ]);

        Session::flash('success', 'berhasil');
        Session::flash('message', 'Berhasil Mendaftar');
        return redirect('/login');
    }
}
