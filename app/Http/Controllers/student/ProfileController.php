<?php

namespace App\Http\Controllers\student;

use App\Models\Flat;
use App\Models\Seat;
use App\Models\Floor;
use App\Models\Student;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        try {
            $student = Student::where('student_id', auth('student')->user()->student_id)->first();
            $building = Building::where('id', $student->building)->first();
            $floor = Floor::where('id', $student->floor)->first();
            $flat = Flat::where('id', $student->flat)->first();
            $seat = Seat::where('id', $student->seat)->first();
            return view('student.profile', compact('student', 'building', 'floor', 'flat', 'seat'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateImage(Request $request)
    {
        try {
            $student = Student::where('student_id', auth('student')->user()->student_id)->first();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = $student->student_id . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->put('uploads/student/profile-images/' . $image_name, file_get_contents($image));
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

    public function updatePassword(Request $request)
    {
        try {
            $student = Student::where('student_id', auth('student')->user()->student_id)->first();
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
