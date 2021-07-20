<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterationController extends Controller
{
    public function register()
    {
        return view('registration.registration');
    }

    public function store(Request $request)
    {
        $isValidated = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        if($isValidated){
            $user = new User();
            $user->name= $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->assignRole('Support');
            return redirect()->back()->with("message","Registerd Successfully");
        }
        
    }
}