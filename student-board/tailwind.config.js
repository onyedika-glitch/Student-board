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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#FF9800",      // For bg-primary, border-primary
                accent: "#FFD600",       // For text-accent, bg-accent
                dark: "#111111",         // For bg-dark
                neutral: {
                    900: '#1a1a1a',        // For bg-neutral-900
                },
            },
        },
    },

    plugins: [forms],
};
