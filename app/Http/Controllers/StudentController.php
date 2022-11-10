<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Seat;
use App\Models\Floor;
use App\Models\Student;
use App\Models\Building;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\HostelSeat;
use Illuminate\Http\Request;
use App\Models\HostelBuilding;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
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
    public function admit_student()
    {
        try {
            $students = Http::withHeaders([
                "Authorization" => 'Bearer 1|' . env('API_AUTHORIZATION'),
            ])->get(env('API_URL'));
            $students = json_decode($students);
            $buildings = Building::orderby('name', 'asc')->get();
            return view("admin.student.admit", compact('buildings', 'students'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getFloor($id)
    {
        try {
            $floors = Floor::where('building_id', $id)->get();
            return json_encode($floors);
            return response()->json($floors);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getFlat($id)
    {
        try {
            $flats = Flat::where('floor_id', $id)->get();
            // foreach ($flats as $flat) {
            //     if (Seat::where('flat_id', $flat->id)->where('status', '0')->exists()) {
            //     } else {
            //         $flat->remove();
            //     }
            // }
            // $flats = $flats->map(function ($flat) {
            //     if (Seat::where('flat_id', $flat->id)->where('status', 1)->exists()) {
            //     } else {
            //         return $flat;
            //     }
            // });

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_student(Request $request)
    {
        try {
            $id_name_dept = $request->id_name_dept;
            $id_name_dept = explode(" - ", $id_name_dept);
            $id = $id_name_dept[0];
            $name = $id_name_dept[1];
            $dept = $id_name_dept[2];
            $student_id = Student::where('student_id', $id)->exists();
            $phone = Student::where('phone', $request->phone)->exists();
            if ($student_id || $phone) {
                if ($student_id) {
                    toast('Student already exists', 'warning');
                } else {
                    toast('Phone Number already exists', 'warning');
                }
                return redirect()->back();
            } else {
                $student = new Student();
                $student->name = $name;
                $student->student_id = $id;
                $student->dept = $dept;
                $student->building = $request->building;
                $student->floor = $request->floor;
                $student->flat = $request->flat;
                $student->seat = $request->seat;
                $student->phone = $request->get('phone');
                $student->g_phone = $request->get('g_phone');
                $student->remarks = $request->get('remarks');
                $student->status = 1;
                $student->password = Hash::make('baiust123#');
                $student->save();
                $seat = Seat::where('id', $request->seat)->first();
                $seat->status = 1;
                toast('New Student Allocated.', 'success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $api_students = Http::withHeaders([
                "Authorization" => 'Bearer 1|' . env('API_AUTHORIZATION'),
            ])->get(env('API_URL'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFloor($student, $id)
    {
        try {
            $floors = Floor::where('building_id', $id)->get();
            return json_encode($floors);
            return response()->json($floors);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateFlat($student, $id)
    {
        try {
            $flats = Flat::where('floor_id', $id)->get();
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
            $id_name_dept = $request->id_name_dept;
            $id_name_dept = explode(" - ", $id_name_dept);
            $std_id = $id_name_dept[0];
            $name = $id_name_dept[1];
            $dept = $id_name_dept[2];

            $student = Student::where('id', $id)->first();
            $student->name = $name;
            $student->student_id = $std_id;
            $student->dept = $dept;
            $student->building = $request->building;
            $student->floor = $request->floor;
            $student->flat = $request->flat;
            $student->seat = $request->seat;
            $student->phone = $request->get('phone');
            $student->g_phone = $request->get('g_phone');
            $student->remarks = $request->get('remarks');
            $student->status = $request->get('status');
            $student->save();
            toast('Student Information Updated.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    }
    public function delete($id)
    {
        try {
            $student = Student::where('id', $id)->first();
            $student->delete();
            toast('Student Deleted.', 'success');
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
