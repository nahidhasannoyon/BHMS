<?php

namespace App\Http\Controllers;

use App\Models\HostelMeal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Toaster;

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
}
