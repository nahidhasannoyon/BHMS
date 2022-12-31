<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Enums\Type;
use App\Models\BookedMeal;
use App\Models\HostelMeal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function editMenu($id)
    {
        try {
            $meal = HostelMeal::find($id);
            return view('admin.meal.edit_menu', compact('meal'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateMenu(Request $request, $id)
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

    public function deleteMenu($id)
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

    public function booked()
    {
        try {
            $meals = BookedMeal::where('date', Carbon::now()->format('Y-m-d'))->get();
            $total_breakfast = $meals->sum('breakfast');
            $total_lunch = $meals->sum('lunch');
            $total_dinner = $meals->sum('dinner');

            return view('admin.meal.booked', compact('meals', 'total_breakfast', 'total_lunch', 'total_dinner'));
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
            return view('admin.meal.booked', compact('meals', 'total_breakfast', 'total_lunch', 'total_dinner', 'selectedDate'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function chart()
    {
        try {
            $meals = HostelMeal::all();
            // return $meals;
            return view("admin.meal.chart", compact("meals"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function book(Request $request)
    {
        try {
            $adminMeals = BookedMeal::where("user_type", Type::Admin)
                ->where(
                    "user_id",
                    auth()
                        ->user()->employee_id
                )
                ->whereDate("date", ">", Carbon::now())
                ->get();

            return view("admin.meal.book", compact("adminMeals"));
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
                    //  * meal price calculation
                    $breakfast = HostelMeal::where("day", Carbon::parse($this_date)->format('l'))->where('meal_type', 'Breakfast')->get();
                    $breakfast_price = $breakfast[0]->price;
                    $lunch = HostelMeal::where("day", Carbon::parse($this_date)->format('l'))->where('meal_type', 'Lunch')->get();
                    $lunch_price = $lunch[0]->price;
                    $dinner = HostelMeal::where("day", Carbon::parse($this_date)->format('l'))->where('meal_type', 'Dinner')->get();
                    $dinner_price = $dinner[0]->price;
                    $total = (($request->has("breakfast") ? 1 : 0) * $breakfast_price) + (($request->has("lunch") ? 1 : 0) * $lunch_price) + (($request->has("dinner") ? 1 : 0) * $dinner_price);

                    BookedMeal::updateORCreate(
                        [
                            "user_type" => Type::Admin,
                            "user_id" => auth()->user()->employee_id,
                            "date" => $this_date->format("Y-m-d"),
                        ],
                        [
                            "breakfast" => $request->has("breakfast") ? 1 : 0,
                            "lunch" => $request->has("lunch") ? 1 : 0,
                            "dinner" => $request->has("dinner") ? 1 : 0,
                            "total" => $total,
                        ]
                    );
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
                alert(
                    "Error",
                    "You have to select at least two Meals",
                    "error"
                );
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit(BookedMeal $bookedMeal)
    {
        try {
            return view("admin.meal.edit", compact("bookedMeal"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, BookedMeal $bookedMeal)
    {
        try {
            $day = Carbon::parse($bookedMeal->date)->format("l");
            $breakfast = HostelMeal::where("day", $day)->where('meal_type', 'Breakfast')->get();
            $breakfast_price = $breakfast[0]->price;
            $lunch = HostelMeal::where("day", $day)->where('meal_type', 'Lunch')->get();
            $lunch_price = $lunch[0]->price;
            $dinner = HostelMeal::where("day", $day)->where('meal_type', 'Dinner')->get();
            $dinner_price = $dinner[0]->price;
            $total = ((int)$request->breakfast * $breakfast_price) + ((int)$request->lunch * $lunch_price) + ((int)$request->dinner * $dinner_price);
            $bookedMeal->update([
                "breakfast" => $request->breakfast,
                "lunch" => $request->lunch,
                "dinner" => $request->dinner,
                "total" => $total,
            ]);
            alert("Updated", "Meal quantities updated successfully.", "success");
            return redirect()->route("admin.meal.book");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete(BookedMeal $bookedMeal)
    {
        try {
            $bookedMeal->delete();
            toast("You have deleted a meal successfully", "success");
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function history()
    {
        try {
            $adminMeals = BookedMeal::where("user_type", Type::Admin)
                ->where(
                    "user_id",
                    auth()
                        ->user()->employee_id
                )
                ->whereDate("date", "<=", Carbon::now())
                ->get();

            return view("admin.meal.history", compact("adminMeals"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
