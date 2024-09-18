<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all courses from the database
        $courses = Course::paginate(5);

        // Pass the courses data to the view
        return view('dashboard', compact('courses'));
    }
}
