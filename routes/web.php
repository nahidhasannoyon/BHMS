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
use Illuminate\Routing\Route as RoutingRoute;

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

// * Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // * Admin Login
    Route::get('login', [LoginController::class, 'showAdminLoginForm'])->name('login_form');
    Route::post('login', [LoginController::class, 'adminLogin'])->name('login');

    Route::get('dashboard', [HomeController::class, 'showAdminDashboard'])->name('dashboard');
    // todo move this admin dashboard to admin controller

    Route::controller(UserController::class)->group(function () {
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            // * User Routes
            Route::get('', 'list')->name('list');
            Route::post('', 'add')->name('add');

            Route::group(['prefix' => '{id}'], function () {
                Route::get('edit', 'edit')->name('edit');
                Route::get('delete', 'delete')->name('delete');
                Route::post('update', 'update')->name('update');
            });
        });
    });

    // * Student Admit, list and actions
    Route::controller(StudentController::class)->group(function () {
        Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
            // * Add new Student
            Route::get('admit', 'admit_student')->name('admit');
            // * Fetch Hostel floors, flats, seats to add student
            Route::prefix('admit/{id}')->group(function () {
                Route::get('getFloor', 'getFloor');
                Route::get('getFlat', 'getFlat');
                Route::get('getSeat', 'getSeat');
            });
            Route::post('admit', 'add_student')->name('add');

            // * Student List
            Route::get('list', 'list')->name('list');

            // * Student list Actions
            Route::group(['prefix' => '{id}'], function () {
                Route::get('download', 'download')->name('download');
                Route::get('view', 'view')->name('view');
                Route::get('edit', 'edit')->name('edit');
                Route::get('delete', 'delete')->name('delete');
            });

            //* Fetch Hostel floors, flats, seats to edit student
            Route::group(['prefix' => '{student}/edit/{id}'], function () {
                Route::get('updateFloor', 'updateFloor');
                Route::get('updateFlat', 'updateFlat');
                Route::get('updateSeat', 'updateSeat');
            });
            // * Update Student
            Route::post('{id}/update', 'update')->name('update');
        });
    });

    Route::controller(HostelSeatController::class)->group(function () {
        Route::group(['prefix' => 'hostel', 'as' => 'hostel.'], function () {
            // * Hostel Buildings
            Route::get('list', 'building_list')->name('list');
            Route::post('list', 'add_building')->name('add');
            Route::group(['prefix' => '{building_id}'], function () {
                Route::get('edit', 'edit_building')->name('edit');
                Route::get('delete', 'delete_building')->name('delete');
                Route::post('update', 'update_building')->name('update');
            });

            // * Hostel Floors
            Route::group(['prefix' => '{building}/floor', 'as' => 'floor.'], function () {
                Route::get('list', 'floor_list')->name('list');
                Route::post('add', 'add_floor')->name('add');
                Route::group(['prefix' => '{floor}'], function () {
                    Route::get('edit', 'edit_floor')->name('edit');
                    Route::get('delete', 'delete_floor')->name('delete');
                    Route::post('update', 'update_floor')->name('update');
                });

                // * Hostel Flats
                Route::group(['prefix' => '{floor}/flat', 'as' => 'flat.'], function () {
                    Route::get('list', 'flat_list')->name('list');
                    Route::post('add_flat', 'add_flat')->name('add');
                    Route::group(['prefix' => '{flat}'], function () {
                        Route::get('edit', 'edit_flat')->name('edit');
                        Route::get('delete', 'delete_flat')->name('delete');
                        Route::post('update', 'update_flat')->name('update');
                    });

                    // * Hostel Seats
                    Route::group(['prefix' => '{flat}/seat', 'as' => 'seat.'], function () {
                        Route::get('list', 'seat_list')->name('list');
                        Route::post('add', 'add_seat')->name('add');
                        Route::group(['prefix' => '{seat}'], function () {
                            Route::get('edit', 'edit_seat')->name('edit');
                            Route::get('delete', 'delete_seat')->name('delete');
                            Route::post('update', 'update_seat')->name('update');
                        });
                    });
                });
            });
        });
    });

    Route::controller(HostelMealController::class)->group(function () {
        Route::group(['prefix' => 'meal', 'as' => 'meal.'], function () {
            Route::get('list',  'list')->name('list');
            Route::post('list',  'add')->name('add');
            Route::group(['prefix' => '{meal}'], function () {
                Route::get('edit', 'edit')->name('edit');
                Route::get('delete', 'delete')->name('delete');
                Route::post('update', 'update')->name('update');
            });
        });
    });

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
// * Student Routes
Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/login', [LoginController::class, 'showStudentLoginForm'])->name('login_form');
    Route::post('/login', [LoginController::class, 'studentLogin'])->name('student_login');
    Route::get('dashboard', [HomeController::class, 'showStudentDashboard'])->name('dashboard');


    Route::controller(StudentController::class)->group(function () {
        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('',  'showStudentProfile')->name('view');
            Route::post('update_image',  'updateStudentImage')->name('update-image');
            Route::post('update_password', 'updateStudentPassword')->name('update-password');
        });
    });
});
