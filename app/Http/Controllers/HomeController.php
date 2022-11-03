<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            return view("admin.layout.master");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function showStudentHome()
    {
        try {
            return view("student.layout.master");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
