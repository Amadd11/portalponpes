import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                primary: "#E9A319", // dark navy
                "primary-dark": "#044343", // darker
                yellow: {
                    500: "#FBBF24",
                    600: "#F59E0B",
                },
            },
        },
    },
    plugins: [
        require("@tailwindcss/typography"), // Menambahkan plugin typography
    ],
};
