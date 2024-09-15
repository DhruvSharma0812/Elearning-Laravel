<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Show all courses
    public function index()
    {
        $courses = Course::all(); // Fetch all courses from the database
        return view('courses.index', compact('courses')); // Return the courses view with the data
    }

    // Store a new course in the database
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_description' => 'required|string|max:1000',
        ]);

        // Create a new course using the validated data
        Course::create([
            'course_name' => $validatedData['course_name'],
            'course_description' => $validatedData['course_description'],
            'user_id' => auth()->id(), // Set user_id to the currently authenticated user
        ]);

        // Redirect back to the courses list with a success message
        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }
}
