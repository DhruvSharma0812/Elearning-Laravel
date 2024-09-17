<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses Overview') }}
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

            <!-- Courses Table -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Available Courses</h3>

                <!-- Courses Table -->
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($courses as $course)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $course->course_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->course_description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <!-- Add Pages Button -->
                                    <a href="{{ route('courses.add_pages', $course->id) }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Add Pages</a>

                                    <!-- Play Course Button -->
                                    <a href="{{ route('courses.play', $course->id) }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700 ml-2">Play Course</a>
                                </td>
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
