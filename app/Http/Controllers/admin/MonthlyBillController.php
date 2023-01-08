<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Models\BookedMeal;
use App\Models\TypesOfBill;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\OtherBill;

class MonthlyBillController extends Controller
{
    public function find()
    {
        try {
            $student_id = '';
            $date = '';
            $students = Student::where('status', 1)->get();
            return view('admin.bill.find', compact('students', 'student_id', 'date'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function generate(Request $request)
    {
        try {
            $students = Student::where('status', 1)->get();
            $student_id = $request->student_id;
            $hostel_bill = TypesOfBill::where('status', 'active')->sum(
                'amount',
            );
            $date = $request->date;
            $month = Carbon::parse($request->date)->format('m');
            $year = Carbon::parse($request->date)->format('Y');
            $meal_bill = BookedMeal::where('user_type', 'student')->where('user_id', $request->student_id)->whereMonth('date', $month)->whereYear('date', $year)->sum('total');
            $other_bills = OtherBill::where('student_id', $request->student_id)->whereMonth('date', $month)->whereYear('date', $year)->get();
            return view('admin.bill.find', compact('hostel_bill', 'meal_bill', 'students', 'student_id', 'other_bills', 'date'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update(Request $request)
    {
        try {
            // return $request;
            foreach ($request->bill_types as $index => $bill_type) {
                if ($bill_type != null && $request->amounts[$index] != null) {
                    OtherBill::updateOrCreate(
                        [
                            'service_name' => $bill_type,
                            'student_id' => $request->student_id,
                        ],
                        [
                            'amount' => $request->amounts[$index],
                            'date' => Carbon::parse($request->date)->format('Y-m') . '-28',
                        ]
                    );
                    toast('Bills added successfully.', 'success');
                } else {
                    toast('No Bills were Updated.', 'error');
                }
            }
            return redirect()->route('admin.monthly_bill.find');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function download($student_id, $date)
    {
        try {
            $hostel_bill = TypesOfBill::where('status', 'active')->sum(
                'amount',
            );
            $month = Carbon::parse($date)->format('m');
            $year = Carbon::parse($date)->format('Y');
            $meal_bill = BookedMeal::where('student_id', $student_id)->whereMonth('date', $month)->whereYear('date', $year)->sum('total');
            $other_bills = OtherBill::where('student_id', $student_id)->whereMonth('date', $month)->whereYear('date', $year)->get();
            $other_bills_sum = $other_bills->sum('amount');

            $pdf = PDF::loadView('admin.bill.invoice', compact('hostel_bill', 'meal_bill', 'student_id', 'other_bills', 'date', 'other_bills_sum'));
            return $pdf->download('Hostel Bill of ' . $student_id . '.pdf');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function search()
    {
        try {
            $date = '';
            return view('admin.bill.monthly', compact('date'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function show(Request $request)
    {
        try {
            $date = $request->selectedDate;
            $month = Carbon::parse($request->selectedDate)->format('m');
            $year = Carbon::parse($request->selectedDate)->format('Y');
            $students = Student::where('status', 1)->get();
            $users = User::all();

            return view('admin.bill.monthly', compact('month', 'year', 'students', 'users', 'date'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function myMonthlyBill()
    {
        try {
            $dates = BookedMeal::orderBy('date', 'desc')->select(BookedMeal::raw('DISTINCT MONTH(date) as month, YEAR(date) as year'))->get();

            return view("admin.bill.my_monthly", compact('dates'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
