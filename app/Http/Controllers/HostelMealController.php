<?php

namespace App\Http\Controllers;

use App\Models\HostelMeal;
use Illuminate\Http\Request;

class HostelMealController extends Controller
{

    public function index()
    {

        $meals = HostelMeal::all();
        return view('admin.hostel.meal', compact('meals'));
    }
    public function store(Request $request)
    {
        $meal = new HostelMeal();
        $meal->day = $request->day;
        $meal->meal_type = $request->meal_type;
        $meal->meal_items = $request->meal_items;
        $meal->price = $request->price;
        $meal->save();
        return redirect()->route('hostel-meals');
    }
}
