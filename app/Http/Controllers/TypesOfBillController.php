<?php

namespace App\Http\Controllers;

use App\Models\TypesOfBill;
use Illuminate\Http\Request;

class TypesOfBillController extends Controller
{
    public function index()
    {
        $typesOfBill = TypesOfBill::all();
        return view('admin.bill.types', compact('typesOfBill'));
    }
    public function store(Request $request)
    {
        $typesOfBill = new TypesOfBill();
        $typesOfBill->name = $request->name;
        if ($request->status == 'active') {
            $typesOfBill->status = 1;
        } else if ($request->status == 'inactive') {
            $typesOfBill->status = 0;
        }
        $typesOfBill->save();
        return redirect()->back();
    }
}
