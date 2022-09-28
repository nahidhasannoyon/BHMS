<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("student.auth.login");
});
Route::get("/admit", function () {
    return view("admin.student.create");
});

Auth::routes([
    "logout" => false,
]);

Route::get("/home", [App\Http\Controllers\HomeController::class, "index"]);
