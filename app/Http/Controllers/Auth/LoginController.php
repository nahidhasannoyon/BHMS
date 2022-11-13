<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
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

    public function showLoginSelection()
    {
        try {
            return view('login_selection');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }
    public function adminLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->role == 'admin') {
                    Session::put('admin', $user->name);
                    return redirect()->route('admin.dashboard');
                } else if ($user->role == 'accountant') {
                    return redirect()->route('accountant_dashboard');
                }
            } else {
                toast('Password is incorrect', 'error');
                return redirect()->back();
            }
        } else {
            toast('Invalid User Email.', 'error');
            return redirect()->back();
        }
    }

    public function showStudentLoginForm()
    {
        return view('student.auth.login');
    }
    public function studentLogin(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
        ]);
        $student = Student::where('studentID', $request->studentID)->first();
        if ($student) {
            if (Hash::check($request->password, $student->password)) {
                Session::put('student', $student);
                return redirect()->route('student.dashboard');
            } else {
                toast('Password is incorrect', 'error');
                return
                    redirect()->back();
            }
        } else {
            toast('Invalid Student ID', 'error');
            return redirect()->back();
        }
    }
}
