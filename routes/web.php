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

// Route to add pages to a course
Route::get('/courses/{id}/add-pages', [CourseController::class, 'addPages'])->name('courses.add_pages');
Route::post('/courses/{id}/store-page', [CourseController::class, 'storePage'])->name('courses.store_page');

// Route to show details of a specific page within a course
Route::get('/courses/{course_id}/pages/{page_id}', [CourseController::class, 'showPageDetails'])->name('courses.page_details');

// Route to play a course
Route::get('/courses/{id}/play', [CourseController::class, 'play'])->name('courses.play');

// Middleware group for authenticated users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard Route - Display the dashboard with an overview (for authenticated users)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
