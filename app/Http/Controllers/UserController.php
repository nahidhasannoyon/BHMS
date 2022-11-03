<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users_list()
    {
        $users = User::all();
        return view('admin.user.users_list', compact('users'));
    }
    public function add_user(Request $request)
    {
        try {
            $admin = new User();
            $admin->name = $request->name;
            $admin->role = $request->role;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->save();
            toast('New User Added.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
