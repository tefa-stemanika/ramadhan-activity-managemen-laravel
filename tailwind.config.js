/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#13805A",
                secondary: "#f1c40f",
                danger: "#e74c3c",
                warning: "#FFE440",
                warm: '#FE7C00',
                tree: '#26DA24',
                mist: '#777C7A'
            }
        },
    },
    plugins: [],
};
