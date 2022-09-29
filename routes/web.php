<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HostelSeatController;
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
    return view("layout.dashboard");
})->name('admin-home');

// Route::get("/", function () {
//     return view("student.auth.login");
// });
Route::get("/admit", function () {
    return view("admin.student.create");
});



// Route::resource('student', StudentController::class);
Route::get('/student/create/', [StudentController::class, "create"])->name('create_student');
Route::post('/student/create/', [StudentController::class, "store"]);

Route::get('/student/list', [StudentController::class, 'list'])->name('student-list');



// Route::resource('hostel-seats', HostelSeatController::class);
Route::get('/hostel/seats/', [HostelSeatController::class, "index"])->name('hostel-seats');
Route::post('/hostel/seats/', [HostelSeatController::class, "store"]);


Auth::routes([
    "logout" => false,
]);

Route::get("/home", [App\Http\Controllers\HomeController::class, "index"]);
