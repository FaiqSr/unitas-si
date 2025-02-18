<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{


    public function showLoginForm(){
        return view('dashboard.login');
    }
    
    

    public function authenticate(Request $request) 
    {
        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email yang anda masukkan belum terdaftar.',
        ])->onlyInput('email');
        
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
    
}
