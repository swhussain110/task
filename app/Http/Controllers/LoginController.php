<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        if(!Auth::check()){
        return view("login.login");
        } else {
            return redirect('dashboard');
        }
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect(route('dashboard'));
        } else {
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
        
    }
}
