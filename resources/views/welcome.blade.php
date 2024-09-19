<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JustLearning - E-Learning Platform</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-gray-100 text-gray-800">

    <header class="bg-blue-600 text-white py-6 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo Container -->
            <div class="flex items-center gap-3"  onclick="window.location.href='/'">
                <div class="text-3xl font-bold bg-white text-blue-600 px-4 rounded-full">
                    JL
                </div>
                <h1 class="text-3xl font-semibold">JustLearning</h1>
            </div>
        </div>
    </header>

    <main class="flex-grow flex flex-col items-center justify-center text-center py-12">
        <!-- Welcome Container -->
        <div class="bg-white p-8 rounded-lg shadow-lg w-3/4 md:w-1/2">
            <h1 class="text-4xl font-bold mb-4">Welcome to JustLearning</h1>
            <p class="text-lg mb-6 text-gray-600">Your Gateway to Knowledge</p>
            
            <div class="bg-yellow-50 p-4 rounded-lg mb-6">
                <p class="text-gray-700">JustLearning is an innovative e-learning platform designed to provide you with interactive and flexible learning experiences. Our platform offers a wide range of courses taught by expert instructors to help you achieve your educational goals.</p>
            </div>
            
            <button class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition" onclick="window.location.href='/login'">
                Login
            </button>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-4">
        <div class="text-center">
            <p>&copy; 2024 JustLearning. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
