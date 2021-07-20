<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Approval;
use Illuminate\Http\Request;

class ApprovalControllar extends Controller
{
    public function index()
    {
        $users = Approval::all();
        return view('approval.approvalslist',['users'=>$users]);
    }

        public function approve(Request $request, $id)
    {
        $approval = Approval::find($request->route('id'));
        $user = User::find($request->route('id'));
        $user->name = $approval->name;
        $user->email = $approval->email;

        $user->save();

        $approval->delete();
        return redirect()->back()->with(['message'=>"Updated Successfully"]);

    }
}
