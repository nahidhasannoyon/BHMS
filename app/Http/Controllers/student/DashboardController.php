<?php

namespace App\Http\Controllers\student;

use Carbon\Carbon;
use App\Models\BookedMeal;
use App\Models\HostelMeal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function showStudentDashboard()
    {
        try {
            return view('student.layout.dashboard');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function mealChart()
    {
        try {
            $meals = HostelMeal::all();
            // return $meals;
            return view('student.meal.chart', compact('meals'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function mealBook()
    {
        try {
            $studentMeals = BookedMeal::where('student_id', auth()->guard('student')->user()->student_id)->whereMonth('date', date('m'))->get();

            return view('student.meal.book', compact('studentMeals'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function findMeal(Request $request)
    {
        try {
            $day = Carbon::parse($request->date)->format('l');
            $mealList = HostelMeal::where('day', $day)->get();
            $date = $request->date;
            return view('student.meal.book', compact('mealList', 'date'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function storeMeal(Request $request)
    {
        try {
            BookedMeal::create($request->all());
            toast('Meal Booked Successfully', 'success');
            return redirect()->route('student.meal.book');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function logout()
    {
        try {
            auth('student')->logout();
            session()->flush();
            toast('You have been logged out successfully', 'success');
            return redirect()->route("student.login_form");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
