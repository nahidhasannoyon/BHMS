<?php

use App\Models\TypesOfBill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HostelMealController;
use App\Http\Controllers\HostelSeatController;
use App\Http\Controllers\MonthlyBillController;
use App\Http\Controllers\TypesOfBillController;
use App\Http\Controllers\HostelBuildingController;

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

Route::get('/', function () {
    return view('layout.dashboard');
})->name('admin-home');

// Route::get('/', [LoginController::class, 'showStudentLoginForm'])->name('student_login_form');
// Route::post('/', [LoginController::class, 'studentLogin'])->name('student_login');

// Route::get("/admit", function () {
//     return view("admin.student.create");
// });
Route::get('/admin/building_list/', [HostelBuildingController::class, 'index'])->name('building_list');
Route::post('/admin/building_list/', [HostelBuildingController::class, 'store']);

Route::get('/admin/{hostelName}/seat_list/', [HostelSeatController::class, 'show'])->name('seat_list');
Route::post('/admin/{hostelName}/seat_list/', [HostelSeatController::class, 'store'])->name('seat_list_store');

// Route::resource('student', StudentController::class);
Route::get('/student/create/', [StudentController::class, 'create'])->name('create_student');
Route::post('/student/create/', [StudentController::class, 'store']);

Route::get('/student/list', [StudentController::class, 'list'])->name('student-list');
// Route::prefix('admin')->name('users.')->group(function () {
//     Route::resource('users', UserController::class);
// });
Route::resource('users', UserController::class);

// Route::resource('hostel-seats', HostelSeatController::class);
Route::get('/hostel/seats/', [HostelSeatController::class, 'index'])->name('hostel-seats');
Route::post('/hostel/seats/', [HostelSeatController::class, 'store']);

Route::get('/meal/index/', [HostelMealController::class, 'index'])->name('meals-list');
Route::post('/meal/index/', [HostelMealController::class, 'store']);

Route::get('/bill/monthly', [MonthlyBillController::class, 'index'])->name('monthly-bills');
Route::post('/bill/monthly', [MonthlyBillController::class, 'store']);

Route::get('/bill/types', [TypesOfBillController::class, 'index'])->name('types-of-bill');
Route::post('/bill/types', [TypesOfBillController::class, 'store']);

Auth::routes([
    'logout' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
