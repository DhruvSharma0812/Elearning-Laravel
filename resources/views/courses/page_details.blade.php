<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Page Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="main-content py-12">
        <div class="content-container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">{{ $course->course_name }}</h1>
                <h2 class="text-xl font-semibold mb-2">{{ $page->page_title }}</h2>
                @if($page->image)
                    <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->page_title }}" class="mb-4">
                @endif
                <p>{{ $page->page_content }}</p>

                <!-- Pagination Buttons -->
                <div class="mt-4 flex justify-between">
                    @if($previousPage)
                        <a href="{{ route('courses.page_details', ['course_id' => $course->id, 'page_id' => $previousPage->id]) }}"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:bg-blue-600 active:bg-blue-700 transition ease-in-out duration-150">
                            Previous
                        </a>
                    @else
                        <span class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-gray-200 cursor-not-allowed">
                            Previous
                        </span>
                    @endif

                    @if($nextPage)
                        <a href="{{ route('courses.page_details', ['course_id' => $course->id, 'page_id' => $nextPage->id]) }}"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:bg-blue-600 active:bg-blue-700 transition ease-in-out duration-150">
                            Next
                        </a>
                    @else
                        <span class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-gray-200 cursor-not-allowed">
                            Next
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
