<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Playing: ') }} {{ $page->title }}
        </h2>

        <span>
            {{ Auth::user()->name }} <!-- Show the user's name -->
        </span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Display the content of the current page -->
            <div class="p-6">
                <h3>{{ $page->title }}</h3>
                <p>{{ $page->content }}</p>
            </div>
            
            <!-- Previous and Next buttons -->
            <div class="flex justify-between mt-4">
                @if ($previousPage)
                    <a href="{{ route('courses.page_details', ['course_id' => $course->id, 'page_id' => $previousPage->id]) }}"
                       class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Previous
                    </a>
                @endif

                @if ($nextPage)
                    <a href="{{ route('courses.page_details', ['course_id' => $course->id, 'page_id' => $nextPage->id]) }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Next
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
