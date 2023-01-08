<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function list()
    {
        try {
            $iumss_users = Http::withHeaders([
                "Authorization" => 'Bearer 1|' . env('API_AUTHORIZATION'),
            ])->get(env('API_URL') . '/admin/active/list')->json();
            $users = User::all();
            $user = User::where('id', 3)->first();
            $user->givePermissionTo('add-student');
            return view('admin.user.list', compact('users', 'iumss_users'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
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

    public function edit(User $user)
    {
        try {
            return view('admin.user.edit', compact('user'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $user->name = $request->name;
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

    public function permissions(User $user)
    {
        try {
            // Permission::create(['name' => 'see-booked-meals']);
            return view('admin.user.permissions', compact('user'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function permissionsUpdate(Request $request, User $user)
    {
        try {
            $requestKeys = collect($request->all())->keys();
            $requestKeys->shift();
            foreach ($requestKeys as $key) {
                $permission = Permission::where('name', $key)->first();
                if ($permission == null) {
                    Permission::create(['name' => $key]);
                }
                $user->givePermissionTo($key);
            }
            toast('User Permissions Updated.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
