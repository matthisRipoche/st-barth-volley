import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/scss/Front/app.scss",
                "resources/scss/BO/app.scss",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
