<div class="bg-white shadow-xl sm:rounded-lg p-6">
    <h3 onclick="window.location.href='/dashboard'"
        class="cursor-pointer text-lg font-medium leading-6 text-white bg-blue-500 p-4 rounded-lg inline-block">
        Available Courses
    </h3>

    <!-- Courses Table -->
    <div class="mt-6">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">S. No.</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Total Pages</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($courses as $index => $course)
                    <tr class="hover:bg-gray-100">
                        <!-- Serial Number adjusted for pagination -->
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $loop->iteration + ($courses->currentPage() - 1) * $courses->perPage() }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $course->course_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 min-w-xs max-w-xs">{{ $course->course_description }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $course->pages_count }}</td>
                        <td class="px-6 py-4 text-sm space-x-2">
                            <!-- Add Pages Button -->
                            <a href="{{ route('courses.add_pages', $course->id) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-800 transition duration-300 ease-in-out">Add Pages</a>
                            <!-- Play Course Button -->
                            <a href="{{ route('courses.play', $course->id) }}" class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-800 transition duration-300 ease-in-out">Play Course</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Display if there are no courses -->
        @if ($courses->isEmpty())
            <p class="text-gray-500 mt-4">No courses available. Add a new course above.</p>
        @endif

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $courses->links() }} <!-- This will render pagination controls -->
        </div>
    </div>
</div>
