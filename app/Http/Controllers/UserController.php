<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('admin.user.list', compact('users'));
    }
    public function add(Request $request)
    {
        try {
            $email = $request->email;
            if (User::where('email', $email)->exists()) {
                toast('Email already exists', 'error');
                return redirect()->back();
            }
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

    public function edit($id)
    {
        try {
            $user = User::where('id', $id)->first();
            return view('admin.user.edit', compact('user'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->name = $request->name;
            $user->role = $request->role;
            $user->email = $request->email;
            if ($request->password != null) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            toast('User Updated.', 'success');
            return
                redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            toast('User Deleted.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
