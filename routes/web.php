<?php

use App\Models\TypesOfBill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\HostelMealController;
use App\Http\Controllers\HostelSeatController;
use App\Http\Controllers\MonthlyBillController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\TypesOfBillController;

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

Route::get('/', [LoginController::class, 'showLoginSelection'])->name('login_selection');
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('admin_login_form');
    Route::post('/login', [LoginController::class, 'adminLogin'])->name('admin_login');

    Route::get('/dashboard', [HomeController::class, 'showAdminDashboard'])->name('admin_dashboard');

    Route::get('users', [UserController::class, 'users_list'])->name('users_list');
    Route::post('users', [UserController::class, 'add_user'])->name('add_user');

    Route::prefix('student')->group(function () {
        Route::get('admit', [StudentController::class, 'admit_student'])->name('admit_student');
        Route::post('admit', [StudentController::class, 'add_student'])->name('add_student');

        Route::get('admit/{id}/getFloor/', [StudentController::class, 'getFloor'])->name('getFloor');
        Route::get('admit/{id}/getFlat/', [StudentController::class, 'getFlat'])->name('getFlat');
        Route::get('admit/{id}/getSeat/', [StudentController::class, 'getSeat'])->name('getSeat');

        Route::get('list', [StudentController::class, 'list'])->name('student-list');
    });

    Route::get('building_list', [BuildingController::class, 'building_list'])->name('building_list');
    Route::post('building_list', [BuildingController::class, 'add_building'])->name('add_building');

    Route::get('{building}/floor_list', [FloorController::class, 'floor_list'])->name('floor_list');
    Route::post('add_floor', [FloorController::class, 'add_floor'])->name('add_floor');

    Route::get('{floor}/flat_list', [FlatController::class, 'flat_list'])->name('flat_list');
    Route::post('add_flat', [FlatController::class, 'add_flat'])->name('add_flat');

    Route::get('{flat}/seat_list', [SeatController::class, 'seat_list'])->name('seat_list');
    Route::post('add_seat', [SeatController::class, 'add_seat'])->name('add_seat');






    Route::get('{hostel_building}/seat_list/', [HostelSeatController::class, 'show'])->name('seat_list');
    Route::post('{hostelName}/seat_list/', [HostelSeatController::class, 'store'])->name('seat_list_store');
    Route::get('/hostel/seats/', [HostelSeatController::class, 'index'])->name('hostel-seats');
    Route::post('/hostel/seats/', [HostelSeatController::class, 'store']);
    Route::get('/meal/index/', [HostelMealController::class, 'index'])->name('meals-list');
    Route::post('/meal/index/', [HostelMealController::class, 'store']);

    Route::get('/bill/monthly', [MonthlyBillController::class, 'index'])->name('monthly-bills');
    Route::post('/bill/monthly', [MonthlyBillController::class, 'store']);

    Route::get('/bill/types', [TypesOfBillController::class, 'index'])->name('types-of-bill');
    Route::post('/bill/types', [TypesOfBillController::class, 'store']);

    Route::get('bill/generate', [MonthlyBillController::class, 'generateBill'])->name('generate-bill');
    Route::post('bill/generate', [MonthlyBillController::class, 'store']);
    Route::get('bill/view', [MonthlyBillController::class, 'viewBill'])->name('view_bill');
});



// Route::resource('student', StudentController::class);
// Route::prefix('admin')->name('users.')->group(function () {
//     Route::resource('users', UserController::class);
// });
// Route::resource('hostel-seats', HostelSeatController::class);

Auth::routes([
    'logout' => false,
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


Route::prefix('student')->group(function () {
    Route::get('/login', [LoginController::class, 'showStudentLoginForm'])->name('student_login_form');
    Route::post('/login', [LoginController::class, 'studentLogin'])->name('student_login');
    Route::get('/home', [HomeController::class, 'showStudentHome'])->name('student_home');
});
