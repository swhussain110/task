<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RolesManagement extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('role.alluser', ['users'=>$users]);
    }

    public function editrole($id)
    {
        $user = User::find($id);
        $roles = Role::All();
        return view('role.editrole',['user'=>$user,'roles'=>$roles]);
    }

    public function assignrole(Request $request)
    {
        $user = User::find($request->userid);
        $user->roles()->detach();
        $user->assignRole($request->role);

        return response()->json([
            "status"=>200,
            "message"=>"Role Asigned Succussfully"
        ]);
    }
}
