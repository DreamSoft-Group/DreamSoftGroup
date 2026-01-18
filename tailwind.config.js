import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', 'Figtree', ...defaultTheme.fontFamily.sans],
                display: ['Montserrat', 'sans-serif'], // For headers mimicking Gotham Black
            },
            colors: {
                primary: '#3B82F6', // Blue 500
                accent: '#34D399',  // Emerald 400
                background: '#020617', // Slate 950
                'surface': '#1E293B', // Slate 800
                'text-secondary': '#94A3B8', // Slate 400
            },
        },
    },

    plugins: [forms],
};
