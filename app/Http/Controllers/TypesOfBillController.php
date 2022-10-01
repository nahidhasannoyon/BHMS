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
        try {
            $typesOfBill = new TypesOfBill();
            $typesOfBill->name = $request->name;
            if ($request->status == 'active') {
                $typesOfBill->status = 1;
            } else if ($request->status == 'inactive') {
                $typesOfBill->status = 0;
            }
            $typesOfBill->save();
            toast('New Type of Bill added.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
