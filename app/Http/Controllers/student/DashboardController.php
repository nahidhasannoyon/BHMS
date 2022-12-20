<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            return view("student.layout.dashboard");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function logout()
    {
        try {
            auth("student")->logout();
            session()->flush();
            toast("You have been logged out successfully", "success");
            return redirect()->route("student.login_form");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
