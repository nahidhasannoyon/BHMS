<?php

namespace App\Http\Controllers;

use App\Models\HostelSeat;
use Illuminate\Http\Request;

class HostelSeatController extends Controller
{
    public function index()
    {
        $hostelSeats = HostelSeat::orderBy('floor', 'asc')->get();
        return view('admin.hostel.seats', compact('hostelSeats'));
    }
    public function store(Request $request)
    {
        $hostelSeats = new HostelSeat();
        $hostelSeats->building_name = $request->get('building_name');
        $hostelSeats->floor = $request->get('floor');
        $hostelSeats->flat = $request->get('flat');
        $hostelSeats->seat = $request->get('seat');
        $hostelSeats->status = 0;
        $hostelSeats->save();
        return redirect()->route('hostel-seats');
        // toast('Hostel seat added successfully', 'success');


    }
}
