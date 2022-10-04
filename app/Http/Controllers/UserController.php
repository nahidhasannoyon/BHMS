<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function store(Request $request)
    {
        try {
            $admin = new User();
            $admin->name = $request->name;
            $admin->role = $request->role;
            $admin->email = $request->email;
            $admin->password = Hash::make('$request->password');
            $admin->save();
            toast('New User Added.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
