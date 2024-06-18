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
            red: {
                100: "#fff5f5",
                200: "#fed7d7",
                300: "#feb2b2",
                400: "#fc8181",
                500: "#f56565",
                600: "#e53e3e",
                700: "#c53030",
                800: "#9b2c2c",
                900: "#742a2a",
            },
        },
    },
    plugins: [],
};
