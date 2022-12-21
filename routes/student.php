<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\student\ProfileController;
use App\Http\Controllers\student\DashboardController;
use App\Http\Controllers\student\HostelMealController;

// * Student Login Routes
Route::controller(LoginController::class)->group(function () {
    Route::group(["prefix" => "student/login", "as" => "student."], function () {
        Route::get("", "showStudentLoginForm",)->name("login_form");
        Route::post("",  "studentLogin")->name("login");
    });
});

Route::group(["prefix" => "student", "as" => "student.", "middleware" => "auth:student"], function () {
    // * Student Dashboard and Logout
    Route::controller(DashboardController::class)->group(function () {
        Route::get("dashboard", "dashboard")->name("dashboard");
        Route::get("logout",  "logout")->name("logout");
    });

    // * Student Meal Chart, Booking and Actions
    Route::controller(HostelMealController::class)->group(function () {
        Route::group(["prefix" => "meal", "as" => "meal."], function () {
            Route::get("chart", "chart")->name("chart");
            Route::get("book", "book")->name("book");
            Route::get("history", "history")->name("history");
            Route::post("store", "store")->name("store");
            Route::get("edit/{bookedMeal}", "edit")->name("edit");
            Route::patch("update/{bookedMeal}", "update")->name("update");
            Route::get("/delete/{bookedMeal}", "delete")->name("delete");
        });
    });

    // * Student Profile View and Update
    Route::controller(ProfileController::class)->group(function () {
        Route::group(
            ["prefix" => "profile", "as" => "profile."],
            function () {
                Route::get("", "profile")->name("view");
                Route::post("update_image", "updateImage")->name("update-image");
                Route::post("update_password", "updatePassword")->name("update-password");
            }
        );
    });
});
