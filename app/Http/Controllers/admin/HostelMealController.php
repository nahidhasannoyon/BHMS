<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\BookedMeal;
use App\Models\HostelMeal;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class HostelMealController extends Controller
{

    public function list()
    {
        try {
            $meals = HostelMeal::all();
            return view('admin.meal.list', compact('meals'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function add(Request $request)
    {
        try {
            $meal = new HostelMeal();
            $meal->day = $request->day;
            $meal->meal_type = $request->meal_type;
            $meal->meal_items = $request->meal_items;
            $meal->price = $request->price;
            $meal->save();
            toast('New Meal Added.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            $meal = HostelMeal::find($id);
            return view('admin.meal.edit', compact('meal'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $meal = HostelMeal::find($id);
            $meal->day = $request->day;
            $meal->meal_type = $request->meal_type;
            $meal->meal_items = $request->meal_items;
            $meal->price = $request->price;
            $meal->save();
            toast('Meal Updated.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $meal = HostelMeal::find($id);
            $meal->delete();
            toast('Meal Deleted.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function today()
    {
        try {
            $meals = BookedMeal::where('date', Carbon::now()->format('Y-m-d'))->get();
            $total_breakfast = $meals->sum('breakfast');
            $total_lunch = $meals->sum('lunch');
            $total_dinner = $meals->sum('dinner');

            return view('admin.meal.today', compact('meals', 'total_breakfast', 'total_lunch', 'total_dinner'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function search(Request $request)
    {
        try {
            $selectedDate = $request->selectedDate;
            $meals = BookedMeal::where('date', Carbon::parse($request->selectedDate)->format('Y-m-d'))->get();
            $total_breakfast = $meals->sum('breakfast');
            $total_lunch = $meals->sum('lunch');
            $total_dinner = $meals->sum('dinner');
            return view('admin.meal.today', compact('meals', 'total_breakfast', 'total_lunch', 'total_dinner', 'selectedDate'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
