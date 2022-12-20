<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            // return auth()->user();
            return view("admin.layout.dashboard");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function logout()
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
}
