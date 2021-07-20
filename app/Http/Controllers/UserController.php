<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function adduser()
    {
        return view('user.adduser');
    }
    public function storeuser(Request $request)
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
            if($user->save()){
                $user->assignRole('Support');
                return response()->json([
                    'status'=>200,
                    'message'=>'Registered Successfully',
                ]);
            }
        }
        
    }
    public function edituser($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('user.edituser',['user'=>$user]);
    }
    public function updateuser(Request $request)
    {
        if(Auth::user()->roles[0]->name == "Employee"){
            // dd($request->id);
            // $user = User::find($request->id);
            $approval = new Approval();
            $approval->user_id = $request->id;
            $approval->name = $request->name;
            $approval->email = $request->email;

            if($approval->save()){
                return response()->json(['status'=>200, 'message'=>'Saved For Approval']);
            }
        } else {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();


            return response()->json(['status'=>200, 'message'=>'Updated Successfuly']); 

        }

        
        
        
    }


    public function userslist()
    {
        $users = User::all();
        return view('user.listusers', ['users'=>$users]);
    }


    public function deleteuser($id)
    {
        $user=User::find($id);
        $user->delete();

        return redirect()->back()->with(['message'=>'Deleted Successfully']);
        
    }

    public function searchuser($name="Support")
    {
        if (request()->get('name')) {
            $users = DB::table('users')->where('name', 'LIKE', '%'.request()->get('name').'%')->get();
            return view('user.searchuser', ['users'=>$users]);
        }
        $users=User::all();
        return view('user.searchuser', ['users'=>$users]);
    }
}
