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
                primary: '#1270AF',
                accent: '#177777',
                background: '#404041',
                'text-secondary': '#808184',
            },
        },
    },

    plugins: [forms],
};
