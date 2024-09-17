<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Play Course') }}
            </h2>
        </div>
    </x-slot>

    <div class="main-content py-12">
        <div class="content-container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">{{ $course->course_name }}</h1>
                
                @if($pages->count() > 0)
                    <div class="course-pages">
                        <h2 class="text-xl font-semibold mb-4">Course Pages</h2>
                        <ul>
                            @foreach ($pages as $page)
                                <li class="mb-4">
                                    <a href="{{ route('courses.page_details', ['course_id' => $course->id, 'page_id' => $page->id]) }}" class="text-blue-500 hover:underline">
                                        {{ $page->page_title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p>No pages available for this course.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
