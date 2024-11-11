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
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                    transparent: 'transparent',
                    black: '#000',
                    white: '#fff',
                    orange:{
                    50: '#fff7ed',
                    100:'#ffedd5',
                    200:'#fed7aa',
                    300:'#fdba74',
                    400:'#fb923c',
                    500:'#f97316',
                    600: '#ea580c', 
                    700: '#c2410c', 
                    800:'#9a3412', 
                    },
                    gray:{
                        50:"#f9fafb",
                        100:"#f3f4f6" ,
                        200:"#e5e7eb",
                        300:"#9ca3af",
                        400:"#6b7280",
                        500:"#6b7280 ",
                        600:"#4b5563",
                        700:"#374151",
                        800:"#1f2937",
                        900:"#111827"
                    },
            },
        },
    },

    plugins: [forms, typography],
};
