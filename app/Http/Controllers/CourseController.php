<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePage;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all(); // Retrieve all courses
        return view('courses.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_description' => 'nullable|string',
        ]);

        Course::create([
            'course_name' => $request->course_name,
            'course_description' => $request->course_description,
        ]);

        return redirect()->route('courses.index');
    }
}
