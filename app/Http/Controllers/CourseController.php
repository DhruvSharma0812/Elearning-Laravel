<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // validate http request
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    // course
    public function index()
    {
        // Fetch courses with pagination
        $courses = Course::orderBy('id', 'desc')->paginate(5);
        return view('dashboard', compact('courses'));
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
        return redirect()->route('dashboard')->with('success', 'Course added successfully!');
    }

    // Show the form to add pages to a course
    public function addPages($id)
    {
        // Find the course by ID or fail if not found
        $course = Course::with('pages')->findOrFail($id);
        $pages = $course->pages()->orderBy('page_number')->paginate(6);
        $noPagesMessage = $pages->count() === 0 ? 'No pages have been added to this course yet.' : null;
        // Pass the course and pages to the view
        return view('courses.add_pages', [
            'course' => $course,
            'pages' => $pages,
            'noPagesMessage' => $noPagesMessage,
        ]);
    }

    // Store a new page for a specific course
    public function storePage(Request $request, $id)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'page_title' => 'required|string|max:255',
            'page_content' => 'required|string|max:10000',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,webm,webp|max:2048'
        ]);

        // Find the course
        $course = Course::findOrFail($id);

        // Store the file
        $filePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = $file->store('images', 'public');
        }

        // Create a new page for the course
        $course->pages()->create([
            'page_title' => $validatedData['page_title'],
            'page_content' => $validatedData['page_content'],
            'image' => $filePath,
            'page_number' => $course->pages()->count() + 1 // Set page number based on existing pages
        ]);

        // Redirect back to the add pages view with a success message
        return redirect()->route('courses.add_pages', $id)->with('success', 'Page added successfully!');
    }


    // Show the course play page
    public function play($id)
    {
        // Find the course by ID or fail if not found
        $course = Course::findOrFail($id);

        // Fetch the first page of the course
        $firstPage = $course->pages()->orderBy('page_number')->first();

        // If no pages exist, handle the case (e.g., redirect to a different page or show an error)
        if (!$firstPage) {
            return redirect()->route('courses.index')->with('error', 'No pages available for this course.');
        }

        // Redirect to the details of the first page
        return redirect()->route('courses.page_details', [
            'course_id' => $course->id,
            'page_id' => $firstPage->id
        ]);
    }



    // Show details of a specific page within a course
    public function showPageDetails($course_id, $page_id)
    {
        $course = Course::findOrFail($course_id);
        $page = $course->pages()->findOrFail($page_id);

        // Paginate the pages for the course (e.g., 10 pages per page)
        $paginatedPages = $course->pages()->orderBy('page_number')->paginate(5);

        // Get all pages for the course to find the current page index
        $allPages = $course->pages()->orderBy('page_number')->get();

        // Find the index of the current page
        $currentIndex = $allPages->search(fn($item) => $item->id === $page->id);

        // Determine the previous and next pages
        $previousPage = $currentIndex > 0 ? $allPages[$currentIndex - 1] : null;
        $nextPage = $currentIndex < $allPages->count() - 1 ? $allPages[$currentIndex + 1] : null;

        // Get the current page number and total pages
        $currentPage = $currentIndex + 1;
        $totalPages = $allPages->count();

        return view('courses.page_details', [
            'course' => $course,
            'page' => $page,
            'previousPage' => $previousPage,
            'nextPage' => $nextPage,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'paginatedPages' => $paginatedPages // Pass paginated pages to the view
        ]);
    }

    
}
