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

    public function edit_building($building_id)
    {
        try {
            $building = Building::where('id', $building_id)->first();
            return view('admin.hostel.edit_building', compact('building'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update_building(Request $request)
    {
        try {
            $is_exist = Building::where('name', $request->name)->first();
            if ($is_exist) {
                toast('Building name already exist.', 'error');
                return redirect()->back();
            } else {
                $building = Building::where('id', $request->id)->first();
                $building->name = $request->name;
                $building->save();
                toast('Hostel Building updated.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete_building($building_id)
    {
        try {
            $seats = Seat::where('building_id', $building_id)->get();
            if ($seats->count() > 0) {
                foreach ($seats as $seat) {
                    $seat->delete();
                }
            }
            $flats = Flat::where('building_id', $building_id)->get();
            if ($flats->count() > 0) {
                foreach ($flats as $flat) {
                    $flat->delete();
                }
            }
            $floors = Floor::where('building_id', $building_id)->get();
            if ($floors->count() > 0) {
                foreach ($floors as $floor) {
                    $floor->delete();
                }
            }
            $building = Building::where('id', $building_id)->first();
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

    public function add_floor($building_id, Request $request)
    {
        try {
            $is_exist = Floor::where('name', $request->name)->where('building_id', $building_id)->first();
            if ($is_exist) {
                toast('Floor name already exist.', 'error');
                return redirect()->back();
            } else {
                $floor = new Floor();
                $floor->name = $request->name;
                $floor->building_id = $building_id;
                $floor->save();
                toast('New Hostel Floor added.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit_floor($building_id, $floor_id)
    {
        try {
            $floor = Floor::where('id', $floor_id)->first();
            return view('admin.hostel.edit_floor', compact('floor'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update_floor(Request $request)
    {
        try {
            $is_exist = Floor::where('name', $request->name)->where('building_id', $request->building_id)->first();
            if ($is_exist) {
                toast('Floor name already exist.', 'error');
                return redirect()->back();
            } else {
                $floor = Floor::where('id', $request->id)->first();
                $floor->name = $request->name;
                $floor->save();
                toast('Floor updated.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete_floor($building_id, $floor_id,)
    {
        try {
            $seats = Seat::where('floor_id', $floor_id)->get();
            if ($seats->count() > 0) {
                foreach ($seats as $seat) {
                    $seat->delete();
                }
            }
            $flats = Flat::where('floor_id', $floor_id)->get();
            if ($flats->count() > 0) {
                foreach ($flats as $flat) {
                    $flat->delete();
                }
            }
            $floor = Floor::where('id', $floor_id)->first();
            $floor->delete();
            toast('Floor deleted.', 'success');
            return redirect()->back();
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
            $is_exist = Flat::where('building_id', $request->building_id)->where('floor_id', $request->floor_id)->where('name', $request->name)->exists();
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

    public function edit_flat($building_id, $floor_id, $flat_id)
    {
        try {
            $flat = Flat::where('id', $flat_id)->first();
            return view('admin.hostel.edit_flat', compact('flat'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update_flat(Request $request)
    {
        try {
            $is_exist = Flat::where('building_id', $request->building_id)->where('floor_id', $request->floor_id)->where('name', $request->name)->exists();
            if ($is_exist) {
                toast('Flat name already exist.', 'error');
                return redirect()->back();
            } else {
                $flat = Flat::where('id', $request->id)->first();
                $flat->name = $request->name;
                $flat->save();
                toast('Flat updated.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete_flat($building_id, $floor_id, $flat_id)
    {
        try {
            $seats = Seat::where('flat_id', $flat_id)->get();
            if ($seats->count() > 0) {
                foreach ($seats as $seat) {
                    $seat->delete();
                }
            }
            $flat = Flat::where('id', $flat_id)->first();
            $flat->delete();
            toast('Flat deleted.', 'success');
            return redirect()->back();
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
            $is_exist = Seat::where('building_id', $request->building_id)->where('floor_id', $request->floor_id)->where('flat_id', $request->flat_id)->where('name', $request->name)->exists();
            if ($is_exist) {
                toast('Seat name already exist.', 'error');
                return redirect()->back();
            } else {
                $seat = new Seat();
                $seat->name = $request->name;
                $seat->status = 0;
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

    public function edit_seat($building_id, $floor_id, $flat_id, $seat_id)
    {
        try {
            $seat = Seat::where('id', $seat_id)->first();
            return view('admin.hostel.edit_seat', compact('seat'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update_seat(Request $request)
    {
        try {
            $is_exist = Seat::where('building_id', $request->building_id)->where('floor_id', $request->floor_id)->where('flat_id', $request->flat_id)->where('name', $request->name)->exists();
            if ($is_exist) {
                toast('Seat name already exist.', 'error');
                return redirect()->back();
            } else {
                $seat = Seat::where('id', $request->id)->first();
                $seat->name = $request->name;
                $seat->save();
                toast('Seat updated.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete_seat($building_id, $floor_id, $flat_id, $seat_id)
    {
        try {
            $seat = Seat::where('id', $seat_id)->first();
            $seat->delete();
            toast('Seat deleted.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
