<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\BookedMeal;
use App\Models\HostelMeal;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            $meal_of_today = HostelMeal::where('day', Carbon::now()->format('l'))->get();
            $breakfast_items =  $meal_of_today[0]->meal_items;
            $lunch_items =  $meal_of_today[1]->meal_items;
            $dinner_items =  $meal_of_today[2]->meal_items;
            $meals = BookedMeal::where('date', Carbon::now()->format('Y-m-d'))->get();
            $total_breakfast = $meals->sum('breakfast');
            $total_lunch = $meals->sum('lunch');
            $total_dinner = $meals->sum('dinner');
            return view('admin.layout.dashboard', compact('meals', 'total_breakfast', 'total_lunch', 'total_dinner', 'breakfast_items', 'lunch_items', 'dinner_items'));
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
