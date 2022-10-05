<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Policies\StudentPolicy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showStudentLoginForm()
    {
        return view('student.auth.login');
    }
    public function studentLogin(Request $request)
    {
        $studentID = $request->studentID;
        $enteredPassword = $request->password;
        $enteredPassword = Hash::make($enteredPassword);
        $studentCheck = Student::where('studentID', $studentID)->exists();
        if ($studentCheck) {
            $existingPassword = Student::select('password')->where('studentID', $studentID)->first();
            return $existingPassword;
            $existingPassword = $existingPassword->password;
            $check = Hash::check($enteredPassword, $existingPassword);
            return $enteredPassword . ' == ' .  $existingPassword .  $check;
            if ($check) {
                Session::put('studentID', $studentID);
                // return redirect()->route('student-home');
                return "logged in successfully";
            } else {
                toast('Invalid Student ID/Password', 'error');
                return 'Invalid Student ID/Password';
            }
        } else {
            toast('No Records Found', 'error');
            return "something went wrong";
        }
    }
}
