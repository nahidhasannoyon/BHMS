<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Seat;
use App\Models\Floor;
use Illuminate\Http\Request;

class SeatController extends Controller
{


    public function seat_list(Flat $flat)
    {
        try {
            $seats = Seat::all();
            $total_seat = Seat::where('flat_id', $flat->id)->get()->count();
            $seats_available = Seat::where('flat_id', $flat->id)->where('status', '0')->get()->count();
            $seats_occupied = Seat::where('flat_id', $flat->id)->where('status', '1')->get()->count();
            return view('admin.hostel.seat_list', compact('seats', 'flat', 'total_seat', 'seats_available', 'seats_occupied',));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function add_seat(Request $request)
    {
        try {
            $seat = new Seat();
            $seat->name = $request->name;
            $seat->status = $request->status;
            $seat->flat_id = $request->flat_id;
            $seat->save();
            toast('New Seat added.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit(Seat $seat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seat $seat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        //
    }
}
