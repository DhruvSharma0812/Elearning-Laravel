<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Add Course Form -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6 mb-6">
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
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Course</button>
                    </div>
                </form>
            </div>

            <!-- Courses List -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Available Courses</h3>

                <!-- Courses Table -->
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($courses as $course)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $course->course_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->course_description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($courses->isEmpty())
                    <p class="text-gray-500 mt-4">No courses available. Add a new course above.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
