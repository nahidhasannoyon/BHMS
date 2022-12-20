<?php

namespace App\Http\Controllers\student;

use App\Enums\Type;
use Carbon\Carbon;
use App\Models\BookedMeal;
use App\Models\HostelMeal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HostelMealController extends Controller
{
    public function chart()
    {
        try {
            $meals = HostelMeal::all();
            // return $meals;
            return view("student.meal.chart", compact("meals"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function book(Request $request)
    {
        try {
            $studentMeals = BookedMeal::where("user_type", Type::Student)
                ->where(
                    "user_id",
                    auth()
                        ->guard("student")
                        ->user()->student_id
                )
                ->whereDate("date", ">", Carbon::now())
                ->get();

            return view("student.meal.book", compact("studentMeals"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            //at least there have to be 2 meals/3 meals that is why array count is > 4 means at least 5
            if (count($request->all()) > 4) {
                $this_date = Carbon::parse($request->fromDate);
                $end_date = Carbon::parse($request->toDate);
                while ($this_date->lessThanOrEqualTo($end_date)) {
                    BookedMeal::create([
                        "user_type" => Type::Student,
                        "user_id" => auth("student")->user()->student_id,
                        "date" => $this_date->format("Y-m-d"),
                        "breakfast" => $request->has("breakfast") ? 1 : 0,
                        "lunch" => $request->has("lunch") ? 1 : 0,
                        "dinner" => $request->has("dinner") ? 1 : 0,
                    ]);
                    $this_date = $this_date->addDay(1);
                }
                alert(
                    "Booked",
                    "Meal booked successfully from: " .
                        $request->fromDate .
                        " to: " .
                        $request->toDate,
                    "success"
                );
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit(BookedMeal $bookedMeal)
    {
        try {
            return view("student.meal.edit", compact("bookedMeal"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, BookedMeal $bookedMeal)
    {
        try {
            $bookedMeal->update([
                "breakfast" => $request->breakfast,
                "lunch" => $request->lunch,
                "dinner" => $request->dinner,
            ]);
            alert("Updated", "Meal qunaities updated successfully.", "success");
            return redirect()->route("student.meal.select");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete(BookedMeal $bookedMeal)
    {
        try {
            $bookedMeal->delete();
            toast("You have been logged out successfully", "success");
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
