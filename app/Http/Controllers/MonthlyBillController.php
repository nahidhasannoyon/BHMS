<?php

namespace App\Http\Controllers;

use App\Models\MonthlyBill;
use App\Models\TypesOfBill;
use Illuminate\Http\Request;

class MonthlyBillController extends Controller
{
    public function index()
    {
        $bills = MonthlyBill::all();
        return view('admin.bill.monthly', compact('bills'));
    }
    // public function store(Request $request)
    // {
    //     try {
    //         $monthly_bill = new MonthlyBill();
    //         $monthly_bill->studentID = $request->studentID;
    //         $monthly_bill->amount = $request->amount;
    //         $monthly_bill->date = $request->date;
    //         $monthly_bill->save();
    //         toast('New Monthly Bill added.', 'success');
    //         return redirect()->back();
    //     } catch (\Throwable $th) {
    //         return $th->getMessage();
    //     }
    // }
    public function store(Request $request)
    {
        return $request;
    }
    public function generateBill()
    {
        $typesOfBills = TypesOfBill::all();
        return view('admin.bill.generate', compact('typesOfBills'));
    }
}
