<?php

namespace App\Http\Controllers;

use App\Models\MonthlyBill;
use Illuminate\Http\Request;

class MonthlyBillController extends Controller
{
    public function index()
    {
        $bills = MonthlyBill::all();
        return view('admin.bill.monthly', compact('bills'));
    }
    public function store(Request $request)
    {
        $monthly_bill = new MonthlyBill();
        $monthly_bill->studentID = $request->studentID;
        $monthly_bill->amount = $request->amount;
        $monthly_bill->date = $request->date;
        $monthly_bill->save();
        return redirect()->route('monthly-bill');
    }
}
