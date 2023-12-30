<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        
        return view('/login',[
        'judul' => 'Halaman Login'
        ]);
    }
    
    public function login(Request $request) {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('login','Berhasil Login');
        }
        return back()->withErrors(['name'=>'Nama Harus Diisi','password'=>'Passwors Salah']);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success','Logout Berhasil');
    }

    
    public function dashboard() {
        if (auth()->user()->role != 1) {
           return redirect('/sales');
        }
        return view('home', [
            'judul' => 'Dashboard'
        ]);
        
    }
    
}
