<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function list()
    {
        $iumss_users = Http::withToken('1|H1pUKKW5XMydm5eAG6Zejj3UMiUN62OW1PGrpPk9')->get('api.baiustserver.com/api/v.1/admin/active/list')->json();
        $users = User::all();
        $user = User::where('id', 3)->first();
        $user->givePermissionTo('add-student');
        return view('admin.user.list', compact('users', 'iumss_users'));
    }

    public function add(Request $request)
    {
        try {
            $name_email_phone = explode(" - ", $request->name_email_phone);
            if (User::where('email', $name_email_phone[1])->exists()) {
                toast('Email already exists', 'error');
                return redirect()->back();
            }
            User::create([
                'employee_id' => $name_email_phone[1],
                'name' => $name_email_phone[0],
                'email' => $name_email_phone[1],
                'phone' => $name_email_phone[2],
                'password' => Hash::make('baiust123#'),
            ]);
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
}
