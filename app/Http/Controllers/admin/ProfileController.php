<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        try {
            return view("admin.layout.profile");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request)
    {
        try {
            // return $request->all();
            if (Hash::check($request->password, auth()->user()->password)) {
                auth()->user()->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            } else {
                toast('Password is incorrect', 'error');
                return redirect()->back();
            }
            toast('Profile updated successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
