<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;

// Welcome Page Route
Route::get('/', function () {
    return view('welcome');
});

// Course Routes
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

// Middleware group for authenticated users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard Route - Display the dashboard with an overview (for authenticated users)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
