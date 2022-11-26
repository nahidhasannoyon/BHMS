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

    public function admit_student()
    {
        try {
            $students = Http::withHeaders([
                "Authorization" => 'Bearer 1|' . env('API_AUTHORIZATION'),
            ])->get(env('API_URL'));
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
                    toast('Student already exists', 'error');
                } else {
                    toast('Phone Number already exists', 'error');
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
            $id_name_dept = $request->id_name_dept;
            $id_name_dept = explode(" - ", $id_name_dept);
            $std_id = $id_name_dept[0];
            $name = $id_name_dept[1];
            $dept = $id_name_dept[2];

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

    public function delete($id)
    {
        try {
            $student = Student::where('id', $id)->first();
            $student->delete();
            $seat = Seat::where('id', $student->seat)->first();
            $seat->status = 0;
            $seat->save();
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



    // * Student functions
    public function showStudentProfile()
    {
        try {
            $student = Student::where('student_id', 1109020)->first();
            $building = Building::where('id', $student->building)->first();
            $floor = Floor::where('id', $student->floor)->first();
            $flat = Flat::where('id', $student->flat)->first();
            $seat = Seat::where('id', $student->seat)->first();
            return view('student.profile', compact('student', 'building', 'floor', 'flat', 'seat'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateStudentImage(Request $request)
    {
        try {
            $student = Student::where('student_id', 1109020)->first();
            if ($student->image) {
                unlink(public_path('uploads/student/profile-images/' . $student->image));
            }
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = $student->student_id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/student/profile-images/'), $image_name);
                $student->image = $image_name;
            } else {
                $student->image = NULL;
            }
            $student->save();
            toast('Image Updated.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateStudentPassword(Request $request)
    {
        try {
            $student = Student::where('student_id', 1109020)->first();
            if (Hash::check($request->old_password, $student->password)) {
                if ($request->new_password == $request->confirm_password) {
                    $student->password = Hash::make($request->new_password);
                    $student->save();
                    toast('Password Updated.', 'success');
                    return redirect()->back();
                } else {
                    toast('New Password and Confirm Password does not match.', 'error');
                    return redirect()->back();
                }
            } else {
                toast('Old Password is incorrect.', 'error');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
