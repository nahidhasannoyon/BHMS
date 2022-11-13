<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Seat;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;

class HostelSeatController extends Controller
{
    public function building_list()
    {
        try {
            $hostels = Building::all();
            $total_seat = Seat::count();
            $seats_available = Seat::where('status', 0)->count();
            $seats_occupied = Seat::where('status', 1)->count();
            return view('admin.hostel.building_list', compact('hostels', 'total_seat', 'seats_available', 'seats_occupied'));
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    public function add_building(Request $request)
    {
        try {
            $is_exist = Building::where('name', $request->name)->first();
            if ($is_exist) {
                toast('Building name already exist.', 'error');
                return redirect()->back();
            } else {
                $building = new Building();
                $building->name = $request->name;
                $building->save();
                toast('New Hostel Building added.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit_building($id)
    {
        try {
            $building = Building::where('id', $id)->first();
            return view('admin.hostel.edit_building', compact('building'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update_building(Request $request)
    {
        try {
            $building = Building::where('id', $request->id)->first();
            $building->name = $request->name;
            $building->save();
            toast('Hostel Building updated.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete_building($id)
    {
        try {
            $building = Building::where('id', $id)->first();
            $building->delete();
            toast('Hostel Building deleted.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function floor_list(Building $building)
    {
        try {
            $floors = Floor::where('building_id', $building->id)->get();
            $total_seat = Seat::where('building_id', $building->id)->count();
            $seats_available = Seat::where('building_id', $building->id)->where('status', 0)->count();
            $seats_occupied = Seat::where('building_id', $building->id)->where('status', 1)->count();
            return view('admin.hostel.floor_list', compact('building', 'floors',  'total_seat', 'seats_available', 'seats_occupied'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function add_floor(Request $request)
    {
        try {
            $is_exist = floor::where('name', $request->name)->first();
            if ($is_exist) {
                toast('Floor name already exist.', 'error');
                return redirect()->back();
            } else {
                $floor = new Floor();
                $floor->name = $request->name;
                $floor->building_id = $request->building_id;
                $floor->save();
                toast('New Floor added.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function flat_list(Building $building, Floor $floor)
    {
        try {
            $flats = Flat::where('floor_id', $floor->id)->get();
            $total_seat = Seat::where('floor_id', $floor->id)->count();
            $seats_available = Seat::where('floor_id', $floor->id)->where('status', 0)->count();
            $seats_occupied = Seat::where('floor_id', $floor->id)->where('status', 1)->count();
            return view('admin.hostel.flat_list', compact('building', 'floor', 'flats', 'total_seat', 'seats_available', 'seats_occupied'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function add_flat(Request $request)
    {
        try {
            $is_exist = Flat::where('name', $request->name)->first();
            if ($is_exist) {
                toast('Flat name already exist.', 'error');
                return redirect()->back();
            } else {
                $flat = new Flat();
                $flat->name = $request->name;
                $flat->building_id = $request->building_id;
                $flat->floor_id = $request->floor_id;
                $flat->save();
                toast('New Flat added.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function seat_list(Building $building, Floor $floor, Flat $flat)
    {
        try {
            $seats = Seat::where('flat_id', $flat->id)->get();
            $total_seat = Seat::where('flat_id', $flat->id)->count();
            $seats_available = Seat::where('flat_id', $flat->id)->where('status', '0')->count();
            $seats_occupied = Seat::where('flat_id', $flat->id)->where('status', '1')->count();
            return view('admin.hostel.seat_list', compact('building', 'floor', 'flat', 'seats', 'total_seat', 'seats_available', 'seats_occupied'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function add_seat(Request $request)
    {
        try {
            $is_exist = Seat::where('name', $request->name)->first();
            if ($is_exist) {
                toast('Seat name already exist.', 'error');
                return redirect()->back();
            } else {
                $seat = new Seat();
                $seat->name = $request->name;
                $seat->status = $request->status;
                $seat->building_id = $request->building_id;
                $seat->floor_id = $request->floor_id;
                $seat->flat_id = $request->flat_id;
                $seat->save();
                toast('New Seat added.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
