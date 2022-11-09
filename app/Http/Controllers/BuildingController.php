<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Seat;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function building_list()
    {
        try {
            $hostel_buildings = Building::all();
            $floors = Floor::all();
            $flats = Flat::all();
            $seats = Seat::all();
            $total_seat = 0;
            $seats_available = 0;
            $seats_occupied = 0;
            foreach ($hostel_buildings as $hostel_building) {
                $selected_floors = Floor::where('building_id', $hostel_building->id)->get();
                foreach ($selected_floors as $selected_floor) {
                    $selected_flats = Flat::where('floor_id', $selected_floor->id)->get();
                    foreach ($selected_flats as $selected_flat) {
                        $total_seat += Seat::where('flat_id', $selected_flat->id)->get()->count();
                        $seats_available += Seat::where('flat_id', $selected_flat->id)->where('status', '0')->get()->count();
                        $seats_occupied += Seat::where('flat_id', $selected_flat->id)->where('status', '1')->get()->count();
                    }
                }
            }
            return view('admin.hostel.building_list', compact('hostel_buildings', 'total_seat', 'seats_available', 'seats_occupied', 'floors', 'flats', 'seats'));
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    public function add_building(Request $request)
    {
        try {
            $building = new Building();
            $building->name = $request->name;
            $building->save();
            toast('New Hostel Building added.', 'success');
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
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        //
    }
}
