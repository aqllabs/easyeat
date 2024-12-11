import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.jsx",
        "./vendor/livewire/flux-pro/stubs/**/*.blade.php",
        "./vendor/livewire/flux/stubs/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    darkMode: "class",
    plugins: [forms, typography, require("daisyui")],

    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#fd9a21", // Main CTA buttons, important highlights, brand identity
                    secondary: "#eda66f", // Secondary actions, notifications, badges
                    accent: "#b4c96e", // Accent elements, success states, positive interactions
                    neutral: "#1A1A1A", // Text, headers, navigation elements
                    "base-100": "#ffffff", // Main background
                    info: "#3abff8", // Informational messages, help icons
                    success: "#00E6A1", // Success messages, matches, confirmations
                    warning: "#FF9433", // Warning states, important notices
                    error: "#FF3B5C", // Error messages, destructive actions
                },
            },
        ],
    },
};
