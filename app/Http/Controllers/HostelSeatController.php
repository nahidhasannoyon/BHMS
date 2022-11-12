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
                        $total_seat += Seat::where('flat_id', $selected_flat->id)
                            ->get()
                            ->count();
                        $seats_available += Seat::where('flat_id', $selected_flat->id)
                            ->where('status', '0')
                            ->get()
                            ->count();
                        $seats_occupied += Seat::where('flat_id', $selected_flat->id)
                            ->where('status', '1')
                            ->get()
                            ->count();
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
                    $total_seat += Seat::where('flat_id', $selected_flat->id)
                        ->get()
                        ->count();
                    $seats_available += Seat::where('flat_id', $selected_flat->id)
                        ->where('status', '0')
                        ->get()
                        ->count();
                    $seats_occupied += Seat::where('flat_id', $selected_flat->id)
                        ->where('status', '1')
                        ->get()
                        ->count();
                }
            }
            return view('admin.hostel.floor_list', compact('floors', 'building', 'total_seat', 'seats_available', 'seats_occupied', 'flats', 'seats'));
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
            $flats = Flat::all();
            $seats = Seat::all();
            $total_seat = 0;
            $seats_available = 0;
            $seats_occupied = 0;
            $selected_flats = Flat::where('floor_id', $floor->id)->get();
            foreach ($selected_flats as $selected_flat) {
                $total_seat += Seat::where('flat_id', $selected_flat->id)
                    ->get()
                    ->count();
                $seats_available += Seat::where('flat_id', $selected_flat->id)
                    ->where('status', '0')
                    ->get()
                    ->count();
                $seats_occupied += Seat::where('flat_id', $selected_flat->id)
                    ->where('status', '1')
                    ->get()
                    ->count();
            }
            return view('admin.hostel.flat_list', compact(
                'flats',
                'floor',
                'total_seat',
                'seats_available',
                'seats_occupied',
                'building',
                'seats'
            ));
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
            $seats = Seat::all();
            $total_seat = Seat::where('flat_id', $flat->id)
                ->get()
                ->count();
            $seats_available = Seat::where('flat_id', $flat->id)
                ->where('status', '0')
                ->get()
                ->count();
            $seats_occupied = Seat::where('flat_id', $flat->id)
                ->where('status', '1')
                ->get()
                ->count();
            return view('admin.hostel.seat_list', compact(
                'building',
                'floor',
                'flat',
                'seats',
                'total_seat',
                'seats_available',
                'seats_occupied'
            ));
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
