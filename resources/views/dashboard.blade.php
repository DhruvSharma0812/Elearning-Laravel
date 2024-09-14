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
                    <p class="stats-value">4</p>
                </div>
                <div class="stats-box">
                    <h3 class="stats-title">Completed Courses</h3>
                    <p class="stats-value">12</p>
                </div>
                <div class="stats-box">
                    <h3 class="stats-title">Total Hours</h3>
                    <p class="stats-value">36 hrs</p>
                </div>
            </div>

            <!-- Recent Activities Section -->
            <div class="recent-activities bg-white shadow-xl rounded-lg p-6">
                <h3 class="section-title">Recent Activities</h3>
                <ul class="activity-list">
                    <li>Started course: "Advanced JavaScript"</li>
                    <li>Completed module: "React Basics"</li>
                    <li>Updated profile information</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
