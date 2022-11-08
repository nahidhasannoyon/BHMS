<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Seat;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    public function flat_list(Building $building, Floor $floor)
    {
        try {
            $flats = Flat::all();
            $total_seat = 0;
            $seats_available = 0;
            $seats_occupied = 0;
            $selected_flats = Flat::where('floor_id', $floor->id)->get();
            foreach ($selected_flats as $selected_flat) {
                $total_seat += Seat::where('flat_id', $selected_flat->id)->get()->count();
                $seats_available += Seat::where('flat_id', $selected_flat->id)->where('status', '0')->get()->count();
                $seats_occupied += Seat::where('flat_id', $selected_flat->id)->where('status', '1')->get()->count();
            }
            return view('admin.hostel.flat_list', compact('flats', 'floor', 'total_seat', 'seats_available', 'seats_occupied', 'building'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function add_flat(Request $request)
    {
        try {
            $flat = new Flat();
            $flat->name = $request->name;
            $flat->floor_id = $request->floor_id;
            $flat->save();
            toast('New Flat added.', 'success');
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
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function show(Flat $flat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function edit(Flat $flat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flat $flat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat $flat)
    {
        //
    }
}
