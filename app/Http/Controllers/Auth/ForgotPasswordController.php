<?php

namespace App\Http\Controllers\Auth;

// use GuzzleHttp\Psr7\Request;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function forgotPassword(Request $request)
    {
        try {
            if (User::where('phone', $request->phone)->exists()) {
                return $request;
            } else {
                return "User not found";
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
