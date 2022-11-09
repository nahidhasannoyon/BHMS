<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Seat;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function floor_list(Building $building)
    {
        try {
            $floors = Floor::all();
            $flats = Flat::all();
            $seats = Seat::all();
            $total_seat = 0;
            $seats_available = 0;
            $seats_occupied = 0;
            $selected_floors = Floor::where('building_id', $building->id)->get();
            foreach ($selected_floors as $selected_floor) {
                $selected_flats = Flat::where('floor_id', $selected_floor->id)->get();
                foreach ($selected_flats as $selected_flat) {
                    $total_seat += Seat::where('flat_id', $selected_flat->id)->get()->count();
                    $seats_available += Seat::where('flat_id', $selected_flat->id)->where('status', '0')->get()->count();
                    $seats_occupied += Seat::where('flat_id', $selected_flat->id)->where('status', '1')->get()->count();
                }
            }
            return view('admin.hostel.floor_list', compact('floors', 'building', 'total_seat', 'seats_available', 'seats_occupied', 'flats', 'seats'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_floor(Request $request)
    {
        try {
            $floor = new Floor();
            $floor->name = $request->name;
            $floor->building_id = $request->building_id;
            $floor->save();
            toast('New Floor added.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
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
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function edit(Floor $floor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Floor $floor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floor $floor)
    {
        //
    }
}
