<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JustLearn') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ mix('css/fallback.css') }}" rel="stylesheet">

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        <div class="flex">
            <!-- Sidebar -->
            <nav class="sidebar w-64 bg-gray-800 text-white">
                <ul class="space-y-2 py-4">
                    <li><a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Overview</a></li>
                    <!-- <li><a href="{{ route('courses.index') }}" class="block px-4 py-2 hover:bg-gray-700">Courses</a>
                    </li> -->
                    <li><a href="{{ route('profile.show') }}" class="block px-4 py-2 hover:bg-gray-700">Profile</a></li>
                </ul>
            </nav>

            <div class="w-full">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow-md border-b border-gray-200">
                        <div class="max-w-7xl mx-auto py-4 px-6 sm:px-8 lg:px-12">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Main Content Area -->
                <main class="flex-1 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>