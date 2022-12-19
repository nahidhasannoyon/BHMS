<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Toaster;
use Illuminate\Support\Facades\Hash;
use GrahamCampbell\ResultType\Success;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAdminDashboard()
    {
        try {
            // return auth()->user();
            return view("admin.layout.dashboard");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function adminLogout()
    {
        try {
            auth()->logout();
            session()->flush();
            toast('You have been logged out successfully', 'success');
            return redirect()->route("admin.login_form");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function adminProfile()
    {
        try {
            return view("admin.layout.profile");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function updateProfile(Request $request)
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
    public function showStudentDashboard()
    {
        try {
            return view("student.layout.dashboard");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
