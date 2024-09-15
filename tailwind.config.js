import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/components/**/*.blade.php', // Add custom component paths
        './resources/js/**/*.js', // If you have JavaScript files that contain Tailwind classes
    ],
    

    theme: {
        extend: {
            colors: {
                'custom-blue': '#1E3A8A', // Adding a custom color as an option
            },
        },
    },
    

    plugins: [forms, typography],
};
