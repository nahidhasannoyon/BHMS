<?php

namespace App\Http\Controllers\student;

use App\Models\BookedMeal;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    public function bill()
    {
        try {
            $dates = BookedMeal::orderBy('date', 'desc')->select(BookedMeal::raw('DISTINCT MONTH(date) as month, YEAR(date) as year'))->get();

            return view("student.bill", compact('dates'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
