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
                </div>

                <!-- Displaying All Pages  -->
                <x-course-pages :pages="$pages" :course="$course" />
            </div>

        </div>
    </div>
</x-app-layout>
