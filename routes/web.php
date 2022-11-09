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
    Route::get('login', [LoginController::class, 'showAdminLoginForm'])->name('admin_login_form');
    Route::post('login', [LoginController::class, 'adminLogin'])->name('admin_login');

    Route::get('dashboard', [HomeController::class, 'showAdminDashboard'])->name('admin_dashboard');
    // todo move this admin dashboard to admin controller 
    Route::get('users', [UserController::class, 'users_list'])->name('users_list');
    Route::post('users', [UserController::class, 'add_user'])->name('add_user');

    Route::prefix('student')->group(function () {
        Route::get('admit', [StudentController::class, 'admit_student'])->name('admit_student');
        Route::post('admit', [StudentController::class, 'add_student'])->name('add_student');

        Route::prefix('admit/{id}')->group(function () {
            Route::get('getFloor', [StudentController::class, 'getFloor'])->name('getFloor');
            Route::get('getFlat', [StudentController::class, 'getFlat'])->name('getFlat');
            Route::get('getSeat', [StudentController::class, 'getSeat'])->name('getSeat');
        });

        Route::get('list', [StudentController::class, 'list'])->name('student-list');
        Route::get('{id}/view', [StudentController::class, 'view'])->name('view_student');
        Route::get('{id}/edit', [StudentController::class, 'edit'])->name('edit_student');

        Route::prefix('{student}/edit/{id}')->group(function () {
            Route::get('updateFloor', [StudentController::class, 'updateFloor']);
            Route::get('updateFlat', [StudentController::class, 'updateFlat']);
            Route::get('updateSeat', [StudentController::class, 'updateSeat']);
        });

        Route::post('{id}/update', [StudentController::class, 'update'])->name('update_student');
    });

    Route::prefix('hostel')->group(function () {
        Route::get('list', [BuildingController::class, 'building_list'])->name('building_list');
        Route::post('list', [BuildingController::class, 'add_building'])->name('add_building');

        Route::prefix('{building}/floor')->group(function () {
            Route::get('list', [FloorController::class, 'floor_list'])->name('floor_list');
            Route::post('add_floor', [FloorController::class, 'add_floor'])->name('add_floor');

            Route::prefix('{floor}/flat')->group(function () {
                Route::get('list', [FlatController::class, 'flat_list'])->name('flat_list');
                Route::post('add_flat', [FlatController::class, 'add_flat'])->name('add_flat');

                Route::prefix('{flat}/seat')->group(function () {
                    Route::get('list', [SeatController::class, 'seat_list'])->name('seat_list');
                    Route::post('add_seat', [SeatController::class, 'add_seat'])->name('add_seat');
                });
            });
        });
    });

    Route::get('meal/index', [HostelMealController::class, 'index'])->name('meals-list');
    Route::post('meal/index', [HostelMealController::class, 'store']);

    Route::get('bill/monthly', [MonthlyBillController::class, 'index'])->name('monthly-bills');
    Route::post('bill/monthly', [MonthlyBillController::class, 'store']);

    Route::get('bill/types', [TypesOfBillController::class, 'index'])->name('types-of-bill');
    Route::post('bill/types', [TypesOfBillController::class, 'store']);

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
