<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Pages to Course') }}
            </h2>
        </div>
    </x-slot>

    <div class="main-content py-12">
        <div class="content-container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Add New Page to "{{ $course->course_name }}"</h3>
                <form action="{{ route('courses.store_page', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="page_title" class="block text-sm font-medium text-gray-700">Page Title</label>
                        <input type="text" name="page_title" id="page_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('page_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="page_content" class="block text-sm font-medium text-gray-700">Page Content</label>
                        <textarea name="page_content" id="page_content" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                        @error('page_content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Page</button>
                </form>

                <!-- List of existing pages for the course -->
                <h3 class="text-lg font-semibold mt-6 mb-4">Existing Pages</h3>
                <ul>
                    @foreach ($course->pages as $page)
                        <li>
                            <a href="{{ route('courses.page_details', ['course_id' => $course->id, 'page_id' => $page->id]) }}" class="text-blue-500 hover:underline">
                                {{ $page->page_title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
