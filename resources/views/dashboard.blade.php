<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- User Name Display -->
            <div class="flex cursor-pointer justify-center items-center mb-4">
                <div class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow-md">
                    <span class="text-lg font-semibold" onclick="window.location.href='/user/profile'">
                        Welcome, {{ Auth::user()->name }}!
                    </span>
                </div>
            </div>

             <!-- Success Message -->
             @if (session('success'))
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 p-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Toggle Button -->
            <div class="mb-4">
                <button id="toggle-form" type="button"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    + Add a New Course
                </button>
            </div>

            <!-- Add Course Form -->
            <div id="course-form" class="bg-white shadow-xl sm:rounded-lg p-6 mb-6 hidden">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Add a New Course</h3>

                <form action="{{ route('courses.store') }}" method="POST" class="mt-4">
                    @csrf

                    <!-- Course Name -->
                    <div class="mb-4">
                        <label for="course_name" class="block text-sm font-medium text-gray-700">Course Name</label>
                        <input type="text" name="course_name" id="course_name" value="{{ old('course_name') }}" required
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('course_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Course Description -->
                    <div class="mb-4">
                        <label for="course_description" class="block text-sm font-medium text-gray-700">Course Description</label>
                        <textarea name="course_description" id="course_description" rows="4" required
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('course_description') }}</textarea>
                        @error('course_description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Add Course
                        </button>
                    </div>
                </form>
            </div>

            <!-- JavaScript to Toggle Form -->
            <script>
                document.getElementById('toggle-form').addEventListener('click', function () {
                    var form = document.getElementById('course-form');
                    form.classList.toggle('hidden');
                });
            </script>


            <!-- Courses Table -->
            <x-courses-table :courses="$courses" />
        </div>
    </div>
</x-app-layout>
