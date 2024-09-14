<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JustLearning - E-Learning Platform</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Link to the CSS file -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="header">
        <div class="logo-container">
            <div class="logo">JL</div>
        </div>
        <div class="welcome-container">
            <h1 class="welcome-title">Welcome to JustLearning</h1>
            <p class="welcome-subtitle">Your Gateway to Knowledge</p>
            <div class="info-card">
                <p class="project-info">JustLearning is an innovative e-learning platform designed to provide you with interactive and flexible learning experiences. Our platform offers a wide range of courses taught by expert instructors to help you achieve your educational goals.</p>
            </div>
            <a href="/login" class="login-button">Login</a>
        </div>
    </header>

    <footer class="footer">
        <p class="footer-text">&copy; 2024 JustLearning. All rights reserved.</p>
    </footer>
</body>
</html>
