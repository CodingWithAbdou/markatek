import defaultTheme from "tailwindcss/defaultTheme";

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            // Using modern `rgb`
            primary: "rgb(var(--color-primary) / <alpha-value>)",
            secondary: "rgb(var(--color-secondary) / <alpha-value>)",
            // Using default Tailwind colors
            gray: {
                100: "#f7fafc",
                200: "#edf2f7",
                300: "#e2e8f0",
                400: "#cbd5e0",
                500: "#a0aec0",
                600: "#718096",
                700: "#4a5568",
                800: "#2d3748",
                900: "#1a202c",
            },
            neutral: {
                100: "#f8f9fa",
                200: "#e9ecef",
                300: "#dee2e6",
                400: "#ced4da",
                500: "#adb5bd",
                600: "#6c757d",
                700: "#495057",
                800: "#343a40",
                900: "#212529",
            },
            white: "#ffffff",
            teal: {
                100: "#e6fffa",
                200: "#b2f5ea",
                300: "#81e6d9",
                400: "#4fd1c5",
                500: "#38b2ac",
                600: "#319795",
                700: "#2c7a7b",
                800: "#285e61",
                900: "#234e52",
            },
        },
    },
    plugins: [],
};
