<?php

namespace App\Http\Controllers;

use App\Models\MonthlyBill;
use App\Models\TypesOfBill;
use Illuminate\Http\Request;

class MonthlyBillController extends Controller
{
    public function index()
    {
        try {
            $bills = MonthlyBill::all();
            return view('admin.bill.monthly', compact('bills'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            // return $request;
            foreach ($request->studentID as $index => $studentID) {
                MonthlyBill::create([
                    'service_type_id' => $request->typesOfBill,
                    'date' => $request->date[$index],
                    'amount' => $request->amount[$index],
                    'studentID' => $request->studentID[$index]
                ]);
            }
            toast('Bills added successfully.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function generateBill()
    {
        try {
            $typesOfBills = TypesOfBill::all();
            return view('admin.bill.generate', compact('typesOfBills'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function viewBill()
    {
        try {
            $bills = MonthlyBill::all();
            return view('admin.bill.view', compact('bills'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
