<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <p class="text-gray-600 mt-2">Welcome, {{ auth()->user()->name }}!</p>
        </div>
    </x-slot>

    <div class="main-content py-12">
        <div class="content-container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Section -->
            <div class="stats bg-white shadow-xl rounded-lg p-6 mb-6">
                <div class="stats-box">
                    <h3 class="stats-title">Active Courses</h3>
                    <!-- Display the count of courses -->
                    <p class="stats-value">{{ $courses->count() }}</p>
                </div>
            </div>

            <!-- Available Courses Section -->
            <div class="recent-activities bg-white shadow-xl rounded-lg p-6">
                <h3 class="section-title">Available Courses</h3>
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
            </div>
        </div>
    </div>
</x-app-layout>
