<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Flat;
use App\Models\Seat;
use App\Models\Floor;
use App\Models\Student;
use App\Models\Building;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{

    public function admit()
    {
        try {
            $students = Http::withHeaders([
                "Authorization" => 'Bearer 1|' . env('API_AUTHORIZATION'),
            ])->get(env('API_URL') . '/student/all-students');
            $students = json_decode($students);
            $building_ids = Seat::where('status', '0')->pluck('building_id')->toArray();
            $buildings = Building::whereIn('id', $building_ids)->orderby('name', 'asc')->get();
            return view("admin.student.admit", compact('buildings', 'students'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getFloor($id)
    {
        try {
            $floor_ids = Seat::where('status', '0')->where('building_id', $id)->pluck('floor_id')->toArray();
            $floors = Floor::whereIn('id', $floor_ids)->orderby('name', 'asc')->get();
            return json_encode($floors);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getFlat($id)
    {
        try {
            $flat_ids = Seat::where('status', '0')->where('floor_id', $id)->pluck('flat_id')->toArray();
            $flats = Flat::whereIn('id', $flat_ids)->orderby('name', 'asc')->get();
            return json_encode($flats);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getSeat($id)
    {
        try {
            $seats = Seat::where('flat_id', $id)->where('status', '0')->get();
            return json_encode($seats);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            $id_name_dept = explode(" - ", $request->id_name_dept);
            if (Student::where('student_id', $id_name_dept[0])->exists()) {
                toast('Student already exists', 'error');
                return redirect()->back();
            } elseif (Student::where('phone', $request->phone)->exists()) {
                toast('Phone Number already exists', 'error');
            } else {
                Student::create(
                    [
                        'name' => $id_name_dept[1],
                        'student_id' => $id_name_dept[0],
                        'dept' => $id_name_dept[2],
                        'building' => $request->building,
                        'floor' => $request->floor,
                        'flat' => $request->flat,
                        'seat' => $request->seat,
                        'phone' => $request->get('phone'),
                        'g_phone' => $request->get('g_phone'),
                        'remarks' => $request->get('remarks'),
                        'status' => 1,
                        'password' => Hash::make('baiust123#'),
                    ]
                );
                $seat = Seat::where('id', $request->seat)->first();
                $seat->status = 1;
                $seat->save();
                toast('New Student Allocated.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function list()
    {
        try {
            $students = Student::orderBy('student_id', 'asc')->get();
            return view('admin.student.list', compact('students'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function view($id)
    {
        try {
            $student = Student::where('id', $id)->first();
            $building = Building::where('id', $student->building)->first();
            $floor = Floor::where('id', $student->floor)->first();
            $flat = Flat::where('id', $student->flat)->first();
            $seat = Seat::where('id', $student->seat)->first();
            return view('admin.student.view', compact('student', 'building', 'floor', 'flat', 'seat'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            $api_students = Http::withHeaders([
                "Authorization" => 'Bearer 1|' . env('API_AUTHORIZATION'),
            ])->get(env('API_URL') . '/student/all-students');
            $api_students = json_decode($api_students);
            $student = Student::where('id', $id)->first();
            $buildings = Building::orderby('name', 'asc')->get();
            $floors = Floor::orderby('name', 'asc')->get();
            $flats = Flat::orderby('name', 'asc')->get();
            $seats = Seat::orderby('name', 'asc')->get();
            return view('admin.student.edit', compact('student', 'buildings', 'api_students', 'floors', 'flats', 'seats'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateFloor($student, $id)
    {
        try {
            $floor_ids = Seat::where('status', '0')->where('building_id', $id)->pluck('floor_id')->toArray();
            $floors = Floor::whereIn('id', $floor_ids)->orderby('name', 'asc')->get();
            return json_encode($floors);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateFlat($student, $id)
    {
        try {
            $flat_ids = Seat::where('status', '0')->where('floor_id', $id)->pluck('flat_id')->toArray();
            $flats = Flat::whereIn('id', $flat_ids)->orderby('name', 'asc')->get();
            return json_encode($flats);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateSeat($student, $id)
    {
        try {
            $seats = Seat::where('flat_id', $id)->get();
            return json_encode($seats);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $request->all();
            $id_name_dept = $request->id_name_dept;
            $id_name_dept = explode(" - ", $id_name_dept);
            $std_id = $id_name_dept[0];
            $name = $id_name_dept[1];
            $dept = $id_name_dept[2];
            return 'hi';

            $student = Student::where('id', $id)->first();
            $student->name = $name;
            $student->student_id = $std_id;
            $student->dept = $dept;

            if ($request->old_seat) {
                $seat = Seat::where('id', $request->old_seat)->first();
                $seat->status = 0;
                $seat->save();
            }
            if ($request->get('status') == 1) {
                $student->building = $request->building;
                $student->floor = $request->floor;
                $student->flat = $request->flat;
                $student->seat = $request->seat;
                $student->status = 1;
                if ($request->old_seat != $request->seat) {
                    $seat = Seat::where('id', $request->seat)->first();
                    $seat->status = 1;
                    $seat->save();
                }
            } else {
                $student->status = 0;
                $student->building = 0;
                $student->floor = 0;
                $student->flat = 0;
                $student->seat = 0;
                if ($request->old_seat) {
                    $seat = Seat::where('id', $request->old_seat)->first();
                    $seat->status = 0;
                    $seat->save();
                }
            }
            $student->phone = $request->get('phone');
            $student->g_phone = $request->get('g_phone');
            $student->remarks = $request->get('remarks');
            $student->save();
            toast('Student Information Updated.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function download($id)
    {
        try {
            $student = Student::where('id', $id)->first();
            $building = Building::where('id', $student->building)->first();
            $floor = Floor::where('id', $student->floor)->first();
            $flat = Flat::where('id', $student->flat)->first();
            $seat = Seat::where('id', $student->seat)->first();
            $pdf = PDF::loadView('admin.student.download', compact('student', 'building', 'floor', 'flat', 'seat'));
            return $pdf->download($student->student_id . '-' . $student->name . '.pdf');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
