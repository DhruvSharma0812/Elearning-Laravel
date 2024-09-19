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
            <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 p-4 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <h3 class="text-xl font-semibold text-gray-900 mb-6 border-b border-gray-200 pb-4">
                    Add New Page to "{{ $course->course_name }}"
                </h3>
                <form action="{{ route('courses.store_page', $course->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="page_title" class="block text-sm font-medium text-gray-700">Page Title</label>
                        <input type="text" name="page_title" id="page_title"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            required>
                        @error('page_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="page_content" class="block text-sm font-medium text-gray-700">Page Content</label>
                        <textarea name="page_content" id="page_content" rows="6"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            required></textarea>
                        @error('page_content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="image" id="image"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300 ease-in-out">
                        Add Page
                    </button>
                </form>

                <!-- List of existing pages for the course -->
                <h3 class="text-2xl font-bold text-gray-800 mt-10 mb-6 border-t border-gray-300 pt-4">
                    Existing Pages
                </h3>
                <x-course-pages :pages="$pages" :course="$course" />
            </div>
        </div>
    </div>
</x-app-layout>