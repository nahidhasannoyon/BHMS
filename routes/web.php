<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\HostelMealController;
use App\Http\Controllers\admin\MonthlyBillController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\HostelSeatController;
use App\Http\Controllers\admin\TypesOfBillController;

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

// * Admin Login Routes
Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'showLoginSelection')->name('login_selection');
    Route::group(
        ["prefix" => "admin/login", "as" => "admin."],
        function () {
            Route::get('',  'showAdminLoginForm')->name('login_form');
            Route::post('',  'adminLogin')->name('login');
        }
    );
});

// * Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', "middleware" => "auth"], function () {
    // * Admin Login 

    // * Admin Dashboard and Logout
    Route::controller(DashboardController::class)->group(function () {
        Route::get("dashboard", "dashboard")->name("dashboard");
        Route::get("logout",  "logout")->name("logout");
    });

    // * Admin Profile View and Update
    Route::controller(ProfileController::class)->group(function () {
        Route::group(
            ["prefix" => "profile", "as" => "profile."],
            function () {
                Route::get("", "profile")->name("view");
                Route::patch("", "update")->name("update");
            }
        );
    });

    // * Admin User list and actions
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
            Route::get('admit', 'admit')->name('admit');
            // * Fetch Hostel floors, flats, seats to add student
            Route::prefix('admit/{id}')->group(function () {
                Route::get('getFloor', 'getFloor');
                Route::get('getFlat', 'getFlat');
                Route::get('getSeat', 'getSeat');
            });
            Route::post('admit', 'store')->name('store');

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

    // * Hostel Building, Floor, Flat and Seat list and actions
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

    // * Hostel Types of Bill list and actions
    Route::controller(TypesOfBillController::class)->group(
        function () {
            Route::group(['prefix' => 'bill', 'as' => 'bill.'], function () {
                Route::get('types',  'list')->name('types');
                Route::post('types',  'store')->name('store');
                Route::get('edit/{typesOfBill}',  'edit')->name('edit');
                Route::post('update/{typesOfBill}',  'update')->name('update');
            });
        }
    );

    // * Hostel Monthly Bill list and actions
    Route::controller(MonthlyBillController::class)->group(function () {
        Route::group(['prefix' => 'monthly_bill', 'as' => 'monthly_bill.'], function () {
            Route::get('find',  'find')->name('find');
            Route::post('generate',  'generate')->name('generate');
            Route::post('update',  'update')->name('update');
            Route::get('download/{student_id}/{date}',  'download')->name('download');
        });
    });

    // * Hostel Meal list and actions
    Route::controller(HostelMealController::class)->group(function () {
        Route::group(['prefix' => 'meal', 'as' => 'meal.'], function () {
            Route::get('list',  'list')->name('list');
            Route::get('today',  'today')->name('today');
            Route::post('list',  'add')->name('add');
            Route::group(['prefix' => '{meal}'], function () {
                Route::get('edit', 'edit')->name('edit');
                Route::get('delete', 'delete')->name('delete');
                Route::post('update', 'update')->name('update');
            });
        });
    });
});

Auth::routes([
    'logout' => false,
]);
