<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Courses') }}
            </h2>
        </div>
    </x-slot>

    <div class="main-content py-12">
        <div class="content-container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Create Course Form -->
            <div class="bg-white shadow-xl rounded-lg p-6 mb-6">
                <h3 class="text-lg font-medium text-gray-900">Create New Course</h3>
                <form method="POST" action="{{ route('courses.store') }}">
                    @csrf
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Course Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>
                    <div class="mt-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Course Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Course</button>
                    </div>
                </form>
            </div>

            <!-- List of Courses -->
            <div class="bg-white shadow-xl rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900">All Courses</h3>
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $course->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900">Add Pages</a>
                                    <a href="#" class="text-blue-600 hover:text-blue-900 ml-4">Play Course</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
