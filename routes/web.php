<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');


Route::get('/', function () {
    return view('welcome');
});

// Route for the dashboard overview
Route::get('/dashboard/overview', function () {
    return view('dashboard');
})->name('dashboard.overview');

// Resource route for courses
Route::resource('courses', CourseController::class);


// Route::resource('courses', CourseController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
