<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Play Course') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200 flex justify-between items-center text-white bg-blue-700">
                    <h1 class="text-3xl font-extrabold text-white mb-4">{{ $course->course_name }}</h1>

                    <div class="">
                        <a href="{{ route('courses.add_pages', $course->id) }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">
                            + Create a New Page
                        </a>
                    </div>
                </div>

                <div class="p-6">
                    @if($pages->count() > 0)
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Course Pages</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($pages as $page)
                                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 ease-in-out">
                                        <a href="{{ route('courses.page_details', ['course_id' => $course->id, 'page_id' => $page->id]) }}" class="block p-4">
                                            <div class="flex flex-col items-start">
                                                @if($page->image)
                                                    <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->page_title }}" class="w-full h-32 object-cover rounded-t-lg mb-4">
                                                @endif
                                                <h3 class="text-xl font-semibold text-gray-900">{{ $page->page_title }}</h3>
                                                <p class="text-gray-600 mt-2">{{ Str::limit($page->page_content, 100) }}</p>
                                                <p class="text-gray-500 text-sm font-bold mt-2">Page Number: {{ $page->page_number }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p class="text-gray-600">No pages available for this course.</p>
                    @endif
                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $pages->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
