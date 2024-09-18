<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Page Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="main-content py-12 bg-gray-50">
        <div class="content-container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-4">{{ $course->course_name }}</h1>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $page->page_title }}</h2>

                @if($page->image)
                    <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->page_title }}" class="mb-6 rounded-lg shadow-md">
                @endif

                <p class="text-gray-700 leading-relaxed">{{ $page->page_content }}</p>

                <!-- Pagination Buttons and Page Number -->
                <div class="mt-8 flex justify-between items-center">
                    <div class="flex space-x-2">
                        @if($previousPage)
                            <a href="{{ route('courses.page_details', ['course_id' => $course->id, 'page_id' => $previousPage->id]) }}"
                               class="inline-flex items-center px-6 py-3 border border-transparent text-sm leading-5 font-semibold rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-200">
                                Previous
                            </a>
                        @else
                            <span class="inline-flex items-center px-6 py-3 border border-transparent text-sm leading-5 font-semibold rounded-lg text-gray-500 bg-gray-300 cursor-not-allowed">
                                Previous
                            </span>
                        @endif

                        @if($nextPage)
                            <a href="{{ route('courses.page_details', ['course_id' => $course->id, 'page_id' => $nextPage->id]) }}"
                               class="inline-flex items-center px-6 py-3 border border-transparent text-sm leading-5 font-semibold rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-200">
                                Next
                            </a>
                        @else
                            <span class="inline-flex items-center px-6 py-3 border border-transparent text-sm leading-5 font-semibold rounded-lg text-gray-500 bg-gray-300 cursor-not-allowed">
                                Next
                            </span>
                        @endif
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="text-gray-600">
                            Page {{ $currentPage }} of {{ $totalPages }}
                        </div>

                        <!-- Exit Button -->
                        <a href="{{ route('courses.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-200">
                            Exit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
