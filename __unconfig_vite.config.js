
let __unconfig_data;
let __unconfig_stub = function (data = {}) { __unconfig_data = data };
__unconfig_stub.default = (data = {}) => { __unconfig_data = data };
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

const __unconfig_default =  defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/global.css", "resources/js/main.js"],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                entryFileNames: "assets/[name].js",
                chunkFileNames: "assets/[name].js",
                assetFileNames: "assets/[name].[ext]",
            },
        },
    },
});
if (typeof __unconfig_default === "function") __unconfig_default(...[{"command":"serve","mode":"development"}]);export default __unconfig_data;