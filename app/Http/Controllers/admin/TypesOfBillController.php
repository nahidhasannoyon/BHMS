<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TypesOfBill;
use Illuminate\Http\Request;

class TypesOfBillController extends Controller
{
    public function list()
    {
        try {
            $typesOfBill = TypesOfBill::all();
            return view('admin.bill.types', compact('typesOfBill'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function store(Request $request)
    {
        try {
            TypesOfBill::create($request->all());
            toast('New Type of Bill added.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function edit(TypesOfBill $typesOfBill)
    {
        try {
            return view('admin.bill.edit', compact('typesOfBill'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update(Request $request, TypesOfBill $typesOfBill)
    {
        try {
            $typesOfBill->update($request->all());
            toast('Type of Bill updated.', 'success');
            return redirect()->route('admin.bill.types');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
