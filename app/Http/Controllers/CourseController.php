<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CoursePage; // Ensure this model is named correctly
use App\Models\Page;

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

    // Show the form to add pages to a course
    public function addPages($id)
    {
        // Find the course by ID or fail if not found
        $course = Course::with('pages')->findOrFail($id);

        // Pass the course to the view
        return view('courses.add_pages', [
            'course' => $course
        ]);
    }

    // Store a new page for a specific course
    public function storePage(Request $request, $id)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'page_title' => 'required|string|max:255',
            'page_content' => 'required|string|max:10000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Find the course
        $course = Course::findOrFail($id);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create a new page for the course
        $course->pages()->create([
            'page_title' => $validatedData['page_title'],
            'page_content' => $validatedData['page_content'],
            'image' => $imagePath,
            'page_number' => $course->pages->count() + 1 // Set page number based on existing pages
        ]);

        // Redirect back to the add pages view with a success message
        return redirect()->route('courses.add_pages', $id)->with('success', 'Page added successfully!');
    }

    // Show the course play page
    public function play($id)
    {
        // Find the course by ID or fail if not found
        $course = Course::findOrFail($id);
        
        // Retrieve all pages for the course
        $pages = $course->pages;

        // Return the play view with the course and its pages
        return view('courses.play', [
            'course' => $course,
            'pages' => $pages
        ]);
    }

    public function showPage($course_id, $page_id)
{
    // Fetch the current course and all its pages, ordered by ID
    $course = Course::findOrFail($course_id);
    $pages = $course->pages()->orderBy('id')->get();

    // Get the current page
    $currentPage = $pages->where('id', $page_id)->first();

    if (!$currentPage) {
        abort(404, 'Page not found');
    }

    // Find the index of the current page
    $currentIndex = $pages->search($currentPage);

    // Determine the previous and next pages
    $previousPage = ($currentIndex > 0) ? $pages[$currentIndex - 1] : null;
    $nextPage = ($currentIndex < count($pages) - 1) ? $pages[$currentIndex + 1] : null;

    // Return the view with course, current page, previousPage, and nextPage
    return view('courses.page_details', [
        'course' => $course,
        'page' => $currentPage,
        'previousPage' => $previousPage,
        'nextPage' => $nextPage,
    ]);
}




    // Show details of a specific page within a course
    public function showPageDetails($course_id, $page_id)
{
    $course = Course::findOrFail($course_id);
    $page = $course->pages()->findOrFail($page_id);

    // Get the previous and next pages
    $previousPage = $course->pages()->where('page_number', '<', $page->page_number)->orderBy('page_number', 'desc')->first();
    $nextPage = $course->pages()->where('page_number', '>', $page->page_number)->orderBy('page_number', 'asc')->first();

    return view('courses.page_details', compact('course', 'page', 'previousPage', 'nextPage'));
}

}
