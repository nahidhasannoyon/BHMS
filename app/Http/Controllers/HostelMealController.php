<?php

namespace App\Http\Controllers;

use App\Models\HostelMeal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Toaster;

class HostelMealController extends Controller
{

    public function index()
    {
        try {
            $meals = HostelMeal::all();
            return view('admin.meal.index', compact('meals'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function store(Request $request)
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
}
