<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\student\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/login', [LoginController::class, 'showStudentLoginForm'])->name('login_form');
    Route::post('/login', [LoginController::class, 'studentLogin'])->name('login');
    route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::controller(DashboardController::class)->group(function () {
        Route::group(['middleware' => 'auth:student'], function () {
            Route::get('dashboard', 'showStudentDashboard')->name('dashboard');
            Route::get('meal/chart', 'mealChart')->name('meal.chart');
            Route::get('meal/book', 'mealBook')->name('meal.book');
            Route::post('meal/find', 'findMeal')->name('meal.find');
            Route::post('meal/store', 'storeMeal')->name('meal.store');
        });
    });
    Route::controller(StudentController::class)->group(function () {
        Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => 'auth:student'], function () {
            Route::get('',  'showStudentProfile')->name('view');
            Route::post('update_image',  'updateStudentImage')->name('update-image');
            Route::post('update_password', 'updateStudentPassword')->name('update-password');
        });
    });
});
